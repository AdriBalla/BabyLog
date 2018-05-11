<?php

/**
 * Created by Reliese Model.
 * Date: Mon, 30 Apr 2018 13:53:30 +0000.
 */

namespace App\Models;

use Reliese\Database\Eloquent\Model as Eloquent;

/**
 * Class Biberon
 * 
 * @property int $id_biberon
 * @property float $quantite_initiale
 * @property float $quantite_bue
 * @property bool $cereales
 * 
 * @property \App\Models\Evenement $evenement
 *
 * @package App\Models
 */
class Biberon extends Eloquent
{
	protected $table = 'biberon';
	protected $primaryKey = 'id_biberon';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_biberon' => 'int',
		'quantite_initiale' => 'float',
		'quantite_bue' => 'float',
		'cereales' => 'bool',
        'id_bebe' => 'int'
	];

    protected $dates = [
        'date_debut',
        'date_fin',
        'heure_debut',
        'heure_fin'
    ];

	protected $fillable = [
		'quantite_initiale',
		'quantite_bue',
		'cereales',
        'id_bebe',
        'type',
        'date_debut',
        'date_fin',
        'heure_debut',
        'heure_fin',
        'commentaires'
	];

	public function evenement()
	{
		return $this->hasOne(\App\Models\Evenement::class, 'id_evenement','id_biberon');
	}
}
