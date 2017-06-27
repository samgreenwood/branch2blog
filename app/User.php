<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function repositories()
    {
        return $this->hasMany(Repository::class);
    }

    public function addRepository(Repository $repository)
    {
        return $this->repositories()->save($repository);
    }

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function addPost(Post $post)
    {
        return $this->posts()->save($post);
    }

}
