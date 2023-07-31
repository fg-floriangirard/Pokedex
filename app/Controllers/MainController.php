<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;

class MainController
{
    // Display pokemons list (home page)
    public function list()
    {
        $pokemonObject = new Pokemon();
        $pokemons = $pokemonObject->findAll();
        $this->show('list', [
            'title' => 'Home',
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
