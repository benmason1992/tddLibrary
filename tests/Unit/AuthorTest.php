<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Author;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_only_a_name_is_required_to_create_an_author()
    {
        Author::firstOrCreate([
            'name' => 'John doe'
        ]);

        $this->assertCount(1, Author::all());
    }
}
