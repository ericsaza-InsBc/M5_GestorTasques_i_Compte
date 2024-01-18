<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\TestCase;
use App\Models\Tasca;
use App\Models\GestorTasques;
use DateTime; // Add this line to import the DateTime class

class GestorTasquesTest extends TestCase
{
    public function test_gestorTasques_llistarGestorBuit(): void
    {
        $gestorTasques = new GestorTasques();

        // Comprovar que el gestor de tasques està buit (En el meu cas l'he compronvat amb un count)
        $this->assertEquals(0, count($gestorTasques->llistarTasques()));
        $this->assertEquals([], $gestorTasques->llistarTasques());

        // També es pot comprovar amb un assertEmpty per comprovar que està buit
        $this->assertEmpty($gestorTasques->llistarTasques());
    }

    /**
     * Test per comprovar que el gestor de tasques no està buit
     */
    public function Test_gestorTasques_llistarGestorAmbTasques(): void
    {
        $gestorTasques = new GestorTasques();
        $gestorTasques->afegirTasca("Tasca 1", "Descripció de la tasca 1", new DateTime("2021-10-10"), "Pendent");

        // Comprovar que el gestor de tasques no està buit
        $this->assertNotEmpty($gestorTasques->llistarTasques());
        $this->assertNotEquals([], $gestorTasques->llistarTasques());
    }

    /**
     * Test per comprovar que el gestor de tasques no està buit i que la tasca afegida és la correcta
     */
    public function test_gestorTasques_validarGestor(): void
    {
        $gestorTasques = new GestorTasques();
        $gestorTasques->afegirTasca("Tasca 2", "Descripció de la tasca 2", new DateTime("2021-10-10"), "En progres");
        $this->assertEquals(1, count($gestorTasques->llistarTasques()));

       $array = [];
       $this->assertEquals($array, $gestorTasques->llistarTasques());
    }

}
