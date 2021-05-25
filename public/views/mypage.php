<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/mypage.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="mypage padding">
        <div class="mypage__wrap">
            <div class="profile">
                <div class="profile__img"></div>
                <div class="profile__label profile__label--small">등급이름</div>
                <div class="profile__label profile__row">
                    <div class="profile__label--bold"><?=$_SESSION['alife_user_name']?></div>
                    <div class="profile__label--middle">(<?=$_SESSION['alife_user_email']?>)</div>
                </div>
            </div>
            <div class="content">
                <input type="radio" name="tab" id="write" checked>
                <input type="radio" name="tab" id="thumsup">
                <input type="radio" name="tab" id="history">
                <input type="radio" name="tab" id="modify">
                <div class="content__tabs">
                    <label for="write" class="content__tab">작성한 게시글</label>
                    <label for="thumsup" class="content__tab">좋아요</label>
                    <label for="history" class="content__tab">주문내역 조회</label>
                    <label for="modify" class="content__tab">회원정보 수정</label>
                </div>
                <div class="write content__box"></div>
                <div class="thumsup content__box"></div>
                <div class="history content__box"></div>
                <div class="modify content__box">
                    <div class="content__title">회원정보수정</div>
                    <div class="modify__wraps">
                        <div class="modify__wrap">
                            <div class="modify__label">이메일</div>
                            <input type="text" class="modify__input">
                        </div>
                        <div class="modify__wrap">
                            <div class="modify__label">휴대전화</div>
                            <input type="text" class="modify__input">
                        </div>
                        <div class="modify__wrap">
                            <div class="modify__label">이름</div>
                            <input type="text" class="modify__input">
                        </div>
                        <div class="modify__wrap">
                            <div class="modify__label">주소</div>
                            <input type="text" class="modify__input">
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    </div>
    <script type="module" src="public/js/common.js"></script>
    <script type="module" src="public/js/mypage.js"></script>
</body>
</html>