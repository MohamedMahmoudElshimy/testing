<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = "offers";
    protected $fillable = ['firstName_en'  , 'lastName_en','firstName_ar' , 'lastName_ar' ,'photo' ,'password' , 'email' , 'address' , 'city' , 'country' , 'crated_at' , 'updated_at'];
    protected $hidden = ['crated_at' , 'updated_at'];
}
