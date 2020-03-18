<?php
require_once("../CRUD_Operation/PHP/Component.php");
require_once("../CRUD_Operation/PHP/operation.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="book.ico" type="image/x-icon">
    <title>BOOKS</title>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="CSS/main.css">
</head>

<body>
<main>
    <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fa fa-book"></i> Book Store</br></h1>
        <p id="footer" style="font-size:70%; margin: -0.67em 0em;" class="bg-dark text-light rounded">&copy; Ankit Prasad : 2020</p>
        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-5">
                    <?php inputElement("<i class='fa fa-id-badge'></i>","ID","book_id",setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fa fa-address-book'></i>","Book Name","book_name",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fa fa-users'></i>","Publisher","book_publisher",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fa fa-dollar'></i>","Price","book_price",""); ?>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <?php buttonElement("btn-create","btn btn-success","<i class='fa fa-plus'></i>","create","dat-toggle='toltip' data-placement='buttom' title='Create'");?>
                    <?php buttonElement("btn-id","btn btn-primary","<i class='fa fa-refresh'></i>","read","dat-toggle='toltip' data-placement='buttom' title='Read'");?>
                    <?php buttonElement("btn-update","btn btn-light border","<i class='fa fa-pencil'></i>","update","dat-toggle='toltip' data-placement='buttom' title='Update'");?>
                    <?php buttonElement("btn-delete","btn btn-danger","<i class='fa fa-trash'></i>","delete","dat-toggle='toltip' data-placement='buttom' title='Delete'");?>
                    <?php deleteBtn();?>
                </div>
            </form>
        </div>
        <div class="d-flex table-data" style="margin:1em 10em;">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                        if(isset($_POST['read'])||isset($_POST['create'])||isset($_POST['update'])||isset($_POST['delete'])){
                            $result=getData();
                            if($result){
                                while($row=mysqli_fetch_assoc($result)){?>
                                <tr>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id'];?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name'];?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher'];?></td>
                                    <td data-id="<?php echo $row['id']; ?>"><?php echo '$ '.$row['book_price'];?></td>
                                    <td><i class="fa fa-edit btnedit" style="color: lightsalmon" data-id="<?php echo $row['id']; ?>"></i></td>                             
                                </tr>
                                
                                <?php
                                }
                                
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="../Crud_Operation/JS/main.js"></script>
</body>

</html>