<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/mealkit.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php include('header.php') ?>
    <?php for($i = 0; $i < 4; $i++) { ?>
    <div class="mealkit__list padding">
        <div class="title">냉장고에 있는 대파가 사용되는 식품</div>
        <div class="mealkit__items">
            <?php for($j = 0; $j < 8; $j++) { ?>
            <div class="mealkit__item">
                <div class="mealkit__image"></div>
                <div class="mealkit__wrap">
                    <div class="mealkit__tag"></div>
                    <div class="mealkit__text--small">앙트레</div>
                    <div class="mealkit__text--big">얼큰한 해물 누룽지탕 쿠킹박스</div>
                    <div class="mealkit__text--right">
                        <div class="mealkit__text--won">14,900</div>
                        원
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
    <?php } ?>
</body>
</html>