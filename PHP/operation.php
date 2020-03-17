<?php

require_once("db.php");
require_once("Component.php");

$con=Createdb();

if(isset($_POST['create'])){
    createData();
}

function createData(){
    $bookname=textboxValue("book_name");
    $bookpublisher=textboxValue("book_publisher");
    $bookprice=textboxValue("book_price");

    if($bookname&&$bookpublisher&&$bookprice){

        $sql="INSERT INTO books(book_name,book_publisher,book_price)
        VALUES('$bookname','$bookpublisher','$bookprice');";

    if(mysqli_query($GLOBALS['con'],$sql)){
        echo "Record Successfully inserted...!";
    }    
    else{
        echo "ERROR";
    }

    }else{
        TextNode("success","Provide Data in the Textbox");
    }
}

function textboxValue($value){
    $textbox=mysqli_real_escape_string($GLOBALS['con'],trim($_POST[$value]));
    if(empty($textbox)){
        return false;
    }
    else {
        return $textbox;
    }
}

function TextNode($classname,$msg){
    $element="<h6 class='$classname' style=\"background-color:lightgreen;padding:1em\">$msg</h6>";
    echo $element;
}
?>