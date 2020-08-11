<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div id="pageSlider" class="page-slider" data-page-slider>
    <div class="page-slider-counter" page-slider-counter
         data-anchor-target="#pageSlider"
         data-100-top="position:fixed; opacity:0; transform:translateY(20px);"
         data-top="position:fixed; opacity:1; transform:translateY(0vh);"
         data--6000-top="position:fixed; opacity:1; transform:translateY(0vh);"
         data--6050-top="position:fixed; opacity:0; transform:translateY(-5px);"
    >
        <svg class="circle-counter" width="60" height="60">
            <circle class="circle-counter__circle" stroke="white" stroke-width="1" cx="30" cy="30" r="29" fill="transparent"/>
        </svg>
        <div class="page-slider-counter__value" page-slider-counter-value>01</div>
    </div>
    <div class="page-slider__bg"
         data-anchor-target="#pageSlider"
         data-100p-top="position:absolute; transform:translateY(0vh); "
         data-top="position:fixed;  transform:translateY(0vh); "
         data--1800-top="position:fixed; top:0; bottom:auto; transform:translateY(0vh); "
         data--2000-top="position:fixed; top:0; bottom:auto; transform:translateY(-100vh); "
         data--3400-top="position:fixed; top:0; bottom:auto; transform:translateY(-100vh); "
         data--3600-top="position:fixed; top:0; bottom:auto; transform:translateY(-200vh); "
         data--4700-top="position:fixed; top:0; bottom:auto; transform:translateY(-200vh); "
         data--4900-top="position:fixed; top:0; bottom:auto; transform:translateY(-300vh); "
         data--16500-top="position:fixed; top:0; bottom:auto; transform:translateY(-300vh); "
    ></div>
    <div class="toy-element-wrapper">
        <div id="toyElement1" class="toy-element" data-animate
             data-anchor-target="#pageSlider"
             data-200-top="position:fixed; opacity:0; transform:scale(0.7) translateY(60px);"
             data-100-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--5900-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--6000-top="position:absolute; opacity:0; transform:scale(0.7) translateY(-10vh);"
        >
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement1"></use>
            </svg>
        </div>
        <div id="toyElement2" class="toy-element" data-animate
             data-anchor-target="#pageSlider"
             data-100-top="position:absolute; opacity:0; transform:scale(0.7) translateY(25px);"
             data-top="position:absolute; opacity:1; transform:scale(1) translateY(0px);"
             data--350-top="position:fixed; opacity:1; transform:scale(1) translateY(0px);"
             data--5800-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--6000-top="position:absolute; opacity:1; transform:scale(1) translateY(0);"
        >
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement2"></use>
            </svg>
        </div>
        <div id="toyElement3" class="toy-element" data-animate
             data-anchor-target="#pageSlider"
             data--200-top="position:absolute; opacity:0; transform:scale(0.7) translateY(0vh);"
             data--400-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--5800-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--5900-top="position:absolute; opacity:0; transform:scale(0.7) translateY(-5vh);"
        >
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement3"></use>
            </svg>
        </div>
        <div id="toyElement4" class="toy-element" data-animate
             data-anchor-target="#pageSlider"
             data-100-top="position:fixed; opacity:0; transform:scale(0.7) translateY(40px);"
             data--100-top="position:fixed; opacity:1; transform:scale(1) translateY(0px);"
             data--5800-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--6300-top="position:absolute; opacity:0; transform:scale(0.7) translateY(-10vh);"
        >
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement4"></use>
            </svg>
        </div>
        <div id="toyElement5" class="toy-element" data-animate
             data-anchor-target="#pageSlider"
             data--180-top="position:absolute; opacity:0; transform:scale(0.7) translateY(0vh);"
             data--250-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--5800-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--6100-top="position:absolute; opacity:0; transform:scale(0.7) translateY(-20vh);"
        >
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement5"></use>
            </svg>
        </div>
        <div id="toyElement6" class="toy-element" data-animate
             data-anchor-target="#pageSlider"
             data-top="position:absolute; opacity:0; transform:scale(0.7) translateY(25px);"
             data--100-top="position:fixed; opacity:1; transform:scale(0.7) translateY(0px);"
             data--5800-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--6000-top="position:absolute; opacity:0; transform:scale(0.7) translateY(-30vh);"
        >
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement6"></use>
            </svg>
        </div>
        <div id="toyElement7" class="toy-element" data-animate
             data-anchor-target="#pageSlider"
             data--250top="position:absolute; opacity:0; transform:scale(0.7) translateY(0vh);"
             data--450-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--5800-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--5900-top="position:absolute; opacity:0; transform:scale(0.7) translateY(-10vh);"
        >
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement7"></use>
            </svg>
        </div>
        <div id="toyElement8" class="toy-element" data-animate
             data-anchor-target="#pageSlider"
             data--180-top="position:absolute; opacity:0; transform:scale(0.7) translateY(15px);"
             data--500-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--5700-top="position:fixed; opacity:1; transform:scale(1) translateY(0vh);"
             data--6000-top="position:absolute; opacity:0; transform:scale(0.7) translateY(-10vh);"
        >
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement8"></use>
            </svg>
        </div>
    </div>
    <div class="page-slider__container" data-page-slider-container>
        <?$s="0"; foreach($arResult["ITEMS"] as $i=>$arItem): $s++;?>
            <section id="pageSlide<?=$s;?>" class="page-slider__section <?if($i=="0"):?>current<?endif;?>" data-page-slider-section
                data-anchor-target="#pageSlider"
                    <?if($s=="1"):?>
                        data-600-top="position:fixed; z-index:0; transform:translateY(100vh);"
                        data-top="position:fixed; z-index:1; transform:translateY(0vh);"
                        data--1800-top="position:fixed; z-index:1; transform:translateY(0vh);"
                        data--2000-top="position:fixed; z-index:1; transform:translateY(-100vh);"
                    <?elseif($s=="2"):?>
                         data--1800-top="position:fixed; z-index:1; transform:translateY(100vh);"
                         data--2000-top="position:fixed; z-index:1; transform:translateY(0vh);"
                         data--3400-top="position:fixed; z-index:1; transform:translateY(0vh);"
                         data--3600-top="position:fixed; z-index:1; transform:translateY(-100vh);"  
                    <?elseif($s=="3"):?>
                         data--3400-top="position:fixed; z-index:1; transform:translateY(100vh);"
                         data--3600-top="position:fixed; z-index:1; transform:translateY(0vh);"
                         data--4700-top="position:fixed; z-index:1; transform:translateY(0vh);"
                         data--4900-top="position:fixed; z-index:1; transform:translateY(-100vh);"             
                    <?else:?>  
                        data--4700-top="position:fixed; z-index:1; opacity: 1; transform:translateY(100vh);"
                        data--4900-top="position:fixed; z-index:1; opacity: 1; transform:translateY(0vh);"
                        data--6000-top="position:fixed; z-index:1; opacity: 1; transform:translateY(0vh);"
                        data--6500-top="position:fixed; z-index:1; opacity: 0; transform:translateY(-100vh);"                                               
                    <?endif;?>
            >
                <div class="page-slider-counter" page-slider-counter>
                    <svg class="circle-counter" width="60" height="60">
                        <circle class="circle-counter__circle" stroke="white" stroke-width="1" cx="30" cy="30" r="29" fill="transparent"/>
                    </svg>
                    <div class="page-slider-counter__value" page-slider-counter-value>0<?=$s;?></div>
                </div>
                <div class="create-toy"
                     data-anchor-target="#pageSlider"
                    <?if($s=="1"):?>
                     data--1800-top="transform:translateY(0vh);"
                     data--2000-top="transform:translateY(100vh);"
                     data--3400-top="transform:translateY(100vh);"
                     data--3600-top="transform:translateY(-100vh);"
                    <?elseif($s=="2"):?>
                     data--1800-top="transform:translateY(-100vh);"
                     data--2000-top="transform:translateY(0vh);"
                     data--3400-top="transform:translateY(0vh);"
                     data--3600-top="transform:translateY(100vh);"
                     data--4700-top="transform:translateY(100vh);"
                     data--4900-top="transform:translateY(-100vh);"   
                    <?elseif($s=="3"):?>     
                     data-top="transform:translateY(0vh);"
                     data--3400-top="transform:translateY(-100vh);"
                     data--3600-top="transform:translateY(0vh);"
                     data--4700-top="transform:translateY(0vh);"
                     data--4900-top="transform:translateY(100vh);"
                     data--6000-top="transform:translateY(100vh);"
                     data--6500-top="transform:translateY(0vh);"
                    <?else:?>   
                     data--4900-top="opacity:0;"
                     data--5300-top="opacity:1;"        
                    <?endif;?>
                >
                    <div class="create-toy__head"
                         data-anchor-target="#pageSlider"
                        <?if($s=="1"):?>
                             data-600-top="opacity: 0;"
                             data-100-top="opacity: 1;"
                             data--1800-top="opacity: 1"
                             data--1900-top="opacity: 0"
                        <?elseif($s=="2"):?>
                             data--2000-top="opacity:0;"
                             data--2200-top="opacity:1;"
                             data--3400-top="opacity:1;"
                             data--3600-top="opacity:0;"
                        <?elseif($s=="3"):?>
                             data--3600-top="opacity:0;"
                             data--3800-top="opacity:1;"
                             data--4700-top="opacity:1;"
                             data--4900-top="opacity:0;"  
                        <?else:?>
                             data--4900-top="opacity:0;"
                             data--5300-top="opacity:1;" 
                        <?endif;?>
                    >
                        <div class="h1"><?=$arItem["NAME"];?></div>
                        <div class="create-toy__desc">
                            <?=$arItem["PROPERTIES"]["desc"]["~VALUE"]["TEXT"];?>
                        </div>
                    </div>
                    <div class="create-toy__body">
                        <div class="toy" data-toy data-animate="toy"
                             data-anchor-target="#pageSlider"
                            <?if($s=="1"):?>
                                 data--1200-top="opacity: 0; transform:scale(0.7);"
                                 data--1400-top="opacity: 1; transform:scale(1);"
                                 data--3100-top="opacity: 1; transform:scale(1);"
                                 data--3300-top="opacity: 0; transform:scale(1);"
                            <?elseif($s=="2"):?>
                                 data--3100-top="opacity:0;"
                                 data--3300-top="opacity:1;"
                                 data--4500-top="opacity:1;"
                                 data--4700-top="opacity:0;"
                            <?elseif($s=="3"):?>
                                 data--4500-top="opacity:0;"
                                 data--4700-top="opacity:1;"
                                 data--5300-top="opacity:1;"
                                 data--5600-top="opacity:0;" 
                            <?else:?>
                                 data--5300-top="opacity:0;"
                                 data--5600-top="opacity:1;"
                            <?endif;?>
                        >
                            <svg class="i-icon">
                                <use xlink:href="#icon-toy-heart"></use>
                            </svg>
                            <img src="<?=res($arItem["PROPERTIES"]["pict"]["VALUE"],339,421, 1);?>" alt="" class="toy__img">
                        </div>
                        <?if($arItem["PROPERTIES"]["pictlist"]["VALUE"]):?>
                            <div class="toy-list-wrapper">
                                <ul class="toy-list" data-animate-toy-list="toy-item"
                                    data-anchor-target="#pageSlider"
                                    <?if($s=="1"):?>
                                        data--1500-top="opacity: 1;"
                                        data--1700-top="opacity: 0;"
                                    <?elseif($s=="2"):?>
                                        data--3100-top="opacity: 1"
                                        data--3300-top="opacity: 0"
                                    <?elseif($s=="3"):?>
                                        data--4500-top="opacity:1;"
                                        data--4700-top="opacity:0;"
                                    <?else:?>
                                         data--5300-top="opacity:0;"
                                         data--5400-top="opacity:1;"
                                    <?endif;?>
                                >
                                    <?if($s=="1"):?>
                                        <?$is = "500"; $ik="600";?>
                                    <?elseif($s=="2"):?>
                                        <?$is = "2100"; $ik="2200";?>
                                    <?elseif($s=="3"):?>
                                        <?$is = "3550"; $ik="3600";?>
                                    <?endif;?>
                                    <?foreach($arItem["PROPERTIES"]["pictlist"]["VALUE"] as $pictlist):?> 
                                        <li class="toy-list__item" data-animate-toy-item="toy-item"
                                            data-anchor-target="#pageSlider"
                                        <?if($s=="1"):?>
                                            <? $is=$is+100;$ik=$ik+100;?>
                                            data--<?=$is;?>-top="opacity: 0; transform[bounce]:scale(0.7);"
                                            data--<?=$ik;?>-top="opacity: 1; transform[bounce]:scale(1);"
                                        <?elseif($s=="2"):?>
                                            <? $is=$is+100;$ik=$ik+100;?>
                                            data--<?=$is;?>-top="opacity: 0; transform[bounce]:scale(0.7);"
                                            data--<?=$ik;?>-top="opacity: 1; transform[bounce]:scale(1);"                                        
                                        <?elseif($s=="3"):?>
                                            <? $is=$is+50;$ik=$ik+50;?>
                                             data--<?=$is;?>-top="opacity: 0; transform[bounce]:scale(0.7);"
                                            data--<?=$ik;?>-top="opacity: 1; transform[bounce]:scale(1);"                                       
                                        <?endif;?>
                                        >
                                            <div class="toy-item toy-item--big">
                                                <a href="#" class="toy-item__link">
                                                    <div class="toy-item-picture">
                                                        <img src="<?=res($pictlist,90,90, 1);?>" alt="" class="toy-item-picture__img">
                                                    </div>
                                                </a>
                                            </div>
                                        </li>
                                    <?endforeach;?>
                                </ul>
                            </div>
                        <?elseif($arItem["PROPERTIES"]["smell"]["VALUE"] || $arItem["PROPERTIES"]["sound"]["VALUE"] || $arItem["PROPERTIES"]["lamp"]["VALUE"]):?>
                            <div class="toy-list-wrapper toy-list-wrapper--ajax" data-anchor-target="#pageSlider" data--3400-top="opacity:0;" data--3600-top="opacity:1;" data--4500-top="opacity:1;" data--4700-top="opacity:0;"><?include($_SERVER['DOCUMENT_ROOT']."/local/inc/ajax/toy.php");?></div>
                             <div class="toy-list-wrapper toy-list-wrapper--margin-top">
                                <ul class="toy-list" data-animate-toy-controls-list="toy-smell"
                                    data-anchor-target="#pageSlider"
                                    data--3600-top="opacity:0;"
                                    data--3800-top="opacity:1;"
                                    data--4500-top="opacity:1;"
                                    data--4700-top="opacity:0;"

                                >                               
                                    <?if($arItem["PROPERTIES"]["smell"]["VALUE"]):?>
                                        <li class="toy-list__item active" data-animate-toy-controls-item="undefined" data-rel="smell" id="<?=$arItem["ID"];?>">
                                            <div class="toy-item toy-item--black">
                                                <a class="toy-item__link">
                                                    <svg class="i-icon i-icon--smell">
                                                        <use xlink:href="#icon-smell"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </li>
                                    <?endif;?>
                                    <?if($arItem["PROPERTIES"]["sound"]["VALUE"]):?>
                                        <li class="toy-list__item" data-animate-toy-controls-item="undefined" data-rel="sound" id="<?=$arItem["ID"];?>">
                                            <div class="toy-item toy-item--black">
                                                <a class="toy-item__link">
                                                    <svg class="i-icon i-icon--sound">
                                                        <use xlink:href="#icon-sound"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </li>
                                    <?endif;?>
                                    <?if($arItem["PROPERTIES"]["lamp"]["VALUE"]):?>
                                        <li class="toy-list__item" data-animate-toy-controls-item="undefined" data-rel="lamp" id="<?=$arItem["ID"];?>">
                                            <div class="toy-item toy-item--black">
                                                <a class="toy-item__link">
                                                    <svg class="i-icon i-icon--lamp">
                                                        <use xlink:href="#icon-lamp"></use>
                                                    </svg>
                                                </a>
                                            </div>
                                        </li>
                                    <?endif;?>
                                </ul>
                            </div>
                        <?elseif($arItem["PROPERTIES"]["v_sound"]["VALUE"] || $arItem["PROPERTIES"]["v_smell"]["VALUE"]):?>
                             <div class="toy-list-wrapper toy-list-wrapper--vertical">
                                <div class="toy-list toy-list--vertical">
                                    <div class="toy-list__item"
                                         data-anchor-target="#pageSlider"
                                         data--5300-top="opacity:0;"
                                         data--5400-top="opacity:1;"
                                    >
                                        <div class="toy-item toy-item--big toy-item--black">
                                            <a class="toy-item__link">
                                                <div class="toy-item-picture">
                                                    <img src="<?=res($arItem["PROPERTIES"]["v_sound"]["VALUE"],90,90, 1);?>" alt="" class="toy-item-picture__img">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="toy-list__item"
                                         data-anchor-target="#pageSlider"
                                         data--5400-top="opacity:0;"
                                         data--5500-top="opacity:1;"
                                    >
                                        <div class="toy-item toy-item--big toy-item--black">
                                            <a class="toy-item__link">
                                                <div class="toy-item-picture">
                                                    <img src="<?=res($arItem["PROPERTIES"]["v_smell"]["VALUE"],90,90, 1);?>" alt="" class="toy-item-picture__img">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?endif;?>
                    </div>
                    <?if($i=="3"):?>
                        <div class="create-toy__foot"
                             data-anchor-target="#pageSlider"
                             data--5500-top="opacity:0;"
                             data--5600-top="opacity:1;"
                        >
                            <div class="link-arrow">
                                <a href="/catalog/myagkie_igrushki/" class="link-arrow__link">
                                    <span class="link-arrow__label">Смотреть все товары</span>
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
            </section>
        <?endforeach;?>
    </div>
</div>