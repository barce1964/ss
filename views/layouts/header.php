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
                                    <ul class="nav navbar-nav">
                                        <?php if (!User::isGuest()): ?>
                                            <li>
                                                <a href="/admin"><i class="fa fa-user"></i>
                                                    Админпанель
                                                </a>
                                            </li>
                                            <?php if (($_SESSION['adm'] == 1) || ($_SESSION['skl'] == 1) || ($_SESSION['man'] == 1) || ($_SESSION['br'] == 1)): ?>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-globe"></i>Проекты<i class="fa fa-caret-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu downmenu" aria-labelledby="navbarDropdown" style="background-color: #D6D6D0">
                                                        <li>
                                                            <a class="dropdown-item" href="/projects/new">
                                                                <i class="fa fa-file"></i>
                                                                Новый проект
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="/projects/new">
                                                                <i class="fa fa-plus"></i>
                                                                Добавить в проект
                                                            </a>
                                                        </li>
                                                        <?php if (($_SESSION['adm'] == 1) || ($_SESSION['br'] == 1) || ($_SESSION['man'] == 1)): ?>
                                                            <li>
                                                                <a href="/projects/tours"><i class="fa fa-plane" aria-hidden="true"></i>
                                                                    Туры
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                        <?php if (($_SESSION['adm'] == 1) || ($_SESSION['skl'] == 1)): ?>
                                                            <li>
                                                                <a href="/projects/tours"><i class="fa fa-arrows-alt" aria-hidden="true"></i>
                                                                    Переместить на другой склад
                                                                </a>
                                                            </li>
                                                        <?php endif; ?>
                                                    </ul>
                                                </li>

                                            <?php endif; ?>
                                            <li>
                                                <a href="/skl/goout">
                                                <i class="fa fa-truck" aria-hidden="true"></i>
                                                    Выезд
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/skl/comein">
                                                <i class="fa fa-truck" aria-hidden="true"></i>
                                                    Заезд
                                                </a>
                                            </li>
                                            <?php if (($_SESSION['adm'] == 1) || ($_SESSION['skl'] == 1) || ($_SESSION['man'] == 1)): ?>
                                                <li>
                                                    <a href="/subrent">
                                                        <i class="fa fa-arrows-alt" aria-hidden="true"></i> Субаренда
                                                    </a>
                                                </li>
                                                <li class="nav-item dropdown">
                                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="fa fa-cog" aria-hidden="true"></i>Ремонт<i class="fa fa-caret-down"></i>
                                                    </a>
                                                    <ul class="dropdown-menu downmenu" aria-labelledby="navbarDropdown" style="background-color: #D6D6D0">
                                                        <li><a class="dropdown-item" href="/repair/in">В ремонте</a></li>
                                                        <li><a class="dropdown-item" href="/repair/need">Нуждаются в ремонте</a></li>
                                                    </ul>
                                                </li>

                                            <?php endif; ?>
                                        <?php endif; ?>
                                        <?php if (User::isGuest()): ?>                                        
                                            <li><a href="/login/"><i class="fa fa-sign-in" aria-hidden="true"></i> Вход</a></li>
                                        <?php else: ?>
                                            <li><a href="/logout/"><i class="fa fa-sign-out" aria-hidden="true"></i> Выход</a></li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--/header-top-->

            </header><!--/header-->
        
        