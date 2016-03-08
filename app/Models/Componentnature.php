<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Componentnature extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'componentnatures';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'unity',
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

    /**
     * Get the components for the component nature.
     */
    public function components()
    {
        return $this->hasMany('App\Models\Component');
    }
}
