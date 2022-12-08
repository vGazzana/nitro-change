<?php

namespace App\Http;

class Response
{
  private $status = 200;

  private $headers = [];

  private $contentType = 'text/html';

  private $result;

  public function __construct($status, $result, $contentType = 'text/html')
  {
    $this->status = $status;
    $this->result = $result;
    $this->setContentType($contentType);
  }

  public function setContentType($contentType)
  {
    $this->contentType = $contentType;
    $this->addHeader('Content-Type', $contentType);
  }

  public function addHeader($key, $value)
  {
    $this->headers[$key] = $value;
  }

  private function sendHeaders()
  {
    http_response_code($this->status);

    foreach ($this->headers as $key => $value) {
      header($key . ': ' . $value);
    }
  }

  public function sendResponse()
  {
    //ENVIA OS HEADERS
    $this->sendHeaders();

    //IMPRIME O CONTEUDO
    switch ($this->contentType) {
      case 'text/html':
        echo $this->result;
        exit;
    }
  }
}