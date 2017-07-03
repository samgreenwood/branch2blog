<?php

namespace App;

use Gitonomy\Git\Repository as GitRepository;
use Illuminate\Database\Eloquent\Model;

class Repository extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function commits()
    {
        return $this->hasMany(Commit::class);
    }

    public static function fromUrlWithCommits($user, $name, $url)
    {
        $tempPath = tempnam(sys_get_temp_dir(), 'branch2blog_');
        
        $git = new PHPGit\Git();
        $git->clone($url, $tempPath);

        $gitRepository = new GitRepository($tempPath);

        $repository = new static(['name' => $url, 'url' => $url]);
        
        $user->addRepository($repository);

        foreach($gitRepository->getLog() as $commit)
        {
            $repository->commits()->save(new Commit([
                'hash' => $commit['hash'],
                'title' => $commit['title'],
            ]));
        }

        return $repository;
    }
}
