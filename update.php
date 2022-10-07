<?php

if($_SERVER['REQUEST_METHOD']=='POST')
{
   $bookid=$_POST['bookid'];
   $bookname=$_POST['bookname'];
   $cobynumber=$_POST['cobynumber'];
   $bookprice=$_POST['bookprice'];
   $autherid=$_POST['autherid'];
   $publisherid=$_POST['publisherid'];

   include('includes/conn.php');

   $conn=$pdo->open();
    
    
 
    $sql = "UPDATE `books` SET `book_name`=:bookname,`coby_number`=:cobynumber,`book_price`=:bookprice,`auther_id`=:autherid,`publisher_id`=:publisherid WHERE `book_id`=:bookid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':bookid', $bookid);
    $stmt->bindParam(':bookname', $bookname);
    $stmt->bindParam(':cobynumber', $cobynumber);
    $stmt->bindParam(':bookprice', $bookprice);
    $stmt->bindParam(':autherid', $autherid);
    $stmt->bindParam(':publisherid', $publisherid);


    $stmt->execute();


    $conn=$pdo->close();
    header('Location:viewcourses.php');
   

    

    }

?>