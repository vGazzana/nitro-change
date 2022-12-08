<?php

namespace App\Utils;

class View
{
  /**
   * @param string $view
   * @return string
   */
  private static function getView($view)
  {
    $file = __DIR__ . "/../Views/$view.html";
    $errorPage = __DIR__ . "/../Views/404.html";
    return file_exists($file) ? file_get_contents($file) : file_get_contents($errorPage);
  }

  /**
   * @param string $view
   * @param array $vars (string/number)
   * @return string
   */
  public static function render($view, $vars = [])
  {
    $page = self::getView($view);

    $keys = array_keys($vars);
    $keys = array_map(function ($item) {
      return '{{' . $item . '}}';
    }, $keys);


    return str_replace($keys, array_values($vars), $page);
  }
}