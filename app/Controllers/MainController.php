<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;


class MainController
{
    // Display pokemons list (home page)
    public function list()
    {
        $pokemonObject = new Pokemon();
        $pokemons = $pokemonObject->findAll();
        $this->show('list', [
            'title' => 'Acceuil',
            'pokemons' => $pokemons
        ]);
    }

    // Display pokemon details
    public function detail($params)
    {
        $pokemonObject = new Pokemon();
        $pokemon = $pokemonObject->find($params['number']);
        $types = $pokemon->getTypes();
        $this->show('detail', [
            'title' => 'Détail du pokémon',
            'pokemon' => $pokemon,
            'types' => $types
        ]);
    }

     // Display types
     public function types()
     {
         $typeObject = new Type();
         $types =  $typeObject->findAll();
         $this->show('types', [
             'title' => 'Liste des types',
             'types' => $types
         ]);
     }
 
     // Display list filtered by types
     public function type($params)
     {
         $pokemonObject = new Pokemon();
         $pokemons = $pokemonObject->findByType($params['type']);
         $this->show('list', [
             'title' => 'Filtré par type',
             'pokemons' => $pokemons
         ]);
     }

    // If the route is not found this method is called
    public function notFound()
    {
        header('HTTP/1.1 404 Not Found');
        $this->show('error404', [
            'title' => 'Page not found- 404'
        ]);
    }

    public function show($viewName, $viewVars = [])
    {
        // Include header and footer templates as well as the parameter viewName
        include(__DIR__ . '/../views/header.tpl.php');
        include(__DIR__ . '/../views/' . $viewName . '.tpl.php');
        include(__DIR__ . '/../views/footer.tpl.php');
    }
}
