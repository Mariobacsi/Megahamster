<?php

namespace Mariobacsi\Megahamster\Living;
abstract class Room implements \JsonSerializable
{
    private $name;
    private $preis;
    private $grundflaeche;
    private $zusatzausstattung = ["Kalkleckstein"];

    function __construct(string $name, float $preis, float $grundflaeche, array $zusatzausstattung)
    {
        $this->name = $name;
        $this->preis = $preis;
        $this->grundflaeche = $grundflaeche;
        foreach ($zusatzausstattung as $value) {
            array_push($this->zusatzausstattung, $value);
        }
    }

    public abstract function berechneGrundflaeche();

    public function toListRow()
    {
        $flaeche = round($this->berechneGrundflaeche(), 2);
        $ausruestung = implode(", ", $this->getZusatzausstattung());
        return <<<ROOM
            <tr>
                <td>{$this->getName()}</td>
                <td>$flaeche</td>
                <td>{$this->getPreis()}</td>
                <td>$ausruestung</td>
            </tr>
        ROOM;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getPreis()
    {
        return $this->preis;
    }

    public function getGrundflaeche(): float
    {
        return $this->grundflaeche;
    }

    public function getZusatzausstattung(): array
    {
        return $this->zusatzausstattung;
    }

    function __toString(): string
    {
        return $this->getName() . ' ' . $this->berechneGrundflaeche() . ' ' . $this->getPreis() . '€';
    }

    public function jsonSerialize():array
    {
        $rv['Name'] = $this->name;
        $rv['Grundflaeche'] = $this->grundflaeche;
        $rv['Preis'] = $this->preis;
        $rv['Zusatzausstattung'] = $this->zusatzausstattung;
        return $rv;
    }
}
