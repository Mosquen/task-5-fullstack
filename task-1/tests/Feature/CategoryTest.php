<?php

namespace Tests\Feature;

use App\Models\Categories;
use App\Models\User;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_category()
    {
        $category = Categories::create([
            'name' => 'Traveling',
            'user_id'   => 1
        ]);

        $this->assertTrue(true);

    }

    public function test_all_category()
    {
        $category = Categories::all();

        $this->assertTrue(true);
    }

    public function test_show_detail_category()
    {
        $category = Categories::where('id', 1);

        $this->assertTrue(true);
    }

    public function test_update_category()
    {
        $category = Categories::find(2)->update([
            'name' => 'Jokes',
        ]);

        $this->assertTrue(true);
    }

   
    public function test_delete_category()
    {
        $category = Categories::find(1)->delete();

        $this->assertTrue(true);
    }


}
