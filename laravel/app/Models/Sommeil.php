<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Apr 2018 13:53:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Sommeil
 * 
 * @property int $id_sommeil
 * @property float $nombre_reveil
 * 
 * @property \App\Models\Evenement $evenement
 *
 * @package App\Models
 */
class Sommeil extends Eloquent
{
	protected $table = 'sommeil';
	protected $primaryKey = 'id_sommeil';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_sommeil' => 'int',
		'nombre_reveil' => 'float'
	];

	protected $fillable = [
		'nombre_reveil'
	];

	public function evenement()
	{
		return $this->belongsTo(\App\Models\Evenement::class, 'id_sommeil');
	}
}
