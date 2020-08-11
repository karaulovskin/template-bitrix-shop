<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

if ($arParams['GUEST_MODE'] !== 'Y')
{
	Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
	//Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
}
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");

CJSCore::Init(array('clipboard', 'fx'));


if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach ($arResult['ERRORS']['FATAL'] as $error)
	{
		ShowError($error);
	}

	$component = $this->__component;

	if ($arParams['AUTH_FORM_IN_TEMPLATE'] && isset($arResult['ERRORS']['FATAL'][$component::E_NOT_AUTHORIZED]))
	{
		$APPLICATION->AuthForm('', false, false, 'N', false);
	}
}
else
{
	if (!empty($arResult['ERRORS']['NONFATAL']))
	{
		foreach ($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
	$APPLICATION->SetTitle("Заказ №".htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"]));

	?>
    <div class="container">
        <div class="orders">
            <div class="orders__content">
                <div class="orders__row orders__row--border-black">
                    <div class="orders__col">
                        <svg class="i-icon">
                            <use xlink:href="#icon-orders"></use>
                        </svg>
                        <span>№ <?= htmlspecialcharsbx($arResult["ACCOUNT_NUMBER"]);?></span>
                    </div>
                    <div class="orders__col">
                        <span><?=$arResult["DATE_INSERT_FORMATED"];?></span>
                    </div>
                    <div class="orders__col">
                        <span><?=count($arResult['BASKET']);?> <?=pluralForm(count($arResult['BASKET']), 'товар', 'товара', 'товаров');?></span>
                    </div>
                    <div class="orders__col">
                        <span><?=array_merge($arResult['PAYMENT'])[0]['PAY_SYSTEM_NAME'];?></span>
                    </div>
                    <div class="orders__col">
                        <span><?=$arResult['SHIPMENT'][0]["DELIVERY_NAME"];?></span>
                    </div>
                    <div class="orders__col">
                        <div class="status color-red">
                            <svg class="i-icon">
                                <use xlink:href="#icon-heart"></use>
                            </svg>
                            <span><?=htmlspecialcharsbx($arResult["STATUS"]["NAME"]);?></span>
                        </div>
                    </div>
                    <div class="orders__col">
                        <span><?= $arResult["PRICE_FORMATED"]?></span>
                    </div>
                </div>
                <div class="orders-list">
                    <div class="orders-list__item">
                        <div class="orders-item">
                            <div class="orders-item__title">Доставка</div>
                            <div class="orders-item__subtitle"><?=$arResult['SHIPMENT'][0]["DELIVERY_NAME"]?></div>
                            <div class="orders-item__props">
                                <dl>
                                    <dt>Стоимость доставки:</dt>
                                    <dd><?=$arResult['SHIPMENT'][0]['PRICE_DELIVERY_FORMATED'];?></dd>
                                </dl>
                                <dl>
                                    <?foreach($arResult["ORDER_PROPS"] as $orderprop):?>
                                    	<?if($orderprop["ID"]=="7" || $orderprop["ID"]=="13"):
                                    		$elem = CIBlockElement::GetList(Array(), array("IBLOCK_ID"=>"9", "XML_ID"=>$orderprop["VALUE"]), false, false, array("ID","PROPERTY_addr"))->GetNext();?>
                                    		<?if($elem["ID"]):?>
                                    			<dt>Адрес доставки:</dt>
                                    			<dd><?=$elem["PROPERTY_ADDR_VALUE"];?></dd>
                                    		<?endif;?>
                                    	<?elseif($orderprop["ID"]=="18" || $orderprop["ID"]=="19"):?>
                                    		<dt>Адрес доставки:</dt>
                                    		<dd><?=$orderprop["VALUE"];?></dd>
                                    	<?endif;?>
                                    <?endforeach;?>
                                </dl>
                            </div>
                            <div class="orders-item__status">
                                <div class="status color-red">
                                    <svg class="i-icon">
                                        <use xlink:href="#icon-heart"></use>
                                    </svg>
                                    <span><?=htmlspecialcharsbx($arResult["STATUS"]["NAME"]);?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="orders-list__item">
                        <div class="orders-item orders-item--pay">
                            <div class="orders-item__title">Оплата</div>
                            <div class="orders-item__subtitle"><?=array_merge($arResult['PAYMENT'])[0]['PAY_SYSTEM_NAME']?></div>
                            <div class="orders-item__props">
                                <dl>
                                    <dt>Сумма к оплате:</dt>
                                    <dd><?= $arResult["PRICE_FORMATED"]?></dd>
                                </dl>
                            </div>
                            <?if(array_merge($arResult['PAYMENT'])[0]["PAID"]=="N"):?>
	                            <div class="orders-item__status">
	                                <div class="status color-red">
	                                    <svg class="i-icon">
	                                        <use xlink:href="#icon-heart"></use>
	                                    </svg>
	                                    <span>Не оплачено</span>
	                                </div>
	                            </div>

	                            <?=$arResult['PAYMENT'][$arResult["ACCOUNT_NUMBER"]]['BUFFERED_OUTPUT'];?>
	                        <?else:?>
	                            <div class="orders-item__status">
	                                <div class="status color-red">
	                                    <svg class="i-icon">
	                                        <use xlink:href="#icon-heart"></use>
	                                    </svg>
	                                    <span>Оплачено</span>
	                                </div>
	                            </div>
	                        <?endif;?>
	                        <?if($arResult['PAYMENT'][$arResult["ACCOUNT_NUMBER"]]["PAY_SYSTEM_ID"]=="3"):?>
	                        	<a href="/order/payment.php?ORDER_ID=<?=$arResult["ACCOUNT_NUMBER"];?>&pdf=1&DOWNLOAD=Y" class="orders-item__pay btn">Скачать счет</a>
	                        <?endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="section-personal-basket bg-beige-bright">
    <div class="container">
        <div class="page-head">
            <div class="page-head__title">
                <div class="h2 title-border">Состав заказа</div>
            </div>
        </div>
        <div id="basket-root" class="bx-basket bx-blue bx-step-opacity" style="opacity: 1;">
            <div class="row">
                <div class="col-xs-12">
                    <div class="basket-items-list-wrapper basket-items-list-wrapper-height-fixed basket-items-list-wrapper-light" id="basket-items-list-wrapper">
                        <div class="basket-items-list-container" id="basket-items-list-container" style="min-height: 169px;">
                            <div class="basket-items-list-overlay" id="basket-items-list-overlay" style="display: none;"></div>
                            <div class="basket-items-list" id="basket-item-list" style="min-height: 169px;">
                                <table class="basket-items-list-table" id="basket-item-table">
                                    <tbody>
                                    
                                    	<?foreach ($arResult["BASKET"] as $item):
                                    		$array = CIBlockElement::GetProperty("4", $item["PRODUCT_ID"], "sort", "asc", array("CODE" => "CML2_ARTICLE"))->GetNext();?>
		                                    <tr class="basket-items-list-item-container" id="basket-item-<?=$item["ID"];?>" data-entity="basket-item" data-id="<?=$item["ID"];?>">
		                                        <td class="basket-items-list-item-descriptions">
		                                            <div class="basket-items-list-item-descriptions-inner" id="basket-item-height-aligner-<?=$item["ID"];?>">
		                                                <div class="basket-item-block-image">
		                                                    <a href="<?=$item["DETAIL_PAGE_URL"];?>" class="basket-item-image-link">
		                                                    	<?if($item["DETAIL_PICTURE"]):?>
		                                                    		<img class="basket-item-image" alt="" src="<?=res($item["DETAIL_PICTURE"],90,75, 1);?>">
		                                                    	<?else:?>
		                                                        	<img class="basket-item-image" alt="" src="/upload/no_photo.png">
		                                                        <?endif;?>
		                                                    </a>
		                                                </div>
		                                                <div class="basket-item-block-info">
		                                                    <div class="basket-item-block-info__head">
		                                                    	<?if($array["VALUE"]):?>
			                                                        <div class="basket-item-block-info__top">
			                                                            <div class="basket-item-block-article">
			                                                                <div class="basket-item-block-article__key">Арт:</div>
			                                                                <div class="basket-item-block-article__value"><?=$array["VALUE"];?></div>
			                                                            </div>
			                                                        </div>
		                                                        <?endif;?>
		                                                        <h2 class="basket-item-info-name">
		                                                            <a href="<?=$item["DETAIL_PAGE_URL"];?>" class="basket-item-info-name-link">
		                                                                <span data-entity="basket-item-name"><?=$item["NAME"];?></span>
		                                                            </a>
		                                                        </h2>
		                                                    </div>
		                                                </div>
		                                            </div>
		                                        </td>
		                                        <td class="basket-items-list-item-price basket-items-list-item-price-for-one hidden-xs">
		                                            <div class="basket-item-block-price">
		                                                <div class="basket-item-price-current">
		                                                        <span class="basket-item-price-current-text" id="basket-item-price-7">
		                                                            <?=$item["PRICE_FORMATED"];?>
		                                                        </span>
		                                                </div>
		                                            </div>
		                                        </td>
		                                        <td class="basket-items-list-item-amount">
		                                            <div class="basket-item-block-amount" data-entity="basket-item-quantity-block">
		                                                <div class="basket-item-amount-filed-block">
		                                                    <?=$item["QUANTITY"];?> шт.
		                                                </div>
		                                            </div>
		                                        </td>
		                                        <td class="basket-items-list-item-price">
		                                            <div class="basket-item-block-price">
		                                                <div class="basket-item-price-current">
		                                                        <span class="basket-item-price-current-text" id="basket-item-sum-price-7">
		                                                            <?=$item["FORMATED_SUM"];?>
		                                                        </span>
		                                                </div>
		                                            </div>
		                                        </td>
		                                    </tr>
                                    	<?endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?
	$javascriptParams = array(
		"url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
		"templateFolder" => CUtil::JSEscape($templateFolder),
		"templateName" => $this->__component->GetTemplateName(),
		"paymentList" => $paymentData
	);
	$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
	?>
	<script>
		BX.Sale.PersonalOrderComponent.PersonalOrderDetail.init(<?=$javascriptParams?>);
	</script>
<?
}
?>

