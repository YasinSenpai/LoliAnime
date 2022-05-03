<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loli Hentai</title>
    <link rel="stylesheet" href="css/mdb.min.css" type="text/css" />
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Quicksand:wght@300&family=Zen+Kaku+Gothic+Antique:wght@300&display=swap" rel="stylesheet">
    <style>
        .fontlu{
            font-family: 'Quicksand', sans-serif;
        }
        ::-webkit-scrollbar{
            max-width: 10px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="container padding-bottom-3x mb-2 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="card background text-white">
                    <div class="card-body">
                        <div class="forgot">
                            <h2>Parolanızı mı unuttunuz?</h2>
                            <p>Parolanızı üç kolay adımda değiştirebilirsiniz. Bu, şifrenizi korumanıza yardımcı olacaktır!</p>
                            <ol class="list-unstyled">
                                <li><span class="text-primary text-medium">1. </span>E-posta adresinizi girin.</li>
                                <li><span class="text-primary text-medium">2. </span>Sistemimiz size geçici mesaj gönderecek</li>
                                <li><span class="text-primary text-medium">3. </span>Şifrenizi sıfırlamak için mesajı kullanın</li>
                            </ol>
                            <?php
                            require 'php/sifremiunuttum.php';
                            ?>
                        </div>
                        <form class="card mt-4" method="post">
                            <div class="card-body">
                                <div class="form-group text-black">
                                    <label for="email-for-pass">E-posta adresinizi giriniz</label>
                                    <input class="form-control" type="email" id="email-for-pass" name="sifre-unuttum-email" required>
                                    <small class="form-text text-muted">Lütfen emailinizi kontrol ederek giriş sağlayınız!.</small>
                                </div>
                            </div>
                            <div class="card-footer"> <button class="btn btn-success" name="unuttum" type="submit">Devam et</button> <a href="index.php"><button class="btn btn-danger pull-right" type="button">Geri dön</button></a> </div>
                        </form>
                    </div>
                </div>
            </div>
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



