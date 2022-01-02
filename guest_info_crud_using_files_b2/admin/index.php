<?php
include_once ($_SERVER['DOCUMENT_ROOT']. '/guest_info_crud_using_files_b2/config.php');


use App\Utility\Debugger;



$guests = [];
if(file_exists($dataSource)){
    $guests = unserialize(file_get_contents($dataSource));
}else{
    echo "Storage not found";
}




?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>Guest Book</title>
</head>
<body>
<section>
    <div class="container">
        <h1 class="text-center mb-4">Guest Book</h1>
        <div class="row">
            <div class="col-sm-5 offset-3">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($guests) && count($guests) > 0){
                        $i=0;
                        foreach ($guests as $key => $guest) {

                            ?>
                            <tr>
                                <td><?= $i++; ?></td>
                                <td><?= $guest['full_name']; ?></td>
                                <td><a href="show.php?guestPosition=<?= $key ?>">Show</a> | <a href="edit.php?guestPosition=<?= $key ?>">Edit</a> | <a href="delete.php?guestPosition=<?= $key ?>">Delete</a></td>
                            </tr>

                            <?php
                        }

                    }else{
                        ?>
                        <tr>
                            <td colspan="3">No data is available.</td>
                        </tr>
                    <?php
                    }

                    ?>

                    </tbody>
                </table>
                <a href="create.php">Create new.</a>
            </div>
        </div>
    </div>
</section>

<!-- Optional JavaScript; choose one of the two! -->

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>

<!-- Option 2: Separate Popper and Bootstrap JS -->
<!--
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
-->
</body>
</html>
