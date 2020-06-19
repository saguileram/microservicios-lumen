<?php

namespace App\Services;
use App\Traits\ConsumesExternalService;

class AuthorService{
 use ConsumesExternalService;
 
public $baseUri;

public function __construct()
 {
   $this->baseUri = config('services.authors.base_uri'); 

 }

 public function obtainAuthors()
 {
   return $this->performRequest('GET', '/authors');
 }

 public function createAuthor($data)
 {
     return $this->performRequest('POST', '/authors', $data);
 }

 /**
  * Get a single author from the authors service
  * @return string
  */
 public function obtainAuthor($author)
 {
     return $this->performRequest('GET', "/authors/{$author}");
 }

 /**
  * Edit a single author from the authors service
  * @return string
  */
 public function editAuthor($data, $author)
 {
     return $this->performRequest('PUT', "/authors/{$author}", $data);
 }

 /**
  * Delete a single author from the authors service
  * @return string
  */
 public function deleteAuthor($author)
 {
     return $this->performRequest('DELETE', "/authors/{$author}");
 }


}