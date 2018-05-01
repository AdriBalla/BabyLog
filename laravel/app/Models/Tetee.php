<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Apr 2018 13:53:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Tetee
 * 
 * @property int $id_tetee
 * @property float $duree_sein_droit
 * @property float $duree_sein_gauche
 * 
 * @property \App\Models\Evenement $evenement
 *
 * @package App\Models
 */
class Tetee extends Eloquent
{
	protected $table = 'tetee';
	protected $primaryKey = 'id_tetee';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_tetee' => 'int',
		'duree_sein_droit' => 'float',
		'duree_sein_gauche' => 'float'
	];

	protected $fillable = [
		'duree_sein_droit',
		'duree_sein_gauche'
	];

	public function evenement()
	{
		return $this->belongsTo(\App\Models\Evenement::class, 'id_tetee');
	}
}
