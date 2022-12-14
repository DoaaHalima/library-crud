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
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Bootstrap Simple Data Table</title>
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<style>
    body {
        color: #566787;
        background: #f5f5f5;
		font-family: 'Roboto', sans-serif;
	}
    .table-responsive {
        margin: 30px 0;
    }
	.table-wrapper {
		min-width: 1000px;
        background: #fff;
        padding: 20px;        
        box-shadow: 0 1px 1px rgba(0,0,0,.05);
    }
	.table-title {
        padding-bottom: 10px;
        margin: 0 0 10px;
    }
    .table-title h2 {
        margin: 8px 0 0;
        font-size: 22px;
    }
    .search-box {
        position: relative;        
        float: right;
    }
    .search-box input {
        height: 34px;
        border-radius: 20px;
        padding-left: 35px;
        border-color: #ddd;
        box-shadow: none;
    }
	.search-box input:focus {
		border-color: #3FBAE4;
	}
    .search-box i {
        color: #a0a5b1;
        position: absolute;
        font-size: 19px;
        top: 8px;
        left: 10px;
    }
    table.table tr th, table.table tr td {
        border-color: #e9e9e9;
    }
    table.table-striped tbody tr:nth-of-type(odd) {
    	background-color: #fcfcfc;
	}
	table.table-striped.table-hover tbody tr:hover {
		background: #f5f5f5;
	}
    table.table th i {
        font-size: 13px;
        margin: 0 5px;
        cursor: pointer;
    }
    table.table td:last-child {
        width: 130px;
    }
    table.table td a {
        color: #a0a5b1;
        display: inline-block;
        margin: 0 5px;
    }
	table.table td a.view {
        color: #03A9F4;
    }
    table.table td a.edit {
        color: #FFC107;
    }
    table.table td a.delete {
        color: #E34724;
    }
    table.table td i {
        font-size: 19px;
    }    
    .pagination {
        float: right;
        margin: 0 0 5px;
    }
    .pagination li a {
        border: none;
        font-size: 95%;
        width: 30px;
        height: 30px;
        color: #999;
        margin: 0 2px;
        line-height: 30px;
        border-radius: 30px !important;
        text-align: center;
        padding: 0;
    }
    .pagination li a:hover {
        color: #666;
    }	
    .pagination li.active a {
        background: #03A9F4;
    }
    .pagination li.active a:hover {        
        background: #0397d6;
    }
	.pagination li.disabled i {
        color: #ccc;
    }
    .pagination li i {
        font-size: 16px;
        padding-top: 6px
    }
    .hint-text {
        float: left;
        margin-top: 6px;
        font-size: 95%;
    }    
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
  <?php
    include('includes/navbar.php');
    
    ?>
    <?php
      if(isset($_GET['bookid'])):
      $bookid=$_GET['bookid'];
    

    ?>
    <form class="p-5 w-50 mx-auto my-3" method="post" action="selectbook.php">
      <div class="mb-3">
        
        <label for="exampleFormControlInput1" class="form-label">book id</label>
        <input type="text" name="bookid" class="form-control" id="exampleFormControlInput1" placeholder="Enter book id" disabled value="<?php echo $bookid?>">
        
     
      </div>
     
         <button class="btn btn-lg btn-info"> Select book </button>



    </form>
    <?php
    else:

    ?>
     <form class="p-5 w-50 mx-auto my-3" method="post" action="selectbook.php">
      <div class="mb-3">
        
        <label for="exampleFormControlInput1" class="form-label">book id</label>
        <input type="text" name="bookid" class="form-control" id="exampleFormControlInput1" placeholder="Enter book id" >
        
     
      </div>
     
         <button class="btn btn-lg btn-info"> Select book </button>



    </form>
    <?php
    endif;

    ?>

    
<?php
 if($_SERVER['REQUEST_METHOD']=='POST'||isset($_GET['bookid'])) :
    if($book):
?>      
    <div class="container">
    <table class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>book id</th>
                            <th>book name</th>
                            <th>coby number </th>
                            <th>book price</th>
                            <th>auther id</th>
                            <th>publisher id</th>
                            <th>view </th>
                            <th>update </th>
                            <th>delete </th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                        <td><?php echo $course['book_id'];?></td>
                        <td><?php echo $course['book_name'];?></td>
                        <td><?php echo $course['coby_number'];?></td>
                        <td><?php echo $course['book_price'];?></td>
                        <td><?php echo $course['auther_id'];?></td>
                        <td><?php echo $course['publisher_id'];?></td>
                        <td>
                            <a href="selectbook.php?book_id=<?php echo $book['book_id'];?>" class="view" title="View" data-toggle="tooltip"><i class="material-icons">&#xE417;</i></a>
                        </td>
                        <td>
                        <a href="updatebook.php?bookid=<?php echo $book['book_id'];?>" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                        
                        </td>
                        <td>
                        <a href="deleteb.php?bookid=<?php echo $book['book_id'];?>" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>

                        </td>
                        </tr>

                       
                    </tbody>
                </table>
</div>
<?php
 else:

 ?>
 <div class="container"> no book with this id</div>
 <?php
 endif;

 ?>

<?php

endif;
 ?>
        


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>