<?php

namespace Source\Core;

class Connect
{
  private const OPTIONS = [
    \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
    \PDO::ATTR_CASE => \PDO::CASE_NATURAL
  ];


  private $host = 'localhost';
  private $database = 'nitrochange';
  private $user = 'root';
  private $pass = "";

  /** @var \PDO */
  private static $instance;

  /**
   * @return \PDO
   */
  public static function getInstance(): ?\PDO
  {
    if (empty(self::$instance)) {
      try {
        self::$instance = new \PDO(
          "mysql:host=" . self::$host . ";dbname=" . self::$database,
          self::$user,
          self::$pass,
          self::OPTIONS
        );
      } catch (\PDOException $exception) {
        //redirect("/ops/problemas");
        echo "Problemas ao Conectar...";
      }
    }

    return self::$instance;
  }

  /**
   * Connect constructor.
   */
  final private function __construct()
  {
  }

  /**
   * Connect clone.
   */
  private function __clone()
  {
  }
}