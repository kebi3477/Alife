<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>검색 - CLife</title>
    <link rel="stylesheet" href="/public/css/common.css">
    <link rel="stylesheet" href="/public/css/search.css">
    <link rel="shortcut icon" href="/public/images/favicon/favicon.ico">
</head>
<body>
    <?php 
        header('Content-Type: text/html; charset=utf-8');
        include('header.php');
        include('view.php');
        $url = explode('/', $_SERVER['REQUEST_URI']);
        if(isset($url[2])) {
    ?>
    <div class="result padding">
        <div class="result__title">
            <div class="title__text--big"><b>'<?=rawurldecode($url[2])?>'</b> 검색한 결과입니다.</div>
            <div class="title__text--small"></div>
        </div>
        <div class="search__recipe">
            <div class="list__title">레시피</div>
            <div class="recipe__list"></div>
        </div>
        <div class="search__mealkit">
        <div class="list__title">밀키트</div>
            <div class="mealkit__items"></div>
        </div>
    </div>
    <?php
        include('footer.php');
        } else {
    ?>
    <div class="search padding">
        <div class="logo"><img src='/public/images/logo.svg'></div>
        <div class="search__wrap">
            <input class="search__input" placeholder="재료 / 음식명을 검색하세요."/>
            <img class="search__button" src="/public/images/icon/search.svg" alt="">
        </div>
        <object class="monster__opacity" data="/public/images/object/monster.svg" type="image/svg+xml"></object>
    </div>    
    <?php 
    } 
    ?>
    <script type="module" src="/public/js/common.js"></script>
    <script type="module" src="/public/js/search.js"></script>
    <script type="module" src="/public/js/view.js"></script>
    <script type="module" src="/public/js/mealkitModule.js"></script>
</body>
</html>