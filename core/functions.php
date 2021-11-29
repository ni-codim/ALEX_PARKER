<?php
/*
  ./core/functions.php
  Fonctions personnalisées du framework
 */
namespace Core\Functions;

/**
 * Return a slugified string
 *
 * @param  string $string
 * @return string
 */
  function slugify(string $string) :string {
    return (trim(preg_replace('/[^a-z0-9]+/', '-', strtolower($string)), '-'));
  }

/**
 * Return a truncated string to $length characters
 * @param  string $string
 * @param  [type] $length
 * @return string
 */
  function truncate(string $string, int $length = TRUNCATE_LENGTH) :string {
    if (strlen($string) > $length):
      $string = substr($string, 0, strpos($string, ' ', $length)) . ' ... ';
    endif;
    return $string;
  }

  function datify(string $date, string $format = DATE_FORMAT) :string {
    $date = new \DateTime($date);
    return $date->format($format);
  }

 ?>
