<?php


abstract class Room
{
    private $name;
    private $preis;
    private $zusatzausstattung;

    function __construct(string $name, float $preis, array $zusatzausstattung)
    {
        $this->name = $name;
        $this->preis = $preis;
        $this->zusatzausstattung = $zusatzausstattung;
    }

    public abstract function berechneGrundfläche();

    public function getName()
    {
        return $this->name;
    }

    public function getPreis()
    {
        return $this->preis;
    }

    public function getZusatzausstattung(): string
    {
        return implode(", ", $this->zusatzausstattung);
    }

    function __toString(): string
    {
        return $this->getName() . ' ' . $this->berechneGrundfläche() . ' ' . $this->getPreis() . '€';
    }
}