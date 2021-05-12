<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/search.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php include('header.php') ?>
    <div class="search padding">
        <div class="logo">A Life</div>
        <div class="search__wrap">
            <input class="search__input" placeholder="재료 / 음식명을 검색하세요."/>
            <img class="search__button" src="public/images/icon/search.svg" alt="">
        </div>
        <object class="monster__opacity" data="public/images/object/monster.svg" type="image/svg+xml"></object>
    </div>    
    <script type="module" src="public/js/common.js"></script>
</body>
</html>