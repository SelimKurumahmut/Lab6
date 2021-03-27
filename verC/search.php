<?php
session_start();
$searchTerm= $_GET['searchTerm']??false;
if($searchTerm)
{
    $booksJson=file_get_contents('../../books.json');
    $books=json_decode($booksJson,true);

    foreach($books as $title=>$book){
     if($title!=$searchTerm){
        unset($books[$title]);
        }
    }
    $haveBooks=count($books)>0;
}
$_SESSION['results']=[
    'searchTerm' => $searchTerm,
    'haveBooks' => $haveBooks,
    'books' => $books
];
header('Location: foobooks.php');
?>