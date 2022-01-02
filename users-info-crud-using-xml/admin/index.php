<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml/config.php');
libxml_use_internal_errors(true);

$dataFile = $_SERVER['DOCUMENT_ROOT'].'/users-info-crud-using-xml/storage/data.xml';
if(file_exists($dataFile)){
    $users = simplexml_load_file($dataFile);
}else{
    die("data Source not found.");
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

    <title>List</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-3">
                <h1 class="text-center mb-4">User information</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($users === false) {
                        echo "Failed loading XML: ";
                        foreach(libxml_get_errors() as $error) {
                            echo "<br>", $error->message;
                        }
                    } else {
                        $key = 0;
                        foreach ($users->children() as $user) {
                            ?>
                            <tr>
                                <td><?= $user->name; ?></td>
                                <td><a href="show.php?userPosition=<?= $key; ?>">Show</a> | <a href="edit.php?userPosition=<?= $key; ?>">Edit</a> | <a href="delete.php?userPosition=<?= $key; ?>">Delete</a></td>
                            </tr>
                            <?php
                            $key++;
                        }

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
