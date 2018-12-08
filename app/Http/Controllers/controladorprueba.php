<?php 

namespace LaraDex\Http\Controllers;

use LaraDex\Http\Controllers\Controller;

/**controlador de prueba para laradex
	nombre del controlador: controladorprueba.php
	clase ppal: controladorpueba
 * 
 */
class controladorprueba extends Controller
{
	
	public function prueba($param)
	{
		return 'estoy dentro de controladorprueba y el parametro es '. $param;
	}
}