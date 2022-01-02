<?php

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

    <title>BOOKs Information</title>
</head>
<body>
<section>
    <div class="container">
        <h1 class="text-center mb-4">Users Information </h1>
        <div class="row">
            <div class="col-sm-5 offset-3">
                <form method="post" action="store.php">
                    <div class="row mb-3">
                        <label for="name" class="col-sm-3 col-form-label">Name:</label>
                        <div class="col-sm-9">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="email" class="col-sm-3 col-form-label">Email:</label>
                        <div class="col-sm-9">
                            <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    value="">
                        </div>
                    </div>

                    <!--<div class="row mb-3">
                        <label for="isbn" class="col-sm-3 col-form-label">ISBN:</label>
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="isbn"
                                name="isbn"
                                value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="book-title" class="col-sm-3 col-form-label">Book Title:</label>
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="book-title"
                                name="book_title"
                                value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="author-name" class="col-sm-3 col-form-label">Author Name:</label>
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="author-name"
                                name="author_name"
                                value="">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label for="price" class="col-sm-3 col-form-label">Price (BDT):</label>
                        <div class="col-sm-9">
                            <input
                                type="text"
                                class="form-control"
                                id="price"
                                name="price"
                                value="">
                        </div>
                    </div>-->
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>

                </form>

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


