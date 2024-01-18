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

        $tasca = new Tasca("Tasca1", "Descripció de la tasca 1", new Date("2021-10-10"), "Pendent");
        $this->assertEquals("Tasca1", $tasca->getTitol());
        $this->assertEquals("Descripció de la tasca 1", $tasca->getDescripcio());

        $this->assertEquals($tasca->getEstat(), "Pendent");
        $this->
        assertTrue($tasca->getEstat() == "Pendent");
    }
}
