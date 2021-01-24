<?php

namespace Tests\Feature;

use App\Domain\Department\Department;
use App\Domain\User\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DepartmentsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function cannot_see_departments_without_login()
    {
        $response = $this->get('departments');

        $response->assertRedirect('login');
    }

    /** @test */
    public function can_list_all_departments()
    {
        $user = User::factory()->create();
        $departments = Department::factory()->count(2)->create();

        $this->actingAs($user);
        $response = $this->get('departments');

        $response->assertViewIs('departments.index');
        $response->assertSee($departments->pluck('name')->toArray());
    }

    /** @test */
    public function can_search_departments_by_name()
    {
        $user = User::factory()->create();
        $department1 = Department::factory()->create(['name' => 'IT Department']);
        $department2 = Department::factory()->create(['name' => 'Marketing Department']);
        $department3 = Department::factory()->create(['name' => 'Management Department']);

        $this->actingAs($user);
        $response = $this->get('departments?search=ma');

        $response->assertViewIs('departments.index');
        $response->assertSee([$department2->name, $department3->name]);
        $response->assertDontSee($department1->name);
    }

    /** @test */
    public function can_get_department_create_form()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->get('departments/create');

        $response->assertViewIs('departments.create');
    }

    /** @test */
    public function cannot_create_departments_without_valid_name()
    {
        $user = User::factory()->create();

        $this->actingAs($user);
        $response = $this->post('departments');

        $response->assertSessionHasErrors(['name']);
    }

    /** @test */
    public function can_create_departments()
    {
        $user = User::factory()->create();
        $department = Department::factory()->make();

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->post('departments', $department->toArray());

        $response->assertViewIs('departments.index');
        $response->assertSee($department->name);
    }

    /** @test */
    public function can_update_departments()
    {
        $user = User::factory()->create();
        $department = Department::factory()->create([
            'name' => 'Old Name',
        ]);

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->put('departments/'.$department->id, [
            'name' => 'New Name',
        ]);

        $response->assertViewIs('departments.index');
        $response->assertSee('New Name');
        $response->assertDontSee('Old Name');
    }

    /** @test */
    public function can_delete_departments()
    {
        $user = User::factory()->create();
        $department = Department::factory()->create();

        $this->actingAs($user);
        $this->followingRedirects();
        $response = $this->delete('departments/'.$department->id);

        $response->assertViewIs('departments.index');
        $response->assertDontSee($department->name);
    }
}
