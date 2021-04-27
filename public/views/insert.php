<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALife</title>
    <link rel="stylesheet" href="public/css/common.css">
    <link rel="stylesheet" href="public/css/insert.css">
    <link rel="shortcut icon" href="public/images/favicon/favicon.ico">
</head>
<body>
    <?php include('header.php'); ?>
    <div class="insert padding">
        <div class="insert__form">
            <div class="insert__title">레시피 등록</div>
            <div class="insert__table recipe__total">
                <div class="insert__row">
                    <div class="insert__label">
                        <div>레시피 제목</div>
                        <div>소개</div>
                    </div>
                    <div class="insert__col">
                        <input type="text" placeholder="제목을 입력하세요.">
                        <textarea name="content" placeholder="본인의 레시피에 대해 소개해주세요."></textarea>
                    </div>
                    <div>
                        <div class="insert__img">요리 대표사진을<br>등록해주세요.</div>
                    </div>
                </div>
                <div class="insert__row">
                    <div class="insert__label">요리정보</div>
                    <div>
                        <div class="insert__wrap">
                            <div class="insert__label insert__label--left">조리시간</div>
                            <div class="insert__input--small"><input type="text" placeholder="30"></div>
                            <p>분 이내</p>
                            <div class="insert__label insert__label--left">인원</div>
                            <div class="insert__input--small"><input type="text" placeholder="1"></div>
                            <p>인분</p>
                        </div>
                    </div>
                </div>
                <div class="insert__row ingredient__all">
                    <div class="insert__label">전체재료</div>
                    <div>
                        <div class="insert__wrap insert__wrap--between">
                            <div class="insert__input--middle"><input type="text" placeholder="예시) 재료이름"></div>
                            <div class="insert__input--middle"><input type="text" placeholder="예시) 계량 g"></div>
                        </div>
                    </div>
                    <button class="insert__button">재료삭제 -</button>
                </div>
                <div class="insert__row ingredient__end">
                    <div></div>
                    <div class="insert__label--small">
                        재료가 남거나 부족하지 않도록 정확하게 작성해주세요.<br>
                        양념, 양념장, 소스, 드레싱, 토핑, 시럽, 육수 밑간 등으로 칸으로 구분해서 작성해주세요.<br>
                        한개, 반개, 한개반 같은 한글 표기는 1개, 1/2개, 1+1/2(또는 1.5개)와 같이 표기해주세요.
                    </div>
                    <button class="insert__button insert__button-append">재료추가 +</button>
                </div>
                <div class="insert__row">
                    <div class="insert__label">해시태그</div>
                    <div class="insert__wrap-col">
                        <textarea name="hashtag" placeholder="레시피와 관련된 단어를 해시태그로 입력해주세요."></textarea>
                        <div class="insert__label--small">해시태그 설정 시 A Life이용자들이 쉽게 레시피를 검색할 수 있습니다.</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="insert__form">
            <div class="insert__table recipe__piece">
                <div class="insert__row">
                    <div class="insert__label">
                        <div>요리순서</div>
                        <div>STEP 1</div>
                    </div>
                    <div class="insert__col">
                        <textarea name="recipe" placeholder="칸마다 이미지와 레시피의 요리순서를 작성해주세요."></textarea>
                        <div class="insert__label--small">
                            요리의 맛이 좌우될 수 있는 중요한 부분은 빠짐없이 작성해주세요.<br>
                            요리순서는 페이지당 글자수 200자 이내, 최대 20페이지(사진) 적을 수 있습니다.
                        </div>
                    </div>
                    <div>
                        <div class="insert__img">이미지를<br>넣어주세요</div>
                    </div>
                </div>
                <div class="insert__row">
                    <div class="insert__label">재료</div>
                    <div>
                        <div class="insert__wrap insert__wrap--between">
                            <div class="insert__input--middle"><input type="text" placeholder="예시) 재료이름"></div>
                            <div class="insert__input--middle"><input type="text" placeholder="예시) 계량 g"></div>
                        </div>
                    </div>
                    <button class="insert__button">재료삭제 -</button>
                </div>
                <div class="insert__row">
                    <div></div>
                    <div class="insert__label--small">전체 재료에서 사용되는 재료를 작성해주세요.</div>
                    <button class="insert__button insert__button-append">재료추가 +</button>
                </div>
                <div class="insert__row">
                    <div class="insert__label">타이머</div>
                    <div>
                        <div class="insert__wrap">
                            <div class="insert__input--small"><input type="text" placeholder="00"></div>
                            <p>분 : </p>
                            <div class="insert__input--small"><input type="text" placeholder="00"></div>
                            <p>초</p>
                        </div>
                    </div>
                </div>
            </div>
            <button class="insert__button insert__button--big">순서추가 +</button>
        </div>
        <div class="insert__label--small insert__label--center">
        (주)A Life의 해당 레시피의 문구와 이미지에 대한 저작권은 자사에 있으며 어떤 경우에도 이미지 사용은 불가합니다.    저작권에 위배되는 이미지 편집이나 무단 도용 및 무단 복제, 재배포 시 사전 경고 없이 행사 고발 조치와 관계법령에 의거하여 처벌됨을 알려드립니다.
        </div>
        <div class="insert__buttons">
            <button class="insert__button">작성완료</button>
            <button class="insert__button">취소</button>
        </div>
    </div>
    <?php include('footer.php') ?>
    <script src="public/js/insert.js"></script>
    <script type="module" src="public/js/common.js"></script>
</body>
</html>