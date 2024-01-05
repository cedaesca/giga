<?php

namespace Tests\Feature;

use App\Models\Dog;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DogControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_dog_with_exact_birth_date_can_be_created()
    {
        $toBeCreatedDog = Dog::factory()->make(['is_birth_date_exact' => true])->toArray();

        $this->post('/dogs', $toBeCreatedDog);

        $this->assertCount(1, Dog::all());

        $dog = Dog::first();

        $this->assertEquals($toBeCreatedDog['name'], $dog->name);
        $this->assertEquals($toBeCreatedDog['birth_date'], $dog->birth_date);
        $this->assertEquals($toBeCreatedDog['is_birth_date_exact'], $dog->is_birth_date_exact);
    }

    /** @test */
    public function a_dog_with_non_exact_birth_date_can_be_created()
    {
        $toBeCreatedDog = Dog::factory()->make(['is_birth_date_exact' => false])->toArray();

        $this->post('/dogs', $toBeCreatedDog);

        $dog = Dog::first();

        $this->assertEquals($toBeCreatedDog['name'], $dog->name);
        $this->assertEquals($toBeCreatedDog['birth_date'], $dog->birth_date);
        $this->assertEquals($toBeCreatedDog['is_birth_date_exact'], $dog->is_birth_date_exact);
    }

    /** @test */
    public function a_success_message_is_flashed_when_a_dog_is_created()
    {
        $toBeCreatedDog = Dog::factory()->make()->toArray();

        $response = $this->post('/dogs', $toBeCreatedDog);

        $response->assertRedirect(route('dogs.create'));
        $response->assertSessionHas('success', 'Dog created successfully');
    }

    /** @test */
    public function a_dog_creation_fails_without_required_fields()
    {
        $response = $this->post('/dogs', []);

        $response->assertSessionHasErrors(['name', 'birth_date']);
        $this->assertCount(0, Dog::all());
    }
}
