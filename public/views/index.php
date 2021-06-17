<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/index.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php include('header.php'); ?>
    <div id="main" class="padding page">
        <div class="circles">
            <div class="circle circle--small"></div>
            <div class="circle circle--big"></div>
            <div class="circle circle--big"></div>
            <div class="circle circle--ssmall"></div>
            <div class="circle circle--middle"></div>
            <div class="circle circle--small"></div>
            <div class="circle circle--middle"></div>
            <div class="circle circle--big"></div>
            <div class="circle circle--middle"></div>
            <div class="circle circle--ssmall"></div>
        </div>
        <div class="intro">
            <div class="intro__text">
                <div class="intro__text--big">A Life</div>
                <div class="intro__text--middle">로 시작해보세요!</div>
            </div>
            <div class="intro__text intro__text--small">냉장고 안에 있는 재료들을 선택하여 원하는</div>
            <div class="intro__text intro__text--small">레시피의 음식을 만들어 볼 수 있습니다.</div>
        </div>
        <object data="public/images/object/monster.svg" type="image/svg+xml" class="monster"></object>
        <audio class="sound">
            <source src="public/audio/eat.mp3" type="audio/mpeg" />
        </audio>
    </div>
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/monster.js"></script>
    <script type="module" src="public/js/common.js"></script>
</body>
</html>