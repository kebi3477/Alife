<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/insertM.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php 
        include('header.php');
        include('interceptor/userInterceptor.php');
        isLoging();
    ?>
    <form class="insert padding" enctype="multipart/form-data">
        <div class="insert__form">
            <div class="insert__title">밀키트 등록</div>
            <div class="insert__grids">
                <div class="insert__grid">
                    <div class="insert__row">
                        <div class="insert__label">상품명</div>
                        <input type="text" placeholder="상품명을 입력하세요." name="title" maxlength=25>
                    </div>
                    <div class="insert__row">
                        <div class="insert__label">업체명</div>
                        <input type="text" placeholder="업체명을 입력하세요." name="title" maxlength=25>
                    </div>
                    <div class="insert__row insert__row--middle">
                        <div class="insert__label">가격</div>
                        <input type="text" placeholder="가격을 입력하세요." name="title" maxlength=25>
                        <div class="insert__label">할인가격</div>
                        <input type="text" placeholder="할인가격을 입력하세요." name="title" maxlength=25>
                    </div>
                    <div class="insert__row insert__row--middle">
                        <div class="insert__label">배송비</div>
                        <input type="text" placeholder="배송비를 입력하세요." name="title" maxlength=25>
                        <div class="insert__label">추가배송비</div>
                        <input type="text" placeholder="추가배송비를 입력하세요." name="title" maxlength=25>
                    </div>
                    <div class="insert__row">
                        <div class="insert__label">조리정보</div>
                        <div class="insert__flex">
                            <div class="insert__label">중량</div>
                            <input type="text" placeholder="300g" name="title" maxlength=25>
                            <div class="insert__label insert__label--left">g</div>
                            <div class="insert__label">인원</div>
                            <input type="text" placeholder="1" name="title" maxlength=25>
                            <div class="insert__label insert__label--left">인분</div>
                        </div>
                    </div>
                    <div class="insert__row">
                        <div class="insert__label insert__label--right">식품 필수정보</div>
                        <textarea placeholder="식품 필수정보를 입력해주세요."></textarea>
                    </div>
                    <div class="insert__row">
                        <div class="insert__label insert__label--right">식품 상세정보</div>
                        <div class="insert__img insert__img--small"></div>
                    </div>
                </div>
                <div class="insert__col">
                    <div class="insert__img"></div>
                </div>
            </div>
        </div>
        <div class="insert__label--small insert__label--center">
        (주)A Life의 해당 레시피의 문구와 이미지에 대한 저작권은 자사에 있으며 어떤 경우에도 이미지 사용은 불가합니다.    저작권에 위배되는 이미지 편집이나 무단 도용 및 무단 복제, 재배포 시 사전 경고 없이 행사 고발 조치와 관계법령에 의거하여 처벌됨을 알려드립니다.
        </div>
        <div class="insert__buttons">
            <button class="insert__button insert__submit" type="button">작성완료</button>
            <button class="insert__button" type="reset">취소</button>
        </div>
    </form>
    <script type="module" src="public/js/common.js"></script>
</body>
</html>