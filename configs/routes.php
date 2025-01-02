<?php
    return array(
        // Инвентаризация:
        'admin/inventory/new' => 'adminInventory/new',
        'admin/inventory/last' => 'adminInventory/last',
        // Тип оборудования:    
        'admin/type/create' => 'adminType/create',
        'admin/type/update/([0-9]+)' => 'adminType/update/$1',
        'admin/type' => 'adminType/index',
        // Управление оборудованием:    
        'admin/eq/create' => 'adminEq/create',
        'admin/eq/update/([0-9]+)' => 'adminEq/update/$1',
        'admin/eq/delete/([0-9]+)' => 'adminEq/delete/$1',
        'admin/eq' => 'adminEq/index',
        // Управление пользователями
        'admin/user/create' => 'adminUser/create',
        'admin/user/update/([0-9]+)' => 'adminUser/update/$1',
        'admin/user/delete/([0-9]+)' => 'adminUser/delete/$1',
        'admin/user' => 'adminUser/index',
        // Админпанель:
        'admin/field' => 'admin/field',
        'admin/pwd' => 'admin/pwd',
        'admin' => 'admin/index',
        // Ремонт
        'repair/in' => 'repair/in',
        'repair/need' => 'repair/need',
        // Склад
        'skl/goout' => 'skl/goout',
        'skl/comein' => 'skl/comein',
        // Проекты
        'projects/new/addplace' => 'projects/addplace',
        'projects/new' => 'projects/new',
        'projects/tours' => 'projects/tours',
        // Главная страница
        // 'ver' => 'site/ver',
        'login' => 'site/login',
        'logout' => 'site/logout',
        'index.php' => 'site/index', // actionIndex в SiteController
        '' => 'site/index', // actionIndex в SiteController
    );
?>