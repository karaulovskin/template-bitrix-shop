<?

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

use Bitrix\Sale, 
	Bitrix\Main,
	Bitrix\Main\Localization\Loc,
	Bitrix\Main\Page\Asset;

Asset::getInstance()->addJs("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/script.js");
//Asset::getInstance()->addCss("/bitrix/components/bitrix/sale.order.payment.change/templates/.default/style.css");
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");
CJSCore::Init(array('clipboard', 'fx'));

Loc::loadMessages(__FILE__);

if (!empty($arResult['ERRORS']['FATAL']))
{
	foreach($arResult['ERRORS']['FATAL'] as $error)
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
		foreach($arResult['ERRORS']['NONFATAL'] as $error)
		{
			ShowError($error);
		}
	}
	?>
	<div class="container">
		<div class="orders">
            <div class="orders__head">
                <div class="orders__row">
                    <div class="orders__col">№ Заказа</div>
                    <div class="orders__col">Дата</div>
                    <div class="orders__col">Товаров</div>
                    <div class="orders__col">Способ оплаты</div>
                    <div class="orders__col">Способ доставки</div>
                    <div class="orders__col">Статус</div>
                    <div class="orders__col">Сумма</div>
                </div>
            </div>
            <div class="orders__content">
				<?

					$paymentChangeData = array();
					$orderHeaderStatus = null;

					foreach ($arResult['ORDERS'] as $key => $order)
					{
						$status_id = CSaleStatus::GetByID($order["ORDER"]["STATUS_ID"]);
						$id_product = false;
						$dbBasketItems = CSaleBasket::GetList(array(),array( "LID" => SITE_ID,"ORDER_ID" =>$order['ORDER']['ACCOUNT_NUMBER']),false,false,array("PRODUCT_ID"));
						while ($arItems = $dbBasketItems->Fetch())
						{
							$id_product[] =$arItems["PRODUCT_ID"];
						}						

					
					?>
						<div class="orders__row">
		                    <a class="orders__col" href="<?=htmlspecialcharsbx($order["ORDER"]["URL_TO_DETAIL"])?>">
		                        <svg class="i-icon">
		                            <use xlink:href="#icon-orders"></use>
		                        </svg>
		                        <span>№ <?=$order['ORDER']['ACCOUNT_NUMBER']?></span>
		                    </a>
		                    <div class="orders__col">
		                        <span><?=$order['ORDER']['DATE_INSERT_FORMATED']?></span>
		                    </div>
		                    <div class="orders__col">
		                        <span><?=count($id_product);?> <?=pluralForm(count($id_product), 'товар', 'товара', 'товаров');?></span>
		                    </div>
		                    <div class="orders__col">
		                        <span><?=$order['PAYMENT'][0]['PAY_SYSTEM_NAME']?></span>
		                    </div>
		                    <div class="orders__col">
		                        <?$textdel = explode(":",$arResult['INFO']['DELIVERY'][$order['SHIPMENT'][0]['DELIVERY_ID']]['NAME']);
		                        if($textdel[1]){
		                             $delivery = $textdel[1];
		                        }
		                        else{
		                             $delivery = $textdel[0];
		                        }?>
		                        <span><?=$delivery;?></span>
		                    </div>
		                    <div class="orders__col">
		                        <div class="status <?if($order["ORDER"]["STATUS_ID"]=="N"):?>color-red<?elseif($order["ORDER"]["STATUS_ID"]=="F"):?>color-green<?else:?>color-orange<?endif;?>">
		                            <svg class="i-icon">
		                                <use xlink:href="#icon-heart"></use>
		                            </svg>
		                            <span><?=$status_id["NAME"];?></span>
		                        </div>
		                    </div>
		                    <div class="orders__col">
		                        <span><?=$order['ORDER']['FORMATED_PRICE']?></span>
		                    </div>
						</div>
						<?
					}
				?>
			</div>
		</div>
	</div>
	<?
	echo $arResult["NAV_STRING"];

	if ($_REQUEST["filter_history"] !== 'Y')
	{
		$javascriptParams = array(
			"url" => CUtil::JSEscape($this->__component->GetPath().'/ajax.php'),
			"templateFolder" => CUtil::JSEscape($templateFolder),
			"templateName" => $this->__component->GetTemplateName(),
			"paymentList" => $paymentChangeData
		);
		$javascriptParams = CUtil::PhpToJSObject($javascriptParams);
		?>
		<script>
			BX.Sale.PersonalOrderComponent.PersonalOrderList.init(<?=$javascriptParams?>);
		</script>
		<?
	}
}
?>
