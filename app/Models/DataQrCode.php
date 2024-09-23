<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataQrCode extends Model
{
    protected $table = "dataqrcode";
    public $timestamps = false;
    protected $fillable = ['type', 'data'];
}
