<?php

namespace Tests\Feature;

use App\Models\Articles;
use App\Models\User;
use Tests\TestCase;

class articlesTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_create_articles()
    {
        $articles = Articles::create([
            'title' => 'Traveling',
            'content' => "lorem impum",
            'image' => 'base64/ .jpg dsadtxsae...',
            'user_id' => 1,
            'articles_id' => 1, 
        ]);

        $this->assertTrue(true);

    }

    public function test_all_articles()
    {
        $articles = Articles::all();

        $this->assertTrue(true);
    }

    public function test_show_detail_articles()
    {
        $articles = Articles::where('id', 1);

        $this->assertTrue(true);
    }

    public function test_update_articles()
    {
        $articles = Articles::find(2)->update([
            'title' => 'Traveling & Food',
            'content' => "lorem impum",
            'image' => 'base64/ .jpg xxdddtxsae...',
            'articles_id' => 1, 
        ]);

        $this->assertTrue(true);
    }

   
    public function test_delete_articles()
    {
        $articles = Articles::find(1)->delete();

        $this->assertTrue(true);
    }


}
