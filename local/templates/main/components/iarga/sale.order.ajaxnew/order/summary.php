<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$bDefaultColumns = $arResult["GRID"]["DEFAULT_COLUMNS"];
$colspan = ($bDefaultColumns) ? count($arResult["GRID"]["HEADERS"]) : count($arResult["GRID"]["HEADERS"]) - 1;
$bPropsColumn = false;
$bUseDiscount = false;
$bPriceType = false;
$bShowNameWithPicture = ($bDefaultColumns) ? true : false; // flat to show name and picture column in one column
?>
<div class="total-list">
    <div class="total-list__item">
        <div class="total-item">
            <div class="total-item__label">Стоимость товаров:</div>
            <div class="total-item__price price"><?=$arResult["ORDER_PRICE_FORMATED"]?></div>
        </div>
    </div>
  	<div class="total-list__item">
  		<?if (doubleval($arResult["DELIVERY_PRICE"]) > 0):?>
            <div class="total-item">
                <div class="total-item__label">Стоимость доставки:</div>
                <div class="total-item__price price"><?=$arResult["DELIVERY_PRICE_FORMATED"]?></div>
            </div>
        <?else:?>
            <div class="total-item">
                <div class="total-item__label">Стоимость доставки:</div>
                <div class="total-item__price price">0 р.</div>
            </div>
        <?endif;?>
    </div>    
    <div class="total-list__item">
        <div class="total-item">
            <div class="total-item__label">Стоимость заказа:</div>
            <div class="total-item__price color-orange price"><?=$arResult["ORDER_TOTAL_PRICE_FORMATED"]?></div>
        </div>
    </div>
</div>