<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Apr 2018 13:53:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Evenement
 * 
 * @property int $id_evenement
 * @property int $id_bebe
 * @property \Carbon\Carbon $date_debut
 * @property \Carbon\Carbon $date_fin
 * @property \Carbon\Carbon $heure_debut
 * @property \Carbon\Carbon $heure_fin
 * @property string $commentaires
 *
 * @property \App\Models\Utilisateur $utilisateur
 * @property \App\Models\Bebe $bebe
 * @property \App\Models\Biberon $biberon
 * @property \App\Models\Couche $couche
 * @property \App\Models\Sommeil $sommeil
 * @property \App\Models\Tetee $tetee

 *
 * @package App\Models
 */
class Evenement extends Eloquent
{
	protected $table = 'evenement';
	protected $primaryKey = 'id_evenement';
	public $timestamps = false;

	protected $casts = [
		'id_bebe' => 'int',
        'id_utilisateur' => 'int'
	];

	protected $fillable = [
		'id_bebe',
		'date_debut',
		'date_fin',
		'heure_debut',
		'heure_fin',
		'commentaires'
	];


    public function utilisateur()
    {
        return $this->hasOne(\App\Models\Utilisateur::class, 'id_utilisateur','id_utilisateur');
    }


}
