<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Apr 2018 13:53:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class UtilisateurBebe
 * 
 * @property int $id_bebe
 * @property int $id_utilisateur
 * 
 * @property \App\Models\Bebe $bebe
 * @property \App\Models\Utilisateur $utilisateur
 *
 * @package App\Models
 */
class UtilisateurBebe extends Eloquent
{
	protected $table = 'utilisateur_bebe';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_bebe' => 'int',
		'id_utilisateur' => 'int'
	];

	public function bebe()
	{
		return $this->belongsTo(\App\Models\Bebe::class, 'id_bebe');
	}

	public function utilisateur()
	{
		return $this->belongsTo(\App\Models\Utilisateur::class, 'id_utilisateur');
	}
}
