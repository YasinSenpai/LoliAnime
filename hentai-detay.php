<?php
require 'php/baglan.php';

$anime_adi = strip_tags(htmlspecialchars(trim($_GET["hentai_ad"])));
$hentai_sorgu = "SELECT * FROM anime_ekle WHERE anime_adi = '$anime_adi' ";
$hentai_kontrol = $db->query($hentai_sorgu);
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
    <title><?php echo $hentai_cikti['anime_adi']; ?></title>
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
    <div class="mb-4"></div>
    <?php
    require 'navbar.php';
    require 'php/lolihentai_userRegistersystem.php';
    ?>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="card background text-white col-lg-12" style="height: auto;">
                <div class="mb-3"></div>
                <div class="row">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="anime__details__pic set-bg" data-setbg="img/anime/details-pic.jpg" style="background-image: url('<?php echo $hentai_cikti['anime_kapak']; ?>'); margin-top: -10px; margin-bottom: 5px; object-fit: cover">
                            </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="anime__details__text">
                                <div class="anime__details__title">
                                    <h2 class="fontlu"><?php echo $hentai_cikti['anime_adi']; ?></h2>
                                    <span class="fontlu"><?php echo $hentai_cikti['anime_adi_jp']; ?></span>
                                </div>
                                <p><?php echo substr($hentai_cikti['anime_aciklama'] ,0,400); ?>...</p>
                                <div class="anime__details__widget">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="list-group">
                                                <div class="list-group-item text-white background">Anime Türü = <?php echo $hentai_cikti['anime_tur']; ?></div>
                                                <div class="list-group-item text-white background">Anime Yayınlanma Tarihi = <?php echo $hentai_cikti['anime_tarih']; ?></div>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <ul class="list-group">
                                                <div class="list-group-item text-white background">Anime Süresi = <?php echo $hentai_cikti['anime_sure']; ?></div>
                                                <div class="list-group-item text-white background">Toplam Bölüm Sayısı = <?php echo $hentai_cikti['anime_bolum']; ?></div>
                                            </ul>
                                        </div>
                                    </div>
                                    <form method="post">
                                        <div class="d-flex mt-5 justify-content-center">
                                            <?php $fav_name = $hentai_cikti['anime_adi']; $pp = $hentai_cikti['anime_kapak']; ?>
                                            <a href="hentai-izle.php"><div class="btn btn-outline-primary hentai-link mx-1 f-right">Son Bölüm</div></a>
                                            <?php
                                            if(isset($_SESSION['isim'])){
                                                $isim = $_SESSION['isim'];
                                                $favori = $db->prepare("SELECT * FROM anime_favs WHERE favori_kullanici = '$isim' AND favori_anime = '$fav_name' ");
                                                $favori->execute(array()); $favoric = $favori->fetch(PDO::FETCH_ASSOC);

                                                if($favori->rowCount() == 0){
                                                    echo '<button name="fav" class="btn btn-outline-danger hentai-link mx-1"><i class="bi-heart"></i></button>';
                                                }elseif($favori->rowCount() > 0){
                                                    echo '<button name="fav-sil" class="btn btn-outline-danger hentai-link mx-1"><i class="bi-heart-fill"></i></button>';
                                                }
                                                $anime_adi = $hentai_cikti['anime_adi'];

                                                if(isset($_POST['fav'])){
                                                    $fav_anime_ekle = $db->prepare("INSERT INTO anime_favs (favori_anime, favori_kullanici, favori_anime_pp) VALUES (?,?,?)");
                                                    $fav_anime_ekle->execute(array($anime_adi, $isim, $pp));
                                                }elseif(isset($_POST['fav-sil'])){
                                                    $fav_anime_sil = $db->exec("DELETE FROM anime_favs WHERE favori_anime = '$fav_name' AND favori_kullanici = '$isim' ");
                                                }
                                            }else{
                                                echo '<div data-mdb-toggle="modal" data-mdb-target="#girisModal" class="btn btn-outline-danger hentai-link mx-1"><i class="bi-heart"></i></div>';
                                            }

                                            ?>
                                            <a href="hentai-izle.php"><div class="btn btn-outline-light hentai-link mx-1 f-right">İlk Bölüm</div></a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            if(isset($fav_anime_ekle) == true){
                header('Location: hentai-detay.php?hentai_ad='.$anime_adi.'');

            }elseif(isset($fav_anime_sil) == true){
                header('Location: hentai-detay.php?hentai_ad='.$anime_adi.'');

            }
            ?>
            <div class="col-lg-6 text-white text-center border-1">
                <div class="card col-lg-12 background text-white">
                    <div class="card-header text-center">
                        <h3 class="fontlu">Oluşturan Kullanıcı = <?php echo $hentai_cikti['anime_fansub']; ?></h3>
                    </div>
                    <div class="card-body">
                       <div class="row">
                           <div class="col-sm-4">
                               <?php
                               $kadi = $hentai_cikti['anime_fansub'];
                               $hentai_sorgu2 = "SELECT * FROM anime_uye WHERE uye_kullaniciad = '$kadi' ";
                               $hentai_kontrol2 = $db->query($hentai_sorgu2);
                               $hentai_cikti2 = $hentai_kontrol2->fetch(PDO::FETCH_ASSOC);
                               ?>
                               <img src="<?php echo $hentai_cikti2['uye_pp'];?>" class="rounded-1 mb-2 justify-content-center" style="max-width: 136px;">
                           </div>
                           <div class="col-sm-6">
                               <?php
                               $kadi = $hentai_cikti['anime_fansub'];
                               $hentai_sorgu2 = "SELECT * FROM anime_ekle WHERE anime_fansub = '$kadi' ";
                               $hentai_kontrol2 = $db->query($hentai_sorgu2);
                               $hentai_kontrol->rowCount();
                               ?>
                               <ul class="list-group">
                                   <li class="list-group-item background">
                                       <?php echo 'Oluşturduğu animeler: <span class="badge rounded-pill badge-warning text-dark">'.$hentai_kontrol->rowCount().'</span>'; ?>
                                   </li>
                                   <li class="list-group-item background">
                                       <?php echo 'Yayınladığı Bölümler: <span class="badge rounded-pill badge-warning text-dark">'.$hentai_kontrol->rowCount().'</span>'; ?>
                                   </li>
                                   <li class="list-group-item background">
                                       Rütbe: <span class="badge rounded-pill badge-danger bg-danger text-dark mx-auto text-uppercase"><?php echo $hentai_cikti2['uye_tur']?></span>
                                   </li>
                               </ul>
                           </div>
                       </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-white text-center border-1">
                <div class="card col-lg-12 overflow-auto background text-white" style="min-height: 260px; max-height: 260px;">
                    <div class="card-header text-center">
                        <h3 class="fontlu"><?php echo $hentai_cikti['anime_adi']; ?> Bölümleri</h3>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="overflow-auto scrollbar">
                                <?php
                                $hentai_ad = $hentai_cikti['anime_adi'];
                                $hentai_sorgu4 = $db->prepare("SELECT * FROM anime_bolum WHERE anime_adi = ? order by anime_adi asc");
                                $hentai_sorgu4->execute(array($hentai_ad));
                                $hentai_al = $hentai_sorgu4->fetchAll(PDO::FETCH_ASSOC);
                                if($hentai_sorgu4->rowCount() < 1){
                                    echo '<div class="alert alert-warning">Herhangi bir bölüm eklenmemiştir.</div>';
                                }else{
                                    /*echo '<pre>';
                                    print_r($hentai_al);
                                    echo '</pre>'; */
                                    foreach ($hentai_al as $hentai){
                                        echo '<a href="hentai-izle.php?anime_adi='.$hentai['anime_adi'].'&anime_bolum='.$hentai['anime_bolum'].'"><div class="btn-sm btn-danger mx-1 mb-1"><i class="bi-eye"></i> '.$hentai['anime_adi'].'&nbsp;'.$hentai['anime_bolum'].'</div></a>';

                                    }
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center text-white" >
                <div class="card mb-4 background">
                    <div class="card-header">Ara</div>
                    <div class="card-body">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Aramak istediğiniz hentaiyi girin" aria-label="Aramak istediğiniz hentaiyi girin" aria-describedby="button-search" />
                            <button class="btn btn-outline-white" id="button-search" type="button"><i class="bi-search"></i> </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card mb-4 background text-white">
                    <div class="card-header text-center">Bizi takip et!</div>
                    <div class="card-body">
                        <div class="justify-content-center d-flex">
                            <div class="btn btn-outline-warning mx-2" style="max-width: 60px;"><i class="bi-instagram"></i> </div>
                            <div class="btn btn-outline-primary mx-2" style="max-width: 60px;"><i class="bi-discord"></i> </div>
                            <div class="btn btn-outline-info mx-2" style="max-width: 60px;"><i class="bi-twitter"></i> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    <footer class="bg-light text-center text-lg-start">
        <div class="text-center p-3 background">
            ©
            <a class="text-dark">LoliHentai.com</a>| Aikaiz3L
        </div>
    </footer>
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