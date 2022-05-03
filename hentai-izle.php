<?php
require 'php/baglan.php';
$anime_adi = strip_tags(htmlspecialchars(trim($_GET["anime_adi"])));
$anime_bolum = strip_tags(htmlspecialchars(trim($_GET["anime_bolum"])));
$hentai_sorgu = "SELECT * FROM anime_bolum WHERE anime_adi = ? AND anime_bolum = ? ";
$hentai_kontrol = $db->prepare($hentai_sorgu);
$hentai_kontrol->execute(array($anime_adi, $anime_bolum));
$hentai_cikti = $hentai_kontrol->fetch(PDO::FETCH_ASSOC);
if($hentai_kontrol->rowCount() == 0){
      header("Location: 404.html");
}
?>
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
        ::-webkit-scrollbar{
            max-width: 10px;
        }
        .iframe_border{
            border: 1px solid #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="mb-4"></div>
        <?php
        require 'navbar.php';
        require 'php/lolihentai_userRegistersystem.php';

        $link_sorgu = $db->prepare("SELECT * FROM anime_bolum WHERE anime_adi = ? and anime_bolum = ?");
        $link_sorgu->execute(array($anime_adi, $anime_bolum));
        $link_cikti = $link_sorgu->fetch(PDO::FETCH_ASSOC);
        ?>
    </div>
    <div class="container">
        <form method="post">
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-white background">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="embed-responsive embed-responsive-4by3 mb-3">
                                        <?php
                                        if(isset($_POST['google'])){
                                            echo '<iframe class="embed-responsive-item rounded" src="'.$link_cikti['link_google'].'" allowfullscreen></iframe>';
                                        }elseif(isset($_POST['fembed'])){
                                            echo '<iframe class="embed-responsive-item rounded" src="'.$link_cikti['link_fembed'].'" allowfullscreen></iframe>';
                                        }elseif(isset($_POST['vk'])){
                                            echo '<iframe class="embed-responsive-item rounded" src="'.$link_cikti['link_vk'].'" allowfullscreen></iframe>';
                                        }elseif(isset($_POST['hdvid'])){
                                            echo '<iframe class="embed-responsive-item rounded" src="'.$link_cikti['link_hdvid'].'" allowfullscreen></iframe>';
                                        }elseif(isset($_POST['voe'])){
                                            echo '<iframe class="embed-responsive-item rounded" src="'.$link_cikti['link_voe'].'" allowfullscreen></iframe>';
                                        }elseif(isset($_POST['mail'])){
                                            echo '<iframe class="embed-responsive-item rounded" src="'.$link_cikti['link_mail'].'" allowfullscreen></iframe>';
                                        }elseif(isset($_POST['odd'])){
                                            echo '<iframe class="embed-responsive-item rounded" src="'.$link_cikti['link_odd'].'" allowfullscreen></iframe>';
                                        }elseif(isset($_POST['sibnet'])){
                                            echo '<iframe class="embed-responsive-item rounded" src="'.$link_cikti['link_sibnet'].'" allowfullscreen></iframe>';
                                        }elseif(!isset($_POST['fembed']) AND !isset($_POST['vk']) AND !isset($_POST['voe']) AND !isset($_POST['hdvid']) AND !isset($_POST['google']) AND !isset($_POST['odd']) AND !isset($_POST['sibnet']) AND !isset($_POST['mail'])){
                                            echo '<div class="alert alert-warning">Lütfen bir kaynak seçiniz.</div>';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card text-white" style="background: #333333;">
                                        <div class="card-header text-center fontlu">
                                            <?php echo $anime_adi, '&nbsp', $anime_bolum;     ?>
                                        </div>
                                        <div class="card-body justify-content-center">
                                            <?php
                                            $link_sorgu2 = $db->prepare("SELECT * FROM anime_bolum WHERE anime_adi = ? AND anime_bolum =?");
                                            $link_sorgu2->execute(array($anime_adi, $anime_bolum));
                                            while($link_cikti2 = $link_sorgu2->fetch(PDO::FETCH_ASSOC)){
                                                if($link_cikti2['link_google']!= ""){
                                                    echo '<button class="btn btn-lg btn-outline-info btn-sm fontlu text-center mx-1" type="submit" name="google">Google Drive</button>';
                                                }if($link_cikti2['link_fembed']!= ""){
                                                    echo '<button class="btn btn-outline-info btn-sm fontlu text-center mx-1" type="submit" name="fembed">Fembed</button>';
                                                }if($link_cikti2['link_vk']!= ""){
                                                    echo '<button class="btn btn-outline-info btn-sm fontlu text-center mx-1" type="submit" name="vk">VK</button>';
                                                }if($link_cikti2['link_sibnet'] != ""){
                                                    echo '<button class="btn btn-outline-info btn-sm fontlu text-center mx-1" type="submit" name="sibnet">Sibnet</button>';
                                                }if($link_cikti2['link_hdvid'] != ""){
                                                    echo '<button class="btn btn-outline-info btn-sm fontlu text-center mx-1" type="submit" name="hdvid">Hdvid</button>';
                                                }if($link_cikti2['link_mail'] != ""){
                                                    echo '<button class="btn btn-outline-info btn-sm fontlu text-center mx-1" type="submit" name="mail">Mail Ru</button>';
                                                }if($link_cikti2['link_voe'] != ""){
                                                    echo '<button class="btn btn-outline-info btn-sm fontlu text-center mx-1" type="submit" name="voe">VOE</button>';
                                                }if($link_cikti2['link_odd'] != ""){
                                                    echo '<button class="btn btn-outline-info btn-sm fontlu text-center mx-1" type="submit" name="odd">odnoklassniki</button>';
                                                }

                                            }
                                             ?>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="btn btn-outline-white mx-2">Sonraki Bölüm</div>
                                        <div class="btn btn-outline-light mx-2 mt-1">Önceki Bölüm</div>
                                    </div>
                                    <div class="alert alert-dismissible fade show col mt-4" role="alert" style="background: #333333;">
                                        <div class="fontlu alert-heading">Fansub Bilgi Panosu!</div>
                                        <hr class="ince">
                                        <a href="iletişim.php"><strong class="small">Manime TV Çevirmen - Encoder Alımlarımız Açık!</strong></a><br>
                                        Çevirmenliğe ilgisi olan veya merak eden saygılı, kendinizden emin birisiyseniz aramıza bekleriz.
                                        <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    <div class="btn text-white justify-content-center">Bölümü Bildir</div>
                                    <form method="post">
                                        <?php
                                        if(isset($_SESSION['isim'])){
                                            $name = $_SESSION['isim'];
                                            $watched = $db->prepare("SELECT * FROM anime_watched WHERE anime_adi = '$anime_adi' AND anime_bolum = '$anime_bolum' AND anime_k = '$name'");
                                            $watched->execute(array());
                                            if($watched->rowCount() == 0){
                                                echo '<button name="watched" class="btn btn-outline-info hentai-link text-white justify-content-center"><i class="bi-eye"></i> İzlediklerime ekle!</button>';
                                            }elseif($watched->rowCount() > 0){
                                                echo '<button name="unwatched" class="btn btn-outline-danger hentai-link text-white justify-content-center small"><i class="bi-eye-slash"></i> İzledikler. kaldır!</button>';
                                            }

                                            if(isset($_POST['watched'])){
                                                $wadd = $db->prepare("INSERT INTO anime_watched (anime_adi, anime_bolum, anime_k) VALUES (?,?,?)");
                                                $wadd->execute(array($anime_adi, $anime_bolum, $name));
                                                if(!isset($wadd)){
                                                    echo '<a href="iletişim.php"><div class="note note-danger">Hata! lütfen developer ile iletişime geçin!</div></a>';
                                                }else{
                                                    header('Location: hentai-izle.php?anime_adi='.$anime_adi.'&anime_bolum='.$anime_bolum.'');
                                                }
                                            }elseif(isset($_POST['unwatched'])){
                                                $wdelete = $db->exec("DELETE FROM anime_watched WHERE anime_adi = '$anime_adi' AND anime_bolum = '$anime_bolum' AND anime_k = '$name' ");
                                                header('Location: hentai-izle.php?anime_adi='.$anime_adi.'&anime_bolum='.$anime_bolum.'');

                                            }

                                        }else{
                                            echo '<div data-mdb-target="#girisModal" data-mdb-toggle="modal" class="btn btn-outline-info hentai-link text-white justify-content-center"><i class="bi-eye"></i> İzlediklerime ekle!</div>';

                                        }

                                        ?>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="card col-md-4 background justify-content-center align-self-center align-items-center text-white mt-1">
                    <div class="card-header text-center fontlu"><?php echo "Ekleyen kullanıcı: " ,$link_cikti['fansub_adi'];?></div>
                    <div class="card-body justify-content-center">
                        <?php
                        $name = $link_cikti['fansub_adi'];
                        $anime_detay_card = $db->prepare("SELECT * FROM anime_uye WHERE uye_kullaniciad = '$name'");
                        $anime_detay_card->execute();
                        $details = $anime_detay_card->fetch(PDO::FETCH_ASSOC);
                        ?>
                        <div class="row">
                            <div class="col-sm-2 mb-1 justify-content-center" style="margin-right: 60px;">
                                <img src="<?php echo $details['uye_pp'];?>" class="rounded-1 justify-content-center align-items-center" style="max-width: 100px;">
                            </div>
                            <div class="col" style="max-width: 250px">
                                <ul class="list-group">
                                    <li class="list-group-item background">
                                        <?php echo 'Oluşturduğu animeler: <span class="badge rounded-pill badge-warning text-dark">'.$anime_detay_card->rowCount().'</span>'; ?>
                                    </li>
                                    <li class="list-group-item background">
                                        <?php echo 'Yayınladığı Bölümler: <span class="badge rounded-pill badge-warning text-dark">'.$anime_detay_card->rowCount().'</span>'; ?>
                                    </li>
                                    <li class="list-group-item background">
                                        Rütbe: <span class="badge rounded-pill badge-danger bg-danger text-dark mx-auto text-uppercase"><?php echo $details['uye_tur']?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <style>
                            .btn-background{
                                background-color: #3c3c3c;
                                transition: 0.5s;
                                color: white;
                            }.btn-background:hover{
                                 background-color: #333333;
                             }
                        </style>
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-background">Bildir</button>
                            <button type="button" class="btn btn-background">Profil</button>
                            <button type="button" class="btn btn-background">M. Gönder</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-8 mt-1">
                    <form method="post">
                        <div class="card background text-white" style="max-height: 340px; min-height: 340px;">
                            <h5 class="card-header text-center fontlu">Yorumlar</h5>
                            <div class="card-body">
                                <?php
                                $yorum = $db->prepare("SELECT * FROM anime_yorum WHERE anime_adi = '$anime_adi' AND anime_bolum = '$anime_bolum'");
                                $yorum->execute(array());

                                $yorum_chat = @$_POST['yorum'];

                                $ppS = $db->prepare("SELECT * FROM anime_uye WHERE uye_kullaniciad = '$name'");
                                $ppS->execute(array());
                                $ppc = $ppS->fetch(PDO::FETCH_ASSOC);

                                $pp = $ppc['uye_pp'];

                                if($yorum->rowCount() == 0){
                                    echo '<div class="alert alert-primary" style="margin-top: 50px;"><strong>Dikkat!</strong> Bu bölüm için herhangi bir yorum yapılmamış ilk yorumu siz yapmak istermisiniz?</div>';
                                }elseif($yorum->rowCount() > 0){
                                    echo 'basarılı';
                                }

                                $yorum_ekle = $db->prepare("INSERT INTO anime_bolum (anime_adi, anime_bolum, anime_kullanici, anime_pp, anime_yorum) VALUES (?,?,?,?,?)");
                                $yorum_ekle->execute(array($anime_adi, $anime_bolum, $name, $pp, $yorum_chat));
                                if(!isset($yorum_ekle)){
                                    echo '<div class="alert alert-danger"><strong>Dikkat!</strong> Bir hata meydana geldi lütfen daha sonra tekrar deneyiniz</div>';
                                }


                                ?>
                            </div>
                            <div class="card-footer">
                                <div class="input-group">
                                    <div class="form-outline col-md-11">
                                        <?php 
                                        if(isset($_SESSION['isim'])){
                                            echo '<div class="form-outline">
                                          <textarea class="form-control" id="textAreaExample" rows="4"></textarea>
                                          <label class="form-label" for="textAreaExample">Message</label>
                                        </div>';
                                        }else{
                                            echo '<div class="alert alert-danger"><strong>Dikkat!</strong> Yorum yazabilmeniz için giriş yapmanız gerekmektedir...</div>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </form>
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