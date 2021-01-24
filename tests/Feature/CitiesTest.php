<?php

namespace Tests\Feature;

use App\Domain\City\City;
use App\Domain\Country\Country;
use App\Domain\State\State;
use App\Domain\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CitiesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cannot_see_cities_without_login()
    {
        $response = $this->get('cities');

        $response->assertRedirect('login');
    }

    /** @test */
    public function can_list_all_cities()
    {
        $user = User::factory()->create();
        $cities = City::factory()->count(2)->create();

        $this->actingAs($user);
        $response = $this->get('cities');

        $response->assertViewIs('cities.index');
        $response->assertSee($cities->pluck('name')->toArray());
        $response->assertSee($cities->map->state->map->name->toArray());
        $response->assertSee($cities->map->state->map->country->map->name->toArray());
    }

    /** @test */
    public function can_search_cities_by_name_or_state_name_or_country_name()
    {
        $user = User::factory()->create();
        $city1 = City::factory()->create([
            'name' => 'One City',
            'state_id' => State::factory()->create([
                'name' => 'Two State',
                'country_id' => Country::factory()->create(['name' => 'Two Country']),
            ]),
        ]);
        $city2 = City::factory()->create([
            'name' => 'Two City',
            'state_id' => State::factory()->create([
                'name' => 'One State',
                'country_id' => Country::factory()->create(['name' => 'Two Country']),
            ]),
        ]);
        $city3 = City::factory()->create([
            'name' => 'Three City',
            'state_id' => State::factory()->create([
                'name' => 'Three State',
                'country_id' => Country::factory()->create(['name' => 'One Country']),
            ]),
        ]);
        $city4 = City::factory()->create([
            'name' => 'Four City',
            'state_id' => State::factory()->create([
                'name' => 'Four State',
                'country_id' => Country::factory()->create(['name' => 'Four Country']),
            ]),
        ]);

        $this->actingAs($user);
        $response = $this->get('cities?search=one');

        $response->assertViewIs('cities.index');
        $response->assertSee([$city1->name, $city2->name, $city3->name]);
        $response->assertDontSee($city4->name);
    }

    /** @test */
    public function can_get_city_create_form()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get('cities/create');

        $response->assertViewIs('cities.create');
    }

    /** @test */
    public function cannot_create_cities_without_valid_data()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->post('cities');

        $response->assertSessionHasErrors(['name', 'state_id']);
    }

    /** @test */
    public function can_create_cities()
    {
        $user = User::factory()->create();
        $city = City::factory()->make();

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->post('cities', $city->toArray());

        $response->assertViewIs('cities.index');
        $response->assertSee([$city->name, $city->state->name, $city->state->country->name]);
    }

    /** @test */
    public function can_update_city()
    {
        $user = User::factory()->create();
        $city = City::factory()->create([
            'name' => 'Old Name',
        ]);

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->put('cities/'.$city->id, [
            'state_id' => $city->state_id,
            'name' => 'New Name',
        ]);

        $response->assertViewIs('cities.index');
        $response->assertSee('New Name');
        $response->assertDontSee('Old Name');
    }

    /** @test */
    public function can_delete_city()
    {
        $user = User::factory()->create();
        $city = City::factory()->create();

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->delete('cities/'.$city->id);

        $response->assertViewIs('cities.index');
        $response->assertDontSee($city->name);
    }
}
