<?php
require 'baglan.php';

if(isset($_POST['anime_fansub'])){

    $fansub = $_SESSION['isim'];
    $anime = $_POST['anime_ad'];
    $animejp = $_POST['anime_ad_jp'];
    $kategori = $_POST['anime_kategori'];
    $tarih = $_POST['anime_tarih'];
    $anime_sure = $_POST['anime_b_sure'];
    $anime_bolum = $_POST['anime_b'];
    $fotograf = $_POST['anime_kapak'];
    $aciklama = $_POST['anime_aciklama'];
    $saat_tarih = date('Y-m-d H:i:s');

    $animekontrol = $db->prepare("SELECT * FROM anime_ekle WHERE anime_ad = ?");
    $animekontrol->execute(array($anime));
    $kontrol = $animekontrol->fetch(PDO::FETCH_ASSOC);
    if($kontrol > 0){
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz Anime kayıtlıdır.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }else{
        try {
            $sorgu = $db->prepare("INSERT INTO anime_ekle (anime_fansub, anime_adi, anime_adi_jp ,anime_tur, anime_tarih, anime_sure, anime_bolum, anime_kapak, anime_aciklama, anime_eklenme_tarih) VALUES (?,?,?,?,?,?,?,?,?,?)");
            $ekle = $sorgu->execute([
                $fansub, $anime, $animejp, $kategori, $tarih, $anime_sure, $anime_bolum, $fotograf, $aciklama, $saat_tarih
            ]);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        if($ekle){
            echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  Anime Ekleme İşlemi <strong>Başarlı!</strong> Sayfa yenileniyor...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            echo '<meta http-equiv="refresh" content="3;url=index.php">';
        }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Beklenmedik bir hata meydana geldi lütfen daha sonra tekrar deneyin.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }

}
if(isset($_POST['duyuru_fansub'])) {
    $fansub = $_SESSION['isim'];

    $baslik = $_POST['fansub_baslik'];
    $yazi = $_POST['fansub_duyuru'];

    $animekontrol = $db->prepare("SELECT * FROM anime_duyuru WHERE duyuru_yazi = ?");
    $animekontrol->execute(array($yazi));
    $kontrol = $animekontrol->fetch(PDO::FETCH_ASSOC);
    if ($kontrol > 0) {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz Duyuru kayıtlıdır.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }else{
        try {
            $sorgu = $db->prepare("INSERT INTO anime_duyuru (duyuru_fs, duyuru_baslik, duyuru_yazi) VALUES (?,?,?)");
            $ekle = $sorgu->execute([
                $fansub, $baslik, $yazi
            ]);
        }catch (Exception $e){
            echo $e->getMessage();
        }
        if($ekle){
            echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  Duyuru Ekleme İşlemi <strong>Başarlı!</strong> Sayfa yenileniyor...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            echo '<meta http-equiv="refresh" content="3;url=index.php">';
        }else{
            echo '
                <div class="alert alert-danger alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Beklenmedik bir hata meydana geldi lütfen daha sonra tekrar deneyin.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
}
if(isset($_POST['anime_b'])){
    $fansub = $_SESSION['isim'];
    $anime_ad = $_POST['anime_bolum_ad'];
    $anime_b = $_POST['anime_bolum'];

    // anime kontrol

    $animekontrol = $db->prepare("SELECT * FROM anime_ekle WHERE anime_adi = ?");
    $animekontrol->execute(array($anime_ad));
    $kontrol = $animekontrol->fetch(PDO::FETCH_ASSOC);
    if($kontrol == 0){
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz Anime bulunamadı!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }else{
        // link kontrol (aynı bölümün 2 defa atılmaması için)

        $bolumkontrol = $db->prepare("SELECT * FROM anime_bolum WHERE fansub_ad = ? AND anime_adi = ? AND anime_bolum = ?");
        $bolumkontrol->execute(array($fansub, $anime_ad, $anime_b));
        $kontrol = $bolumkontrol->fetch(PDO::FETCH_ASSOC);
        if($kontrol > 0){
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz Anime bölümü sisteme kayıtlı! kontrol ediniz: '.$fansub.' = '.$anime_ad.' - '.$anime_b.'
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else{
            // linklerin kaydı
            $fembed = $_POST['anime_fembed'];
            $google = $_POST['anime_google'];
            $vk = $_POST['anime_vk'];
            $sibnet = $_POST['anime_sibnet'];
            $hdvid = $_POST['anime_hdvid'];
            $voe = $_POST['anime_voe'];
            $mail = $_POST['anime_mail'];
            $odd = $_POST['anime_odd'];

            // anime link kontrol
            if($fembed == "" AND $google == "" AND $vk == "" AND $sibnet == "" AND $hdvid == "" AND $voe == "" AND $mail == "" AND $odd == ""){
                echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> En az 1 tane anime linki girmek zorundasınız.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            }else{
                $sorgu = $db->prepare("INSERT INTO anime_bolum (fansub_adi, anime_adi, anime_bolum, link_google, link_fembed, link_vk, link_sibnet, link_hdvid, link_voe, link_mail, link_odd) VALUES (?,?,?,?,?,?,?,?,?,?,?)");
                $ekle = $sorgu->execute([
                    $fansub, $anime_ad, $anime_b, $google, $fembed, $vk, $sibnet, $hdvid, $voe, $mail, $odd
                ]);
                if($ekle){
                    echo '
                        <div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                          Anime bölüm Ekleme İşlemi <strong>Başarlı!</strong> Sayfa yenileniyor...
                          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                        </div>';
                    echo '<meta http-equiv="refresh" content="3;url=index.php">';
                }else{
                    echo '
                        <div class="alert alert-danger alert-dismissible fade show col-md-12 f-right" role="alert">
                          <strong>Hata!</strong> Beklenmedik bir hata meydana geldi lütfen daha sonra tekrar deneyin.
                          <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                        </div>';
                }
            }

        }
    }
}

