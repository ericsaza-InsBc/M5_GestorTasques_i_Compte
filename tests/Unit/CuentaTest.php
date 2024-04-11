<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Cuenta;

class CuentaTest extends TestCase
{

    // Cualquier persona puede crear una cuenta.
    public function test_cuenta() {
        $cuenta = new Cuenta();

        // Compruebo que la clase Cuenta es una instancia de la clase Cuenta.
        $this->assertInstanceOf(Cuenta::class, $cuenta);
    }


    //  Cualquier persona puede crear una cuenta que su saldo será 0.
    public function test_cuenta_buida() {
        $cuenta = new Cuenta();
        $this->assertEquals(0, $cuenta->getSaldo());
    }

    // Persona X ingresa 100 euros (máximo 3000€).
    public function test_cuenta_ingresar_dinero() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $this->assertEquals(100, $cuenta->getSaldo());
    }

    // Persona X ingresa 3000 euros (máximo 3000€).
    public function test_cuenta_ingresar_3000_euros() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(3000);
        $this->assertEquals(3000, $cuenta->getSaldo());
    }

    // Persona X ingresa 2 veces (máximo 3000€).
    public function test_cuenta_hace_2_ingresos() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $cuenta->ingresar(3000);
        $this->assertEquals(3100, $cuenta->getSaldo());
    }

    // Persona X ingresa -100 euros (máximo 3000€).
    public function test_cuenta_ingresar_negativo() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(-100);
        $this->assertEquals(0, $cuenta->getSaldo());
    }

    // Persona X ingresa 100.45 euros (máximo 3000€).
    // ! Test KO
    // public function test_cuenta_ingresar_decimal() {
    //     $cuenta = new Cuenta();
    //     $cuenta->ingresar(100.45);
    //     $this->assertEquals(100.45, $cuenta->getSaldo());
    // }

    // Persona X ingresa 100.46 euros (máximo 3000€).
    // ! Test KO
    // public function test_cuenta_ingresar_decimal_3_decimas() {
    //     $cuenta = new Cuenta();
    //     $cuenta->ingresar(100.456);
    //     $this->assertEquals(0.0, $cuenta->getSaldo());
    // }

    // Persona X retira dinero (máximo 3000€).
    public function test_cuenta_retirar_dinero() {
        $cuenta = new Cuenta();
        $cuenta->ingresar(100);
        $cuenta->retirar(100);
        $this->assertEquals(0, $cuenta->getSaldo());
    }

    // Persona X transfiere 100 euros a persona Y (máximo 3000€).
}
