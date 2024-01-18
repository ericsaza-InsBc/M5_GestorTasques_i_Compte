<?php

namespace App\Models;

use Dotenv\Util\Str;
use Illuminate\Support\Facades\Date;
use Exception;

class Tasca
{

    private String $titol;
    private String $descripcio;
    private Date $dataLímit;
    private String $estat;

    public function __construct(string $titol, string $descripcio, Date $dataLímit, String $estat)
    {
        if ($titol == null ||$descripcio == null || $dataLímit == null || $estat == null) {
            throw new Exception("El títol no pot ser null o buit");
        }
        $this->titol = $titol;
        $this->descripcio = $descripcio;
        $this->dataLímit = $dataLímit;
        $this->estat = "Pendent";
    }

    public function __toString()
    {
        return "Tasca{" . "titol=" . $this->titol . ", descripcio=" . $this->descripcio . ", dataLímit=" . $this->dataLímit . ", estat=" . $this->estat . '}';
    }

    public function setEstat(String $estat) {
        $this->estat = $estat;
    }
    public function getTitol(): String
    {
        return $this->titol;
    }
}
