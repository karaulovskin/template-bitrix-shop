<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);

// $templateData = array(
// 	'TEMPLATE_THEME' => $this->GetFolder().'/themes/'.$arParams['TEMPLATE_THEME'].'/colors.css',
// 	'TEMPLATE_CLASS' => 'bx-'.$arParams['TEMPLATE_THEME']
// );

// if (isset($templateData['TEMPLATE_THEME']))
// {
// 	$this->addExternalCss($templateData['TEMPLATE_THEME']);
// }
//$this->addExternalCss("/bitrix/css/main/bootstrap.css");
//$this->addExternalCss("/bitrix/css/main/font-awesome.css");
?>
<?//if($arResult["ITEM"]):?>
	<div class="bx-filter">
		<div class="bx-filter-wrapper">
			<div class="bx-filter <?=$templateData["TEMPLATE_CLASS"]?>" data-bx-filter>
				<div class="bx-filter-section container-fluid">
					<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
						<?foreach($arResult["HIDDEN"] as $arItem):?>
						<?$quanprop = "0";?>
						<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
						<?endforeach;?>
						<div class="bx-filter-parameters-box-row">
								<div class="bx-filter-parameters-box" data-bx-filter-box>
									<span class="bx-filter-container-modef"></span>
									<div class="bx-filter-parameters-box-title"></div>

									<div class="bx-filter-block" data-role="bx_filter_block">					
										<?//new block
										$allowed = array("8", "9", "51", "52");
										$arResult["ITEM"] = array_intersect_key($arResult["ITEMS"], array_flip($allowed));
										foreach($arResult["ITEM"] as $key=>$arItem)
										{
											?>
													<div class="bx-filter-parameters-box-container">
														<?
														$arCur = current($arItem["VALUES"]);
														switch ($arItem["DISPLAY_TYPE"])
														{
															default://CHECKBOXES
																?>
																	<?foreach($arItem["VALUES"] as $val => $ar): $quanprop++;?>
																		<div class="checkbox">
																			<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="checkbox__label <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"] ?>">
																					<input
																						type="checkbox"
																						value="<? echo $ar["HTML_VALUE"] ?>"
																						class="checkbox__input"
																						name="<? echo $ar["CONTROL_NAME"] ?>"
																						id="<? echo $ar["CONTROL_ID"] ?>"
																						<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
																						onclick="smartFilter.click(this)"
																					/>
																					<div class="checkbox__emulator">
						                                                               <svg class="i-icon">
						                                                                    <use xlink:href="#icon-checked"></use>
						                                                                </svg>	
						                                                            </div>	
						                                                            <div class="checkbox__text">														
																						<span><?=$ar["VALUE"];?></span>
																					</div>
																				</span>
																			</label>
																		</div>
																	<?endforeach;?>
														<?
														}
														?>
													</div>
										<?
										}?>
									</div>
								</div>


							<?foreach($arResult["ITEMS"] as $key=>$arItem)//prices
							{ 
								$key = $arItem["ENCODED_ID"];
								if(isset($arItem["PRICE"])):
									if ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0)
										continue;

									$step_num = 4;
									$step = ($arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"]) / $step_num;
									$prices = array();
									if (Bitrix\Main\Loader::includeModule("currency"))
									{
										for ($i = 0; $i < $step_num; $i++)
										{
											$prices[$i] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $arItem["VALUES"]["MIN"]["CURRENCY"], false);
										}
										$prices[$step_num] = CCurrencyLang::CurrencyFormat($arItem["VALUES"]["MAX"]["VALUE"], $arItem["VALUES"]["MAX"]["CURRENCY"], false);
									}
									else
									{
										$precision = $arItem["DECIMALS"]? $arItem["DECIMALS"]: 0;
										for ($i = 0; $i < $step_num; $i++)
										{
											$prices[$i] = number_format($arItem["VALUES"]["MIN"]["VALUE"] + $step*$i, $precision, ".", "");
										}
										$prices[$step_num] = number_format($arItem["VALUES"]["MAX"]["VALUE"], $precision, ".", "");
									}
									if($arItem["VALUES"]["MIN"]["VALUE"] && $arItem["VALUES"]["MAX"]["VALUE"]){
										$quanprop++;
									}
									?>
									<div class="bx-filter-parameters-box" data-bx-filter-box>
										<span class="bx-filter-container-modef"></span>
										<div class="bx-filter-parameters-box-title">
											<span>Цена:</span>
										</div>

										<div class="bx-filter-block" data-role="bx_filter_block">
											<div class="bx-filter-parameters-box-container bx-filter-parameters-box-container--flex">
												<div class="bx-filter-parameters-box-container-block bx-left">
													<div class="bx-filter-input-container">
														<input
															class="min-price input"
															type="text"
															name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
															id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
															value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
															size="5"
															onkeyup="smartFilter.keyup(this)"
														/>
													</div>
												</div>
												<div class="bx-filter-parameters-box-container-block bx-right">
													<div class="bx-filter-input-container">
														<input
															class="max-price input"
															type="text"
															name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
															id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
															value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
															size="5"
															onkeyup="smartFilter.keyup(this)"
														/>
													</div>
												</div>

												<div class="bx-ui-slider-track-container">
													<div class="bx-ui-slider-track" id="drag_track_<?=$key?>">
														<?for($i = 0; $i <= $step_num; $i++):?>
														<div class="bx-ui-slider-part p<?=$i+1?>"><span><?=$prices[$i]?></span></div>
														<?endfor;?>

														<div class="bx-ui-slider-pricebar-vd" style="left: 0;right: 0;" id="colorUnavailableActive_<?=$key?>"></div>
														<div class="bx-ui-slider-pricebar-vn" style="left: 0;right: 0;" id="colorAvailableInactive_<?=$key?>"></div>
														<div class="bx-ui-slider-pricebar-v"  style="left: 0;right: 0;" id="colorAvailableActive_<?=$key?>"></div>
														<div class="bx-ui-slider-range" id="drag_tracker_<?=$key?>"  style="left: 0%; right: 0%;">
															<a class="bx-ui-slider-handle left"  style="left:0;" href="javascript:void(0)" id="left_slider_<?=$key?>"></a>
															<a class="bx-ui-slider-handle right" style="right:0;" href="javascript:void(0)" id="right_slider_<?=$key?>"></a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<?
									$arJsParams = array(
										"leftSlider" => 'left_slider_'.$key,
										"rightSlider" => 'right_slider_'.$key,
										"tracker" => "drag_tracker_".$key,
										"trackerWrap" => "drag_track_".$key,
										"minInputId" => $arItem["VALUES"]["MIN"]["CONTROL_ID"],
										"maxInputId" => $arItem["VALUES"]["MAX"]["CONTROL_ID"],
										"minPrice" => $arItem["VALUES"]["MIN"]["VALUE"],
										"maxPrice" => $arItem["VALUES"]["MAX"]["VALUE"],
										"curMinPrice" => $arItem["VALUES"]["MIN"]["HTML_VALUE"],
										"curMaxPrice" => $arItem["VALUES"]["MAX"]["HTML_VALUE"],
										"fltMinPrice" => intval($arItem["VALUES"]["MIN"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MIN"]["FILTERED_VALUE"] : $arItem["VALUES"]["MIN"]["VALUE"] ,
										"fltMaxPrice" => intval($arItem["VALUES"]["MAX"]["FILTERED_VALUE"]) ? $arItem["VALUES"]["MAX"]["FILTERED_VALUE"] : $arItem["VALUES"]["MAX"]["VALUE"],
										"precision" => $precision,
										"colorUnavailableActive" => 'colorUnavailableActive_'.$key,
										"colorAvailableActive" => 'colorAvailableActive_'.$key,
										"colorAvailableInactive" => 'colorAvailableInactive_'.$key,
									);
									?>
									<script type="text/javascript">
										BX.ready(function(){
											window['trackBar<?=$key?>'] = new BX.Iblock.SmartFilter(<?=CUtil::PhpToJSObject($arJsParams)?>);
										});
									</script>
								<?endif;
							}

							//not prices
							$allowed = array("8", "9", "51", "52");
							$arResult["NEWITEMS"]  = array_diff_key($arResult["ITEMS"], array_flip($allowed));
							foreach($arResult["NEWITEMS"] as $key=>$arItem)
							{
								if(
									empty($arItem["VALUES"])
									|| isset($arItem["PRICE"])
								)
									continue;

								if (
									$arItem["DISPLAY_TYPE"] == "A"
									&& (
										$arItem["VALUES"]["MAX"]["VALUE"] - $arItem["VALUES"]["MIN"]["VALUE"] <= 0
									)
								)
								{
									continue;
								}
								?>
								<div class="bx-filter-parameters-box" data-bx-filter-box>
									<span class="bx-filter-container-modef"></span>
									<div class="bx-filter-parameters-box-title">
										<span><?=$arItem["NAME"]?></span>
									</div>

									<div class="bx-filter-block" data-role="bx_filter_block">
										
										<?
										$arCur = current($arItem["VALUES"]);
										switch ($arItem["DISPLAY_TYPE"])
										{
											default://CHECKBOXES
												?>
													<?foreach($arItem["VALUES"] as $val => $ar): $quanprop++;?>
														<div class="bx-filter-parameters-box-container">
															<div class="checkbox">
																<label data-role="label_<?=$ar["CONTROL_ID"]?>" class="checkbox__label <? echo $ar["DISABLED"] ? 'disabled': '' ?>" for="<? echo $ar["CONTROL_ID"] ?>">
																		<input
																			type="checkbox"
																			value="<? echo $ar["HTML_VALUE"] ?>"
																			class="checkbox__input"
																			name="<? echo $ar["CONTROL_NAME"] ?>"
																			id="<? echo $ar["CONTROL_ID"] ?>"
																			<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
																			onclick="smartFilter.click(this)"
																		/>
																		<div class="checkbox__emulator">
			                                                               <svg class="i-icon">
			                                                                    <use xlink:href="#icon-checked"></use>
			                                                                </svg>	
			                                                            </div>	
			                                                            <div class="checkbox__text">														
																			<span><?=$ar["VALUE"];?></span>
																		</div>
																	</span>
																</label>
															</div>
														</div>
													<?endforeach;?>
										<?
										}
										?>
									</div>
								</div>
							<?
							}
							?>
						</div><!--//row-->
						<?if($quanprop>"0"):?>
							<div class="bx-filter-button-box">
								<div class="bx-filter-block">
									<div class="bx-filter-parameters-box-container">
										<div style="display:none;">
											<input
												class="btn btn-themes"
												type="submit"
												id="set_filter"
												name="set_filter"
												value="<?=GetMessage("CT_BCSF_SET_FILTER")?>"
											/>
										</div>
	                                    <button class="bx-filter-reset" type="submit" id="del_filter" name="del_filter">
	                                        <i class="bx-filter-reset__icon">
	                                            <svg class="i-icon">
	                                                <use xlink:href="#icon-reset"></use>
	                                            </svg>
	                                        </i>
	                                        <span>Сбросить все</span>
	                                    </button>									
									</div>
								</div>
							</div>
						<?endif;?>
					</form>
				</div>
			</div>
		</div>
	</div>
<?//endif;?>
<script type="text/javascript">
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', '<?=CUtil::JSEscape($arParams["FILTER_VIEW_MODE"])?>', <?=CUtil::PhpToJSObject($arResult["JS_FILTER_PARAMS"])?>);
</script>