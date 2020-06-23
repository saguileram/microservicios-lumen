<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Services\BookService;
use Illuminate\Http\Response;

use App\Services\AuthorService; //agregado

class BookController extends Controller
{
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     protected $bookService;
    public function __construct(BookService $bookService)
    {
        //
        $this->bookService = $bookService;
    }

    //
    public function index()
    {
        return $this->successResponse($this->bookService->obtainBooks());
    }

    public function show($book)
    {
        return $this->successResponse($this->bookService->obtainBooks($book));
    }

    public function store(Request $request, $author)
    {
       $author = $this->successResponse($this->authorService->obtainAuthors());
       //$author = Author::findOrFail($author);
       if($author->isEmpty()){
           return $author;
           //return $this->errorResponse('does not exist', Response::HTTP_UNPROCESSABLE_ENTITY);
       }else{
           return $this->successResponse($this->bookService->createBook($request->all()), Response::HTTP_CREATED);
       }
       
    }

    public function update(Request $request, $book)
    {
        return $this->successResponse($this->bookService->editBook($request->all(), $book));
    }

    public function destroy($book)
    {
        return $this->successResponse($this->bookService->deleteAuthor($book));
    }
}
