<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/fridge.css">
</head>
<body>
    <?php 
        error_reporting(0);
        include('header.php');
        include('loading.php');
        include('modules/mysql.php');
        include('interceptor/userInterceptor.php');
        isLoging();
        $ingredients = mysqli_get_query('SELECT * FROM `ingredient`');
    ?>
    <div class="title">
        <div class="title--big">당신의 냉장고를 보여주세요!</div>
        <div class="title--small">냉장고 안에 있는 재료들을 선택하여 레시피 추천을 받을 수 있습니다.</div>
    </div>
    <div class="content">
        <div class="mart">
            <div class="mart__cap">
                <input class="mart__search--input" type="text" placeholder="재료를 입력해주세요.">
                <button class="mart__search--btn"><img src="public/images/icon/search.svg"></button>
            </div>
            <div class="mart__title">
                <div>카테고리</div>
                <div>재료</div>
            </div>
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
                    <div class="category">양념류</div>
                    <div class="category">기타</div>
                </div>
                <div class="ingreds">
                </div>
            </div>
        </div>
        <div class="monster">
            <div class="message">
                <div class="message__title">현재 들어간 재료</div>
                <div class="message__list">

                </div>
            </div>
            <object data="public/images/object/monster_book.svg" type="image/svg+xml"></object>
        </div>
        <div class="fridge">
            <object data="public/images/object/fridge_open.svg" type="image/svg+xml"></object>
        </div>
    </div>
    <div class="buttons">
        <div class="button">레시피 검색</div>
        <div class="button button__save">저장하기</div>
        <div class="button button__reset">초기화</div>
    </div>
    <div class="background--bottom"></div> 
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/fridge.js"></script>
    <script type="module" src="public/js/common.js"></script>
</body>
</html>