<?php

namespace Modules\Ldb\Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Modules\Ldb\Entities\Category;
use Tests\TestCase;

class LdbTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_can_see_all_categories()
    {
        // given we have some categories with subcategories
        Category::factory()->count(3)->create()
        ->each(function ($category){
            Category::factory()->count(2)->create([
                'parent_id' => $category->id
            ])
            ->each(function($sub_cat) {
                Category::factory()->count(2)->create([
                    'parent_id' => $sub_cat->id
                ]);
            });
        });

        // it should load proper view with categories
        $this->get(route('ldb.index'))
            ->assertSuccessful()
            ->assertViewIs('ldb::index')
            ->assertViewHas('categories');
    }
}
