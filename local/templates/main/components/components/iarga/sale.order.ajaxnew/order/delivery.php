<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<script type="text/javascript">
	function fShowStore(id, showImages, formWidth, siteId)
	{
		var strUrl = '<?=$templateFolder?>' + '/map.php';
		var strUrlPost = 'delivery=' + id + '&showImages=' + showImages + '&siteId=' + siteId;

		var storeForm = new BX.CDialog({
					'title': '<?=GetMessage('SOA_ORDER_GIVE')?>',
					head: '',
					'content_url': strUrl,
					'content_post': strUrlPost,
					'width': formWidth,
					'height':450,
					'resizable':false,
					'draggable':false
				});

		var button = [
				{
					title: '<?=GetMessage('SOA_POPUP_SAVE')?>',
					id: 'crmOk',
					'action': function ()
					{
						GetBuyerStore();
						BX.WindowManager.Get().Close();
					}
				},
				BX.CDialog.btnCancel
			];
		storeForm.ClearButtons();
		storeForm.SetButtons(button);
		storeForm.Show();
	}

	function GetBuyerStore()
	{
		BX('BUYER_STORE').value = BX('POPUP_STORE_ID').value;
		//BX('ORDER_DESCRIPTION').value = '<?=GetMessage("SOA_ORDER_GIVE_TITLE")?>: '+BX('POPUP_STORE_NAME').value;
		BX('store_desc').innerHTML = BX('POPUP_STORE_NAME').value;
		BX.show(BX('select_store'));
	}

	function showExtraParamsDialog(deliveryId)
	{
		var strUrl = '<?=$templateFolder?>' + '/delivery_extra_params.php';
		var formName = 'extra_params_form';
		var strUrlPost = 'deliveryId=' + deliveryId + '&formName=' + formName;

		if(window.BX.SaleDeliveryExtraParams)
		{
			for(var i in window.BX.SaleDeliveryExtraParams)
			{
				strUrlPost += '&'+encodeURI(i)+'='+encodeURI(window.BX.SaleDeliveryExtraParams[i]);
			}
		}

		var paramsDialog = new BX.CDialog({
			'title': '<?=GetMessage('SOA_ORDER_DELIVERY_EXTRA_PARAMS')?>',
			head: '',
			'content_url': strUrl,
			'content_post': strUrlPost,
			'width': 500,
			'height':200,
			'resizable':true,
			'draggable':false
		});

		var button = [
			{
				title: '<?=GetMessage('SOA_POPUP_SAVE')?>',
				id: 'saleDeliveryExtraParamsOk',
				'action': function ()
				{
					insertParamsToForm(deliveryId, formName);
					BX.WindowManager.Get().Close();
				}
			},
			BX.CDialog.btnCancel
		];

		paramsDialog.ClearButtons();
		paramsDialog.SetButtons(button);
		//paramsDialog.adjustSizeEx();
		paramsDialog.Show();
	}

	function insertParamsToForm(deliveryId, paramsFormName)
	{
		var orderForm = BX("ORDER_FORM"),
			paramsForm = BX(paramsFormName);
			wrapDivId = deliveryId + "_extra_params";

		var wrapDiv = BX(wrapDivId);
		window.BX.SaleDeliveryExtraParams = {};

		if(wrapDiv)
			wrapDiv.parentNode.removeChild(wrapDiv);

		wrapDiv = BX.create('div', {props: { id: wrapDivId}});

		for(var i = paramsForm.elements.length-1; i >= 0; i--)
		{
			var input = BX.create('input', {
				props: {
					type: 'hidden',
					name: 'DELIVERY_EXTRA['+deliveryId+']['+paramsForm.elements[i].name+']',
					value: paramsForm.elements[i].value
					}
				}
			);

			window.BX.SaleDeliveryExtraParams[paramsForm.elements[i].name] = paramsForm.elements[i].value;

			wrapDiv.appendChild(input);
		}

		orderForm.appendChild(wrapDiv);

		BX.onCustomEvent('onSaleDeliveryGetExtraParams',[window.BX.SaleDeliveryExtraParams]);
	}
</script>

