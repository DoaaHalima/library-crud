<?php
$bookid="";
if($_SERVER['REQUEST_METHOD']=='POST')
{
   $bookid=$_POST['bookid'];
   
 

   
}
if(isset($_GET['bookid']))
  {
    $bookid=$_GET['bookid'];

  }
 if($_SERVER['REQUEST_METHOD']=='POST'||isset($_GET['bookid'])) 
 {
  include('includes/conn.php');

  $conn=$pdo->open();
   $sql="SELECT * FROM `books` WHERE book_id=:bookid";
   $stmt = $conn->prepare($sql);
   $stmt->bindParam(':bookid', $bookid);

   $stmt->execute();
   $book=$stmt->fetch();
 

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
      if(isset($_GET['bookid'])):
      $bookid=$_GET['bookid'];
    

    ?>
    <form class="p-5 w-50 mx-auto my-3" method="post" action="updatebook.php">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">book id</label>
        <input type="text"  name="bookid" class="form-control" id="exampleFormControlInput1" placeholder="Enter book id" disabled value="<?php echo $bookid?>">
      </div>


         <button class="btn btn-lg btn-info"> select book </button>

    </form>
    <?php
    else:

    ?>
     <form class="p-5 w-50 mx-auto my-3" method="post" action="updatebook.php">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">book id</label>
        <input type="text" name="bookid" class="form-control" id="exampleFormControlInput1" placeholder="Enter book id">
      </div>


         <button class="btn btn-lg btn-info"> select book </button>

    </form>
    <?php
    endif;
    ?>

    <?php
 if($_SERVER['REQUEST_METHOD']=='POST'||isset($_GET['bookid'])) :
 if($book):


    ?>
    <form class="p-5 w-50 mx-auto my-3" method="post" action="update.php">
      <div class="mb-3">
        <input type="hidden" name="bookid" class="form-control" id="exampleFormControlInput1" placeholder="Enter book id" value="<?php  echo $book['book_id']?>">
      </div>
      <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">book name</label>
            <input type="text" name="bookname" class="form-control" id="exampleFormControlInput1" placeholder="Enter book name" value="<?php  echo $book['book_name']?>">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">coby number </label>
            <input type="text" name="cobynumber" class="form-control" id="exampleFormControlInput1" placeholder="Enter coby number" value="<?php  echo $book['coby_number']?>">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">book price</label>
            <input type="text" name="bookprice" class="form-control" id="exampleFormControlInput1" placeholder="Enter book price" value="<?php  echo $book['book_price']?>">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">auther id</label>
            <input type="text" name="autherid" class="form-control" id="exampleFormControlInput1" placeholder="Enter auther id" value="<?php  echo $book['auther_id']?>">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">publisher id</label>
            <input type="text" name="publisherid" class="form-control" id="exampleFormControlInput1" placeholder="Enter publisher id" value="<?php  echo $book['publisher_id']?>">
          </div> 


         <button class="btn btn-lg btn-info"> update book </button>

    </form>


    <?php
    else:


    ?>
    <div class="container">
      <p> no book with this id </p>
    </div>
        <?php
   endif;
  endif;


    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>