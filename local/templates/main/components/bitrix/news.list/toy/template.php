<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div id="pageSlider" class="page-slider" data-page-slider>
    <div class="page-slider__container" data-page-slider-container>
        <div class="page-slider-counter" page-slider-counter>
            <svg class="circle-counter" width="60" height="60">
                <circle class="circle-counter__circle" stroke="white" stroke-width="1" cx="30" cy="30" r="29" fill="transparent"/>
            </svg>
            <div class="page-slider-counter__value" page-slider-counter-value>0<?=$i+1?></div>
        </div>
        <div id="toyElement1" class="toy-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement1"></use>
            </svg>
        </div>
        <div id="toyElement2" class="toy-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement2"></use>
            </svg>
        </div>
        <div id="toyElement3" class="toy-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement3"></use>
            </svg>
        </div>
        <div id="toyElement4" class="toy-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement4"></use>
            </svg>
        </div>
        <div id="toyElement5" class="toy-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement5"></use>
            </svg>
        </div>
        <div id="toyElement6" class="toy-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement6"></use>
            </svg>
        </div>
        <div id="toyElement7" class="toy-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement7"></use>
            </svg>
        </div>
        <div id="toyElement8" class="toy-element" data-animate>
            <svg class="i-icon">
                <use xlink:href="#icon-toyElement8"></use>
            </svg>
        </div>
        <?$s="0"; foreach($arResult["ITEMS"] as $i=>$arItem): $s++;?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            ?>
            <section id="pageSlide<?=$s;?>" class="page-slider__section <?if($i=="0"):?>current<?endif;?>" data-page-slider-section  id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                <div class="create-toy">
                    <div class="create-toy__head">
                        <div class="h1"><?=$arItem["NAME"];?></div>
                        <div class="create-toy__desc">
                            <?=$arItem["PROPERTIES"]["desc"]["~VALUE"]["TEXT"];?>
                        </div>
                    </div>
                    <div class="create-toy__body">
                        <div class="toy" data-toy data-animate="toy">
                            <svg class="i-icon">
                                <use xlink:href="#icon-toy-heart"></use>
                            </svg>
                            <img src="<?=res($arItem["PROPERTIES"]["pict"]["VALUE"],339,421, 1);?>" alt="" class="toy__img">
                        </div>
                        <?if($arItem["PROPERTIES"]["pictlist"]["VALUE"]):?>
                            <ul class="toy-list" data-animate-toy-list="toy-item">
                                <?foreach($arItem["PROPERTIES"]["pictlist"]["VALUE"] as $pictlist):?>
                                   <li class="toy-list__item" data-animate-toy-item="toy-item">
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
                        <?elseif($arItem["PROPERTIES"]["smell"]["VALUE"] || $arItem["PROPERTIES"]["sound"]["VALUE"] || $arItem["PROPERTIES"]["lamp"]["VALUE"]):?>
                            <div class="toy-list-wrapper toy-list-wrapper--ajax"><?include($_SERVER['DOCUMENT_ROOT']."/local/inc/ajax/toy.php");?></div>
                             <div class="toy-list-wrapper toy-list-wrapper--margin-top">
                                <ul class="toy-list" data-animate-toy-controls-list="toy-smell">
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
                                    <div class="toy-list__item">
                                        <div class="toy-item toy-item--big toy-item--black">
                                            <a class="toy-item__link">
                                                <div class="toy-item-picture">
                                                    <img src="<?=res($arItem["PROPERTIES"]["v_sound"]["VALUE"],90,90, 1);?>" alt="" class="toy-item-picture__img">
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="toy-list__item">
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
                        <div class="create-toy__foot">
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