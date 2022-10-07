<?php

$message="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
   $bookname=$_POST['bookname'];
   $cobynumber=$_POST['cobynumber'];
   $bookprice=$_POST['bookprice'];
   $autherid=$_POST['autherid'];
   $publisherid=$_POST['publisherid'];

   include('includes/conn.php');

   $conn=$pdo->open();
    
    

    $sql = "INSERT INTO books (book_name,copy_number,book_price,auther_id,publisher_id) VALUES (:bookname,:cobynumber,:bookprice,:autherid,:publisherid)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':bookname', $bookname);
    $stmt->bindParam(':cobynumber', $cobynumber);
    $stmt->bindParam(':bookprice', $bookprice);
    $stmt->bindParam(':autherid', $autherid);
    $stmt->bindParam(':publisherid', $publisherid);


    $stmt->execute();
    
    $message="<br> New record created successfully  ";
    header('Location:viewbooks.php');

    $pdo->close();
   
    }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <?php
    include('includes/navbar.php');
    ?>
    

    <?php
    if($message!=""):

   
    ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?php
    echo $message;

    ?>
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
else:

?>

<form class="p-5 w-50 mx-auto my-3" method="post" action="addbook.php">


 
<div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">book name</label>
    <input type="text" name="bookname" class="form-control" id="exampleFormControlInput1" placeholder="Enter book name">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">coby number </label>
    <input type="text" name="cobynumber" class="form-control" id="exampleFormControlInput1" placeholder="Enter coby number ">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">book price </label>
    <input type="text" name="bookprice" class="form-control" id="exampleFormControlInput1" placeholder="Enter book price">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label"> auther id</label>
    <input type="text" name="autherid" class="form-control" id="exampleFormControlInput1" placeholder="Enter auther id">
  </div>
  <div class="mb-3">
    <label for="exampleFormControlInput1" class="form-label">publisher id </label>
    <input type="text" name="publisherid" class="form-control" id="exampleFormControlInput1" placeholder="Enter publisher id">
  </div>  
 <button class="btn btn-lg btn-info"> Add book </button>

</form>


<?php
endif;

?>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>