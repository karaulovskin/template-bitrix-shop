<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
global $cont;?>
<!--Блок Выберите игрушку-->

<section id="#hero" class="hero" data-page-slider-before>
    <div class="hero__media">
    	<?if($cont["fonvideo"]):?>
	        <div class="player" data-player>
	            <video data-player-video autoplay muted loop>
	                <source src="<?=getpuch($cont["fonvideo"]);?>">
	            </video>
	        </div>
	    <?elseif($cont["fonimg"]):?>
	        <div class="picture">
	            <img class="picture__img" alt="" src="<?=getpuch($cont["fonimg"]);;?>">
	        </div>
	    <?endif;?>
    </div>
    <div class="hero__body">
        <div id="heroElement1" class="hero-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-heroElement1"></use>
            </svg>
        </div>
        <div id="heroElement2" class="hero-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-heroElement2"></use>
            </svg>
        </div>
        <div id="heroElement3" class="hero-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-heroElement3"></use>
            </svg>
        </div>
        <div class="hero__logo">
            <div class="logo" data-animate="hero-logo">
                <a class="logo__link">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/logo.svg" alt="" class="logo__img">
                </a>
            </div>
        </div>
    </div>
    <div class="hero__footer">
        <div class="hero-scroll">
            <a href="#pageSlider" class="hero-scroll__link" data-hero-scroll>
                <div class="hero-scroll__text">Создай свою игрушку</div>
                <span class="hero-scroll__circle">
                    <svg class="i-icon">
                        <use xlink:href="#icon-scroll"></use>
                    </svg>
                </span>
            </a>
        </div>
    </div>
</section>
<?$APPLICATION->IncludeComponent(
    "bitrix:news.list", 
    "toy", 
    array(
        "ACTIVE_DATE_FORMAT" => "d.m.Y",
        "ADD_SECTIONS_CHAIN" => "N",
        "AJAX_MODE" => "N",
        "AJAX_OPTION_ADDITIONAL" => "",
        "AJAX_OPTION_HISTORY" => "N",
        "AJAX_OPTION_JUMP" => "N",
        "AJAX_OPTION_STYLE" => "N",
        "CACHE_FILTER" => "N",
        "CACHE_GROUPS" => "N",
        "CACHE_TIME" => "3600",
        "CACHE_TYPE" => "A",
        "CHECK_DATES" => "Y",
        "DETAIL_URL" => "",
        "DISPLAY_BOTTOM_PAGER" => "N",
        "DISPLAY_DATE" => "Y",
        "DISPLAY_NAME" => "Y",
        "DISPLAY_PICTURE" => "Y",
        "DISPLAY_PREVIEW_TEXT" => "Y",
        "DISPLAY_TOP_PAGER" => "N",
        "FIELD_CODE" => array(
            0 => "",
            1 => "",
        ),
        "FILTER_NAME" => "",
        "HIDE_LINK_WHEN_NO_DETAIL" => "N",
        "IBLOCK_ID" => "8",
        "IBLOCK_TYPE" => "shop",
        "INCLUDE_IBLOCK_INTO_CHAIN" => "N",
        "INCLUDE_SUBSECTIONS" => "N",
        "MESSAGE_404" => "",
        "NEWS_COUNT" => "4",
        "PAGER_BASE_LINK_ENABLE" => "N",
        "PAGER_DESC_NUMBERING" => "N",
        "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
        "PAGER_SHOW_ALL" => "N",
        "PAGER_SHOW_ALWAYS" => "N",
        "PAGER_TEMPLATE" => ".default",
        "PAGER_TITLE" => "Новости",
        "PARENT_SECTION" => "",
        "PARENT_SECTION_CODE" => "",
        "PREVIEW_TRUNCATE_LEN" => "",
        "PROPERTY_CODE" => array(
            0 => "desc",
            1 => "pict",
            2 => "icsmell",
            3 => "icsound",
            4 => "iclamp",
            5 => "url",
            6 => "",
        ),
        "SET_BROWSER_TITLE" => "N",
        "SET_LAST_MODIFIED" => "N",
        "SET_META_DESCRIPTION" => "N",
        "SET_META_KEYWORDS" => "N",
        "SET_STATUS_404" => "N",
        "SET_TITLE" => "N",
        "SHOW_404" => "N",
        "SORT_BY1" => "SORT",
        "SORT_BY2" => "SORT",
        "SORT_ORDER1" => "ASC",
        "SORT_ORDER2" => "ASC",
        "STRICT_SECTION_CHECK" => "N",
        "COMPONENT_TEMPLATE" => "toy"
    ),
    false
);?>


