<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/common.css">
    <link rel="stylesheet" href="/public/css/mealkitDetail.css">
    <link rel="shortcut icon" href="/public/images/favicon/favicon.ico">
    <?php 
        include('header.php');
        include('interceptor/mealkitInterceptor.php');
        $mealkit = isExist($urls[2]);
        $total = $mealkit['mealkit_price']+$mealkit['mealkit_sprice']+$mealkit['mealkit_sfee']+$mealkit['mealkit_psfree'];
        $mealkitJson = json_encode($mealkit);
    ?>
    <title><?=$mealkit['mealkit_name']?> - ALife</title>
</head>
<body>
    <div class="show padding">
        <div class="show--left">
            <div class="show__image" style="background-image: url(../mealkits/<?=$mealkit['mealkit_id']?>/title_img.jpg)"></div>
            <div class="show__remocon">
                <img src="/public/images/icon/arrow_left.svg" alt="">
                <img src="/public/images/icon/arrow_right.svg" alt="">
            </div>
        </div>
        <div class="show--right">
            <div class="show__title"><?=$mealkit['mealkit_name']?></div>
            <div class="show__wrap">
                <div class="show__label">가격</div>
                <div class="show__text"><?=$mealkit['mealkit_price']?>원</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">업체명</div>
                <div class="show__text"><?=$mealkit['mealkit_cname']?></div>
            </div>
            <div class="show__wrap">
                <div class="show__label">인분</div>
                <div class="show__text"><?=$mealkit['mealkit_serving']?> 인분</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">중량</div>
                <div class="show__text"><?=$mealkit['mealkit_weight']?>g</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">배송비</div>
                <div class="show__text"><?=$mealkit['mealkit_sfee']?>원</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">추가배송비</div>
                <div class="show__text"><?=$mealkit['mealkit_psfree']?>원</div>
            </div>
            <div class="show__wrap">
                <div class="show__label">구매수량</div>
                <div class="show__text"><input type="number"></div>
            </div>
            <div class="show__wrap show__wrap--right">
                <div class="show__label show__label--light">총 상품금액 :</div>
                <div class="show__label show__label--won"><?=$total?>원</div>
            </div>
            <div class="show__buttons">
                <div class="show__button show__button--reversal basket">장바구니</div>
                <div class="show__button">바로구매</div>
                <div class="show__button thumbsup" data-id=<?=$mealkit['mealkit_id']?>><img src="/public/images/icon/heart_w.svg"></div>
            </div>
        </div>
    </div>
    <div class="info padding">
        <input type="radio" id="show1" name="show" checked>
        <input type="radio" id="show2" name="show">
        <input type="radio" id="show3" name="show">
        <input type="radio" id="show4" name="show">
        <div class="info__tabs">
            <div class="info__tab"><label for="show1" class="tab1">상품 상세정보</label></div>
            <div class="info__tab"><label for="show2" class="tab2">상품 후기</label></div>
            <div class="info__tab"><label for="show3" class="tab3">상품 문의</label></div>
            <div class="info__tab"><label for="show4" class="tab4">배송 / 교환 / 반품안내</label></div>
        </div>
        <div class="info__content tab1__content">
            <img src="../mealkits/<?=$mealkit['mealkit_id']?>/detail_img.jpg" alt="">
        </div>
        <div class="info__content tab2__content"></div>
        <div class="info__content tab3__content"></div>
        <div class="info__content tab4__content">
            <div class="tab4__label">
                택배 배송기일은 휴일 포함여부 및 상품 재고상황, 택배사 사정에 의해 지연될 수 있습니다.<br>
                제주 / 도서산간 지역은 추가 운임이 발생할 수 있습니다.</div>
            <div class="tab4__label tab4__label--bold tab4__label--border">교환 및 반품 안내</div>
            <div class="tab4__label tab4__label--bold">교환 반품 신청기간</div>
            <div class="tab4__label">상품이 표기 / 광고내용과 다르거나 계약 내용과 다른 경우 상품을 받으신 날부터 7일 이내로 신청 가능합니다.</div>
            <div class="tab4__label tab4__label--bold">교환 / 반품 회수(배송)비용</div>
            <div class="tab4__label">
                상품의 불량 / 하자 또는 표시광고 및 계약 내용과 다른 경우 해당 상품의 회수(배송) 비용은 무료이나 고객님의 단순변심으로 교환 / 반품의 경우 인한 반품은 어려울 있으니 양해부탁드립니다.<br>
                반품 / 교환비용(편도) : 3,000원<br>
                제주 / 도서산간 지역은 추가 운임이 발생할 수 있습니다.
            </div>
            <div class="tab4__label tab4__label--bold">교환 / 반품 불가 안내</div>
            <div class="tab4__label tab4__label--border">
                전자상거래 등에서 소비자보호에 관한 법률에 따라 다음의 경우 청약철회가 제한될 수 있습니다.<br>
                고객님이 상품 포장을 개봉하여 상품의 가치가 훼손된 경우<br>
                (단, 내용 확인을 위한 포장 개봉의 경우는 예외)<br>
                고객님의 단순변심으로 인한 교환/반품 신청이 상품 수령한 날로부터 7일이 경과한 경우<br>
                신선식품(냉장/냉동 포함)을 단순변심/주문착오로 교환/반품 신청하는 경우<br>
                고객님의 사용 또는 일부 소비에 의해 상품의 가치가 훼손된 경우<br>
                시간 경과에 따라 상품 등의 가치가 현저히 감소하여 재판매가 불가능한 경우<br>
                기타, 상품의 교환, 환불 및 상품 결함 등의 보상은 소비자분쟁해결기준(공정거래위원회 고시)에 의함<br>
            </div>  
            <div class="tab4__label">자세한 내용은  A-Life 고객센터로 문의주시길 바랍니다. </div>
        </div>
        <input type="hidden" class="mealkit__json" value='<?=$mealkitJson?>'>
    </div>
    <script type="module" src="/public/js/common.js"></script>
    <script type="module" src="/public/js/loading.js"></script>
    <script type="module" src="/public/js/mealkitDetail.js"></script>
    <?php include('footer.php'); ?>
</body>
</html>
