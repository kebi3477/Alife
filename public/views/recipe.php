<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>레시피 - CLife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/recipe.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php 
        include('header.php');
        include('view.php');
        $user = isset($_SESSION['alife_user_email']) ? $_SESSION['alife_user_email'] : "";
    ?>
    <div class="intro padding">
        <div class="intro__text">
            <div class="intro__text--big">냉장고에 재료가 남아 있다면?</div>
            <div class="intro__text--small">냉장고 안에 있는 재료들을 선택하여 만들수 있는 레시피를 우선 제공합니다.</div>
        </div>
        <div class="intro__monster">
            <object data="/public/images/object/monster_recipe.svg" type="image/svg+xml"></object>
        </div>
    </div>
    <div class="intro__bottom"></div>
    <div class="recipe__wrap padding">
        <div class="recipe__row">
            <div class="recipe__list-title">좋아요가 높은 레시피</div> 
            <a href="insert"><div class="recipe__insert">
                레시피 등록
                <object data="public/images/icon/pencil.svg" type="image/svg+xml"></object>
            </div></a>
        </div>
        <div class="recipe__list rank"></div>
    </div>
    <?php if($user != "") { ?>
    <div class="recipe__wrap padding fridge__wrap">
        <div class="recipe__list-title fridge__title">대파가 냉장고에 남아 있다면?</div>
        <div class="recipe__list fridge"></div>
    </div>
    <div class="recipe__wrap padding ingredient__wrap">
        <div class="recipe__list-title"><?=$_SESSION['alife_user_name']?>님의 냉장고 속 재료와 어울리는 레시피</div>
        <div class="recipe__list ingredient"></div>
    </div>
    <?php } ?>
    <div class="recipe__wrap padding">
        <div class="recipe__list-title">CLife가 추천하는 오늘의 메뉴</div>
        <div class="recipe__list recommend"></div>
    </div>
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/common.js"></script>
    <script type="module" src="public/js/view.js"></script>
    <script type="module" src="public/js/point.js"></script>
    <script type="module" src="public/js/recipe.js"></script>
    <?php include('footer.php'); ?>
</body>
</html>