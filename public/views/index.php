<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/index.css">
</head>
<body>
    <?php include('header.php') ?>
    <div class="remocon">
        <div class="remocon__item">
            <object data="public/images/icon/arrow_up.svg" type="image/svg+xml"></object>
        </div>
        <div class="remocon__item">
            <object data="public/images/icon/arrow_down.svg" type="image/svg+xml"></object>
        </div>
    </div>
    <div id="main" class="padding page">
        <div class="intro">
            <div class="intro__text">
                <div class="intro__text--big">A Life</div>
                <div class="intro__text--middle">로 시작해보세요!</div>
            </div>
            <div class="intro__text intro__text--small">냉장고 안에 있는 재료들을 선택하여 원하는</div>
            <div class="intro__text intro__text--small">레시피의 음식을 만들어 볼 수 있습니다.</div>
        </div>
        <object data="public/images/object/monster.svg" type="image/svg+xml" class="monster"></object>
        <audio class="sound" src="public/audio/eat.mp3" crossOrigin="anonymous" loop></audio>
    </div>
    <div class="find page padding">
        <div class="title">
            <div class="title--small">집에 있는 재료를 어떻게 처리할 지 모를 때? 유통기한이 별로 안남은 재료가 있다면?</div>
            <div class="title--big">냉장고 안에 있는 재료들을 선택해 다양한 레시피를 찾아보세요!</div>
        </div>
        <div class="find__list">
            <div class="find__item">
                <div class="find__img">
                    <object data="public/images/icon/mouse.svg" type="image/svg+xml"></object>
                </div>
                <div class="find__text find__text--big">재료 선택 레시피 검색</div>
                <div class="find__text find__text--small">냉장고 안에 있는 재료들을 선택하여<br>만들 수 있는 음식의 레시피를 제공합니다.</div>
            </div>
            <div class="find__item">
                <div class="find__img">
                    <object data="public/images/icon/ice.svg" type="image/svg+xml"></object>
                </div>
                <div class="find__text find__text--big">보관 방법 제공</div>
                <div class="find__text find__text--small">요리를 만들고 나서 남은 재료들을<br>알맞게 보관할 수 있도록 도와줍니다.</div>
            </div>
            <div class="find__item">
                <div class="find__img">
                    <object data="public/images/icon/tropy.svg" type="image/svg+xml"></object>
                </div>
                <div class="find__text find__text--big">랭킹</div>
                <div class="find__text find__text--small">자기만의 레시피를 등록하고 랭킹을 통해<br>다양한 혜택을 받을 수 있습니다.</div>
            </div>
        </div>
    </div>
    <div class="recipe page padding">
        <div class="recipe--left">
            <div class="title title--left">
                <div class="title--big">대파</div>
                <div class="title--big">냉장고에 남아 있다면?</div>
                <div class="title--small">냉장고 안에 있는 재료로 레시피 검색을 우선 제공합니다.</div>
            </div>
            <object class="recipe__monster" data="public/images/object/monster_recipe.svg" type="image/svg+xml"></object>
        </div>
        <div class="recipe__list">
            <?php
                for($i = 0; $i < 6; $i++) {
            ?>
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
            <?php
                }
            ?>
        </div>
    </div>
    <div class="recommend page padding">
        <div class="title">
            <div class="title--small">집에서 음식을 만들어 먹고 싶지만 그 과정이 어렵다면?</div>
            <div class="title--big">가정 간편식 제품 추천</div>
        </div> 
        <div class="cooks">
            <div class="type__list">
                <div class="type__item">ALL</div>
                <div class="type__item">COOK</div>
                <div class="type__item">EAT</div>
                <div class="type__item">HEAT</div>
                <div class="type__item">MEAL KIT</div>
            </div>
            <div class="cook__list">
                <object data="public/images/object/monster_wall.svg" type="image/svg+xml" class="cook__monster"></object>
                <div class="cook__item">
                    <div class="cook__circle">
                        <div class="cook__heart">
                            <object data="public/images/icon/heart.svg" type="image/svg+xml"></object>
                        </div>
                    </div>
                    <div class="cook__img">
                        <img src="public/images/누룽지탕.JPG" alt="img">
                    </div>
                    <div class="cook__content">
                        <div class="cook__type">HOT</div>
                        <div class="cook__brand">앙트레</div>
                        <div class="cook__title">얼큰한 해물 누룽지탕 쿠킹박스</div>
                        <div class="cook__price">14,900</div> 
                    </div>
                    <div class="hastag__list">
                        <div class="hastag__item">#1인분</div>
                        <div class="hastag__item">#밀키트</div>
                        <div class="hastag__item">#찌개용</div>
                    </div>
                </div>
                <div class="cook__item">
                    <div class="cook__circle">
                        <div class="cook__heart">
                            <object data="public/images/icon/heart.svg" type="image/svg+xml"></object>
                        </div>
                    </div>
                    <div class="cook__img">
                        <img src="public/images/누룽지탕.JPG" alt="img">
                    </div>
                    <div class="cook__content">
                        <div class="cook__type">HOT</div>
                        <div class="cook__brand">앙트레</div>
                        <div class="cook__title">얼큰한 해물 누룽지탕 쿠킹박스</div>
                        <div class="cook__price">14,900</div> 
                    </div>
                    <div class="hastag__list">
                        <div class="hastag__item">#1인분</div>
                        <div class="hastag__item">#밀키트</div>
                        <div class="hastag__item">#찌개용</div>
                    </div>
                </div>
                <div class="cook__item">
                    <div class="cook__circle">
                        <div class="cook__heart">
                            <object data="public/images/icon/heart.svg" type="image/svg+xml"></object>
                        </div>
                    </div>
                    <div class="cook__img">
                        <img src="public/images/누룽지탕.JPG" alt="img">
                    </div>
                    <div class="cook__content">
                        <div class="cook__type">HOT</div>
                        <div class="cook__brand">앙트레</div>
                        <div class="cook__title">얼큰한 해물 누룽지탕 쿠킹박스</div>
                        <div class="cook__price">14,900</div> 
                    </div>
                    <div class="hastag__list">
                        <div class="hastag__item">#1인분</div>
                        <div class="hastag__item">#밀키트</div>
                        <div class="hastag__item">#찌개용</div>
                    </div>
                </div>
                <div class="cook__item">
                    <div class="cook__circle">
                        <div class="cook__heart">
                            <object data="public/images/icon/heart.svg" type="image/svg+xml"></object>
                        </div>
                    </div>
                    <div class="cook__img">
                        <img src="public/images/누룽지탕.JPG" alt="img">
                    </div>
                    <div class="cook__content">
                        <div class="cook__type">HOT</div>
                        <div class="cook__brand">앙트레</div>
                        <div class="cook__title">얼큰한 해물 누룽지탕 쿠킹박스</div>
                        <div class="cook__price">14,900</div> 
                    </div>
                    <div class="hastag__list">
                        <div class="hastag__item">#1인분</div>
                        <div class="hastag__item">#밀키트</div>
                        <div class="hastag__item">#찌개용</div>
                    </div>
                </div>
            </div>
            <div class="cook__button button">
                더보기
                <object data="public/images/icon/plus.svg" type="image/svg+xml"></object>
            </div>
        </div>
    </div>
    <div class="community page padding">
        <div class="community__wrap">
            <div class="title">
                <div class="title--small">오늘의 메뉴가 고민이 된다면?</div>
                <div class="title--big">A-Life 사용자에게<br>다양한 메뉴를 추천 받아보세요.</div>
            </div> 
            <div class="community__button button">
                커뮤니티 바로가기
                <object class="community__button-arrow" data="public/images/icon/arrow_down_gr.svg" type="image/svg+xml"></object>
            </div>
        </div>
        <div class="community__wrap">
            <div class="community__list">
                <div class="community__item">만들어먹지</div>
                <div class="community__item community__item--over">시켜먹지</div>
                <div class="community__item">찾아가먹지</div>
            </div>
            <div class="community__img">
                <object data="public/images/object/desk.svg" type="image/svg+xml" class="community__img--left"></object>
                <object data="public/images/object/monster_sit.svg" type="image/svg+xml" class="community__img--right"></object>
            </div>
        </div>
        <div class="community__wrap--black"></div>
    </div>
    <div class="fridge page padding">
        <div class="title">
            <div class="title--big">당신의 냉장고를 보여주세요!</div>
            <div class="title--small">냉장고 안에 있는 재료들을 선택하여 레시피 추천을 받을 수 있습니다.</div>
        </div>
        <a href="fridge"><div class="fridge__img">
            <object data="public/images/object/fridge.svg" type="image/svg+xml"></object>
        </div></a>
        <a href="fridge"><div class="fridge_button button">
            나의 냉장고 바로가기
            <object class="community__button-arrow" data="public/images/icon/arrow_down_gr.svg" type="image/svg+xml"></object>
        </div></a>
        <div class="community__wrap--black"></div>
    </div>
    <?php include('footer.php') ?>
    <script src="public/js/monster.js"></script>
    <script src="public/js/index.js"></script>
    <script src="public/js/common.js"></script>
</body>
</html>