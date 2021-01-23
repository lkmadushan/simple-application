<?php

namespace Tests\Feature;

use App\Domain\Country\Country;
use App\Domain\State\State;
use App\Domain\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StatesTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cannot_see_states_without_login()
    {
        $response = $this->get('states');

        $response->assertRedirect('login');
    }

    /** @test */
    public function can_list_all_states()
    {
        $user = User::factory()->create();
        $states = State::factory()->count(2)->create();

        $this->actingAs($user);
        $response = $this->get('states');

        $response->assertViewIs('states.index');
        $response->assertSee($states->pluck('name')->toArray());
        $response->assertSee($states->map->country->map->name->toArray());
    }

    /** @test */
    public function can_search_states_by_name_or_country_name()
    {
        $user = User::factory()->create();
        $state1 = State::factory()->create([
            'name' => 'One State',
            'country_id' => Country::factory()->create(['name' => 'Country Two']),
        ]);
        $state2 = State::factory()->create([
            'name' => 'State Two',
            'country_id' => Country::factory()->create(['name' => 'One Country']),
        ]);
        $state3 = State::factory()->create([
            'name' => 'State Thee',
            'country_id' => Country::factory()->create(['name' => 'Country Three']),
        ]);

        $this->actingAs($user);
        $response = $this->get('states?search=one');

        $response->assertViewIs('states.index');
        $response->assertSee([$state1->name, $state2->name]);
        $response->assertDontSee($state3->name);
    }

    /** @test */
    public function can_get_state_create_form()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get('states/create');

        $response->assertViewIs('states.create');
    }

    /** @test */
    public function cannot_create_states_without_valid_data()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->post('states');

        $response->assertSessionHasErrors(['name', 'country_id']);
    }

    /** @test */
    public function can_create_states()
    {
        $user = User::factory()->create();
        $state = State::factory()->make();

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->post('states', $state->toArray());

        $response->assertViewIs('states.index');
        $response->assertSee([$state->name, $state->country->name]);
    }

    /** @test */
    public function can_update_state()
    {
        $user = User::factory()->create();
        $state = State::factory()->create([
            'name' => 'Old Name',
        ]);

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->put('states/'.$state->id, [
            'country_id' => $state->country_id,
            'name' => 'New Name',
        ]);

        $response->assertViewIs('states.index');
        $response->assertSee('New Name');
        $response->assertDontSee('Old Name');
    }

    /** @test */
    public function can_delete_state()
    {
        $user = User::factory()->create();
        $state = State::factory()->create();

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->delete('states/'.$state->id);

        $response->assertViewIs('states.index');
        $response->assertDontSee($state->name);
    }
}
