<?php
include_once( $_SERVER['DOCUMENT_ROOT'].'/crud/config.php');

use App\Banner;
$id = $_GET['id'];

$_banner = new Banner();
$banner = $_banner->show($id);

?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <title>Show</title>
</head>
<body>

<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <h1 class="text-center mb-5">Show</h1>
                <dl>
                    <dt>ID</dt>
                    <dd><?=$banner['id'];?></dd>
                </dl>
                <dl>
                    <dt>Title</dt>
                    <dd><?=$banner['title'];?></dd>
                </dl>
                <dl>
                    <dt>Detail</dt>
                    <dd><?=$banner['detail'];?></dd>
                </dl>
                <dl>
                    <dt>Picture</dt>
                    <dd>
                        <!-- <?=$banner['picture'];?> -->
                        <img src="<?php echo $webroot;?>/uploads/<?=$banner['picture'];?>">
                    </dd>
                </dl>
                <dl>
                    <dt>Is Active</dt>
                    <dd>

                        <?php
/*                           if($banner['is_active'] == 1){
                                echo "This banner is active.";
                            }else{
                                echo "This banner is NOT active.";
                        }
                        */

                        echo ($banner['is_active'])? 'Active': 'Deactivated';
                        ?>
                    </dd>
                </dl>
                <dl>
                    <dt>Created At</dt>
                    <dd><?=$banner['created_at'];?></dd>
                </dl>
                <dl>
                    <dt>Modified At</dt>
                    <dd><?=$banner['modified_at'];?></dd>
                </dl>

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


