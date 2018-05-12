<?php

namespace Tests\Feature;

use App\Models\Bebe;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BebeTest extends TestCase
{
    /**
     * test insert bebe API.
     *
     * @return void
     */
    public function testInsertBebe(){

        $data = array();
        $data["nom"] = "nom";
        $data["prenom"] = "prenom";
        $data["date_naissance"] = "2018-07-05";
        $data["sexe"] = "M";
        $data["photo"] = "url/vers/la/photo";

        $result = $this->post('/api/bebes',$data);
        $bebe = $result->json();

        $this->assertEquals($bebe["nom"],"nom");
        $this->assertEquals($bebe["prenom"],"prenom");
        $this->assertEquals($bebe["date_naissance"],"2018-07-05 00:00:00");
        $this->assertEquals($bebe["sexe"],"M");
        $this->assertEquals($bebe["photo"],"url/vers/la/photo");

        $this->assertDatabaseHas('bebe', ['id_bebe' => $bebe["id_bebe"]]);

        $bebe = Bebe::find($bebe["id_bebe"]);
        $bebe->delete();
    }

    /**
     * test insert bebe API.
     *
     * @return void
     */
    public function testUpdateBebe(){

        $data = array();
        $data["nom"] = "nom";
        $data["prenom"] = "prenom";
        $data["date_naissance"] = "2018-07-05";
        $data["sexe"] = "M";
        $data["photo"] = "url/vers/la/photo";

        $result = $this->post('/api/bebes',$data);
        $id_bebe = $result->json()["id_bebe"];

        $data["nom"] = "nom2";
        $data["prenom"] = "prenom2";
        $data["date_naissance"] = "2018-06-05";
        $data["sexe"] = "F";
        $data["photo"] = "url/vers/la/nouvelle/photo";

        $result = $this->post("api/bebes/".$id_bebe,$data);
        $bebe = $result->json();

        $this->assertEquals($bebe["nom"],"nom2");
        $this->assertEquals($bebe["prenom"],"prenom2");
        $this->assertEquals($bebe["date_naissance"],"2018-06-05 00:00:00");
        $this->assertEquals($bebe["sexe"],"F");
        $this->assertEquals($bebe["photo"],"url/vers/la/nouvelle/photo");

        $this->assertDatabaseHas('bebe', ['id_bebe' => $bebe["id_bebe"]]);

        $bebe = Bebe::find($bebe["id_bebe"]);
        $bebe->delete();
    }


    /**
     * test insert bebe API.
     *
     * @return void
     */
    public function testDestroyBebe(){

        $data = array();
        $data["nom"] = "nom";
        $data["prenom"] = "prenom";
        $data["date_naissance"] = "2018-07-05";
        $data["sexe"] = "M";
        $data["photo"] = "url/vers/la/photo";

        $result = $this->post('/api/bebes',$data);
        $id_bebe = $result->json()["id_bebe"];

        $this->assertDatabaseHas('bebe', ['id_bebe' => $id_bebe]);

        $result = $this->delete("api/bebes/".$id_bebe);

        $this->assertDatabaseMissing('bebe', ['id_bebe' => $id_bebe]);

    }
}
