<?php
require 'baglan.php';

/* Kendi database ayarlarınızı yapınız temel DB iskeleti şudur:

TEMEL DB ADI : anime
---------------
TABLOLAR:

anime_uye;
    id(primary)
    uye_adi(varchar 255, utf8_turkish_ci)
    uye_email(varchar 255, utf8_turkish_ci)
    uye_kullaniciad(varchar 255, utf8_turkish_ci)
    uye_pp(varchar 500, utf8md4_general_ci)
    uye_sifre(varchar 255, utf8_turkish_ci)
    uye_sifrereset(varchar 255, utf8_turkish_ci)
    uye_tur(varchar 255, utf8_turkish_ci)

anime_ekle;
    id(primary)
    anime_fansub(varchar 255, utf8md4_general_ci)
    anime_adi(varchar 255, utf8md4_general_ci)
    anime_adi_jp(varchar 255, utf8md4_general_ci)
    anime_tur(varchar 255, utf8md4_general_ci)
    anime_tarih(varchar 255, utf8md4_general_ci)
    anime_sure(varchar 255, utf8md4_general_ci)
    anime_bolum(int 11)
    anime_kapak(varchar 500, utf8md4_general_ci)
    anime_aciklama(varchar 500, utf8md4_general_ci)
    anime_eklenme_tarih(varchar 255, utf8md4_general_ci)

anime_bolum;
    id(primary)
    fansub_adi(varchar 255, utf8md4_general_ci)
    anime_adi(varchar 255, utf8md4_general_ci)
    anime_bolum(varchar 255, utf8md4_general_ci)
    link_google(varchar 500, utf8md4_general_ci)
    link_fembed(varchar 500, utf8md4_general_ci)
    link_vk(varchar 500, utf8md4_general_ci)
    link_sibnet(varchar 500, utf8md4_general_ci)
    link_hdvid(varchar 500, utf8md4_general_ci)
    link_voe(varchar 500, utf8md4_general_ci)
    link_mail(varchar 500, utf8md4_general_ci)
    link_odd(varchar 500, utf8md4_general_ci)

anime_duyuru;
    id(primary)
    duyuru_fs(varchar 255, utf8md4_general_ci)
    duyuru_baslik(varchar 255, utf8md4_general_ci)
    duyuru_yazi(varchar 255, utf8md4_general_ci)
    (GÜNCELLENECEK)

anime_favs;
    id(primary)
    favori_anime(varchar 255, utf8_turkish_ci)
    favori_kullanici(varchar 255, utf8_turkish_ci)
    favori_anime_pp(varchar 500, utf8md4_general_ci)

anime_watched;
    id(primary)
    anime_adi(varchar 255, utf8_turkish_ci)
    anime_bolum(varchar 255, utf8_turkish_ci)
    anime_k(varchar 255, utf8_turkish_ci)

anime_yorum;
    id(primary)
    anime_adi(varchar 255, utf8_turkish_ci)
    anime_bolum(varchar 255, utf8_turkish_ci)
    anime_kullanici(varchar 255, utf8_turkish_ci)
    anime_pp(varchar 500, utf8mb4_general_ci)
    anime_yorum(varchar 350, utf8_turkish_ci)
    (GÜNCELLENECEK)

Not: Lütfen kullanmadan önce ya da hata ile karşılaşmanız durumunda haber veriniz Discord: YasininFightClub#3200


*/
if(isset($_POST['k'])){
    $kadi = $_POST['k_kadi'];
    $kemail = $_POST['k_email'];
    $kisim = $_POST['k_isim'];
    $ksifre = md5($_POST['k_sifre']);
    $ksifretek = md5($_POST['k_sifre_tekrar']);
    $kpp = 'http://38.media.tumblr.com/9abb9b07e397dc003eb1917632668e2f/tumblr_mtwdpn7yhb1sjpd9do1_250.gif';

    if($ksifre != $ksifretek){
        echo '<div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Şifreleriniz eşleşmemektedir
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }else {
        $EmailSay = $db->prepare("SELECT * FROM anime_uye WHERE uye_kullaniciad = ?");
        $EmailSay->execute(array($kadi));
        $kontrol = $EmailSay->fetch(PDO::FETCH_ASSOC);
        if($kontrol > 0)
        {
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Girmiş olduğunuz kullanıcı adı kayıtlıdır.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else{
            try {
                $sorgu = $db->prepare("INSERT INTO anime_uye (uye_adi, uye_email, uye_kullaniciad, uye_sifre, uye_pp) VALUES (?,?,?,?,?)");
                $ekle = $sorgu->execute([
                    $kisim, $kemail, $kadi, $ksifre, $kpp
                ]);
            }catch (Exception $e){
                echo $e->getMessage();
            }
            if($ekle){
                $_SESSION['isim'] = $kadi;
                echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  Kayıt işlemi <strong>Başarlı!</strong> Sayfa yenileniyor...
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
if(isset($_POST['g'])){
    $gkadi = $_POST['g_kadi'];
    $gsifre = md5($_POST['g_sifre']);
    $ghatirla = $_POST['g_hatirla'];
    if (!$gkadi) {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Lütfen kullanıcı adınızı girin
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    } elseif (!$gsifre) {
        echo '
              <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Lütfen şifrenizi girin
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }else{
        $kullanicisor = $db->prepare("select * from anime_uye WHERE uye_kullaniciad = ? AND uye_sifre = ? ");
        $kullanicisor->execute([
            $gkadi, $gsifre
        ]);
        $say = $kullanicisor->rowCount();
        $af_kontrol = $kullanicisor->fetch(PDO::FETCH_ASSOC);
        if($say == 1){
            if($af_kontrol['uye_tur'] == "fansub"){
                $_SESSION['fansub'] = true;
            }elseif ($af_kontrol['uye_tur'] == "admin"){
                $_SESSION['admin'] = true;
            }elseif ($af_kontrol['uye_tur'] == "dev"){
                $_SESSION['dev'] = true;
            }
            $_SESSION['isim'] = $gkadi;
            echo '
                <div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  Giriş işlemi <strong>Başarılı!</strong> Sayfa yenileniyor...
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
            echo '<meta http-equiv="refresh" content="3;url=index.php">';
        } else {
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Böyle bir kullanıcı bulunamadı.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
}
if(isset($_POST['n_u'])){
    $newname = $_POST['new_username'];
    $suan = $_SESSION['isim'];

    $sorgu = $db->prepare("UPDATE anime_uye SET uye_kullaniciad = ? WHERE uye_kullaniciad = '$suan'");
    $sorgufs = $db->prepare("UPDATE anime_ekle SET anime_fansub = ? WHERE anime_fansub = '$suan'");
    $sorgua = $db->prepare("UPDATE anime_bolum SET fansub_adi = ? WHERE fansub_adi = '$suan'");

    $sorgu->bindParam(1, $newname, PDO::PARAM_STR);
    $sorgufs->bindParam(1, $newname, PDO::PARAM_STR);
    $sorgua->bindParam(1, $newname, PDO::PARAM_STR);


    $sorgu->execute();$sorgufs->execute();$sorgua->execute();

    if ($sorgu->rowCount() > 0 AND $sorgufs->rowCount() > 0 AND $sorgua->rowCount() > 0) {
        echo'<div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Başarılı!</strong> Kullanıcı adınız değiştirilmiştir.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        $_SESSION['isim'] = $newname;
        header("Location: hesabım.php");
    } else {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Kullanıcı adı başkası tarafından alınmış.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}

if(isset($_POST['pp'])){
    $pp = $_POST['uye_pp'];
    $suan = $_SESSION['isim'];
    $sorgu = $db->prepare("UPDATE anime_uye SET uye_pp = ? WHERE uye_kullaniciad = '$suan'");
    $sorgu->bindParam(1, $pp, PDO::PARAM_STR);
    $sorgu->execute();

    if (isset($sorgu)) {
        echo'<div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Başarılı!</strong> Profil Fotoğrafınız değiştirilmiştir.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        $_SESSION['pp'] = $pp;
        echo '<meta http-equiv="refresh" content="3;url=hesabım.php">';
    } else {
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Lütfen daha sonra tekrar deneyiniz!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }
}

if(isset($_POST['newpass'])){
    $yenis = md5($_POST['newpass_pass']);
    $yenist = md5($_POST['newpass_pass_again']);

    if($yenis != $yenist){
        echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Dikkat!</strong> Giridiğiniz şifreler eşleşmemektedir lütfen kontrol edip tekrar deneyiniz!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
    }else{
        $suan = $_SESSION['isim'];
        $sorgu = $db->prepare("UPDATE anime_uye SET uye_sifre = ? WHERE uye_kullaniciad = '$suan'");
        $sorgu->bindParam(1, $yenis, PDO::PARAM_STR);
        $sorgu->execute();

        if(isset($sorgu)){
            echo'<div class="alert alert-info alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Başarılı!</strong> Şifreniz başarıyla değiştirilmiştir.
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }else {
            echo '
                <div class="alert alert-warning alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Hata!</strong> Lütfen daha sonra tekrar deneyiniz!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
}
if (isset($_POST['hesapsil'])){
    $suan = $_SESSION['isim'];
    $sil = $db->prepare("DELETE FROM anime_uye WHERE uye_kullaniciad = '$suan'");
    if ($sil){
        echo '<div class="alert alert-danger alert-dismissible fade show col-md-12 f-right" role="alert">
                  <strong>Başarılı!</strong> Hesabınız silinmiştir çıkış yapılıyor...!
                  <button type="button" class="btn-close" data-mdb-dismiss="alert" aria-label="Close"></button>
                </div>';
        header("Location: index.php");
        session_destroy();
    }
}