<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    	'firstname',
    	'lastname',
    	'email',
    	'adr_street',
    	'adr_zipcode',
    	'adr_city',
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
     * Get the projects for the customer.
     */
    public function projects()
    {
        return $this->hasMany('App\Models\Project');
    }
}
