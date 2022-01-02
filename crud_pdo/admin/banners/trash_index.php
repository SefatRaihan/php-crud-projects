<?php
include_once( $_SERVER['DOCUMENT_ROOT'].'/crud/config.php');

use App\Banner;

$_banner = new Banner();
$banners = $_banner->trash_index();

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>List</title>
</head>
<body>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="text-success text-center mt-2 mb-2 font-weight-bolder">
                    <?php
                    echo $_SESSION['message'];
                        $_SESSION['message'] = "";
                    ?>
                </div>
                <h1 class="text-center mb-5">All Trashed Items</h1>
                <ul class="nav mt-3 mb-3">
                    <li class="nav-item">
                        <h4><a class="nav-link active" href="index.php">List Items</a></h4>
                    </li>

                </ul>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(count($banners)> 0):
                    foreach($banners as $banner):
                    ?>
                    <tr>
                        <td><a href="show.php?id=<?=$banner['id'];?>"><?= $banner['title'];?></a></td>
                        <td><?= /*$banner['is_active'];*/
                        ($banner['is_active'])? 'Active': 'Deactivated';?></td>
                        <td><a href="edit.php?id=<?=$banner['id'];?>">Edit</a> | <a href="delete.php?id=<?=$banner['id'];?>" onclick="return confirm('Are you sure you want to delete?')">Delete</a> | <a href="restore.php?id=<?=$banner['id'];?>" onclick="return confirm('Are you sure you want to restore?')">Restore</a></td>
                    </tr>
                    <?php
                    endforeach;
                    else:
                    ?>
                    <tr class="text-center">
                        <td colspan="2"><strong>No banner is available.</strong></td>
                    </tr>
                    <?php
                    endif;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>





