<?php
class Book
{
    #Begin properties
    var $id;
    var $title;
    var $price;
    var $author;
    var $year;
    #end properties

    #Construct function
    function __construct($id, $title ,$price, $author, $year)
    {
        $this->id = $id;
        $this->title = $title;
        $this->price = $price;
        $this->author = $author;
        $this->year = $year;
    }

    #Member function
    function display()
    {
        echo "id: " . $this->id. "<br>";
        echo "Title: " . $this->title . "<br>";
        echo "Price: " . $this->price . "<br>";
        echo "Author: " . $this->author . "<br>";
        echo "Year: " . $this->year . "<br>";
    }

    static function getList(){
        $listBook = array();
        array_push($listBook,new Book(1,"OOP in PHP",3,"ndungithue",2019));
    }
    /**
     * lấy dữ liệu từ file
     */
    static function getListFromFile(){
        $arrData = file("data/book.txt");
        $lsBook = array();
        // var_dump($arrData);
        foreach ($arrData as $key => $value) {
            $arrItem =explode("#",$value);
            $book = new Book($arrItem[0],$arrItem[1],$arrItem[2],$arrItem[3],$arrItem[4]);
            array_push($lsBook,$book);
        }
        return $lsBook;
    }
    static function getSearch($search = null){
        $arrData = file("data/book.txt");
        $lsBook = [];
        // var_dump($arrData);
        foreach ($arrData as $key => $value) {
            $arrItem =explode("#",$value);
            if(
                $search ==null ||
                strlen(strstr($arrItem[0],$search)) ||
                strlen(strstr($arrItem[1],$search)) ||
                strlen(strstr($arrItem[2],$search)) ||
                strlen(strstr($arrItem[3],$search)) ||
                strlen(strstr($arrItem[4],$search)) 
            )
            {
                $book = new Book($arrItem[0],$arrItem[1],$arrItem[2],$arrItem[3],$arrItem[4]);
                array_push($lsBook,$book);
            }
        }
        return $lsBook;
    }
    static function addToFile($content)
    {
        $myfile = fopen("data/book.txt", "a") or die("Unable to open file!");
        fwrite($myfile, "\n".$content);
        fclose($myfile);
    }
    static function editItem($newItem,$arrdata){
        $myfile = fopen("data/book.txt", "w") or die("Unable to open file!");
        foreach ($arrdata as $key => $value) {
            if($value->id === $newItem->id){
                $value->title = $newItem->title;
                $value->price = $newItem->price;
                $value->author = $newItem->author;
                $value->year = $newItem->year;    
            }
            $content = $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
            fwrite($myfile, $content);
        }
        fclose($myfile);
    }
    static function delete($arrdata,$id){
        $myfile = fopen("data/book.txt", "w") or die("Unable to open file!");
        unset($arrdata[$id]);
        foreach ($arrdata as $key => $value) {
            $content = $value->id."#".$value->title."#".$value->price."#".$value->author."#".$value->year;
            fwrite($myfile, $content);
        }
        fclose($myfile);
    }
}