<input type="hidden" name="BUYER_STORE" id="BUYER_STORE" value="<?=$arResult["BUYER_STORE"]?>" />

	<div class="order-form-item">
		<?
		if(!empty($arResult["DELIVERY"]))
		{
			$width = ($arParams["SHOW_STORES_IMAGES"] == "Y") ? 850 : 700;
			?>
	        <div class="order-form-item__head">
	            <div class="order-form-item__title title-border"><?=GetMessage("SOA_TEMPL_DELIVERY")?></div>
	        </div>
	        <div class="order-form-item__body">
	        	<div class="checkbox-list">
					<?

					foreach ($arResult["DELIVERY"] as $delivery_id => $arDelivery)
					{
						if ($delivery_id !== 0 && intval($delivery_id) <= 0)
						{
							foreach ($arDelivery["PROFILES"] as $profile_id => $arProfile)
							{
								?>
								<div class="checkbox-list__item">
									<div class="checkbox checkbox--big">
										<div class="checkbox__label">
											<input
											type="radio"
											id="ID_DELIVERY_<?=$delivery_id?>_<?=$profile_id?>"
											name="<?=htmlspecialcharsbx($arProfile["FIELD_NAME"])?>"
											value="<?=$delivery_id.":".$profile_id;?>"
											<?=$arProfile["CHECKED"] == "Y" ? "checked=\"checked\"" : "";?>
											onclick="submitForm();"
											class="checkbox__input"
											/>

											<label for="ID_DELIVERY_<?=$delivery_id?>_<?=$profile_id?>">
		                                        <div class="checkbox__emulator">
		                                            <svg class="i-icon">
		                                                <use xlink:href="#icon-checked"></use>
		                                            </svg>
		                                        </div>
			                                    <div class="checkbox__text">
			                                        <span><?=htmlspecialcharsbx($arProfile["TITLE"]);?></span>
					                                <?if($v["PRICE"]):?>
					                                	<p class="checkbox__text-note"><?=$arProfile["PRICE_FORMATED"];?></p>
					                                <?endif;?>
			                                    </div>  
			                                    
						                            <div class="container" style="display: <?if($arDelivery["CHECKED"] == "Y"):?>block<?else:?>none<?endif;?>;">
						                            	<?if($arDelivery["ID"]=="5"):?>
															<span class="bx_result_price">

															</span>
														<?endif;?>
													</div>
											</label>
										</div>

									</div>
								</div>
							<?if($arDelivery["ID"]=="2"):?>
								<div class="order-shops" style="display: <?if($arDelivery["CHECKED"] == "Y"):?>block<?else:?>none<?endif;?>;">
									<?include($_SERVER['DOCUMENT_ROOT']."/local/inc/ajax/salonlist.php");?>
								</div>
							<?endif;?>
								<?
							} // endforeach
						}
						else // stores and courier
						{
							if (count($arDelivery["STORE"]) > 0)
								$clickHandler = "onClick = \"fShowStore('".$arDelivery["ID"]."','".$arParams["SHOW_STORES_IMAGES"]."','".$width."','".SITE_ID."')\";";
							else
								$clickHandler = "onClick = \"BX('ID_DELIVERY_ID_".$arDelivery["ID"]."').checked=true;submitForm();\"";
							?>
						<div class="checkbox-list__item">
							<div class="checkbox checkbox--big">
								<label for="ID_DELIVERY_ID_<?=$arDelivery["ID"]?>" <?=$clickHandler?> class="checkbox__label">
									<input type="radio"
										id="ID_DELIVERY_ID_<?= $arDelivery["ID"] ?>"
										name="<?=htmlspecialcharsbx($arDelivery["FIELD_NAME"])?>"
										value="<?= $arDelivery["ID"] ?>"<?if ($arDelivery["CHECKED"]=="Y") echo " checked";?>
										onclick="submitForm();"
										class="checkbox__input"
										/>

									
								
			                            <div class="checkbox__emulator">
			                                <svg class="i-icon">
			                                    <use xlink:href="#icon-checked"></use>
			                                </svg>
			                            </div>
			                            <div class="checkbox__text">
			                                <span><?= htmlspecialcharsbx($arDelivery["OWN_NAME"])?></span>
			                                <?if($arDelivery["PRICE"]):?>
			                                	<p class="checkbox__text-note"><?=$arDelivery["PRICE_FORMATED"];?></p>
			                                <?endif;?>
			                            </div>
			                            <?if($arDelivery["DESCRIPTION"]):?>
											 <div class="checkbox__text checkbox__text--small checkbox__text--margin-top">
	                                            <span><?=$arDelivery["DESCRIPTION"];?></span>
	                                        </div>
                                        <?endif;?>
									
								</label>
							</div>
						</div>
						<?$this->SetViewTarget("related");?>
							<?if($arDelivery["ID"]=="2"):?>
								<div class="order-shops" style="display: <?if($arDelivery["CHECKED"] == "Y"):?>block<?else:?>none<?endif;?>;">
									<?include($_SERVER['DOCUMENT_ROOT']."/local/inc/ajax/salonlist.php");?>	
								</div>
							<?endif;?>
						<?$this->EndViewTarget();?>					
							<?
						}
					}?>
				</div>
				<?=anPrintPropsForm($arResult["ORDER_PROP"]["RELATED"], $arParams["TEMPLATE_LOCATION"]);?>
				<?foreach ($arResult["DELIVERY"] as $delivery_id => $arDelivery):?>
					<?if($arDelivery["ID"]=="5"):?>
						<div id="pop--cdek" style="display: <?if($arDelivery["CHECKED"] == "Y"):?>block<?else:?>none<?endif;?>;"></div>
					<?endif;?>
				<?endforeach;;?>
			</div>
		<?}
	?>
	</div>
</div>
<div class="container">
	<?$APPLICATION->ShowViewContent("related");?>
