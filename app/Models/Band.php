<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'img-id', 'bio', 'desc', 'yt-links', 'bg-colour', 'txt-colour', 'admin-id'];

}
