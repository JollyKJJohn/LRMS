<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginDetail extends Model
{
    use HasFactory;
    public $table = 'logindetails';
    protected $fillable = [
        'name',
        'username',
        'address',
        'image',
        'role'
    ];
    public $timestamps = false;
}
