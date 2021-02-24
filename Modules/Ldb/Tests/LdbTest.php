<?php

namespace Modules\Ldb\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class LdbTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function first_test_case()
    {
        $this->get(route('ldb.new-project'))
            ->assertSuccessful()
            ->assertViewIs('ldb::laravel.new-project');
    }
}
