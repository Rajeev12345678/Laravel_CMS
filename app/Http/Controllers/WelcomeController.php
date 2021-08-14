<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Tag;
use App\Models\Post;

class WelcomeController extends Controller
{
    public function index()
    {

      return view('welcome')
      ->with('categories', Categories::all())
      ->with('tags', Tag::all())
      ->with('posts', Post::searched()->simplePaginate(3));
    }
}
