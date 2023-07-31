<?php

namespace Pokedex\Models;

class CoreModel
{
    /** 
     * Common properties can be extracted into the parent model
     */
    protected $id;
    protected $name;
    

    /**
     * Same for getters (this project doesn't need setters)
     */

    /**
     * Get the value of the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

}