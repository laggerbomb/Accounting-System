<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CorderInvoice extends Model
{
    //Tabel name
    protected $table = "orderinvoice";
    //Primary key in database
    public $primaryKey = "id";
}