<!--Блок товаров-->
<section id="afterPageSlider" class="section-catalog" data-page-slider-after>
    <div class="container">
        <?global $hitFilter;
        $hitFilter['PROPERTY_HIT_VALUE'] = "Хит";
         $APPLICATION->IncludeComponent(
            "bitrix:catalog.section", 
            "slider_goods", 
            array(
                "SLIDE" => "sliderHit",
                "SLIDE_NAME" => "Хиты продаж",
                "ACTION_VARIABLE" => "action",
                "ADD_PICT_PROP" => "-",
                "ADD_PROPERTIES_TO_BASKET" => "N",
                "ADD_SECTIONS_CHAIN" => "N",
                "ADD_TO_BASKET_ACTION" => "ADD",
                "AJAX_MODE" => "N",
                "AJAX_OPTION_ADDITIONAL" => "",
                "AJAX_OPTION_HISTORY" => "N",
                "AJAX_OPTION_JUMP" => "N",
                "AJAX_OPTION_STYLE" => "N",
                "BACKGROUND_IMAGE" => "-",
                "BASKET_URL" => "/personal/basket.php",
                "BROWSER_TITLE" => "-",
                "CACHE_FILTER" => "N",
                "CACHE_GROUPS" => "N",
                "CACHE_TIME" => "3600",
                "CACHE_TYPE" => "A",
                "COMPATIBLE_MODE" => "N",
                "CONVERT_CURRENCY" => "N",
                "CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
                "DETAIL_URL" => "",
                "DISABLE_INIT_JS_IN_COMPONENT" => "N",
                "DISPLAY_BOTTOM_PAGER" => "N",
                "DISPLAY_COMPARE" => "N",
                "DISPLAY_TOP_PAGER" => "N",
                "ELEMENT_SORT_FIELD" => "sort",
                "ELEMENT_SORT_FIELD2" => "id",
                "ELEMENT_SORT_ORDER" => "asc",
                "ELEMENT_SORT_ORDER2" => "desc",
                "ENLARGE_PRODUCT" => "PROP",
                "ENLARGE_PROP" => "-",
                "FILTER_NAME" => "hitFilter",
                "HIDE_NOT_AVAILABLE" => "N",
                "HIDE_NOT_AVAILABLE_OFFERS" => "N",
                "IBLOCK_ID" => "4",
                "IBLOCK_TYPE" => "catalog",
                "INCLUDE_SUBSECTIONS" => "Y",
                "LABEL_PROP" => array(
                ),
                "LAZY_LOAD" => "N",
                "LINE_ELEMENT_COUNT" => "3",
                "PROPERTY_CODE" => array(
                    0 => "hit",
                    1 => "articule",
                    2 => "srok",
                    3 => "oldprice",
                    4 => "",
                ),
                "LOAD_ON_SCROLL" => "N",
                "MESSAGE_404" => "",
                "MESS_BTN_ADD_TO_BASKET" => "В корзину",
                "MESS_BTN_BUY" => "Купить",
                "MESS_BTN_DETAIL" => "Подробнее",
                "MESS_BTN_SUBSCRIBE" => "Подписаться",
                "MESS_NOT_AVAILABLE" => "Нет в наличии",
                "META_DESCRIPTION" => "-",
                "META_KEYWORDS" => "-",
                "OFFERS_LIMIT" => "20",
                "PAGER_BASE_LINK_ENABLE" => "N",
                "PAGER_DESC_NUMBERING" => "N",
                "PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
                "PAGER_SHOW_ALL" => "N",
                "PAGER_SHOW_ALWAYS" => "N",
                "PAGER_TEMPLATE" => ".default",
                "PAGER_TITLE" => "Товары",
                "PAGE_ELEMENT_COUNT" => "24",
                "PARTIAL_PRODUCT_PROPERTIES" => "N",
                "PRICE_CODE" => array(
                    0 => "base",
                ),
                "PRICE_VAT_INCLUDE" => "Y",
                "PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
                "PRODUCT_ID_VARIABLE" => "id",
                "PRODUCT_PROPS_VARIABLE" => "prop",
                "PRODUCT_QUANTITY_VARIABLE" => "quantity",
                "PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false}]",
                "PRODUCT_SUBSCRIPTION" => "Y",
                "RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
                "RCM_TYPE" => "personal",
                "SECTION_CODE" => "",
                "SECTION_CODE_PATH" => "",
                "SECTION_ID" => "",
                "SECTION_ID_VARIABLE" => "SECTION_ID",
                "SECTION_URL" => "",
                "SECTION_USER_FIELDS" => array(
                    0 => "",
                    1 => "",
                ),
                "SEF_MODE" => "N",
                "SEF_RULE" => "",
                "SET_BROWSER_TITLE" => "N",
                "SET_LAST_MODIFIED" => "N",
                "SET_META_DESCRIPTION" => "N",
                "SET_META_KEYWORDS" => "N",
                "SET_STATUS_404" => "N",
                "SET_TITLE" => "N",
                "SHOW_404" => "N",
                "SHOW_ALL_WO_SECTION" => "Y",
                "SHOW_CLOSE_POPUP" => "N",
                "SHOW_DISCOUNT_PERCENT" => "N",
                "SHOW_FROM_SECTION" => "N",
                "SHOW_MAX_QUANTITY" => "N",
                "SHOW_OLD_PRICE" => "N",
                "SHOW_PRICE_COUNT" => "1",
                "SHOW_SLIDER" => "N",
                "SLIDER_INTERVAL" => "3000",
                "SLIDER_PROGRESS" => "N",
                "TEMPLATE_THEME" => "",
                "USE_ENHANCED_ECOMMERCE" => "N",
                "USE_MAIN_ELEMENT_SECTION" => "N",
                "USE_PRICE_COUNT" => "N",
                "USE_PRODUCT_QUANTITY" => "N",
                "COMPONENT_TEMPLATE" => "slider_goods",
                "PROPERTY_CODE_MOBILE" => array(
                ),
                "PRODUCT_PROPERTIES" => array(
                )
            ),
            false
        );?>
        <?global $newFilter;
        $newFilter['PROPERTY_NEW_VALUE'] = "Новинка";
         $APPLICATION->IncludeComponent(
	"bitrix:catalog.section", 
	"slider_goods", 
	array(
		"SLIDE" => "sliderNew",
		"SLIDE_NAME" => "Новинки",
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"ADD_SECTIONS_CHAIN" => "N",
		"ADD_TO_BASKET_ACTION" => "ADD",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"BACKGROUND_IMAGE" => "-",
		"BASKET_URL" => "/personal/basket.php",
		"BROWSER_TITLE" => "-",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "3600",
		"CACHE_TYPE" => "A",
		"COMPATIBLE_MODE" => "N",
		"CONVERT_CURRENCY" => "N",
		"CUSTOM_FILTER" => "{\"CLASS_ID\":\"CondGroup\",\"DATA\":{\"All\":\"AND\",\"True\":\"True\"},\"CHILDREN\":[]}",
		"DETAIL_URL" => "",
		"DISABLE_INIT_JS_IN_COMPONENT" => "N",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_COMPARE" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "PROP",
		"ENLARGE_PROP" => "-",
		"FILTER_NAME" => "newFilter",
		"HIDE_NOT_AVAILABLE" => "N",
		"HIDE_NOT_AVAILABLE_OFFERS" => "N",
		"IBLOCK_ID" => "4",
		"IBLOCK_TYPE" => "catalog",
		"INCLUDE_SUBSECTIONS" => "Y",
		"LABEL_PROP" => array(
		),
		"LAZY_LOAD" => "N",
		"LINE_ELEMENT_COUNT" => "3",
		"PROPERTY_CODE" => array(
			0 => "hit",
			1 => "new",
			2 => "srok",
			3 => "oldprice",
			4 => "articule",
			5 => "",
		),
		"LOAD_ON_SCROLL" => "N",
		"MESSAGE_404" => "",
		"MESS_BTN_ADD_TO_BASKET" => "В корзину",
		"MESS_BTN_BUY" => "Купить",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_BTN_SUBSCRIBE" => "Подписаться",
		"MESS_NOT_AVAILABLE" => "Нет в наличии",
		"META_DESCRIPTION" => "-",
		"META_KEYWORDS" => "-",
		"OFFERS_LIMIT" => "20",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Товары",
		"PAGE_ELEMENT_COUNT" => "24",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(
		),
		"PRICE_VAT_INCLUDE" => "Y",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false},{'VARIANT':'6','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "Y",
		"RCM_PROD_ID" => $_REQUEST["PRODUCT_ID"],
		"RCM_TYPE" => "personal",
		"SECTION_CODE" => "",
		"SECTION_CODE_PATH" => "",
		"SECTION_ID" => "",
		"SECTION_ID_VARIABLE" => "SECTION_ID",
		"SECTION_URL" => "",
		"SECTION_USER_FIELDS" => array(
			0 => "",
			1 => "",
		),
		"SEF_MODE" => "N",
		"SEF_RULE" => "",
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SHOW_ALL_WO_SECTION" => "Y",
		"SHOW_CLOSE_POPUP" => "N",
		"SHOW_DISCOUNT_PERCENT" => "N",
		"SHOW_FROM_SECTION" => "N",
		"SHOW_MAX_QUANTITY" => "N",
		"SHOW_OLD_PRICE" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "N",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_MAIN_ELEMENT_SECTION" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"COMPONENT_TEMPLATE" => "slider_goods",
		"PROPERTY_CODE_MOBILE" => array(
		),
		"PRODUCT_PROPERTIES" => array(
		)
	),
	false
);?>        
    </div>
