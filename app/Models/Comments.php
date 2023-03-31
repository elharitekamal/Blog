<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;

    protected $hidden = [
        'text',
    ];


    public function users()
    {

        return $this->belongsTo(User::class, 'user_id');

    }
    public function posts()
    {

        return $this->belongsTo(Posts::class, 'id_post');

    }

    public function cmntlike()
    {

        return $this->hasMany(Cmntlikes::class, 'id_cmnt');

    }



}