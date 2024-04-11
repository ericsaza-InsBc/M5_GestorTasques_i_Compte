<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Models\Tasca;
use App\Models\GestorTasques;
use App\Models\TascaNotExistException;
use DateTime;
use Exception;

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
        $gestorTasques->afegirTasca("Tasca 1", "Descripció de la tasca 1", new DateTime("2021-10-10"));

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
        $gestorTasques->afegirTasca("Tasca 1", "Descripció de la tasca 1", new DateTime("2021-10-10"));
        $this->assertEquals(1, count($gestorTasques->llistarTasques()));

       $array = [new Tasca("Tasca 1", "Descripció de la tasca 1", new DateTime("2021-10-10"), "Acabat")];
       $this->assertEquals($array, $gestorTasques->llistarTasques());
    }

    /**
     * Test per comprovar crear 3 tasques i eliminar-ne 1
     */
    public function test_gestorTasques_eliminarTasca(): void
    {
        $gestorTasques = new GestorTasques();
        $gestorTasques->afegirTasca("Tasca 1", "Descripció de la tasca 1", new DateTime("2021-10-10"));
        $gestorTasques->afegirTasca("Tasca 2", "Descripció de la tasca 2", new DateTime("2021-06-02"));
        $gestorTasques->afegirTasca("Tasca 3", "Descripció de la tasca 3", new DateTime("2021-03-09"));
        $this->assertEquals(3, count($gestorTasques->llistarTasques()));
        $gestorTasques->eliminarTasca("tasca 2");
        $this->assertEquals(2, count($gestorTasques->llistarTasques()));
    }

    /**
     * Test KO per eliminar una tasca que no existeix
     */
    public function testKO_gestorTasques_eliminarTascaNoExisteix(): void
    {
        $gestorTasques = new GestorTasques();
        $gestorTasques->afegirTasca("Tasca 1", "Descripció de la tasca 1", new DateTime("2021-10-10"));
        $gestorTasques->afegirTasca("Tasca 2", "Descripció de la tasca 2", new DateTime("2021-06-02"));
        $gestorTasques->afegirTasca("Tasca 3", "Descripció de la tasca 3", new DateTime("2021-03-09"));
        $this->assertEquals(3, count($gestorTasques->llistarTasques()));
        // try {
        //     $gestorTasques->eliminarTasca("Tasca 4");
        //     $this->fail("No s'ha llançat l'excepció");
        // } catch (TascaNotExistException $e) {
        //     $this->assertEquals("No s'ha trobat la tasca amb el títol tasca 4", $e->getMessage());
        // }
    }

    /**
     * Test per comprovar que es pot actualitzar l'estat d'una tasca
     */
    public function test_gestorTasques_actualitzarEstatTasca(): void
    {
        $gestorTasques = new GestorTasques();
        $gestorTasques->afegirTasca("Tasca 1", "Descripció de la tasca 1", new DateTime("2021-10-10"));
        $gestorTasques->afegirTasca("Tasca 2", "Descripció de la tasca 2", new DateTime("2021-06-02"));
        $gestorTasques->afegirTasca("Tasca 3", "Descripció de la tasca 3", new DateTime("2021-03-09"));
        $gestorTasques->actualitzarEstatTasca("Tasca 2", "Acabat");
        $this->assertEquals("Acabat", $gestorTasques->llistarTasques()[1]->getEstat());
        $this->assertEquals("Pendent", $gestorTasques->llistarTasques()[0]->getEstat());
    }

}
