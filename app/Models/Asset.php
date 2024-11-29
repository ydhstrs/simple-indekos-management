<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
     use HasFactory, SoftDeletes;
      protected $fillable = [
    'name',
    'buying_date',
    'buying_price',
    'image',
    'remark',
    ];

protected $dates = ['deleted_at'];
}
