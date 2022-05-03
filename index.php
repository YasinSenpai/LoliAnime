<!doctype html>
<html lang="tr">
<!--M. Yasin Özkaya tarafından kodlanmıştır-->
<!--PHP 7.4 sürümü kullanılmıştır-->
<!--Boostrap kütüphaneleri ile desteklenmiştir-->
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
               <div class="card background text-center col-md mx-1 text-white" style="max-height: 250px;">
                   <div class="card-header">Sponsor Reklam</div>
                   <div class="card-body">
                       <h1>SPONSOR REKLAM GELECEK</h1>
                   </div>
               </div>
               <div class="card background overflow-auto col-md mx-1 text-white" style="max-height: 250px;">
                   <div class="card-header text-center mb-3">Duyuru - Bilgilendirme</div>
                   <div class="overflow-auto scrollbar">
                       <?php
                       if(isset($_SESSION['admin']) || isset($_SESSION['fansub'])){
                           echo '<p class="note note-danger text-dark">
                           <strong>Fansub - Admin Özel:</strong> Sayın Fansub kullanıcımız. Fansub ve Admin hesaplarının Kullanıcı Adı değiştirmesi geçici olarak yasaklanmıştır anlayışınız için teşekkürler.
                       </p>';
                       }
                       ?>
                       <p class="note note-info text-dark">
                           <strong>Bilgilendirme:</strong> Güvenlik protokollerimiz sebebiyle hiçbir çerezinizi kayıt altında tutmuyoruz.
                           ondan dolayı tarayıcı kapatıldığı an oturumunuz sonlandırılacaktır anlayışınız için teşekkürler.
                       </p>
                       <p class="note note-info text-dark">
                           <strong>Bilgilendirme:</strong> Güvenlik protokollerimiz sebebiyle hiçbir çerezinizi kayıt altında tutmuyoruz.
                           ondan dolayı tarayıcı kapatıldığı an oturumunuz sonlandırılacaktır anlayışınız için teşekkürler.
                       </p>
                   </div>
               </div>
               <div class="card background col-md mx-1 text-white" style="max-height: 250px;">
                   <div class="card-header mb-3">Fansub Duyuru</div>
                   <div class="overflow-auto scrollbar">
                       <?php
                       $fsduyuru_sorgu = "SELECT * FROM anime_duyuru ";
                       $fsduyuru_kontrol = $db->query($fsduyuru_sorgu);
                       while ($fsduyuru_cikti = $fsduyuru_kontrol->fetch(PDO::FETCH_ASSOC)){
                           echo '<p class="note note-warning text-dark">
                            <strong>'.$fsduyuru_cikti['duyuru_fs'].': </strong><b>'.$fsduyuru_cikti['duyuru_baslik'].'</b><br>'.$fsduyuru_cikti['duyuru_yazi'].'
                            </p>';
                       }
                       ?>
                       <p class="note note-warning text-dark">
                           <strong>Akatsuki FS:</strong> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Autem cumque distinctio dolorem ea eaque inventore, magni minus non praesentium qui reiciendis saepe velit, voluptatum! Dignissimos fugiat quia quos veniam voluptatem.
                       </p>
                   </div>
               </div>
        </div>
        <div class="row">
            <div class="card background text-white col-lg-8">
               <div class="row">
                   <div class="mb-3"></div>
                   <?php

                   $Sayfa   = @ceil($_GET['sayfa']);
                   if ($Sayfa < 1) { $Sayfa = 1;}
                   $Say = $db->query("select * from anime_ekle order by id DESC");
                   $ToplamVeri   = $Say->rowCount();
                   $Limit	= 6;
                   $Sayfa_Sayisi	= ceil($ToplamVeri/$Limit);
                   if($Sayfa > $Sayfa_Sayisi){$Sayfa = $Sayfa_Sayisi;}
                   $Goster   = $Sayfa * $Limit - $Limit;
                   $GorunenSayfa   = 5;
                   $Makale	= $db->query("select * from anime_ekle order by id DESC limit $Goster,$Limit");
                   $MakaleAl = $Makale->fetchAll(PDO::FETCH_ASSOC);

                   date_default_timezone_set('Europe/Istanbul');

                   // Zaman Fonksiyon'u
                   function time_ago($datetime){

                       $now = new DateTime;
                       $ago = new DateTime($datetime);
                       $diff = $now->diff($ago);

                       $diff->w = floor($diff->d / 7);
                       $diff->d -= $diff->w * 7;

                       $time_arr = [
                           'y' => 'Yıl',
                           'm' => 'Ay',
                           'w' => 'Hafta',
                           'd' => 'Gün',
                           'h' => 'Saat',
                           'i' => 'Dakika',
                           's' => 'Saniye'
                       ];
                       foreach($time_arr as $k => &$v){
                           if($diff->$k){
                               $v = $diff->$k . ' ' . $v;
                           }else{
                               unset($time_arr[$k]);
                           }
                       }

                       return $time_arr ? implode(', ', array_slice($time_arr, 0, 1)) . ' önce' : 'hemen şimdi';
                   }
                   ?>
                   <?php foreach($MakaleAl as $MakaleCek){?>
                       <div class="col-lg-4 col-md-4 col-sm-4">
                           <div class="product__item">
                               <div class="product__item__pic set-bg" style="background-image: url('<?=$MakaleCek["anime_kapak"]?>')">
                                   <div class="ep">Oluşturan - <?=$MakaleCek["anime_fansub"]?></div>

                               </div>
                               <div class="product__item__text">
                                   <h5 class="text-center"><a href="hentai-detay.php?hentai_ad=<?php echo $MakaleCek['anime_adi'];?>"><?=$MakaleCek["anime_adi"];?></a></h5>
                                   <h6 class="text-center text-muted small"><a href="#"><?=$MakaleCek["anime_adi_jp"]; $_SESSION['anime_name_jp'] = $MakaleCek["anime_adi_jp"];?></a></h6>
                                   <ul>
                                       <li> <i class="bi-clock"></i> <?php echo time_ago($MakaleCek["anime_eklenme_tarih"]); ?> </li>
                                   </ul>
                               </div>
                           </div>
                       </div>

                   <?php } ?>
                <?php if($Sayfa > 1){?>
                   <a href="index.php?sayfa=<?=$Sayfa - 1?>"><div class="btn btn-outline-light f-left mb-3 mt-1">Önceki</div></a>
                <?php } ?>

                <?php if($Sayfa != $Sayfa_Sayisi){?>
                    <a href="index.php?sayfa=<?=$Sayfa + 1?>"><div class="btn btn-outline-light f-right mb-3 mt-1">Sonraki</div></a>
                <?php } ?>
               </div>
            </div>
            <div class="col-lg-4 text-center text-white" >
                <div class="card mb-4 background">
                    <div class="card-header">Ara</div>
                    <div class="card-body">
                       <form method="post">
                           <div class="input-group rounded">
                               <input type="search" name="q" class="form-control rounded" placeholder="Aramak istediğiniz hentaiyi girin..." aria-label="ara" aria-describedby="search-addon" />
                               <span class="input-group-text border-0" id="search-addon">
                                <i class="bi-search"></i>
                            </span>
                           </div>
                       </form>
                    </div>
                </div>
                <div class="card mb-4 background">
                    <div class="card-header">Kategoriler</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!"><i class="bi bi-filter"></i> Aksiyon </a></li>
                                    <li><a href="#!"><i class="bi bi-filter"></i> Romantizm</a></li>
                                    <li><a href="#!"><i class="bi bi-filter"></i> Dram</a></li>
                                </ul>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="#!"><i class="bi bi-filter"></i> Macera</a></li>
                                    <li><a href="#!"><i class="bi bi-filter"></i> Konulu</a></li>
                                    <li><a href="#!"><i class="bi bi-filter"></i> Lise</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4 background">
                    <div class="card-header">Yeni Eklenen Animeler</div>
                    <div class="card-body">
                        <?php

                        $hentai_sorgu = "SELECT * FROM anime_ekle ORDER BY id desc LIMIT 5";
                        $hentai_kontrol = $db->query($hentai_sorgu);
                        while ($hentai_cikti = $hentai_kontrol->fetch(PDO::FETCH_ASSOC)){?>
                            <a href="hentai-detay.php?hentai_ad=<?php echo $hentai_cikti['anime_adi'];?>"><btn class="btn btn-outline-light mx-1 mb-1"><?=$hentai_cikti["anime_adi"];?></btn></a><?php } ?>
                    </div>
                </div>
                <div class="card mb-4 background">
                    <div class="card-header">Bizi Takip et!</div>
                    <div class="row">
                        <div class="card-body">
                            <div class="mx-auto">
                                <div class="btn btn-outline-warning mx-2" style="max-width: 60px;"><i class="bi-instagram"></i> </div>
                                <div class="btn btn-outline-primary mx-2" style="max-width: 60px;"><i class="bi-discord"></i> </div>
                                <div class="btn btn-outline-info mx-2" style="max-width: 60px;"><i class="bi-twitter"></i> </div>
                            </div>
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