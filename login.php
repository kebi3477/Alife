<!DOCTYPE html>
<html lang="kor">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="css/common.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <?= include('header.php') ?>
    <div class="login page">
        <div class="login__img"></div>
        <div class="login__form">
            <div class="login__logo">A Life</div>
            <input type="text" class="login__input" placeholder="아이디">
            <input type="password" class="login__input" placeholder="비밀번호">
            <button class="login__button">로그인</button>
            <div class="login__text login__text--under"><b>아이디 / 비밀번호 찾기</b></div>
            <div class="login__text">회원이 아니십니까?<b>회원가입</b></div>
        </div> 
    </div>
</body>
</html>