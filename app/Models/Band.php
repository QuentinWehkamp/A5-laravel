<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'imgid', 'bio', 'desc', 'ytlinks', 'bgcolour', 'txtcolour', 'adminid'];

    public function admins()
{
    return $this->belongsToMany(User::class);
}

}