</section>
<!--Блок Собери свою игрушку-->
<section class="section-assemble">
    <div id="assembleElement1" class="assemble-element">
        <svg class="i-icon">
            <use xlink:href="#icon-assembleElement1"></use>
        </svg>
    </div>
    <div id="assembleElement2" class="assemble-element">
        <svg class="i-icon">
            <use xlink:href="#icon-assembleElement2"></use>
        </svg>
    </div>
    <div id="assembleElement3" class="assemble-element">
        <svg class="i-icon">
            <use xlink:href="#icon-assembleElement3"></use>
        </svg>
    </div>
    <div class="container">
        <div class="heart-block heart-block--assemble">
            <div class="heart-block__heart">
                <svg class="i-icon icon-heart">
                    <use xlink:href="#icon-heart"></use>
                </svg>
                <svg class="i-icon icon-mish">
                    <use xlink:href="#icon-title-mish"></use>
                </svg>
            </div>
            <div class="heart-block__content">
                <div class="heart-block__title">
                    <div class="h1 title-border">Собери свою игрушку</div>
                </div>
                <div class="heart-block__desc">
                    <p>
                        <?=$cont["texttoy"];?>
                    </p>
                </div>
                <?if($cont["url"]):?>
                    <div class="heart-block__bottom">
                        <div class="link-arrow link-arrow--orange">
                            <a href="<?=$cont["url"];?>" class="link-arrow__link">
                                <span class="link-arrow__label">Собрать свою игрушку</span>
                                <i class="link-arrow__circle">
                                    <svg class="i-icon">
                                        <use xlink:href="#icon-arrow-right"></use>
                                    </svg>
                                </i>
                            </a>
                        </div>
                    </div>
                <?endif;?>
            </div>
            <?if($cont["youtube"] && $cont["imgtube"]):?>
                <div class="video-wrapper">
                    <div class="video" data-video>
                        <a class="video__link" href="https://www.youtube.com/embed/<?=videolink($cont["youtube"]);?>" data-video-link>
                            <picture>
                                <img class="video__media" src="<?=res($cont["imgtube"],810,457, 1);?>" alt="" data-video-media>
                            </picture>
                        </a>
                        <button class="video__button" type="button" aria-label="Запустить видео" data-video-button>
                            <svg class="video__play" class="i-icon">
                                <use xlink:href="#icon-play"></use>
                            </svg>
                            <svg class="video__play--mobile" class="i-icon">
                                <use xlink:href="#icon-play"></use>
                            </svg>
                        </button>
                    </div>
                </div>
            <?endif;?>
        </div>
    </div>
