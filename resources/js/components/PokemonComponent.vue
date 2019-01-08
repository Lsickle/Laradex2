<template>
	<div class="row">
		<spinner v-show="loading"></spinner>
		<div class="col-sm" v-for=' pokemon in pokemons'>
			<div class="card text-center" style="width: 18rem; margin-top:3rem;">
				<img class="card-img-top rounded-circle mx-auto d-block" v-bind:src="pokemon.picture" onerror="this.src='images/default.jpg';" alt="" style="margin:2rem; background-color:#EFEFEF; width:8rem;height:8rem;">
				<div class="card-body">
					<h5 class="card-title">{{ pokemon.name }}</h5>	
					<p class="text-left" style="overflow-y: scroll; max-height:3rem; min-height:3rem;">descripcion de prueba pra Vue</p>
					<a href="/trainers/" class="btn btn-primary">Ver mas...</a>
				</div>
			</div>
		</div>
	</div>
</template>

<script type="text/javascript">
	import EventBus from '../event-bus';
	export default {
		data() {
			return{
				pokemons:[],
				loading: true
			}
		},
		created() {
			EventBus.$on('pokemon-added', data => {
				this.pokemons.push(data)
			}) 
		},	
        mounted() {
        	axios
        	.get('http://laradex2.test/Pokemons')
        	.then((res) => {
        		this.pokemons = res.data
        		this.loading = false
        	})
        }
    }
</script>