<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected  $table = 'projects';
    protected $fillable = [
        'id', 'company_name','project_name', 'grant_date','category_id','grant_value','currency_id','managerial_fees','project_proposal','start_date','project_branch_count_id','project_attachment_id','main_branch_id','created_at','updated_at'
    ];


    protected $hidden = [
       'created_at','updated_at'
    ];

    public $timestamps = true;


}
