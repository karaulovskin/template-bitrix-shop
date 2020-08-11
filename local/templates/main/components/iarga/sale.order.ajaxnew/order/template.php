<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

		<?use Bitrix\Sale;
		$basket = Sale\Basket::loadItemsForFUser(Sale\Fuser::getId(), Bitrix\Main\Context::getCurrent()->getSite());
		if($USER->IsAuthorized() || $arParams["ALLOW_AUTO_REGISTER"] == "Y")
		{
			if($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y")
			{
				if(strlen($arResult["REDIRECT_URL"]) > 0)
				{
					$APPLICATION->RestartBuffer();
					?>
					<script type="text/javascript">
						window.top.location.href='<?=CUtil::JSEscape($arResult["REDIRECT_URL"])?>';
					</script>
					<?
					die();
				}

			}
		}

		//$APPLICATION->SetAdditionalCSS($templateFolder."/style_cart.css");
		//$APPLICATION->SetAdditionalCSS($templateFolder."/style.css");
		?>

		<div id="order_form_div">
			<NOSCRIPT style="display:none;">
				<div class="errortext"><?=GetMessage("SOA_NO_JS")?></div>
			</NOSCRIPT>

			<?
			if (!function_exists("getColumnName"))
			{
				function getColumnName($arHeader)
				{
					return (strlen($arHeader["name"]) > 0) ? $arHeader["name"] : GetMessage("SALE_".$arHeader["id"]);
				}
			}

			if (!function_exists("cmpBySort"))
			{
				function cmpBySort($array1, $array2)
				{
					if (!isset($array1["SORT"]) || !isset($array2["SORT"]))
						return -1;

					if ($array1["SORT"] > $array2["SORT"])
						return 1;

					if ($array1["SORT"] < $array2["SORT"])
						return -1;

					if ($array1["SORT"] == $array2["SORT"])
						return 0;
				}
			}
			?>

				<?
				if(!$USER->IsAuthorized() && $arParams["ALLOW_AUTO_REGISTER"] == "N")
				{
					if(!empty($arResult["ERROR"]))
					{
						foreach($arResult["ERROR"] as $v)
							echo ShowError($v);
					}
					elseif(!empty($arResult["OK_MESSAGE"]))
					{
						foreach($arResult["OK_MESSAGE"] as $v)
							echo ShowNote($v);
					}

					include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/auth.php");
				}
				else
				{
					if($arResult["USER_VALS"]["CONFIRM_ORDER"] == "Y" || $arResult["NEED_REDIRECT"] == "Y")
					{
						if(strlen($arResult["REDIRECT_URL"]) == 0)
						{
							include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/confirm.php");
						}
					}
					else
					{
						?>
						<script type="text/javascript">
						//не удаляются лишние способы доставки при загрузке страницы, поэтому так
						$(document).ready(function() {
							submitForm();
						});
						<?if(CSaleLocation::isLocationProEnabled()):?>

							<?
							// spike: for children of cities we place this prompt
							$city = \Bitrix\Sale\Location\TypeTable::getList(array('filter' => array('=CODE' => 'CITY'), 'select' => array('ID')))->fetch();
							?>

							BX.saleOrderAjax.init(<?=CUtil::PhpToJSObject(array(
								'source' => $this->__component->getPath().'/get.php',
								'cityTypeId' => intval($city['ID']),
								'messages' => array(
									'otherLocation' => '--- '.GetMessage('SOA_OTHER_LOCATION'),
									'moreInfoLocation' => '--- '.GetMessage('SOA_NOT_SELECTED_ALT'), // spike: for children of cities we place this prompt
									'notFoundPrompt' => '<div class="-bx-popup-special-prompt">'.GetMessage('SOA_LOCATION_NOT_FOUND').'.<br />'.GetMessage('SOA_LOCATION_NOT_FOUND_PROMPT', array(
										'#ANCHOR#' => '<a href="javascript:void(0)" class="-bx-popup-set-mode-add-loc">',
										'#ANCHOR_END#' => '</a>'
									)).'</div>'
								)
							))?>);

						<?endif?>

						var BXFormPosting = false;
						function submitForm(val, valid)
						{
							// if (BXFormPosting === true)
							// 	return true;
								//console.log($("input[name='ORDER_PROP_1']").val());

							BXFormPosting = true;
							if(val != 'Y')
								BX('confirmorder').value = 'N';

							if(valid === undefined) {
							      valid = false;
							}
							if (valid) {
								var t = true;
							    $('#ORDER_FORM .input--required').each(function() {

							      	if ($(this).val() == "") {

							          	$(this).addClass("invalid");
							          	t = false;

							      	} else {

							        	$(this).removeClass("invalid");

							      	}
							    });

								    if (!$('#ORDER_FORM .checkbox--required').prop("checked")) {

								    	$('#ORDER_FORM .checkbox--required').addClass('invalid');
								    	t = false;
								    	
								    } else {

								    	$('#ORDER_FORM .checkbox--required').removeClass('invalid');
								    }
							    if (t) {

							    	var orderForm = BX('ORDER_FORM');
									BX.showWait();
									<?if(CSaleLocation::isLocationProEnabled()):?>
										BX.saleOrderAjax.cleanUp();
									<?endif?>
									
									BX.ajax.submit(orderForm, ajaxResult);

									return true;

								} else {
									$('html, body').animate({ scrollTop: $('#ORDER_FORM .invalid').offset().top-100 }, 500);
								}

							} else {							
										var orderForm = BX('ORDER_FORM');
										BX.showWait();
										<?if(CSaleLocation::isLocationProEnabled()):?>
											BX.saleOrderAjax.cleanUp();
										<?endif?>
										BX.ajax.submit(orderForm, ajaxResult);
										
										return true;
							}
						}

						function ajaxResult(res)
						{
							var orderForm = BX('ORDER_FORM');
							try
							{
								// if json came, it obviously a successfull order submit

								var json = JSON.parse(res);
								BX.closeWait();

								if (json.error)
								{
									BXFormPosting = false;
									return;
								}
								else if (json.redirect)
								{
									window.top.location.href = json.redirect;
								}
							}
							catch (e)
							{
								// json parse failed, so it is a simple chunk of html

								BXFormPosting = false;
								BX('order_form_content').innerHTML = res;

								<?if(CSaleLocation::isLocationProEnabled()):?>
									BX.saleOrderAjax.initDeferredControl();
								<?endif?>
							}
							BX.closeWait();
							BX.onCustomEvent(orderForm, 'onAjaxSuccess');
							App.PlaceholderStar.constructor();
						}

						function SetContact(profileId)
						{
							BX("profile_change").value = "Y";
							submitForm();
						}
						</script>
						<?if($_POST["is_ajax_post"] != "Y")
						{
							?>
									<form action="<?=$APPLICATION->GetCurPage();?>" method="POST" name="ORDER_FORM" id="ORDER_FORM" enctype="multipart/form-data" class="Valid">
									<?=bitrix_sessid_post()?>
										<div id="order_form_content">									
										
										
							<?
						}
						else
						{
							$APPLICATION->RestartBuffer();
						}

											if($_REQUEST['PERMANENT_MODE_STEPS'] == 1)
											{
												?>
												<input type="hidden" name="PERMANENT_MODE_STEPS" value="1" />
												<?
											}

											if(!empty($arResult["ERROR"]) && $arResult["USER_VALS"]["FINAL_STEP"] == "Y")
											{
												foreach($arResult["ERROR"] as $v)
													echo ShowError($v);
												?>
												<script type="text/javascript">
													top.BX.scrollToNode(top.BX('ORDER_FORM'));
												</script>
												<?
											}?>
										<section class="section-order">
											<div class="order-form">												
												<div class="container container--min">
													<?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/person_type.php");
													include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/props.php");
													include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/delivery.php");?>
												</div>
												<div class="container container--min">
													<?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/paysystem.php");?>
										                <div class="order-form-item">
										                    <div class="order-form-item__head">
										                        <div class="order-form-item__title title-border">Комментарий к заказу</div>
										                    </div>
										                    <div class="order-form-item__body">
										                        <div class="form-row">
										                            <div class="form-col">
										                                <label class="label">
										                                    <textarea type="text" class="input" id="orderDescription" name="ORDER_DESCRIPTION" placeholder="Ваш комментарий"></textarea>
										                                </label>
										                            </div>
										                        </div>
										                    </div>
										                </div>
													<?
													if(strlen($arResult["PREPAY_ADIT_FIELDS"]) > 0)
														echo $arResult["PREPAY_ADIT_FIELDS"];
													?>
												
												</div>
											</div>
										</section>
										<section class="section-total bg-beige-bright">
			    							<div class="container">	
			    								<fieldset class="fieldset" form="orderEntity">
													<?include($_SERVER["DOCUMENT_ROOT"].$templateFolder."/summary.php");?>
									                <div class="total-form">
									                    <div class="total-form__checkbox">
									                        <div class="checkbox">
									                            <label class="checkbox__label">
																	<?=chekPrintPropsForm($arResult["ORDER_PROP"]["USER_PROPS_N"]);?>									                            
									                                <div class="checkbox__emulator">
									                                    <svg class="i-icon">
									                                        <use xlink:href="#icon-checked"></use>
									                                    </svg>
									                                </div>
									                                <div class="checkbox__text checkbox__text--small">
									                                <span>
									                                    Нажимая кнопку “Отправить” я соглашаюсь на обработку моих персональных данных в соответствии с
									                                </span>
									                                    <a href="/privacy/" target="_blank">Условиями</a>
									                                </div>
									                            </label>
									                        </div>
									                    </div>
									                    <div class="total-form__buttons">
									                        <a href="javascript:void();" onclick="submitForm('Y','true'); return false;" id="ORDER_CONFIRM_BUTTON" class="btn btn--orange">Оформить заказ</a>
									                    </div>
									                </div>													
												</fieldset>
											</div>
										</section>	
									</div>										
						<?if($_POST["is_ajax_post"] != "Y")
						{
							?>

											<input type="hidden" name="confirmorder" id="confirmorder" value="Y">
											<input type="hidden" name="profile_change" id="profile_change" value="N">
											<input type="hidden" name="is_ajax_post" id="is_ajax_post" value="Y">
											<input type="hidden" name="json" value="Y">
											
									</form>
							<?
							if($arParams["DELIVERY_NO_AJAX"] == "N")
							{
								?>
								<div style="display:none;"><?$APPLICATION->IncludeComponent("bitrix:sale.ajax.delivery.calculator", "", array(), null, array('HIDE_ICONS' => 'Y')); ?></div>
								<?
							}
						}
						else
						{
							?>
							<script type="text/javascript">
								top.BX('confirmorder').value = 'Y';
								top.BX('profile_change').value = 'N';
							</script>
							<?
							die();
						}
					}
				}
				?>
		</div>	
		<?if(CSaleLocation::isLocationProEnabled()):?>

			<div style="display: none">
				<?// we need to have all styles for sale.location.selector.steps, but RestartBuffer() cuts off document head with styles in it?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:sale.location.selector.steps", 
					".default", 
					array(
					),
					false
				);?>
				<?$APPLICATION->IncludeComponent(
					"bitrix:sale.location.selector.search", 
					".default", 
					array(
					),
					false
				);?>
			</div>

		<?endif?>
