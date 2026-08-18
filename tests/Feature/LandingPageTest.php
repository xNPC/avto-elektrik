<?php

namespace Tests\Feature;

use Tests\TestCase;

class LandingPageTest extends TestCase
{
    public function test_landing_page_loads_successfully(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Автоэлектрик');
        $response->assertSee('Кемерово');
        $response->assertSee('Диагностика');
    }

    public function test_landing_page_contains_contact_links(): void
    {
        $response = $this->get('/');

        $response->assertSee('tel:'.config('landing.phone_href'));
        $response->assertSee(config('landing.phone'));
        $response->assertSee(config('landing.whatsapp'));
        $response->assertSee(config('landing.max'));
    }

    public function test_landing_page_shows_experience_and_suburb(): void
    {
        $response = $this->get('/');

        if (config('landing.experience_years')) {
            $response->assertSee('лет в автоэлектрике');
            $response->assertSee(config('landing.experience_years').'+');
        }

        if (count(config('landing.suburb')) > 0) {
            $response->assertSee('Также выезжаю в пригород');
        }
    }

    public function test_landing_page_contains_seo_markup(): void
    {
        $response = $this->get('/');

        $response->assertSee('rel="canonical"', false);
        $response->assertSee('application/ld+json');
        $response->assertSee('AutoRepair');
        $response->assertSee('geo.region');
    }

    public function test_landing_page_shows_reviews_carousel(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('data-reviews-carousel', false);

        foreach (config('landing.reviews') as $review) {
            $response->assertSee('images/reviews/'.$review['src']);
        }
    }

    public function test_landing_page_shows_works(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Примеры выполненных работ');

        foreach (config('landing.works') as $work) {
            $response->assertSee('images/works/'.$work['src']);
        }
    }

    public function test_landing_page_shows_master_photo(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('images/'.config('landing.master_photo'));
    }

    public function test_landing_page_shows_diagnostics_section(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertSee('Осциллограф');

        foreach (config('landing.diagnostics') as $tool) {
            $response->assertSee($tool['title']);
        }
    }

    public function test_sitemap_is_served(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertSee('urlset', false);
    }
}
