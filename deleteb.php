<?php

if(isset($_GET['bookid']))
{
   $bookid=$_GET['bookid'];

   include('includes/conn.php');

   $conn=$pdo->open();

    $sql="DELETE FROM `books` WHERE `book_id`=:bookid";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':bookid', $bookid);

    $stmt->execute();
    
    header('Location:viewbooks.php');

    $pdo->close();
    }

?>