<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected  $table = 'roles';
    protected $fillable = [
        'id', 'role_name','ability','created_at','updated_at'
    ];


    protected $hidden = [
        'created_at','updated_at'
    ];

    public $timestamps = true;
}
