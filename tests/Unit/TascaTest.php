<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Date;
use PHPUnit\Framework\TestCase;
use App\Models\Tasca;

class TascaTest extends TestCase
{
    /**
     * A basic test example.
     * @test
     * @return void
     * @throws Exception
     */
    public function GestorTasques_TC01(): void
    {

        $tasca = new Tasca("Tasca 1", "Descripció de la tasca 1", new Date("2021-10-10"), "Pendent");
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
    public function GestorTasques_TC02(): void
    {

        $tasca = new Tasca("Tasca 2", "Descripció de la tasca 1", new Date("2024-02-10"), "Acabat");
        $this->assertEquals("Tasca 1", $tasca->getTitol());
    }
}
