<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Modulenature extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'modulenatures';

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
     * Get the modules for the module nature.
     */
    public function modules()
    {
        return $this->hasMany('App\Models\Module');
    }

    /**
     * The components that belong to the module nature.
     */
    public function components()
    {
        return $this->belongsToMany('App\Models\Component');
    }
}
