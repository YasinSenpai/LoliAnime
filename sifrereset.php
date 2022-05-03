<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pykatone Anime</title>
    <link rel="stylesheet" href="assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="assets/css/normalize.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/css/sifre-reset.css" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body style="background-color: #3c3c3c">
<div class="container padding-bottom-3x mb-2 mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-lg-8 col-md-10 justify-content-center" style="margin-top: 90px;">
            <form class="card mt-4 col text-white d-flex" style="background-color: #333333" method="post" action="">
                <div class="card-header text-center" style="text-decoration: none">
                    <h2>Um... Nerede Kalmıştık!</h2>
                    <p class="text-muted small">Lütfen yeni şifrenizi not etmeyi unutmayın</p>
                    <?php
                    require 'php/sifrereset.php';
                    ?>
                </div>
                <div class="card-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-envelope"></i></span>
                        </div>
                        <input type="email" class="form-control" placeholder="Lütfen Email Addresinizi Girin" name="sifre-unuttum-email" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Şifreniz" name="yeni-sifre" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="bi bi-lock"></i></span>
                        </div>
                        <input type="password" class="form-control" placeholder="Şifreniz tekrardan" name="yeni-sifre-tekrar" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                </div>
                <div class="card-footer"> <button class="btn btn-success mx-1" name="sifre-reset" type="submit">Devam et</button><a href="index.php"><div class="btn btn-danger mx-1">Ana Sayfa</div></a> </div>

            </form>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>







