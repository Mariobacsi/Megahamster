<?php

namespace Mariobacsi\Megahamster\Living;
class SquRoom extends Room
{
    private $laenge;
    private $breite;
    private $hoehe;

    function __construct(string $name, float $preis, float $laenge, float $breite, float $hoehe, string ... $zusatzausstattung)
    {
        parent::__construct($name, $preis, $this->berechneGrundflaeche(), $zusatzausstattung);
        $this->laenge = $laenge;
        $this->breite = $breite;
        $this->hoehe = $hoehe;
    }

    public function berechneGrundflaeche()
    {
        return $this->laenge * $this->breite;
    }


    public function getLaenge(): float
    {
        return $this->laenge;
    }

    public function getBreite(): float
    {
        return $this->breite;
    }

    public function getHoehe(): float
    {
        return $this->hoehe;
    }
}
