<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/recipe.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php include('header.php');?>
    <div class="popup">
        <div class="view">
            <div class="view__wrap view__wrap--left">
                <div class="view__profile">
                    <div class="view__wrap-row">
                        <div class="view__user-image"></div>
                        <div class="view__user-info info">이름<br>2021. 00. 00.</div>
                    </div>
                    <div class="view__wrap-row">  
                        <object data="public/images/icon/heart_l.svg" type="image/svg+xml"></object>
                        <div class="view__title">0</div>
                    </div>
                </div>
                <div class="view__recipes">
                    <div class="view__recipe">
                        <div class="view__title title">제목 입니다.</div>
                        <div class="view__slide">
                            <div class="view__slide-now"></div>
                            <div class="view__slide-list"></div>
                        </div>
                        <div class="view__seq">
                            <div class="view__title view__title--small">요리순서</div>
                            <div class="view__text">
                                레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view__time"></div>
            </div>
            <div class="view__wrap view__wrap--right">
                <div class="view__top">
                    <div class="view__close"><object data="public/images/icon/close_s.svg" type="image/svg+xml"></object></div>
                </div>
                <div class="view__title">요리정보</div>
                <div class="view__wrap-row"></div>
                <div class="view__title view__title--small">재료</div>
                <div class="view__grid">
                    <div class="view__row">
                        <div>음식이름</div>
                        <div>계량 g</div>
                    </div>
                    <?php
                        for($i = 0; $i < 8; $i++) {
                    ?>
                    <div class="view__row">
                        <div>재료이름</div>
                        <div>계량 g</div>
                    </div>
                    <?php } ?>
                </div>
                <div class="view__title view__title--small">해시태그</div>
                <div class="view__hashtag"></div>
            </div>
        </div>
    </div>
    <div class="recipe__wrap padding">
        <div class="recipe__list-title">좋아요가 높은 레시피</div>
        <div class="recipe__list rank">
            <div class="recipe__item">
                <div class="recipe__img"></div>
                <div class="recipe__title">국물 떡볶이 만들기</div>
                <div class="recipe__content">국물 떡볶이 만들어 봅시다. 국물 떡볶이 만들어 봅시다.  국물 떡볶이 만들어 봅시다. 국물...  </div>
                <div class="recipe--bottom">
                    <div class="recipe__cover">
                        <div class="recipe__user-img"></div>
                        <div class="recipe__user-name">나는 요리사</div>
                    </div>
                    <div class="recipe__cover">
                        <object data="public/images/icon/heart_r.svg" type="image/svg+xml"></object>
                        <div class="recipe__user-name">100</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="recipe__wrap padding">
        <div class="recipe__list-title">대파가 냉장고에 남아 있다면?</div>
        <div class="recipe__list">
            <?php for($i = 0; $i < 8; $i++) { ?>
            <div class="recipe__item">
                <div class="recipe__img"></div>
                <div class="recipe__title">국물 떡볶이 만들기</div>
                <div class="recipe__content">국물 떡볶이 만들어 봅시다. 국물 떡볶이 만들어 봅시다.  국물 떡볶이 만들어 봅시다. 국물...  </div>
                <div class="recipe--bottom">
                    <div class="recipe__cover">
                        <div class="recipe__user-img"></div>
                        <div class="recipe__user-name">나는 요리사</div>
                    </div>
                    <div class="recipe__cover">
                        <object data="public/images/icon/heart_r.svg" type="image/svg+xml"></object>
                        <div class="recipe__user-name">100</div>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="recipe__wrap padding">
        <div class="recipe__list-title">고혜경님의 냉장고 속 재료와 어울리는 레시피</div>
        <div class="recipe__list">
            <?php for($i = 0; $i < 8; $i++) { ?>
            <div class="recipe__item">
                <div class="recipe__img"></div>
                <div class="recipe__title">국물 떡볶이 만들기</div>
                <div class="recipe__content">국물 떡볶이 만들어 봅시다. 국물 떡볶이 만들어 봅시다.  국물 떡볶이 만들어 봅시다. 국물...  </div>
                <div class="recipe--bottom">
                    <div class="recipe__cover">
                        <div class="recipe__user-img"></div>
                        <div class="recipe__user-name">나는 요리사</div>
                    </div>
                    <div class="recipe__cover">
                        <object data="public/images/icon/heart_r.svg" type="image/svg+xml"></object>
                        <div class="recipe__user-name">100</div>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <div class="recipe__wrap padding">
        <div class="recipe__list-title">A-Life가 추천하는 오늘의 메뉴</div>
        <div class="recipe__list">
            <?php for($i = 0; $i < 8; $i++) { ?>
            <div class="recipe__item">
                <div class="recipe__img"></div>
                <div class="recipe__title">국물 떡볶이 만들기</div>
                <div class="recipe__content">국물 떡볶이 만들어 봅시다. 국물 떡볶이 만들어 봅시다.  국물 떡볶이 만들어 봅시다. 국물...  </div>
                <div class="recipe--bottom">
                    <div class="recipe__cover">
                        <div class="recipe__user-img"></div>
                        <div class="recipe__user-name">나는 요리사</div>
                    </div>
                    <div class="recipe__cover">
                        <object data="public/images/icon/heart_r.svg" type="image/svg+xml"></object>
                        <div class="recipe__user-name">100</div>
                    </div>
                </div>
            </div>
            <?php } ?>
            </div>
        </div>
    </div>
    <script src="public/js/recipe.js"></script>
    <script type="module" src="public/js/common.js"></script>
    <?php include('footer.php'); ?>
</body>
</html>