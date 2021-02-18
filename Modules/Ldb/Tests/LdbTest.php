<?php

namespace Modules\Ldb\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LdbTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function something()
    {
        $this->get(route('ldb.create'))
            ->assertSuccessful()
            ->assertViewIs('ldb::create');
    }
}
