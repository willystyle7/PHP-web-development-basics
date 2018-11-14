<?php
class Library {
    public $name;
    public $books;
    public function __construct($name = null, array $books = null) {
        $this->name = $name;
        if($books != null) {
        $this->$books = $books;
        }
    }
}
class Book {
    public $title;
    public $author;
    public $publisher;
    public $releaseDate;
    public $isbn;
    public $price;
    public function __construct($title = null, $author = null, $publisher = null, $releaseDate = null, $isbn = null, $price = null) {
        $this->title = $title;
        $this->author = $author;
        $this->publisher = $publisher;
        $this->releaseDate = $releaseDate;
        $this->isbn = $isbn;
        $this->price = $price;
    }
}
$n = intval(readline());
$books = [];
$library = new Library;
$library->books = array();
 for($i = 1; $i <= $n; $i++) {
     $input = explode(" ", readline());
     $title = $input[0];
     $author = $input[1];
     $publisher = $input[2];
     $releaseDate = $input[3];
     $isbn = $input[4];
     $price = $input[5];
     //Generate book
     $book = new Book();
     $book->title = $title;
     $book->author = $author;
     $book->publisher = $publisher;
     $book->releaseDate = $releaseDate;
     $book->isbn = $isbn;
     $book->price = $price;
     $library->books[] = $book;
 }
$filteredArr = [];
  foreach($library as $values) {
      if(is_array($values)) {
      foreach($values as $b) {
          if(!key_exists($b->author, $filteredArr)) {
              $filteredArr[$b->author] = 0;
          }
          $filteredArr[$b->author] += $b->price;
      }
      }
  }
  foreach($filteredArr as $n => $v) {
      $name[] = $n;
      $val[] = $v;
  }
  array_multisort($val, SORT_DESC, $name, SORT_ASC, $filteredArr);
  foreach($filteredArr as $author => $price) {
      printf("%s -> %.2f\n", $author, $price);
  }
?>