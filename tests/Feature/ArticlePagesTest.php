<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ArticlePagesTest extends TestCase
{
    use RefreshDatabase;

    public function test_articles_index_page_loads(): void
    {
        $response = $this->get('/stati');

        $response->assertOk()
            ->assertSee('Статьи об автомобильной электрике')
            ->assertSee('rel="canonical" href="'.url('/stati').'"', false);

        foreach ((array) config('landing.articles') as $slug => $article) {
            $response->assertSee(url('/stati/'.$slug));
        }
    }

    public function test_each_article_page_loads_with_seo_markup(): void
    {
        foreach ((array) config('landing.articles') as $slug => $article) {
            $response = $this->get('/stati/'.$slug);

            $response->assertOk()
                ->assertSee($article['title'])
                ->assertSee('rel="canonical" href="'.url('/stati/'.$slug).'"', false)
                ->assertSee('content="'.$article['description'].'"', false)
                ->assertSee(config('landing.phone'))
                ->assertSee('"@type":"Article"', false);
        }
    }

    public function test_sitemap_contains_article_urls(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk()
            ->assertSee('<loc>'.url('/stati').'</loc>', false);

        foreach ((array) config('landing.articles') as $slug => $article) {
            $response->assertSee('<loc>'.url('/stati/'.$slug).'</loc>', false);
        }
    }
}
