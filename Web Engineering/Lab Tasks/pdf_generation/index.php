<?php
  require 'vendor/autoload.php';
  use Dompdf\Dompdf; 

  include_once('init.php');
  $rows = $db->query('SELECT * FROM book ORDER BY title');

  $html = <<<TABLE
  <!doctype html>
  <html lang="en">
  <body>
        <table border="2">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">ISBN</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Stock</th>
            <th scope="col">Price</th>
            
          </tr>
        </thead>
        <tbody>
TABLE;
 
  foreach($rows as $row){
    $html.= '<tr>' .
    '<th scope="row">' . $row['id'] . '</th>' .
    '<td>' . $row['isbn'] . '</td>' .
    '<td>' . $row['title'] . '</td>' .
    '<td>' . $row['author'] . '</td>' .
    '<td>' . $row['stock'] . '</td>' .
    '<td>' . $row['price'] . '</td>' .
    '</tr>';
  }

  
  $html .= <<<TBODY
  </tbody>
  </table>
  </body>
  </html>
  TBODY;

  echo $html;
  $dompdf = new DOMPDF();
  $dompdf->loadHtml($html);
  $dompdf->setPaper('A4', 'landscape');
  $dompdf->render();
  $dompdf->stream("booklist.pdf");