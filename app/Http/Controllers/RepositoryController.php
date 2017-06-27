<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RepositoryController extends Controller
{
    public function index()
    {
        return view('repositories.index', [
            'repositories' => auth()->user()->repositories
        ]);
    }

    public function create()
    {
        return view('repository.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'url' => 'required'
        ]);

        $repository = Repository::create(['url' => request('url')]);

        auth()->user()->addRepository($repository);
        
        return redirect()->route('posts.create', ['repository' => $repository]);

    }

    public function delete(Repository $repository)
    {
        $repository->delete();

        return redirect()-route('repositories.index');
    }

}
