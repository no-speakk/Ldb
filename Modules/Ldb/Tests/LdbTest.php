<?php

namespace Modules\Ldb\Tests;

use Tests\TestCase;

class LdbTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @test
     */
    public function sampleTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
