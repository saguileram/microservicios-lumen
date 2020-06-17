<?php

namespace App\Http\Controllers;
use App\Author;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AuthorController extends Controller
{
    use ApiResponse;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Return authors list
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return $this->successResponse($authors);
    }

    /**
     * Create an instance of author
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'name'    => 'required|max:255',
            'gender' => 'required|in:male,female',
            'country' => 'required|max:255',
        ];

       $this->validate($request, $rules);

       $author = Author::create($request->all());
       return $this->successResponse($author, Response::HTTP_CREATED); 
    }

    /**
     * Return an especific author
     * @return Illuminate\Http\Response
     */
    public function show($author)
    {
        $author = Author::findOrFail($author);

        return $this->successResponse($author);
    }

    /**
     * Update the information of an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        $rules = [
            'name'    => 'max:255',
            'gender' => 'in:male,female',
            'country' => 'max:255',
        ];

        $this->validate($request, $rules);

        $author = Author::findOrFail($author);

        $author->fill($request->all());

        if($author->isClean()){
            return $this->errorResponse('At least one value must change', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $author->save();

        return $this->successResponse($author);
    }

    /**
     * Removes an existing author
     * @return Illuminate\Http\Response
     */
    public function destroy($author)
    {  

        //return 5/0;
        $author = Author::findOrFail($author);
        $author->delete();

        return $this->successResponse($author);
    }
}
