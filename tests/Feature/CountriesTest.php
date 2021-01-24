<?php

namespace Tests\Feature;

use App\Domain\Country\Country;
use App\Domain\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CountriesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cannot_see_countries_without_login()
    {
        $response = $this->get('countries');

        $response->assertRedirect('login');
    }

    /** @test */
    public function can_list_all_countries()
    {
        $user = User::factory()->create();
        $countries = Country::factory()->count(2)->create();

        $this->actingAs($user);
        $response = $this->get('countries');

        $response->assertViewIs('countries.index');
        $response->assertSee($countries->pluck('name')->toArray());
        $response->assertSee($countries->pluck('country_code')->toArray());
    }

    /** @test */
    public function can_search_departments_by_name_or_code()
    {
        $user = User::factory()->create();
        $country1 = Country::factory()->create(['name' => 'One Country', 'country_code' => 'exp']);
        $country2 = Country::factory()->create(['name' => 'Country Two', 'country_code' => 'one']);
        $country3 = Country::factory()->create(['name' => 'Country Three', 'country_code' => 'neg']);

        $this->actingAs($user);
        $response = $this->get('countries?search=one');

        $response->assertViewIs('countries.index');
        $response->assertSee([$country1->name, $country2->name]);
        $response->assertDontSee($country3->name);
    }

    /** @test */
    public function can_get_country_create_form()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get('countries/create');

        $response->assertViewIs('countries.create');
    }

    /** @test */
    public function cannot_create_countries_without_valid_data()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->post('countries');

        $response->assertSessionHasErrors(['name', 'country_code']);
    }

    /** @test */
    public function can_create_countries()
    {
        $user = User::factory()->create();
        $country = Country::factory()->make();

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->post('countries', $country->toArray());

        $response->assertViewIs('countries.index');
        $response->assertSee([$country->name, $country->country_code]);
    }

    /** @test */
    public function can_update_country()
    {
        $user = User::factory()->create();
        $country = Country::factory()->create([
            'name' => 'Old Name',
        ]);

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->put('countries/'.$country->id, [
            'country_code' => $country->country_code,
            'name' => 'New Name',
        ]);

        $response->assertViewIs('countries.index');
        $response->assertSee('New Name');
        $response->assertDontSee('Old Name');
    }

    /** @test */
    public function can_delete_country()
    {
        $user = User::factory()->create();
        $country = Country::factory()->create();

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->delete('countries/'.$country->id);

        $response->assertViewIs('countries.index');
        $response->assertDontSee($country->name);
    }
}
