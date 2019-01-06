<template>
	<div class="row">
		<div class="col-sm" v-for=' pokemon in pokemons'>
			<div class="card text-center" style="width: 18rem; margin-top:3rem;">
				<img class="card-img-top rounded-circle mx-auto d-block" src="images/" onerror="this.src='images/default.jpg';" alt="" style="margin:2rem; background-color:#EFEFEF; width:8rem;height:8rem;">
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
	export default {
		data() {
			return{
				pokemons:[
					{ id: 1, name: "pikachu" },
					{ id: 2, name: "squirtle" },
					{ id: 3, name: "charizard" },
					{ id: 4, name: "Blastoise" },
					{ id: 5, name: "Venasaur" }
				]
			}
		},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>