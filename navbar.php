<?php
session_start();
ob_start();
require 'php/baglan.php';
?>
<nav class="navbar sticky-top navbar-expand-lg navbar-light mb-4" style="background-color: #3c3c3c; border-radius: 5px;">
    <div class="container">
        <a class="navbar-brand" href="#"
        ><img
                id="MDB-logo"
                class="rounded"
                src="images/logo.png"
                alt="MDB Logo"
                draggable="false"
                height="30"
                width="60"
                style="object-fit: cover"
            /></a>
        <button
            class="navbar-toggler"
            type="button"
            data-mdb-toggle="collapse"
            data-mdb-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <i class="bi-list text-white"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center ">
                <li class="nav-item">
                    <a class="nav-link mx-4 text-white" href="index.php"><i class="bi-circle pe-2"></i>Ana Sayfa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-4 text-white" href="#!"><i class="bi-bell pe-2"></i>Manga Oku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-4 text-white" href="iletişim.php"><i class="bi-heart pe-2"></i>İletişim</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mx-4 text-white" href="https://discord.gg/Wd3fEKH6"><i class="bi-people pe-2"></i>Topluluk Sunucumuz</a>
                </li>
                <li class="nav-item"><div class="mx-4"></div></li>
                <li class="nav-item">
                    <?php
                    if(isset($_SESSION['isim'])){
                        echo '<div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">';

                        $isim = $_SESSION['isim'];
                        $pp_sorgu = "SELECT uye_pp FROM anime_uye WHERE uye_kullaniciad = '$isim' ";
                        $pp_kontrol = $db->query($pp_sorgu);
                        if($pp_kontrol->rowCount() > 0){
                            $pp_cikti = $pp_kontrol->fetch(PDO::FETCH_ASSOC);
                            echo '<img class="img-fluid rounded-circle" width="40" src="'.$pp_cikti['uye_pp'].'">';
                        }elseif ($pp_kontrol->rowCount() == 0){
                            echo '<img class="img-fluid rounded-circle" width="40" src="images/user.png" >';
                        }

                    echo '</a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">
                        <li><a class="dropdown-item disabled" disabled>'.$_SESSION['isim'].'</a></li>
                        <li><a class="dropdown-item" href="hesabım.php">Hesabım</a></li>
                        <li><a class="dropdown-item" href="#">İletişim</a></li>
                        <li><a class="dropdown-item" href="php/logout.php">Çıkış</a></li>
                    </ul>
                </div>
            </div>';
                    }elseif(!isset($_SESSION['isim'])){
                        echo '<div class="btn btn-outline-white mx-1" data-mdb-toggle="modal" data-mdb-target="#kayitModal">Kayıt ol</div>
            <div class="btn btn-outline-info" data-mdb-toggle="modal" data-mdb-target="#girisModal">Giriş yap</div>';
                    }
                    ?>
                </li>
            </ul>
        </div>
    </div>
</nav>


<div
        class="modal fade"
        id="kayitModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Kayıt ol</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-outline mb-4">
                        <i class="bi-person trailing"></i>
                        <input type="text" id="form1" name="k_kadi" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">Kullanıcı Adınız</label>
                    </div>
                    <div class="form-outline mb-4">
                        <i class="bi-pen trailing"></i>
                        <input type="text" id="form1" name="k_isim" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">İsminiz</label>
                    </div>
                    <div class="form-outline mb-4">
                        <i class="bi-envelope trailing"></i>
                        <input type="email" id="form1" name="k_email" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">Email Adresiniz</label>
                    </div>
                    <div class="form-outline mb-4">
                        <i class="bi-lock trailing"></i>
                        <input type="password" id="form1" name="k_sifre" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">Şifreniz</label>
                    </div>
                    <div class="form-outline mb-4">
                        <i class="bi-key trailing"></i>
                        <input type="password" id="form1" name="k_sifre_tekrar" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">Şifre tekrar</label>
                    </div>

                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-outline-success" type="submit" data-mdb-ripple-color="dark" name="k">Kayıt ol</button>
                        <button class="btn btn-outline-danger" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div
        class="modal fade"
        id="girisModal"
        data-mdb-backdrop="static"
        data-mdb-keyboard="false"
        tabindex="-1"
        aria-labelledby="staticBackdropLabel"
        aria-hidden="true"
>
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-center" id="staticBackdropLabel">Giriş Yap</h5>
                <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post">
                    <div class="form-outline mb-4">
                        <i class="bi-person trailing"></i>
                        <input type="text" id="form1" name="g_kadi" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">Kullanıcı Adınız</label>
                    </div>
                    <div class="form-outline mb-4">
                        <i class="bi-lock trailing"></i>
                        <input type="password" id="form1" name="g_sifre" class="form-control form-icon-trailing" />
                        <label class="form-label" for="form1">Şifreniz</label>
                    </div>
                    <div class="container mb-4">
                        <a class="text-info f-right" href="sifreunuttum.php">Şifrenizi mi unuttunuz?</a>
                        <div class="form-check">
                            <input class="form-check-input" name="g_hatirla" type="checkbox" value="" id="flexCheckChecked" checked/>
                            <label class="form-check-label" for="flexCheckChecked">Beni Hatırla</label>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                        <button class="btn btn-outline-success" type="submit" data-mdb-ripple-color="dark" name="g">Giriş yap</button>
                        <button class="btn btn-outline-danger" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>