<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Apr 2018 13:53:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Bebe
 * 
 * @property int $id_bebe
 * @property string $nom
 * @property string $prenom
 * @property \Carbon\Carbon $date_naissance
 * @property string $sexe
 * @property string $photo
 * 
 * @property \Illuminate\Database\Eloquent\Collection $evenements
 * @property \Illuminate\Database\Eloquent\Collection $utilisateurs
 *
 * @package App\Models
 */
class Bebe extends Eloquent
{
	protected $table = 'bebe';
	protected $primaryKey = 'id_bebe';
	public $timestamps = false;

	protected $dates = [
		'date_naissance'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'date_naissance',
		'sexe',
		'photo'
	];

	public function evenements()
	{
		return $this->hasMany(\App\Models\Evenement::class, 'id_bebe');
	}

	public function utilisateurs()
	{
		return $this->belongsToMany(\App\Models\Utilisateur::class, 'utilisateur_bebe', 'id_bebe', 'id_utilisateur');
	}
}
