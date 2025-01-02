<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../../images/ico/favicon.png" type="image/x-icon">
        <link href="../../css/bootstrap.min.css" rel="stylesheet">
        <link href="../../css/font-awesome.min.css" rel="stylesheet">
        <link href="../../css/main.css" rel="stylesheet">
        <script src="../../js/bootstrap.min.js" defer></script>
        <script src="../../js/bootstrap.bundle.min.js" defer></script>
        <title>Show Screen</title>
    </head>

    <body>
        <div class="wrapper">
            <header id="header"><!--header-->

                <div class="header-top"><!--header-top-->
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <div class="ss-menu pull-right">
                                    <ul class="nav navbar-nav mr-auto">
                                        <?php if ($_SESSION['adm'] == 1): ?>
                                            <li class="nav-item"><a href="/admin/user"><i class="fa fa-user"></i>Пользователи</a></li>
                                        <?php endif; ?>
                                        <?php if ($_SESSION['adm'] == 1 || $_SESSION['skl'] == 1): ?>
                                            <li class="nav-item"><a href="/admin/type"><i class="fa fa-barcode" aria-hidden="true"></i>Тип оборудования</a></li>
                                            <li class="nav-item"><a href="/admin/eq"><i class="fa fa-camera-retro" aria-hidden="true"></i>Оборудование</a></li>
                                        <?php endif; ?>
                                        <?php if (($_SESSION['adm'] == 1) || ($_SESSION['skl'] == 1)): ?>
                                            <li class="nav-item dropdown">
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-list-alt" aria-hidden="true"></i>Инвентаризация<i class="fa fa-caret-down"></i>
                                                </a>
                                                <ul class="dropdown-menu downmenu" aria-labelledby="navbarDropdown" style="background-color: #D6D6D0">
                                                    <li><a class="dropdown-item" href="/admin/inventory/new">Новая инвентаризация</a></li>
                                                    <li><a class="dropdown-item" href="/admin/inventory/last">Прошлая инвентаризация</a></li>
                                                </ul>
                                            </li>
                                        <?php endif; ?>
                                        <?php if (($_SESSION['adm'] == 1) || ($_SESSION['skl'] == 1) || ($_SESSION['man'] == 1)): ?>
                                            <li>
                                                <a href="/admin/field">
                                                <i class="fa fa-list-alt" aria-hidden="true"></i>
                                                    Оборудование на объектах
                                                </a>
                                            </li>
                                        <?php endif; ?>
                                        <li><a href="/admin/pwd"><i class="fa fa-key" aria-hidden="true"></i>Сменить пароль</a></li>
                                        <li><a href="/"><i class="fa fa-sign-out" aria-hidden="true"></i>На Сайт</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-top-->

            </header><!--/header-->
        
        