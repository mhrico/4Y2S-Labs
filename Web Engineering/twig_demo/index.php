<?php
  require 'vendor/autoload.php';
  include_once('init.php');

  $rows = $db->query('SELECT * FROM book ORDER BY title');

  $loader = new Twig\Loader\FilesystemLoader('views');
  $twig = new Twig\Environment($loader);

  echo $twig->render('book.twig', ['books' => $rows])
?>
