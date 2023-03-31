<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Posts;
use Illuminate\Http\Request;
use App\Models\Likes;
use App\Models\Categories;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if (Auth::check()) {
            $category = $request->search;
            $posts = Posts::where('text', 'LIKE', "%$category%")->get();
            $categories = Categories::all();
            $likes = Likes::all();


            return view('/posts', ['posts' => $posts, 'categories' => $categories, 'like' => $likes]);
        }
        return redirect('/login');
    }
}