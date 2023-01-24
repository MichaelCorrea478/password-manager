<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Folder
 * @package App\Models
 * @version January 24, 2023, 3:52 pm UTC
 *
 * @property string $name
 * @property string $description
 */
class Folder extends Model
{

    use HasFactory;

    public $table = 'folders';

    public $fillable = [
        'name',
        'description'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'string',
        'description' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'string|max:64|required',
        'description' => 'string|nullable|max:255'
    ];


}
