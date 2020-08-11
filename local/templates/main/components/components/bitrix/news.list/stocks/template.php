<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<?if(sizeof($arResult['ITEMS']) > 0):?>
	<div class="section-stocks  bg-beige-bright">
	    <div id="stocksElement1" class="stocks-element">
	        <svg class="i-icon">
	            <use xlink:href="#icon-stocksElement1"></use>
	        </svg>
	    </div>
	    <div id="stocksElement2" class="stocks-element">
	        <svg class="i-icon">
	            <use xlink:href="#icon-stocksElement2"></use>
	        </svg>
	    </div>
	    <div id="stocksElement3" class="stocks-element">
	        <svg class="i-icon">
	            <use xlink:href="#icon-stocksElement3"></use>
	        </svg>
	    </div>
	    <div id="stocksElement4" class="stocks-element">
	        <svg class="i-icon">
	            <use xlink:href="#icon-stocksElement4"></use>
	        </svg>
	    </div>
	    <div id="stocksElement5" class="stocks-element">
	        <svg class="i-icon">
	            <use xlink:href="#icon-stocksElement5"></use>
	        </svg>
	    </div>
	    <div class="container">
	        <div class="page-head">
	            <div class="page-head__title">
	                <div class="h1">Акции Mr. Mish </div>
	            </div>
	            <div class="page-head__subtitle">
	                <a href="/stocks/" class="link">Смотреть все</a>
	            </div>
	        </div>
	        <div class="stocks-list">
	            <?foreach($arResult["ITEMS"] as $arItem):?>
				 	<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>           
	                <div class="stocks-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
	                    <div class="stocks-item">
	                        <a href="<?=$arItem["DETAIL_PAGE_URL"];?>" class="stocks-item__link">
	                            <picture class="stocks-item-picture">
	                                <img class="stocks-item-picture__img" src="<?=res($arItem["PREVIEW_PICTURE"]["ID"],260,300, 1);?>" alt="">
	                            </picture>
	                            <div class="stocks-item__content">
	                                <div class="stocks-item__title"><?=$arItem["NAME"];?></div>
	                                <div class="stocks-item-period">
	                                    <svg class="i-icon">
	                                        <use xlink:href="#icon-period"></use>
	                                    </svg>
	                                    <?if($arItem["PROPERTIES"]["date"]["VALUE"]):?><div class="stocks-item-period__date"><?=$arItem["PROPERTIES"]["date"]["VALUE"];?></div><?endif;?>
	                                </div>
	                            </div>
	                        </a>
	                    </div>
	                </div>
	            <?endforeach;?>
	        </div>
	    </div>
	</div>
<?endif;?>