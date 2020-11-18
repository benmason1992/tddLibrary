<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Book;

class BookReservationTest extends TestCase
{
    use RefreshDatabase;
    /** @return test */

    public function test_a_book_can_be_added_to_the_library()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/books', [
            'title' => 'cool book title',
            'author' => 'Ben',
        ]);

        $response->assertOk();
        $this->assertCount(1, Book::all());
    }

    public function test_a_title_is_required()
    {

        $response = $this->post('/books', [
            'title' => '',
            'author' => 'Ben',
        ]);

        $response->assertSessionHasErrors('title');
    }

    public function test_a_author_is_required()
    {

        $response = $this->post('/books', [
            'title' => 'Cool Title',
            'author' => '',
        ]);

        $response->assertSessionHasErrors('author');
    }
    
    public function test_a_book_can_be_updated()
    {
        // $this->withoutExceptionHandling();


        $this->post('/books', [
            'title' => 'Cool Title',
            'author' => 'Ben',
        ]);

        $book = Book::first();

        $response = $this->patch('/books/' . $book->id, [
            'title' => 'New Title',
            'author' => 'New Author'
        ]);

        $this->assertEquals('New Title', Book::first()->title);
        $this->assertEquals('New Author', Book::first()->author);
    }
}
