<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CLife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/insertM.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php 
        include('header.php');
        include('interceptor/userInterceptor.php');
        isAdmin();
    ?>
    <form class="insert padding" enctype="multipart/form-data">
        <div class="insert__form">
            <div class="insert__title">밀키트 등록</div>
            <div class="insert__grids">
                <div class="insert__grid">
                    <div class="insert__row">
                        <div class="insert__label">상품명</div>
                        <input type="text" placeholder="상품명을 입력하세요." name="name" maxlength=25>
                    </div>
                    <div class="insert__row">
                        <div class="insert__label">업체명</div>
                        <input type="text" placeholder="업체명을 입력하세요." name="cname" maxlength=25>
                    </div>
                    <div class="insert__row insert__row--middle">
                        <div class="insert__label">가격</div>
                        <input type="text" placeholder="가격을 입력하세요." name="price" maxlength=25>
                        <div class="insert__label">할인가격</div>
                        <input type="text" placeholder="할인가격을 입력하세요." name="sprice" maxlength=25>
                    </div>
                    <div class="insert__row insert__row--middle">
                        <div class="insert__label">배송비</div>
                        <input type="text" placeholder="배송비를 입력하세요." name="sfee" maxlength=25>
                        <div class="insert__label">추가배송비</div>
                        <div class="insert__col">
                            <input type="text" placeholder="추가배송비를 입력하세요." name="psfee" maxlength=25>
                            <div class="insert__label--small">*왕복 도서/산간지역 추가비용을 입력해주세요.</div>
                        </div>
                    </div>
                    <div class="insert__row">
                        <div class="insert__label">조리정보</div>
                        <div class="insert__flex">
                            <div class="insert__label">중량</div>
                            <input type="text" placeholder="300" name="weight" maxlength=25>
                            <div class="insert__label insert__label--left">g</div>
                            <div class="insert__label">인원</div>
                            <input type="text" placeholder="1" name="serving" maxlength=25>
                            <div class="insert__label insert__label--left">인분</div>
                        </div>
                    </div>
                    <div class="insert__row insert__row--top">
                        <div class="insert__label insert__label--right">식품 상세정보</div>
                        <div class="insert__col">
                            <input type="file" name="detail_images[]" id="detail_images">
                            <label for="detail_images" class="insert__img insert__img--small">
                                <object data="public/images/icon/camera.svg" type="image/svg+xml"></object>
                                <div>칸마다 사진을 등록해주세요.</div>
                            </label>
                            <div class="insert__label--small">이미지(1280*세로 제한 없음, png/ jpeg)로 넣어주시길 바랍니다.</div>
                        </div>
                    </div>
                </div>
                <div class="insert__col">
                    <input type="file" name="title_images[]" id="title_images">
                    <label for="title_images" class="insert__img">
                        <object data="public/images/icon/camera.svg" type="image/svg+xml"></object>
                        <div>요리 완성사진을 등록해주세요.</div>
                    </label>
                </div>
            </div>
        </div>
        <div class="insert__label--small insert__label--center">
        (주)C Life의 해당 레시피의 문구와 이미지에 대한 저작권은 자사에 있으며 어떤 경우에도 이미지 사용은 불가합니다.    저작권에 위배되는 이미지 편집이나 무단 도용 및 무단 복제, 재배포 시 사전 경고 없이 행사 고발 조치와 관계법령에 의거하여 처벌됨을 알려드립니다.
        </div>
        <div class="insert__buttons">
            <button class="insert__button insert__submit" type="button">작성완료</button>
            <button class="insert__button" type="reset">취소</button>
        </div>
    </form>
    <script type="module" src="public/js/common.js"></script>
    <script type="module" src="public/js/loading.js"></script>
    <script type="module" src="public/js/insertM.js"></script>
</body>
</html>