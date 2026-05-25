<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CvTest extends TestCase
{
    use RefreshDatabase;

    public function test_cv_page_loads_successfully()
    {
        $response = $this->get('/cv');

        $response->assertStatus(200);
        $response->assertViewIs('cv');
    }

    public function test_cv_can_download_pdf()
    {
        $response = $this->get('/cv/download');

        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/pdf');
        $response->assertHeader('Content-Disposition', 'attachment; filename="Eslam_CV.pdf"');
    }
}
