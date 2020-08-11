<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);?>
	<?if(sizeof($arResult['ITEMS']) > 0):?>
        <div id="<?=$arParams["SLIDE"];?>" class="slider-catalog">
            <div class="slider-catalog__head">
                <div class="swiper-button-prev">
                    <svg class="i-icon">
                        <use xlink:href="#icon-arrow-left"></use>
                    </svg>
                </div>
                <?if($arParams["SLIDE_NAME"]):?><div class="h1"><?=$arParams["SLIDE_NAME"];?></div><?endif;?>
                <div class="swiper-button-next">
                    <svg class="i-icon">
                        <use xlink:href="#icon-arrow-right"></use>
                    </svg>
                </div>
            </div>
            <div class="slider-catalog__container swiper-container">
                <div class="slider-catalog__wrapper swiper-wrapper">
					<?foreach($arResult['ITEMS'] as $i => $arItem):?> 
						<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						$pict = false;
						if($arItem["DETAIL_PICTURE"]["ID"]){
							$pict = res($arItem["DETAIL_PICTURE"]["ID"],215,215, 1);
						}
						if(baseprice($arItem["ID"])){
							$price = str_replace(' ', '', baseprice($arItem["ID"]));
						}	
						if($arItem["PROPERTIES"]["oldprice"]["VALUE"] > $price){
							$proc = round(($arItem["PROPERTIES"]["oldprice"]["VALUE"]-$price) / $arItem["PROPERTIES"]["oldprice"]["VALUE"] * 100);
						}
						else $proc = false;	
					
						//dump($arItem["DISPLAY_PROPERTIES"]);?>             	
	                    <div class="slider-catalog__slide swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	                        <div class="catalog-item">
	                            <div class="icon-info-list">
	                            	<?if($arItem['DISPLAY_PROPERTIES']['hit']['VALUE']=="Хит"):?>
		                                <div class="icon-info-list__item">
		                                    <div class="icon-info icon-info--hit">Хит</div>
		                                </div>
	                                <?endif;?>
	                                <?if($arItem['DISPLAY_PROPERTIES']['new']['VALUE']=="Новинка"):?>
		                                <div class="icon-info-list__item">
		                                    <div class="icon-info icon-info--new">New</div>
		                                </div>	  
		                            <?endif;?>                           
	                                <?if($proc > 0 && $arItem["PROPERTIES"]["oldprice"]["VALUE"] > 0):?>
		                                <div class="icon-info-list__item">
		                                    <div class="icon-info icon-info--discount">-<?=$proc;?>%</div>
		                                </div>	                                
	                                <?endif;?>
	                            </div>
	                            <div class="catalog-item__top">
	                                <a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="catalog-item__link">
	                                    <?if($arItem['PROPERTIES']['CML2_ARTICLE']['VALUE']):?><div class="catalog-item__article">Арт: <?=$arItem['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></div><?endif;?>
	                                    <div class="catalog-item-picture">
	                                    	<?if($pict):?>
		                                        <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/catalog-heart.svg" alt="" class="catalog-item-picture__bg">
		                                        <img src="<?=$pict;?>" alt="" class="catalog-item-picture__img">
		                                    <?else:?>
		                                    	<img src="/upload/no_photo.png" alt="" class="catalog-item-picture__img">  
	                                        <?endif;?>
	                                    </div>
	                                    <div class="catalog-item__status">
		                                    <?if($arItem["CATALOG_QUANTITY"]>0):?>
		                                    	В наличии
		                                    <?else:?>
		                                    	Под заказ
		                                    <?endif;?>
	                                    </div>
	                                    <div class="catalog-item__name"><?=$arItem["NAME"];?></div>
	                                </a>
	                            </div>
	                            <div class="catalog-item__bottom">
	                                <div class="catalog-item-price">
	                                	<?if($arItem["PROPERTIES"]["oldprice"]["VALUE"] > $price && $arItem["PROPERTIES"]["oldprice"]["VALUE"]>"0"):?>
		                                    <div class="catalog-item-price__value catalog-item-price__value--sale"><?=$arItem["PROPERTIES"]["oldprice"]["VALUE"];?> р</div>
		                                    <div class="catalog-item-price__discount"><?=$price;?> р</div>	                                	
	                                	<?elseif($price):?>
	                                    	<div class="catalog-item-price__value"><?=$price;?> р</div>
	                                    <?endif;?>
	                                </div>
	                                <?if($arItem["CATALOG_QUANTITY"]>0 && $price >0):?>
	                                <a class="catalog-item__basket to_cart" data-rel="<?=$arItem["ID"];?>">
	                                    <svg class="i-icon">
	                                        <use xlink:href="#icon-basket-catalog"></use>
	                                    </svg>
	                                </a>
	                                <?else:?>
	                                	<a href="#coming" class="catalog-item__coming" data-modal-open data-rel="<?=$arItem["ID"];?>">Сообщить о поступлении</a>
	                                <?endif;?>
	                            </div>
	                        </div>
	                    </div>
					<?endforeach;?>
                </div>
                <div class="slider-catalog__pagination swiper-pagination"></div>
            </div>
        </div>
    <?endif;?>