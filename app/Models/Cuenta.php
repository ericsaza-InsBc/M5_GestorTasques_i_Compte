<?php

namespace App\Models;
class Cuenta {

    private float $saldo;

    public function __construct() {
        $this->saldo = 0;
    }

    public function getSaldo(): float {
        return $this->saldo;
    }

    public function ingresar(int $cantidad): void {

        // Si la cantidad es mayor que 0 o tiene menos de 3 decimas, se suma a la cuenta, si no, no se suma nada.
        $cantidad > 0 && round($cantidad, 2)==$cantidad ? $this->saldo += $cantidad : $this->saldo += 0;
    }

    public function retirar(int $cantidad): void {
        $this->saldo -= $cantidad;
    }
}
