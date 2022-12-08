<?php

namespace App\Controller\Pages;

use \App\Utils\View;

class Template
{

  /**
   * @return string *Header
   */
  private static function getHeader()
  {
    return View::render('components/header');
  }

  /**
   * @return string *Footer
   */
  private static function getFooter()
  {
    return View::render('components/footer');
  }

  public static function getTemplate($title, $content)
  {

    return View::render('template', [
      "title" => $title,
      "header" => self::getHeader(),
      "content" => $content,
      "teste" => var_dump($_ENV),
      "footer" => self::getFooter()

    ]);
  }
}