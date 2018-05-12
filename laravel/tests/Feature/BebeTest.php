<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BebeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testInsertBebe(){

        $data = array();
        $data["nom"] = "toto";
        $data["prenom"] = "tutu";
        $data["date_naissance"] = "2018-07-05";
        $data["sexe"] = "M";
        $data["photo"] = null;

        $result = $this->post('/api/bebes',$data);
        $bebe = $result->json();

        $this->assertDatabaseHas('bebe', ['id_bebe' => $bebe["id_bebe"]]);
    }

}
