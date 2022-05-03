<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require_once 'baglan.php';

$kod = (rand(0,999999999));
if(isset($_POST['unuttum'])){
    $email = trim($_POST['sifre-unuttum-email']);
    if(!$email){
        echo '<div class="alert alert-danger">Lütfen bir email adresi girin!</div>';
    } else {
        $query = $db ->prepare("SELECT * FROM anime_uye WHERE uye_email =?");
        $query->execute(array($email));
        $row = $query->fetch(PDO::FETCH_ASSOC);
        $kontrol = $query->rowCount();

        if ($kontrol) {
            try {
                $sifirlalink = "http://localhost/LoliAnime/sifrereset.php?kod=".$kod;
                $sifirlakod = $db -> prepare("UPDATE anime_uye SET uye_sifrereset = :k WHERE uye_email = :e ");
                $sifirlakod ->execute([':k' => $kod, ':e' =>$email]);

                require 'Exception.php';
                require 'PHPMailer.php';
                require 'SMTP.php';

                $mail = new PHPMailer(true);
                $mail ->SMTPDebug =3;
                $mail->isSMTP();
                $mail->SMTPAuth = true;
                $mail->SMTPSecure = 'tls';
                $mail->CharSet = 'UTF-8';
                $mail->Host = "smtp.gmail.com";
                $mail->Port = 587; // guvenli=465
                $mail->SMTPDebug = 0;
                $mail->Username = 'email adresiniz';
                $mail->Password = 'şifreniz';
                $mail->setFrom('pykatoneanime@gmail.com', 'Loli Hentai Şifre reset');
                $mail->addAddress($email);
                $mail ->Body = '<div style="text-align: center">Merhabalar sayın <b>'.$row['uye_kullaniciad'].'</b> Kodunuz: <b>'.$kod.'</b><br><b>'.$sifirlalink.'</b><br>Yukarıdaki linke basarak gidebilirsiniz...<br><img src="https://o.remove.bg/downloads/cdb17575-fbea-4671-ba26-3588414a63c4/unnamed-removebg-preview.png" width="400" height="400"><br><small>Pykatone (Anime Departmanı) İyi Günler Diler</small></div>';
                $mail->isHTML(true);
                $mail->Subject = 'Loli Hentai';

                if ($mail->Send()) {
                    echo '<div class="alert alert-success">Şifre sıfırlama linkiniz gönderilmiştir!</div>';
                } else {
                    echo '<div class="alert alert-danger">Bir hata meydana geldi!</div>';
                }
            }catch(Exception $e){
                echo $e->getMessage();
            }

        } else{
            echo '<div class="alert alert-warning">Böyle bir Email bulunamadı!</div>';
        }
    }



}





?>



