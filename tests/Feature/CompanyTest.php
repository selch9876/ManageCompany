<?php

namespace Tests\Feature;

use App\Models\Company;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use RefreshDatabase;
    /**
     *
     * @return void
     */
    private function createDummyCompany($userId = null):Company
    {
        
        return Company::factory()->newCompany()->create([
            'user_id' => $userId ?? $this->user()->id,
        ]);

        
    }
    
    public function testNoCompaniesInDatabase()
    {
        $user = $this->user();
        $this->actingAs($user); //This is working acually!
        $response = $this->get('/company');

        $response->assertSeeText('No companies yet!');
        
    }

    public function testAddCompanyToDatabase()
    {
        $user = $this->user();
        $this->actingAs($user); 
        $company = $this->createDummyCompany();
        $response = $this->get('/company');

        $response->assertSeeText('New Company');
    }
}
