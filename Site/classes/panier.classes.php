<?php

class Panier
{
    public $id;
    public $lib;
    public $description;
    public $prix;

    function __construct($id, $lib, $description, $prix)
    {
        $this->id = $id;
        $this->lib = $lib;
        $this->description = $description;
        $this->prix = $prix;
    }
}
