<?php session_start() ?>
<header class="padding">
    <div class="header__list">
        <a href="index"><text class="header__logo" transform="translate(1 42)" font-size="36">A Life</text></a>
        <img class="header__logo" src="" alt="">
        <div class="header__item"><a href="fridge">나의 냉장고</a></div>
        <div class="header__item"><a href="recipe">레시피</a></div>
        <div class="header__item"><a href="mealkit">밀키트</a></div>
        <!-- <div class="header__item">오늘 뭐 먹지?</div> -->
    </div>
    <div class="header__list">
    <?php
        if(isset($_SESSION['alife_user_email'])) {
    ?>
        <div class="header__item header__item--small"><a href="mypage">마이페이지</a></div>
        <div class="header__item header__item--small logout">로그아웃</div>
    <?php
        } else {
    ?>
        <div class="header__item header__item--small"><a href="login">로그인 / 회원가입</a></div>
    <?php
        }
    ?>
        <a href="search"><object class="header__img" data="public/images/icon/search.svg" type="image/svg+xml"></object></a>
        <object class="header__img" data="public/images/icon/menu.svg" type="image/svg+xml"></object>
    </div>
</header>