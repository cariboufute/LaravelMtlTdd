<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

class ArticleControllerTest extends TestCase
{
    public function testArticleIndex()
    {
        $response = $this->get('/article');

        $response
            ->assertSuccessful()
            ->assertSee('Index');
    }
}