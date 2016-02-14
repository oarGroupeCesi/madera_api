<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Range extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ranges';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'exterior_finish',
    	'insulating',
    	'top',
    	'configuration',
        'template',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
