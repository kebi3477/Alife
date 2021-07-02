<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>밀키트 - CLife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/mealkit.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php include('header.php') ?>
    <div class="advertising">
    CLife 사용자분들이 직접 누른 좋아요로 
        <span>선정된 CLife 밀키트</span>
        보러가자!
        <svg xmlns="http://www.w3.org/2000/svg" width="7.089" height="11.346" viewBox="0 0 7.089 11.346">
            <path id="패스_1390" data-name="패스 1390" d="M-1300.179,483l-4.257,4.257-4.256-4.257-.709.709,4.256,4.257.709.709.709-.709,4.256-4.257Z" transform="translate(-482.293 -1298.763) rotate(-90)" fill="#fff" stroke="#fff" stroke-width="1"/>
        </svg>
        <svg xmlns="http://www.w3.org/2000/svg" width="11.414" height="11.414" viewBox="0 0 11.414 11.414">
            <g id="그룹_187" data-name="그룹 187" transform="translate(0 0)">
                <g id="그룹_185" data-name="그룹 185" transform="translate(0 0)">
                    <rect id="사각형_140" data-name="사각형 140" width="13.132" height="1.01" transform="translate(9.286 10) rotate(-135)" fill="#fff" stroke="#fff" stroke-width="1"/>
                </g>
                <g id="그룹_186" data-name="그룹 186">
                    <rect id="사각형_141" data-name="사각형 141" width="13.132" height="1.01" transform="translate(0 9.286) rotate(-45)" fill="#fff" stroke="#fff" stroke-width="1"/>
                </g>
            </g>
        </svg>

    </div>
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