<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>관리자 - CLife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/admin.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php
        include('header.php');
        include('view.php');
        include('interceptor/userInterceptor.php');
        isSuperAdmin();
    ?>
    <div class="admin">
        <input type="radio" name="admin" id="user" checked>
        <input type="radio" name="admin" id="mealkit">
        <input type="radio" name="admin" id="report">
        <div class="menu__list">
            <label class="menu__item" for="user">사용자 목록</label>
            <label class="menu__item" for="mealkit">밀키트 전환 리스트</label>
            <label class="menu__item" for="report">신고 목록</label>
        </div>
        <div class="board__list">
            <div class="board__item board__users">
                <div class="board__title">사용자 목록</div>
                <div class="users">
                    <div class="users__row">
                        <div>이메일</div>
                        <div>이름</div>
                        <div>전화번호</div>
                        <div>주소</div>
                        <div>등급</div>
                        <div>포인트</div>
                        <div>삭제</div>
                    </div>
                </div>
            </div>
            <div class="board__item">
                <div class="board__title">밀키트 전환 희망 리스트</div>
                <div class="recipe__list"></div>
            </div>
            <div class="board__item">
                <div class="board__title">신고 목록</div>
                <div class="report">
                    <div class="report__row">
                        <div>게시글 제목</div>
                        <div>게시글 작성자</div>
                        <div>신고자</div>
                        <div>신고 내용</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/common.js"></script>
    <script type="module" src="public/js/admin.js"></script>
    <script type="module" src="public/js/view.js"></script>
</body>
</html>