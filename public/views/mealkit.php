<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>밀키트 - ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/mealkit.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php include('header.php') ?>
    <div class="mealkit__list padding">
        <div class="title">구매량이 많은 밀키트</div>
        <div class="mealkit__items payment"></div>
    </div>
    <div class="mealkit__list padding">
        <div class="title"></div>
        <div class="mealkit__items company"></div>
    </div>
    <div class="mealkit__list padding">
        <div class="title">초특가 세일 상품</div>
        <div class="mealkit__items discount"></div>
    </div>
    <?php 
        include('footer.php');
    ?>
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/common.js"></script>
    <script type="module" src="public/js/mealkitModule.js"></script>
    <script type="module" src="public/js/mealkit.js"></script>
</body>
</html>