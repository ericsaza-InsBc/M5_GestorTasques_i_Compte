<?php

namespace App\Models;

use Exception;
use DateTime; // Add this line to import the DateTime class
class Tasca
{

    private String $titol;
    private String $descripcio;
    private DateTime $dataLímit; // Replace Date with DateTime
    private String $estat;

    public function __construct(string $titol, string $descripcio, DateTime $dataLímit, String $estat) // Replace Date with DateTime
    {
        if ($titol == null || $descripcio == null || $dataLímit == null || $estat == null) {
            throw new Exception("El títol no pot ser null o buit");
        }
        $this->titol = $titol;
        $this->descripcio = $descripcio;
        $this->dataLímit = $dataLímit;
        $this->estat = "Pendent";
    }

    public function __toString()
    {
        return "Tasca:".$this->titol
            ."\nDescripció:".$this->descripcio
            ."\nData límit:".$this->dataLímit->format('Y-m-d'); // Fix the format method call
    }

    public function setEstat(String $estat)
    {
        $this->estat = $estat;
    }
    public function getTitol(): String
    {
        return $this->titol;
    }

    public function getDescripcio(): String
    {
        return $this->descripcio;
    }

    public function getDataLímit(): DateTime // Replace Date with DateTime
    {
        return $this->dataLímit;
    }

    public function getEstat(): String
    {
        return $this->estat;
    }
}
