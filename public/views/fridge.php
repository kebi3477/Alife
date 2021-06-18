<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>냉장고 - ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/fridge.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php 
        include('header.php');
        include('interceptor/userInterceptor.php');
        isLoging();
    ?>
    <div class="title">
        <div class="title--big"><?=$_SESSION['alife_user_name']?>님의 냉장고</div>
        <div class="search">
            <input class="search__input" placeholder="찾는 재료가 없으신가요?"/>
            <img class="search__button" src="public/images/icon/search_g.svg" alt="">
        </div>
    </div>
    <div class="content">
        <div class="mart">
            <div class="mart__content">
                <div class="categorys">
                    <div class="category">전체</div>
                    <div class="category">채소류</div>
                    <div class="category">고기류</div>
                    <div class="category">해조류</div>
                    <div class="category">어패류</div>
                    <div class="category">과일류</div>
                    <div class="category">견과류</div>
                    <div class="category">유제품</div>
                    <div class="category">곡류</div>
                    <div class="category">양념류</div>
                </div>
                <div class="ingreds">
                </div>
            </div>
            <div class="mart__label">※ 원하는 재료가 없을 시 고객센터로 문의 해주시길 바랍니다.</div>
        </div>
        <div class="monster">
            <div class="message">
                <div class="message__title">현재 들어간 재료</div>
                <div class="message__list"></div>
            </div>
            <div class="message__tri-cover">
                <div class="message__tri"></div>
            </div>
            <object data="public/images/object/monster_book.svg" type="image/svg+xml"></object>
        </div>
        <div class="fridge">
            <object data="public/images/object/fridge_open.svg" type="image/svg+xml"></object>
            <div class="fridge__buttons">
                <div class="button__save">저장하기
                <object data="public/images/icon/check_g.svg" type="image/svg+xml"></object></div>
                <div class="button__reset">초기화
                <object data="public/images/icon/init_g.svg" type="image/svg+xml"></object></div>
            </div>
        </div>
    </div>
    <div class="buttons">
        <div class="button">레시피 검색</div>
    </div>
    <div class="background--bottom"></div> 
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/fridge.js"></script>
    <script type="module" src="public/js/common.js"></script>
</body>
</html>