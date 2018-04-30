<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Apr 2018 13:53:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Utilisateur
 * 
 * @property int $id_utilisateur
 * @property string $nom
 * @property string $prenom
 * @property \Carbon\Carbon $date_naissance
 * @property string $mail
 * @property string $photo
 * @property string $login
 * @property string $password
 * 
 * @property \Illuminate\Database\Eloquent\Collection $bebes
 *
 * @package App\Models
 */
class Utilisateur extends Eloquent
{
	protected $table = 'utilisateur';
	protected $primaryKey = 'id_utilisateur';
	public $timestamps = false;

	protected $dates = [
		'date_naissance'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'nom',
		'prenom',
		'date_naissance',
		'mail',
		'photo',
		'login',
		'password'
	];

	public function bebes()
	{
		return $this->belongsToMany(\App\Models\Bebe::class, 'utilisateur_bebe', 'id_utilisateur', 'id_bebe');
	}
}
