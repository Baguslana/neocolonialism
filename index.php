<?php

if (isset($_GET['page']) && $_GET['page'] == 'SumberDaya') {
    $page = 'page/sumberdaya.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'Ekonomi') {
    $page = 'page/ekonomi.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'SosialLingkungan') {
    $page = 'page/sosial.php';
    include 'main.php';
} else if (isset($_GET['page']) && $_GET['page'] == 'ViewKeputusan') {
    $page = 'page/view_keputusan.php';
    include 'main.php';
} else {
    $page = 'page/sumberdaya.php';
    include 'main.php';
}
