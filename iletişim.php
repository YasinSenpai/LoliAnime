<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
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

        .scrollbar::-webkit-scrollbar {
            overflow-y: hidden;
            background-color:transparent;
            width:5px;
        }
        .scrollbar::-webkit-scrollbar:hover{
            overflow-y: auto;
        }
        .scrollbar::-webkit-scrollbar-thumb {
            background-color:#babac0;
            border-radius:16px;
        }
        .scrollbar::-webkit-scrollbar-thumb:hover {
            transition: 1s;
            background-color:#a0a0a5;
        }

        .scrollbar::-webkit-scrollbar-button {display:none}
    </style>
</head>
<body style="background-color: #333333">
<div class="container-fluid">
    <div class="container">
        <div class="mb-4"></div>
        <?php
        require 'navbar.php';
        ?>
        <div class="mb-3"></div>
        <div class="row d-flex justify-content-center">
            <div class="card col-md-10 background text-white">
                <div class="mb-2"></div>
                <h3 class="fontlu mb-4 text-center">İletişim</h3>
                <div class="container">
                </div>
                <div class="text-center mb-3">
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <a href="https://discord.gg/zQRyy7gv"><i class="bi-discord"></i></a>
                    </button>
                    <button type="button" class="btn btn-primary btn-floating mx-1">
                        <i class="bi-instagram"></i>
                    </button>
                    <div class="mb-3"></div>
                    <div class="alert alert-warning">Sayın kullanıcımız bizler ile discord üzerinden iletişime geçebilir ya da aşağıdaki formu doldurarak bize mail iletebilirsiniz...</div>
                    <div class="mb-3"></div>
                    <form method="post">
                        <select class="form-select mb-3 background text-white" style="color: white;" aria-label="sorun">
                            <option selected disabled>Lütfen bir departman seçiniz.</option>
                            <option value="1">Fansub Başvuruları</option>
                            <option value="2">Discord Sorunları</option>
                            <option value="3">Genel Destek</option>
                        </select>
                        <div class="form-outline form-white mb-3">
                            <input type="text" id="form1" name="" class="form-control" required />
                            <label class="form-label" for="form1">Adınız Soyadınız</label>
                        </div>
                        <div class="form-outline form-white mb-3">
                            <input type="email" id="form1" name="" class="form-control" required/>
                            <label class="form-label" for="form1">E-mail Adresiniz</label>
                        </div>
                        <div class="form-outline form-white mb-3">
                            <input type="text" id="form1" name="" class="form-control" required/>
                            <label class="form-label" for="form1">Mesaj Konusu - Başlık</label>
                        </div>
                        <div class="form-outline form-white mb-2">
                            <textarea class="form-control" id="textAreaExample" rows="4"required></textarea>
                            <label class="form-label" for="textAreaExample">Mesajınız</label>
                        </div>
                        <button class="btn btn-outline-danger" type="reset">Reset!</button>
                        <button class="btn btn-outline-success" name="ilt" type="submit">Gönder!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="js/main.js"></script>
<script src="js/mdb.min.js"></script>
<script>
    function realtime() {
        let time = moment().format('h:mm:ss a');
        document.getElementById('time').innerHTML = time;

        setInterval(() => {
            time = moment().format('h:mm:ss a');
            document.getElementById('time').innerHTML = time;
        }, 1000)
    }
    realtime();
</script>
</body>
</html>