<?php

require 'baglan.php';
require 'sifremiunuttum.php';

if(isset($_POST['sifre-reset'])){
    $host = $_SERVER['HTTP_HOST'];
    $yenisifre = $_POST['yeni-sifre'];
    $yenisifretekrar = $_POST['yeni-sifre-tekrar'];

    $email = trim($_POST['sifre-unuttum-email']);
    $query = $db ->prepare("SELECT * FROM anime_uye WHERE uye_email =?");
    $query->execute(array($email));
    $row = $query->fetch(PDO::FETCH_ASSOC);
    $kontrol = $query->rowCount();

    if($kontrol){

        if(!$yenisifre || !$yenisifretekrar){
            echo '<div class="alert alert-warning">Lütfen boş alanları doldurun!</div>';
        } elseif($yenisifre != $yenisifretekrar){
            echo '<div class="alert alert-danger">Şifreleriniz eşleşmiyor!</div>';
        } else{
            $yenisifre = md5($yenisifre);
            $guncelle = $db->prepare("UPDATE anime_uye SET uye_sifre='$yenisifre' WHERE uye_email='$email'");
            $guncelle->execute();

            if($guncelle){
                echo '<div class="alert alert-success">Şifre değiştirme işlemi başarılı!</div>';
                echo '<head><meta http-equiv="refresh" content"2;index.php"></head>';
            } else{

                echo '<div class="alert alert-danger">Bir hata meydana geldi!</div>';

            }


        }

    }else{
        echo '<div class="alert alert-danger">Bir hata meydana geldi!</div>';
    }
}



?>