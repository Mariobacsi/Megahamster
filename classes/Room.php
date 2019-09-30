<?php


class Room
{
    private $name;
    private $preis;

    function __construct(string $name, float $preis)
    {
        $this->name = $name;
        $this->preis = $preis;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPreis()
    {
        return $this->preis;
    }

    function __toString() : string
    {
        return $this->name . ' ' . $this->preis . '€';
    }
}