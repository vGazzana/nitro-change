<?php


namespace App\Controller\Pages;

use App\Utils\View;

class Home extends Template
{
  /**
   * retornar View->Home
   * @return string
   */

  public static function getHome()
  {
    $content = View::render('home', [
      'name' => 'Nitro Change',
      'user' => 'Kaio Silveira'
    ]);
    return parent::getTemplate('Nitro⚡Change', $content);
  }
}