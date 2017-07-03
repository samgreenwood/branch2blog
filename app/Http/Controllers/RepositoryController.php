<?php

namespace App\Http\Controllers;

use PHPGit\Git;
use Illuminate\Http\Request;
use App\Repository;

class RepositoryController extends Controller
{
	private $git;

	public function __construct(Git $git)
	{
		$this->git = $git;
	}

    public function index()
    {
        return view('repositories.index', [
            'repositories' => auth()->user()->repositories
        ]);
    }

    public function create()
    {
        return view('repositories.create');
    }

    public function store()
    {
        $this->validate(request(), [
        	'name' => 'required',
		    'url' => 'required'
        ]);

        $repository = new Repository([
			'name' => request('name'), 
			'url' => request('url')]
		);

        auth()->user()->addRepository($repository);
		
		$tempPath = tempnam(sys_get_temp_dir(), 'branch2blog_');
		$this->git->clone(request('url'), $tempPath);
		$this->git->setRepository($tempPath);

		foreach($this->git->log as $commit)
		{
			$repository->addCommit(new Commit([
				'hash' => $commit['hash'],
				'title' => $commit['title']
			]));
		}
		
        return redirect()->route('posts.create', ['repository' => $repository]);

    }

    public function delete(Repository $repository)
    {
        $repository->delete();

        return redirect()-route('repositories.index');
    }

}
