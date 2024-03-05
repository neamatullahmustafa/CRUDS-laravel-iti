<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'title',
        'body',
        'slug',
        'user_id',
        'img',

    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
