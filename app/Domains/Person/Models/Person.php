<?php

namespace App\Domains\Person\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

use App\Domains\Person\Models\Traits\Attribute\PersonAttribute;
use App\Domains\Person\Models\Traits\Method\PersonMethod;
use App\Domains\Person\Models\Traits\Relationship\PersonRelationship;
use App\Domains\Person\Models\Traits\Scope\PersonScope;


/**
 * Class Person.
 */
class Person extends Model
{
    use SoftDeletes,
        PersonAttribute,
        PersonMethod,
        PersonRelationship,
        PersonScope;

    /**
     * The table associated with the model.
     *
     * @var string
    */
    protected $table = 'people';

    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [         "name with type string",        "description",    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    ];


    public $timestamps =["create_at","update_at"];

    /**
     * @var array
     */
    protected $dates = [
    "create_at",
    "update_at",
    ];


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [

    ];

    /**
     * @var array
     */
    protected $appends = [

    ];

}