<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlAnswer extends Model
{
    use HasFactory;

    protected $fillable = ['url_id', 'url_name', 'status_code', 'body'];
}
