<?php
function notFound() {
    echo 'Filen finns inte.';
    die();
}

if(!isset($_GET['id'])) {
    notFound();
}

$id = $_GET['id'];
$books = json_decode(file_get_contents('books.json'));

if(!isset($books[$id])) {
    notFound();
}

$file = $books[$id]->mobiPath;
header('Content-Type: application/octet-stream');
header('Content-Transfer-Encoding: Binary'); 
header('Content-disposition: attachment; filename="' . basename($file) . '"');
readfile($file);