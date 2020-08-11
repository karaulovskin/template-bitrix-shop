<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?if (!empty($arResult['ITEMS'])):?>
	<div class="catalog  ajax_load">
    	<div class="catalog-list">	
				<?foreach ($arResult['ITEMS'] as $arItem):?>
					<?
						$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
						$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
						$price = false;
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
					?>
                        <div class="catalog-list__item <?if($_GET["q"] || CSite::InDir("/sale/")):?> catalog-list__item--3<?else:?> catalog-list__item--4<?endif;?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
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
	        <input type="hidden" name="" class='one_page' value="<?=$arParams["PAGE_ELEMENT_COUNT"]?>">
	        <input type="hidden" name="" class="all_page" value="<?=$arResult["NAV_RESULT"]->nSelectedCount;?>">
	        <input type="hidden" name="" class="on_page" value="<?=$arParams["PAGE_ELEMENT_COUNT"]?>">
	        <input type="hidden" name="" class='page_now' value="<?=$_GET['PAGEN_1']?>">  		
		    <?if($arResult["NAV_RESULT"]->NavPageCount >1 && $arResult["NAV_RESULT"]->NavPageCount != $_GET['PAGEN_1']):?>
	            <div class="load-more catalog__show">
	            	<a class="button-circle-plus" id="ajax_product" href="<?=explode("?",$_SERVER["REQUEST_URI"])[0]?>?sort=<?=$_REQUEST["sort"]?>&sort_order=<?=$_REQUEST["sort_order"]?>&PAGEN_1=<?=isset($_GET['PAGEN_1']) && $_GET['PAGEN_1'] > 0?(int)$_GET['PAGEN_1']+1:2;?>"></a>
	            </div>
	        <?endif;?>    
	 	<? echo $arResult["NAV_STRING"];?>
	</div>

<?endif;?>