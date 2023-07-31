<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use PDO;

class Type extends CoreModel
{

    /** 
     * Properties storing information about the type
     */
    private $color;

    public function getColor()
    {
        return $this->color;
    }

    /** 
     * Method to retrieve the list of types
     */
    public function findAll()
    {
        $sql = "SELECT *
                FROM `type` 
                ORDER BY `name`";

        $pdo = Database::getPDO();
        $pdoStatement = $pdo->query($sql);
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        return $types;
    }
}
