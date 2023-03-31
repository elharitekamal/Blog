<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use App\Models\User;
use App\Models\Categories;
use App\Models\Comments;
use App\Models\Cmntlike;
use Session;

use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index($idpost)
    {
        if (Auth::check()) {
            $comments = Comments::where('id_post', $idpost)->get();
            return view('comments', ['comments' => $comments]);
        } else {
            return redirect('/login');
        }
    }


    public function addcomment(request $request, $idpost)
    {
        $user = Auth::user();
        $cmnt = new Comments();
        $cmnt->text = $request->text;
        $cmnt->user_id = $user->id;
        $cmnt->id_post = $idpost;
        $cmnt->save();
        return redirect('posts');
    }


}