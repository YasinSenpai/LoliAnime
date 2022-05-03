<?php
require 'lolihentai_userRegistersystem.php';
session_start();
session_destroy();


echo '<div class="container"><div class="alert alert-warning col-md-12">Çıkış yapılıyor...</div> </div>';
echo '<meta http-equiv="refresh" content="0;url=\LoliAnime/index.php">';