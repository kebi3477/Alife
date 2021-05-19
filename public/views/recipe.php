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
                <div class="view__header">
                    <div class="view__title title">제목 입니다.</div>
                    <div class="view__wrap-row">
                        <object data="public/images/icon/heart_l.svg" type="image/svg+xml"></object>
                        <div class="view__title like">0</div>
                    </div>
                </div>
                <div class="view__remocon">
                    <div class="view__arrow left">
                        <object data="public/images/icon/arrow_left.svg" type="image/svg+xml"></object>
                    </div>
                    <div class="view__arrow right">
                        <object data="public/images/icon/arrow_right.svg" type="image/svg+xml"></object>
                    </div>
                </div>
                <div class="view__recipes" style="left: 0;">
                    <div class="view__recipe">
                        <div class="view__image"></div>
                        <div class="view__seq">
                            <div class="view__title view__title--small">요리순서</div>
                            <div class="view__text">
                                레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.레시피 정보입니다.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="view__time">
                    <div class="view__start">만들기 시작</div>
                    <div class="view__timer">
                        <div class="view__timebar"></div>
                    </div>
                    <div class="view__watch">00분 : 00초</div>
                </div>
            </div>
            <div class="view__wrap view__wrap--right">
                <div class="view__top">
                    <div class="view__close"><object data="public/images/icon/close_s.svg" type="image/svg+xml"></object></div>
                </div>
                <div class="view__title">요리정보</div>
                <div class="view__wrap-row">
                    <div class="view__title view__title--small">조리시간 :</div>
                    <div class="view__title--small time">30분 이내</div>
                    <div class="view__title view__title--small">인분 :</div>
                    <div class="view__title--small serving">1인분</div>
                </div>
                <div class="view__title view__title--small">재료</div>
                <div class="view__grid">
                    <div class="view__row">
                        <div>음식이름</div>
                        <div>계량 g</div>
                    </div>
                    <div class="view__row">
                        <div>재료이름</div>
                        <div>계량 g</div>
                    </div>
                </div>
                <div class="view__title view__title--small">해시태그</div>
                <div class="view__hashtag"></div>
                <div class="view__wrap-row view__profile">
                    <div class="view__user-image"></div>
                    <div class="view__user-name name">이름</div>
                    <div class="view__user-date date">2021. 00. 00.</div>
                </div>
            </div>
        </div>
    </div>
    <div class="recipe__wrap padding">
        <div class="recipe__row">
            <div class="recipe__list-title">좋아요가 높은 레시피</div> 
            <a href="insert"><div class="recipe__insert">
                레시피 작성
                <object data="public/images/icon/pencil.svg" type="image/svg+xml"></object>
            </div></a>
        </div>
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
        <div class="recipe__list-title fridge__title">대파가 냉장고에 남아 있다면?</div>
        <div class="recipe__list fridge">
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
        <div class="recipe__list-title"><?=$_SESSION['alife_user_name']?>님의 냉장고 속 재료와 어울리는 레시피</div>
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
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/common.js"></script>
    <script type="module" src="public/js/recipe.js"></script>
    <?php include('footer.php'); ?>
</body>
</html>