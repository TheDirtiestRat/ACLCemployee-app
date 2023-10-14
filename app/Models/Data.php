<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_id',
        'if_married',
        'civilstatus',
        'citizenship',
        'religion',

        'address',
        'tin_no',
        'sss_no',
        'pagibig_no',
    ];
}
