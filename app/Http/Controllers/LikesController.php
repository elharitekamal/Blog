<?php


namespace App\Http\Controllers;

use App\Models\Likes;
use Auth;
use Illuminate\Http\Request;


class LikesController extends Controller
{



    public function like(Request $request, $idpost)
    {
        $user = Auth::user();
        $like = new Likes();
        $like->user_id = $user->id;
        $like->id_post = $idpost;
        $like->save();
        return redirect('posts');
    }



    public function dislike($id)
    {
        $user = Auth::user();
        $like = Likes::where('user_id', $user->id)->where('id_post', $id);

        $like->delete();

        return redirect('posts');
    }


}