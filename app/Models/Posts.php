<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    use HasFactory;


    protected $fillable = [
        'text',
        'img',
    ];


    public function comments()
    {

        return $this->hasMany(Comments::class);

    }

    public function users()
    {

        return $this->belongsTo(User::class, 'user_id');

    }


    public function categories()
    {

        return $this->belongsToMany(Categories::class, 'category_post', 'id_post', 'id_category');

    }




    public function likes()
    {

        return $this->hasMany(Likes::class, 'id_post');

    }


}