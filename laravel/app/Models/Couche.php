<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Apr 2018 13:53:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Couche
 * 
 * @property int $id_couche
 * @property bool $selles
 * @property bool $urine
 * @property bool $vide
 * @property string $consistance
 * @property string $couleur
 * 
 * @property \App\Models\Evenement $evenement
 *
 * @package App\Models
 */
class Couche extends Eloquent
{
	protected $table = 'couche';
	protected $primaryKey = 'id_couche';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_couche' => 'int',
		'selles' => 'bool',
		'urine' => 'bool',
		'vide' => 'bool'
	];

	protected $fillable = [
		'selles',
		'urine',
		'vide',
		'consistance',
		'couleur'
	];

	public function evenement()
	{
		return $this->belongsTo(\App\Models\Evenement::class, 'id_couche');
	}
}
