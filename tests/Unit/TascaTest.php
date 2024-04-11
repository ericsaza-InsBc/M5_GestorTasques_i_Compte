<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\TestCase;
use App\Models\Tasca;
use Exception;
use DateTime; // Add this line to import the DateTime class

class TascaTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     * @throws Exception
     */
    public function test_tasca_exemple(): void
    {

        $tasca = new Tasca("Tasca 1", "Descripció de la tasca 1", new DateTime("2021-10-10"), "Pendent");
        $this->assertEquals("Tasca 1", $tasca->getTitol());
        $this->assertEquals("Descripció de la tasca 1", $tasca->getDescripcio());

        $this->assertEquals($tasca->getEstat(), "Pendent");
        $this->assertTrue($tasca->getEstat() == "Pendent");
    }

    /**
     * Test KO
     * @test
     * @return void
     */
    public function test_tasca_KO(): void
    {

        $tasca = new Tasca("Tasca 2", "Descripció de la tasca 2", new DateTime("2024-02-10"), "Acabat");
        try {
            $this->assertEquals("Tasca 1", $tasca->getTitol());
            $this->assertTrue(false);
        } catch (Exception $e) {
            $this->assertTrue(true);
        }
    }

    /**
     * Test para cambiar el estado de una tarea y comprobar que se ha cambiado correctamente
     * @test
     * @return void
     */
    public function test_tasca_canviarEstat(): void
    {
        $tasca = new Tasca("Tasca 3", "Descripció de la tasca 3", new DateTime("2012-03-10"), "Pendent");
        $this->assertEquals("Pendent", $tasca->getEstat());
        $tasca->setEstat("Acabat");
        $this->assertEquals("Acabat", $tasca->getEstat());
    }

    /**
     * Test para hacer un toString de una tarea
     * @test
     * @return void
     */
    public function test_tasca_toString(): void
    {
        $tasca = new Tasca("Tasca 4", "Descripció de la tasca 4", new DateTime("1956-06-02"), "En progres");
        $this->assertEquals("Tasca:Tasca 4\nDescripció:Descripció de la tasca 4\nData límit:1956-06-02", $tasca->__toString());
    }
}
