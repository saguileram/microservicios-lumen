<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Traits\ApiResponse;
use App\Services\AuthorService;
use Illuminate\Http\Response;



class AuthorController extends Controller
{
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $authorService;

    public function __construct(AuthorService $authorService)
    {
        //
        $this->authorService = $authorService;
    }

    //
    public function index()
    {
      return $this->successResponse($this->authorService->obtainAuthors());
    }

    public function show($author)
    {
      return $this->successResponse($this->authorService->obtainAuthor($author));
    }

    public function store(Request $request)
    {
      return $this->successResponse($this->authorService->createAuthor($request->all()), Response::HTTP_CREATED);
    }

    public function update(Request $request, $author)
    {
      return $this->successResponse($this->authorService->editAuthor($request->all(), $author));
    }

    public function destroy($author)
    {
      return $this->successResponse($this->authorService->deleteAuthor($author));
    }
}
