<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cinvoice extends Model
{
    //Tabel name
    protected $table = "invoice";
    //Primary key in database
    public $primaryKey = "id";
}
