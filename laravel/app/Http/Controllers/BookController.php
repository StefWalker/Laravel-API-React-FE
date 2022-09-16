<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Author;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookResource::collection(Book::paginate());
    }

    /**
     * Display a listing of the resource by Author.
     *
     * @param \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function byAuthor(Author $author)
    {
        $where = [              // Search based where the author_id is the same as the one in the entry parameter
            'author_id' => $author->id,
        ];
        return BookResource::collection(Book::where($where)->paginate());
    }

    /**
     * Display a listing of the resource if the books are available.
     *
     * @return \Illuminate\Http\Response
     */
    public function ifAvailable()
    {
        $where = [              // Search on the available books
            'available' => 1,
        ];
        return BookResource::collection(Book::where($where)->paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // Validates that the title, year and author are not the same at the same time getting a true boolean if that is the case
        $titleExist = Book::where('title', '=', $request->title)->where('year', '=', $request->year)->where('author_id', '=', $request->author_id)->first();

        // Validates that the Author exists
        $authorExist = Author::where('id', '=', $request->author_id)->first();
        if(!$titleExist and $authorExist)
        {
            $book = Book::create($request->all());
            return new BookResource($book);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return new BookResource($book); // Return only the book with the same ID
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        $book->update($request->all());

        return new BookResource($book);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return response('', 204);
    }
}
