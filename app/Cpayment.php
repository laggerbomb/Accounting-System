<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cpayment extends Model
{
    //Tabel name
    protected $table = "payment";
    //Primary key in database
    public $primaryKey = "purchaseId";
}
