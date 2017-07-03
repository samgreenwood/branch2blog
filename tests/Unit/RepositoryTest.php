<?php

use App\Repository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RepositoryTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    public function test_it_can_have_commits_added()
    {
        $repository = factory(Repository::class)->create();
    }
} 