</section>
<!--Блок День рождения-->
<section class="section-birthday" style="background-image: url(<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/bg/bg-birthday.png)">
    <div class="container">
        <div class="heart-block heart-block--birthday">
            <div class="heart-block__heart">
                <picture class="icon-heart">
                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/heart-birthday.svg" alt="">
                </picture>
                <svg class="icon-mish i-icon">
                    <use xlink:href="#icon-title-mish"></use>
                </svg>
            </div>
            <div class="heart-block__content">
                <div class="heart-block__title">
                    <div class="h1 title-border"><?=$cont["yourhb"];?></div>
                </div>
                <div class="heart-block__desc">
                    <p>
                        <?=$cont["texthb"];?>
                    </p>
                </div>
                <?if($cont["urlhb"]):?>
	                <div class="heart-block__bottom">
	                    <div class="link-arrow">
	                        <a href="<?=$cont["urlhb"];?>" class="link-arrow__link">
	                            <span class="link-arrow__label">Хочу заказать!</span>
	                            <i class="link-arrow__circle">
	                                <svg class="i-icon">
	                                    <use xlink:href="#icon-arrow-right"></use>
	                                </svg>
	                            </i>
	                        </a>
	                    </div>
	                </div>
	            <?endif;?>
            </div>
        </div>
    </div>
