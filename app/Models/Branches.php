<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;
    protected $table = 'branches';
    protected $fillable = [
        'id', 'address','phoneNumber','email','number_of_employe','manager_name','city_id','created_at','updated_at'
    ];
    public $timestamps = true;
    protected $hidden = [
        'created_at','updated_at'
    ];

    public function cities(){
        return $this->belongsto(City::class,'city_id','id');
    }

}
