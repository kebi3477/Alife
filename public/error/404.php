<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/error.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
    <title>ALife</title>
</head>
<body>
    <?php include(__DIR__.'/../views/header.php'); ?>
    <div class="error padding">
        <div class="error__text error__text--big">404</div>
        <div class="error__text error__text--middle">원하시는 페이지를 찾을 수가 없습니다.</div>
        <div class="error__text error__text--small">방문 원하시는 페이지의 주소가 잘못 입력되었거나 변경 혹은 삭제되어 요청하신 페이지를 찾을 수가 없습니다.<br>
        입력하신 페이지의 주소가 정확한지 다시 한번 확인해 주시기 바랍니다.</div>
        <a href="../"><div class="error__button">메인으로 돌아가기</div></a>
    </div>
    <?php include(__DIR__.'/../views/footer.php'); ?>
</body>
</html>