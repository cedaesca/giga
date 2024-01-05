<?php

namespace Tests\Feature;

use Tests\TestCase;

class HomeTest extends TestCase
{

    /** @test */
    public function visitors_get_redirected_to_dog_creation_form(): void
    {
        $response = $this->get('/');

        $response->assertRedirect(route('dogs.create'));
    }
}
