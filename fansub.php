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
<body>

<div class="container">
    <div class="mb-4"></div>
    <?php
    require 'navbar.php';
    require 'php/lolihentai_userRegistersystem.php';
    echo '<div class="container">';
    require 'php/fansub_islemleri.php';
    echo '</div>';
    if(!isset($_SESSION['fansub']) AND !isset($_SESSION['admin']) AND !isset($_SESSION['dev'])){
        header("Location: 404.html");
    }
    ?>
</div>
<div class="container-fluid">
    <div class="container">
        <div class="row">
            <div class="card col-md-11 mx-1 background text-white">
                <div class="card-header">Anime Bölümü Ekle</div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <input type="text" name="anime_bolum_ad" placeholder="Anime Adını Girin" list="anime_adi" class="form-control"required />
                                <datalist id="anime_adi">
                                    <?php
                                    $hentai_sorgu = "SELECT * FROM anime_ekle ";
                                    $hentai_kontrol = $db->query($hentai_sorgu);
                                    while ($hentai_cikti = $hentai_kontrol->fetch(PDO::FETCH_ASSOC)){
                                        echo '<option>'.$hentai_cikti['anime_adi'].'</option>';
                                    }
                                    ?>
                                </datalist>
                            </div>
                            <div class="col-md-6 text-center">
                                <select class="form-select form-control mb-3" name="anime_bolum" aria-label="Bölüm Seçin">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                </select>
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="text" name="anime_fembed" placeholder="Fembed" class="form-control mb-3" />
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="text" name="anime_google" placeholder="Google Drive" class="form-control mb-3" />
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="text" name="anime_vk" placeholder="VK" class="form-control mb-3" />
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="text" name="anime_sibnet" placeholder="Sibnet" class="form-control mb-3" />
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="text" name="anime_hdvid" placeholder="HDVID" class="form-control mb-3" />
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="text" name="anime_voe" placeholder="Voe" class="form-control mb-3" />
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="text" name="anime_mail" placeholder="Mail Ru" class="form-control mb-3" />
                            </div>
                            <div class="col-md-3 text-center">
                                <input type="text" name="anime_odd" placeholder="ODNOKLASSNIKI" class="form-control mb-3" />
                            </div>
                        </div>
                        <button class="btn btn-success" data-mdb-target="#bolumekleModal" data-mdb-toggle="modal" type="button">Ekle!</button>
                        <button class="btn btn-danger f-right" type="reset">Reset!</button>
                        <div
                                class="modal fade"
                                id="bolumekleModal"
                                data-mdb-backdrop="static"
                                data-mdb-keyboard="false"
                                tabindex="-1"
                                aria-labelledby="staticBackdropLabel"
                                aria-hidden="true"
                        >
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content background">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="staticBackdropLabel">Fansub İşlemleri</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="text-center">
                                                <h3>DİKKAT!</h3>
                                                <h6>Bu işlemin geri dönüşü yoktur. Anime bölümünü eklemek istediğinizden eminmisiniz?</h6>
                                                <div class="mb-4"></div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                <button class="btn btn-outline-success" type="submit" data-mdb-ripple-color="dark" name="anime_b">Bölümü Ekle!</button>
                                                <button class="btn btn-outline-danger" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card col-md-7 mx-1 background text-white">
                <div class="card-header">Anime Ekle</div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-6 mb-1">
                                <input type="text" name="anime_ad" placeholder="Anime Adı" class="form-control"required />
                            </div>
                            <div class="col-md-6 text-center">
                                <input type="text" name="anime_ad_jp" placeholder="Anime Adı (Japonca)" class="form-control mb-3"required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" name="anime_kategori" placeholder="Anime Kategorileri" class="form-control"required />
                            </div>
                            <div class="col-md-6 mb-1">
                                <input type="text" name="anime_tarih" placeholder="Anime Çıkış Tarihi" class="form-control"required />
                            </div>
                            <div class="col-md-6">
                                <input type="text" name="anime_b_sure" placeholder="Anime Bölüm Süresi" class="form-control mb-3"required />
                            </div>
                            <div class="col-md-6 mb-1">
                                <input type="text" name="anime_b" placeholder="Anime Toplam Bölüm" class="form-control"required />
                            </div>
                            <div class="col-md-12 mb-3">
                                <input type="url" name="anime_kapak" placeholder="Anime Kapak Resim Link" class="form-control"required />
                            </div>
                            <div class="form-group mb-4">
                                <textarea class="form-control" name="anime_aciklama" placeholder="Anime Açıklama" id="exampleFormControlTextarea1" rows="3"required></textarea>
                            </div>
                        </div>
                        <div class="btn btn-success" data-mdb-target="#animekleModal" data-mdb-toggle="modal">Ekle!</div>
                        <button type="reset" class="btn btn-danger f-right">Reset!</button>
                        <div
                                class="modal fade"
                                id="animekleModal"
                                data-mdb-backdrop="static"
                                data-mdb-keyboard="false"
                                tabindex="-1"
                                aria-labelledby="staticBackdropLabel"
                                aria-hidden="true"
                        >
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content background">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="staticBackdropLabel">Fansub İşlemleri</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="text-center">
                                                <h3>DİKKAT!</h3>
                                                <h6>Bu işlemin geri dönüşü yoktur. Animeyi eklemek istediğinizden eminmisiniz?</h6>
                                                <div class="mb-4"></div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                <button class="btn btn-outline-success" type="submit" data-mdb-ripple-color="dark" name="anime_fansub">Animeyi Ekle!</button>
                                                <button class="btn btn-outline-danger" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card col-md-4 mx-1 background text-white" style="max-height: 330px;">
                <div class="card-header">Fansub duyuru ekle</div>
                <div class="card-body">
                    <form method="post">
                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <input type="text" name="fansub_baslik" placeholder="Duyuru başlık" class="form-control"required />
                            </div>
                            <div class="form-group mb-4">
                                <textarea class="form-control" name="fansub_duyuru" placeholder="Duyuru Açıklama" id="exampleFormControlTextarea1" rows="3"required></textarea>
                            </div>

                        </div>
                        <div class="btn btn-success" data-mdb-target="#duyuruekleModal" data-mdb-toggle="modal">Ekle!</div>
                        <button type="reset" class="btn btn-danger f-right">Reset!</button>
                        <div
                                class="modal fade"
                                id="duyuruekleModal"
                                data-mdb-backdrop="static"
                                data-mdb-keyboard="false"
                                tabindex="-1"
                                aria-labelledby="staticBackdropLabel"
                                aria-hidden="true"
                        >
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content background">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-center" id="staticBackdropLabel">Fansub İşlemleri</h5>
                                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post">
                                            <div class="text-center">
                                                <h3>DİKKAT!</h3>
                                                <h6>Bu işlemin geri dönüşü yoktur. Duyuruyu atmak istediğinizden eminmisiniz?</h6>
                                                <div class="mb-4"></div>
                                            </div>
                                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                                <button class="btn btn-outline-success" type="submit" data-mdb-ripple-color="dark" name="duyuru_fansub">Duyuruyu Yolla</button>
                                                <button class="btn btn-outline-danger" data-mdb-dismiss="modal" aria-label="Close" type="button">Vazgeç</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