</section>
<!--Блок акций-->
<?$APPLICATION->IncludeComponent(
	"bitrix:news.list", 
	"stocks", 
	array(
		"ACTIVE_DATE_FORMAT" => "d.m.Y",
		"ADD_SECTIONS_CHAIN" => "N",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "N",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "N",
		"CACHE_TIME" => "36000",
		"CACHE_TYPE" => "A",
		"CHECK_DATES" => "N",
		"DETAIL_URL" => "",
		"DISPLAY_BOTTOM_PAGER" => "N",
		"DISPLAY_DATE" => "N",
		"DISPLAY_NAME" => "N",
		"DISPLAY_PICTURE" => "N",
		"DISPLAY_PREVIEW_TEXT" => "N",
		"DISPLAY_TOP_PAGER" => "N",
		"FIELD_CODE" => array(
			0 => "",
			1 => "",
		),
		"FILTER_NAME" => "",
		"HIDE_LINK_WHEN_NO_DETAIL" => "N",
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "shop",
		"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
		"INCLUDE_SUBSECTIONS" => "N",
		"MESSAGE_404" => "",
		"NEWS_COUNT" => "4",
		"PAGER_BASE_LINK_ENABLE" => "N",
		"PAGER_DESC_NUMBERING" => "N",
		"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
		"PAGER_SHOW_ALL" => "N",
		"PAGER_SHOW_ALWAYS" => "N",
		"PAGER_TEMPLATE" => ".default",
		"PAGER_TITLE" => "Новости",
		"PARENT_SECTION" => "",
		"PARENT_SECTION_CODE" => "",
		"PREVIEW_TRUNCATE_LEN" => "",
		"PROPERTY_CODE" => array(
			0 => "date",
			1 => "",
		),
		"SET_BROWSER_TITLE" => "N",
		"SET_LAST_MODIFIED" => "N",
		"SET_META_DESCRIPTION" => "N",
		"SET_META_KEYWORDS" => "N",
		"SET_STATUS_404" => "N",
		"SET_TITLE" => "N",
		"SHOW_404" => "N",
		"SORT_BY1" => "SORT",
		"SORT_BY2" => "ID",
		"SORT_ORDER1" => "ASC",
		"SORT_ORDER2" => "DESC",
		"STRICT_SECTION_CHECK" => "N",
		"COMPONENT_TEMPLATE" => "stocks"
	),
	false
);?>
<!--seo блок-->
<section class="seo">
    <div id="seoElement1" class="seo-element">
        <svg class="i-icon">
            <use xlink:href="#icon-seo-1"></use>
        </svg>
    </div>
    <div id="seoElement2" class="seo-element">
        <svg class="i-icon">
            <use xlink:href="#icon-seo-2"></use>
        </svg>
    </div>
    <div id="seoElement3" class="seo-element">
        <svg class="i-icon">
            <use xlink:href="#icon-seo-3"></use>
        </svg>
    </div>
    <div class="container container--min">
        <div class="seo__block">
            <div class="seo__content">
                <h1><?=$cont["seotitle"];?></h1>
                <?=$cont["seotext"];?>
            </div>
        </div>
    </div>
</section>