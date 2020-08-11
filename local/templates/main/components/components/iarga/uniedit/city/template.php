<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script id="ISDEKscript" type="text/javascript" src="/local/inc/widget/widjet.js"></script>
<div class="editor">
	<?$APPLICATION->IncludeComponent(
		"bitrix:main.include",
		"",
		Array(
			"AREA_FILE_SHOW" => "file",
			"AREA_FILE_SUFFIX" => "inc",
			"EDIT_TEMPLATE" => "",
			"PATH" => "/local/inc/parts/deliv_text.php"
		)
	);?>
    <h2 class="title-border">Способы доставки в г. <?=$arParams["CITY"];?></h2>
	<?$deliv = CIBlockElement::GetList(Array("ID"=>"DESC"), Array("IBLOCK_ID"=>"15", "ACTIVE"=>"Y"), false, false, Array("ID", "PROPERTY_name","CODE","PREVIEW_TEXT"));
	while($cdel = $deliv->GetNextElement())
	{
		$delivery = $cdel->GetFields();
		$delivlist[] = $delivery;
	}?>	  
	<?foreach($delivlist as $deliv):?>   
	    <div id="<?=$deliv["CODE"];?>">
	    	<h3 class="align-left"><?if($deliv["PROPERTY_NAME_VALUE"]):?><?=$deliv["PROPERTY_NAME_VALUE"];?><?else:?><?=$deliv["NAME"];?><?endif;?></h3>
	        <?if($deliv["PREVIEW_TEXT"]):?><p><?=$deliv["~PREVIEW_TEXT"];?></p><?endif;?>
	        	<?if($deliv["CODE"]!="salon"):?>
	                <dl>
	                    <dt>Стоимость доставки:</dt>
	                    <dd class="<?=$deliv["CODE"];?>">уточняется</dd>
	                </dl>     
                <?endif;?>   
	    </div>
    <?endforeach;?>
</div>
<?
$APPLICATION->AddChainItem("Доставка в г. ".$arParams["CITY"], "");
?>
<script type="text/javascript">
                                var ourWidjet = new ISDEKWidjet ({
                                    defaultCity: '<?=$arParams["CITY"];?>', //какой город отображается по умолчанию
                                    cityFrom: 'Москва', // из какого города будет идти доставка
                                    country: '', // можно выбрать страну, для которой отображать список ПВЗ
                                    link: 'maps', // id элемента страницы, в который будет вписан виджет
                                    path: '/local/inc/widget/scripts/', //директория с библиотеками виджета
                                    servicepath: '/local/inc/widget/scripts/service.php', 
                                    apikey: 'c05fa83d-9941-4778-beee-f15ef58ae89f' 
                                 });                            
                                <?if(postprice($arParams["CITY"])){?>
                                var price = <?=postprice($arParams["CITY"])?>;
                                    $(".pocht").html('от '+price+' р.');
                                <?}else{?>
                                    $("#pocht").remove();
                                <?}?>
                                <?if(cityprice($arParams["CITY"])){?>
                                var bes = <?=cityprice($arParams["CITY"])?>;
                                    $(".salon").html("0 р.");
                                <?}else{?>
                                    $("#salon").remove();
                                <?}?>
</script>  