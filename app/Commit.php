<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commit extends Model
{
    protected $guarded = [];
    
    public function repository()
    {
        return $this->belongsTo(Repository::class);
    }
}
