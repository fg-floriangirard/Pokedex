<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;
use Pokedex\Models\Type;

class Pokemon extends CoreModel
{
    /**
     * Properties storing informations of the Pokémon
     */
    private $hp;
    private $attack;
    private $defense;
    private $spe_attack;
    private $spe_defense;
    private $speed;
    private $number;

    /**
     * Creating getters  (no setters needed for our usage)
     * to retrieve the values of the properties
     */

    public function getHp()
    {
        return $this->hp;
    }

    public function getAttack()
    {
        return $this->attack;
    }

    public function getDefense()
    {
        return $this->defense;
    }

    public function getSpeAttack()
    {
        return $this->spe_attack;
    }

    public function getSpeDefense()
    {
        return $this->spe_defense;
    }

    public function getSpeed()
    {
        return $this->speed;
    }

    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Method to retrieve the list of Pokemons sorted by numbers
     */
    public function findAll()
    {
        $sql = "SELECT *
                FROM `pokemon` 
                ORDER BY `number`";

        // Retrieve the database connection
        $pdo = Database::getPDO();

        // Execute the query
        $request = $pdo->query($sql);

        // Retrieve all results with "fetchAll" and convert them into instances of the current model (Pokemon)
        $pokemons = $request->fetchAll(PDO::FETCH_CLASS, self::class);

        return $pokemons;
    }

    /** 
     * Méthode to retrieve informations of one pokemon
     */
    public function find($number)
    {
        $sql = "SELECT *
                FROM `pokemon` 
                WHERE `number` = {$number}
                LIMIT 1";

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $pokemon = $pdoStatement->fetchObject(self::class);

        return $pokemon;
    }

    /**
     * Method to display the type of the current Pokemon
     */
    public function getTypes()
    {
        // SQL query to select types from the pivot table "pokemon_type" and join with the "type" table
        $sql = "SELECT `type`.*
                FROM `pokemon_type`
                INNER JOIN `type` ON `type`.`id` = `pokemon_type`.`type_id`
                WHERE `pokemon_type`.`pokemon_number` = {$this->getNumber()}";

        
        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, Type::class);

        return $types;
    }
}