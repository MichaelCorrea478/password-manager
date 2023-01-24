<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Password
 * @package App\Models
 * @version January 24, 2023, 3:58 pm UTC
 *
 * @property string $name
 * @property string $url
 * @property string $user_name
 * @property string $password
 * @property string $observation
 */
class Password extends Model
{

    use HasFactory;

    public $table = 'passwords';

    public $fillable = [
        'name',
        'url',
        'user_name',
        'password',
        'observation'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'url' => 'string',
        'user_name' => 'string',
        'password' => 'string',
        'observation' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|required|max:64',
        'url' => 'nullable|max:511',
        'user_name' => 'required|string|max:64',
        'password' => 'required|string|max:256',
        'observation' => 'nullable|string'
    ];


}
