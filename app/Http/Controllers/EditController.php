<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Posts;
use App\Models\User;
use App\Models\Categories;
use PhpParser\Node\Stmt\Return_;

class EditController extends Controller
{

    public function index($id)
    {
        if (Auth::check()) {
            $posts = Posts::where('id', $id)->get();
            $categories = Categories::all();


            return view('edit', ['posts' => $posts, 'categories' => $categories]);
        }
        return redirect('/login');
    }

}