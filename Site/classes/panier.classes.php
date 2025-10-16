<?php

class Panier
{
    public $id;
    public $lib;
    public $description;
    public $prix;
    public $quantite;

    function __construct($id, $lib, $description, $prix, $quantite)
    {
        $this->id = $id;
        $this->lib = $lib;
        $this->description = $description;
        $this->prix = $prix;
        $this->quantite = $quantite;
    }
}
