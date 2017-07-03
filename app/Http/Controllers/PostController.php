<?php

namespace App\Http\Controllers;

use App\Post;
use App\Repository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function create(Repository $repository)
    {
        return view('posts.create', [
            'repository' => $repository
        ]);
    }

    public function store(Repository $repository)
    {
        $this->validate(request(), [
            'name' => 'required',
            'hash' => 'required',    
        ]);
    }

    public function show(Repository $repository, Post $post)
    {
        return view('post.show', [
            'post' => $post
        ]);
    }


}
