<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'products';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'range_id',
    	'project_id',
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
     * Get the range record associated with the product.
     */
    public function range()
    {
        return $this->hasOne('App\Models\Range');
    }

    /**
     * Get the project that owns the product.
     */
    public function project()
    {
        return $this->belongsTo('App\Models\Project');
    }

    /**
     * Get the modules for the project.
     */
    public function modules()
    {
        return $this->hasMany('App\Models\Module');
    }
}
