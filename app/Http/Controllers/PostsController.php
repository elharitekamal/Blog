<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Posts;
use App\Models\User;
use App\Models\Categories;
use App\Models\Likes;

class PostsController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $posts = Posts::orderBy('created_at', 'desc')->get();
            $categories = Categories::all();
            $likes = Likes::all();


            return view('/posts', ['posts' => $posts, 'categories' => $categories, 'like' => $likes]);
        }
        return redirect('/login');

    }

    public function addpost(request $request)
    {
        $user = Auth::user();
        $post = new Posts();
        $post->text = $request->text;
        $post->img = $request->file('img')->store('image', 'public');
        $post->user_id = $user->id;
        $post->save();
        $post->categories()->attach($request->category_name);
        return redirect('posts');

    }


    public function deletepost($id)
    {
        $post = Posts::find($id);

        if ($post) {
            $post->delete();

            return redirect('/posts');
        }


    }


    public function update(Request $request, $id)
    {
        $user = Auth::user();
        $record = Posts::find($id);

        $record->text = $request->input('text');
        if ($request->hasFile('img')) {
            $record->img = $request->file('img')->store('image', 'public');
        }
        $categories = categories::find($request->category_name);
        $record->categories()->sync($categories);
        $record->save();

        return redirect('/posts');
    }






}