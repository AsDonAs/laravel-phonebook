<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class PhoneContact
 * @package App\Models
 *
 * @property integer $user_id
 * @property string $first_name
 * @property string $second_name
 * @property string $last_name
 * @property string $phone
 * @property string $description
 * @property boolean $is_favorite
 * @property-read string $fullname
 */
class PhoneContact extends Model
{
    /** @var string $table */
    protected $table = "phone_contacts";

    /** @var bool $timestamps */
    public $timestamps = true;

    /**
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'second_name',
        'last_name',
        'phone',
        'description',
        'is_favorite',
    ];

    /**
     * @var array
     */
    protected $casts = [
        'user_id' => 'integer',
        'first_name' => 'string',
        'second_name' => 'string',
        'last_name' => 'string',
        'phone' => 'string',
        'description' => 'string',
        'is_favorite' => 'boolean',
    ];

    /**
     * @return string
     */
    public function getFullnameAttribute()
    {
        return "{$this->last_name} {$this->first_name} {$this->second_name}";
    }
}
