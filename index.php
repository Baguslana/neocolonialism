<?php

if (isset($_GET['page']) && $_GET['page'] == 'SumberEnergi') {
    $page = 'page/sumberdaya.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'KrisisEnergi') {
    $page = 'page/ekonomi.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'DampakKrisis') {
    $page = 'page/sosiallinkungan.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'ViewKeputusan') {
    $page = 'page/view_keputusan.php';
    include 'main.php';
} else {
    $page = 'page/sumberdaya.php';
    include 'main.php';
}
