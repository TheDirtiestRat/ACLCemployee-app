<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identification extends Model
{
    use HasFactory;

    protected $attributes = [
        'middlename' => 'N/A',
        'bloodtype' => 'O+',
    ];

    protected $fillable = [
        'employee_id',
        'firstname',
        'middlename',
        'surname',

        'birth_date',
        'gender',

        'birth_place',
        'bloodtype',
    ];
}
