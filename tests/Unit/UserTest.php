<?php

namespace Tests;

use App\User;
use App\Repository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    /**
     * @test
     */
    public function it_adds_repositories()
    {
        $user = factory(User::class)->create();

        $post = factory(Repository::class)->make();

        $user->addRepository($post);

        $this->assertCount(1, $user->repositories);
    }

}
