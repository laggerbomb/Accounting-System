<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinvoice extends Model
{
    //Tabel name
    protected $table = "purchaseinvoice";
    //Primary key in database
    public $primaryKey = "id";
}
