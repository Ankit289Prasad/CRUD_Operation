<?php

require_once("db.php");
require_once("Component.php");

$con=Createdb();

if(isset($_POST['create'])){
    createData();
}

if(isset($_POST['update'])){
    UpdateData();
}

if(isset($_POST['delete'])){
    deleteRecord();
}

if(isset($_POST['deleteall'])){
    deleteAll();
}

function createData(){
    $bookname=textboxValue("book_name");
    $bookpublisher=textboxValue("book_publisher");
    $bookprice=textboxValue("book_price");

    if($bookname&&$bookpublisher&&$bookprice){

        $sql="INSERT INTO books(book_name,book_publisher,book_price)
        VALUES('$bookname','$bookpublisher','$bookprice');";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","Record Successfully Inserted..!");
    }    
    else{
        echo "ERROR";
    }

    }else{
        TextNode("error","Provide Data in the Textbox");
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
    $element="<h6 class='$classname'>$msg</h6>";
    echo $element;
}

function getData(){
    $sql="SELECT *FROM books";
    
    $result=mysqli_query($GLOBALS['con'],$sql);
    return $result;
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_assoc($result)){
            return $result;
        }
    }
}

function UpdateData(){
    $bookid=textboxValue("book_id");
    $bookname=textboxValue("book_name");
    $bookpublisher=textboxValue("book_publisher");
    $bookprice=textboxValue("book_price");

    if($bookname&&$bookprice&&$bookpublisher){
        $sql="
        UPDATE books SET book_name='$bookname',book_publisher='$bookpublisher',book_price='$bookprice' WHERE id='$bookid'
        ";
        if(mysqli_query($GLOBALS['con'],$sql)){
            TextNode("success","Data Successfully Upadted..!");
        }
        else{
            TextNode("error","Unable to Update Data");
        }
    }
    else{
        TextNode("error","Select Data Using Edit Icon");
    }
}

function deleteRecord(){
    $bookid=(int)textboxValue("book_id");

    if($bookid){
    $sql="DELETE FROM books WHERE id=$bookid";
    if(mysqli_query($GLOBALS['con'],$sql))
    {
        TextNode("success","Record Deleted Successfully..!");

    }else{
        TextNode("error","Unable to Delete Record...!");
    }
}
    else{
        TextNode("error","Select Data Using Edit Icon");
    }
}

function deleteBtn(){
    $result=getData();
    $i=0;
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $i++;
            if($i>3){
                buttonElement("btn-deleteall","btn btn-danger","<i class='fa fa-trash'></i> Delete All","deleteall","");
                return;
            }
        }
    }
}

function deleteAll(){
    $sql="DROP TABLE books";

    if(mysqli_query($GLOBALS['con'],$sql)){
        TextNode("success","All Records Deleted Successfully..!");
        Createdb();
    }else{
        TextNode("error","Something Went Wrong :-( Unable to Delete Records...!");
    }
}

function setID(){
    $getid=getData();
    $id=0;
    if($getid){
        while($row=mysqli_fetch_assoc($getid)){
            $id=$row['id'];
        }
    }
    return ($id+1);
}
