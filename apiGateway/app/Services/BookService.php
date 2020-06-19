<?php

namespace App\Services;
use App\Traits\ConsumesExternalService;

class BookService{
 use ConsumesExternalService;
 
public $baseuri;

public function __construct()
 {
   $this->baseUri= config('services.books.base_uri');
 }

 public function obtainBooks()
 {
   return $this->performRequest('GET', '/books');
 }

 public function createBook($data)
 {
     return $this->performRequest('POST', '/books', $data);
 }

 /**
  * Get a single author from the authors service
  * @return string
  */
 public function obtainBook($book)
 {
     return $this->performRequest('GET', "/books/{$book}");
 }

 /**
  * Edit a single author from the authors service
  * @return string
  */
 public function editbook($data, $book)
 {
     return $this->performRequest('PUT', "/books/{$book}", $data);
 }

 /**
  * Delete a single author from the authors service
  * @return string
  */
 public function deleteAuthor($book)
 {
     return $this->performRequest('DELETE', "/books/{$book}");
 }

}