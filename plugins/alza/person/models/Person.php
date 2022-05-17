<?php namespace Alza\Person\Models;

use Alza\Language\Models\Language;
use Alza\Profession\Models\Profession;
use Model;
use System\Models\File;

/**
 * Person Model
 */
class Person extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'alza_person_people';

    /**
     * @var array Guarded fields
     */
    protected $guarded = ['*'];

    /**
     * @var array Fillable fields
     */
    protected $fillable = [
        'name',
        'surname',
        'description',
        'pay',
        'email',
        'phone',
        'city'
    ];

    protected $with = ['avatar', 'language', 'profession'];

    /**
     * @var array Validation rules for attributes
     */
    public $rules = [];

    /**
     * @var array Attributes to be cast to native types
     */
    protected $casts = [];

    /**
     * @var array Attributes to be cast to JSON
     */
    protected $jsonable = [];

    /**
     * @var array Attributes to be appended to the API representation of the model (ex. toArray())
     */
    protected $appends = [];

    /**
     * @var array Attributes to be removed from the API representation of the model (ex. toArray())
     */
    protected $hidden = [];

    /**
     * @var array Attributes to be cast to Argon (Carbon) instances
     */
    protected $dates = [
        'created_at',
        'updated_at'
    ];

    /**
     * @var array Relations
     */
    public $hasOne = [
        'profession' => Profession::class,
        'language' => Language::class
    ];
    public $hasMany = [];
    public $belongsTo = []; //User
    public $belongsToMany = [];
    public $morphTo = [];
    public $morphOne = [];
    public $morphMany = [];
    public $attachOne = [
        'avatar' => File::class
    ];
    public $attachMany = [];
}
