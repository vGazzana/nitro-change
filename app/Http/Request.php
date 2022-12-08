<?php

namespace App\Http;

class Request
{

  private $method;

  private $uri;

  private $query = [];

  private $post = [];

  private $headers = [];

  public function __construct()
  {
    $this->query    = $_GET ?? [];
    $this->post     = $_POST ?? [];
    $this->headers  = getAllHeaders();
    $this->method    = $_SERVER['REQUEST_METHOD'] ?? '';
    $this->uri      = $_SERVER['REQUEST_URI'] ?? '';
  }

  public function getHttpMethod()
  {
    return $this->method;
  }
  public function getUri()
  {
    return $this->uri;
  }
  public function getHeaders()
  {
    return $this->headers;
  }
  public function getQuery()
  {
    return $this->query;
  }
  public function getPost()
  {
    return $this->post;
  }
}