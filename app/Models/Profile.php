<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $table = "profiles";
    protected $fillable = ['name'  ,'photo'  ,  'price' , 'details' , 'created_at' , 'updated_at'];
    protected $hidden = ['created_at' , 'updated_at'];
}
