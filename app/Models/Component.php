<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'components';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'name',
    	'price',
    	'section_cm',
        'thickness_cm',
        'thickness_mm',
        'length_mm',
        'width_mm',
    	'componentnature_id',
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
     * Get the component nature that owns the component.
     */
    public function componentnatures()
    {
        return $this->belongsTo('App\Models\Componentnature');
    }

    /**
     * The module natures that belong to the component.
     */
    public function modulenatures()
    {
        return $this->belongsToMany('App\Models\Modulenature');
    }
}
