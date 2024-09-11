<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periodo extends Model
{
    protected $table = "tbPeriodo";
    public $filable = ['idPeriodo', 'periodo'];
    public $timestamps = false;
    
}
