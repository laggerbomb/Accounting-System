<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class company extends Model
{
    //Tabel name
    protected $table = "company";
    //Primary key in database
    public $primaryKey = "custId";
}
