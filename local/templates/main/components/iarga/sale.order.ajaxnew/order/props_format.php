<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!function_exists("PrintPropsForm"))
{
	function PrintPropsForm($arSource = array(), $locationTemplate = ".default")
	{
		if (!empty($arSource))
		{
			?>
				<div class="order-form-item">
                    <div class="order-form-item__head">
                        <div class="order-form-item__title title-border">Ваш город</div>
                    </div>	
                    <div class="order-form-item__body">			
					<?
						foreach ($arSource as $arProperties)
						{
							if ($arProperties["TYPE"] == "LOCATION")
							//elseif ($arProperties["TYPE"] == "LOCATION")
							{
								?>
								<div class="form-row">
									<div class="form-col">
										<label class="label">
											<?
											$value = 0;
											if (is_array($arProperties["VARIANTS"]) && count($arProperties["VARIANTS"]) > 0)
											{
												foreach ($arProperties["VARIANTS"] as $arVariant)
												{
													if ($arVariant["SELECTED"] == "Y")
													{
														$value = $arVariant["ID"];
														break;
													}
												}
											}

											// here we can get '' or 'popup'
											// map them, if needed
											if(CSaleLocation::isLocationProMigrated())
											{
												$locationTemplateP = $locationTemplate == 'popup' ? 'search' : 'steps';
												$locationTemplateP = $_REQUEST['PERMANENT_MODE_STEPS'] == 1 ? 'steps' : $locationTemplateP; // force to "steps"
											}
											?>

											<?if($locationTemplateP == 'steps'):?>
												<input type="hidden" id="LOCATION_ALT_PROP_DISPLAY_MANUAL[<?=intval($arProperties["ID"])?>]" name="LOCATION_ALT_PROP_DISPLAY_MANUAL[<?=intval($arProperties["ID"])?>]" value="<?=($_REQUEST['LOCATION_ALT_PROP_DISPLAY_MANUAL'][intval($arProperties["ID"])] ? '1' : '0')?>" />
											<?endif?>

											<?CSaleLocation::proxySaleAjaxLocationsComponent(array(
												"AJAX_CALL" => "N",
												"COUNTRY_INPUT_NAME" => "COUNTRY",
												"REGION_INPUT_NAME" => "REGION",
												"CITY_INPUT_NAME" => $arProperties["FIELD_NAME"],
												"CITY_OUT_LOCATION" => "Y",
												"LOCATION_VALUE" => $value,
												"ORDER_PROPS_ID" => $arProperties["ID"],
												"ONCITYCHANGE" => ($arProperties["IS_LOCATION"] == "Y" || $arProperties["IS_LOCATION4TAX"] == "Y") ? "submitForm()" : "",
												"SIZE1" => $arProperties["SIZE1"],
											),
											array(
												"ID" => $value,
												"CODE" => "",
												"SHOW_DEFAULT_LOCATIONS" => "Y",

												// function called on each location change caused by user or by program
												// it may be replaced with global component dispatch mechanism coming soon
												"JS_CALLBACK" => "submitFormProxy",

												// function window.BX.locationsDeferred['X'] will be created and lately called on each form re-draw.
												// it may be removed when sale.order.ajax will use real ajax form posting with BX.ProcessHTML() and other stuff instead of just simple iframe transfer
												"JS_CONTROL_DEFERRED_INIT" => intval($arProperties["ID"]),

												// an instance of this control will be placed to window.BX.locationSelectors['X'] and lately will be available from everywhere
												// it may be replaced with global component dispatch mechanism coming soon
												"JS_CONTROL_GLOBAL_ID" => intval($arProperties["ID"]),

												"DISABLE_KEYBOARD_INPUT" => "Y",
												"PRECACHE_LAST_LEVEL" => "Y",
												"PRESELECT_TREE_TRUNK" => "Y",
												"SUPPRESS_ERRORS" => "Y"
											),
											$locationTemplateP,
											true,
											'location-block-wrapper'
											)?>
										</label>
									</div>
								</div>
								<?
							}?>

								<?if(CSaleLocation::isLocationProEnabled()):?>

									<?
									$propertyAttributes = array(
										'type' => $arProperties["TYPE"],
										'valueSource' => $arProperties['SOURCE'] == 'DEFAULT' ? 'default' : 'form' // value taken from property DEFAULT_VALUE or it`s a user-typed value?
									);

									if(intval($arProperties['IS_ALTERNATE_LOCATION_FOR']))
										$propertyAttributes['isAltLocationFor'] = intval($arProperties['IS_ALTERNATE_LOCATION_FOR']);

									if(intval($arProperties['CAN_HAVE_ALTERNATE_LOCATION']))
										$propertyAttributes['altLocationPropId'] = intval($arProperties['CAN_HAVE_ALTERNATE_LOCATION']);

									if($arProperties['IS_ZIP'] == 'Y')
										$propertyAttributes['isZip'] = true;
									?>

									<script>

										<?// add property info to have client-side control on it?>
										(window.top.BX || BX).saleOrderAjax.addPropertyDesc(<?=CUtil::PhpToJSObject(array(
											'id' => intval($arProperties["ID"]),
											'attributes' => $propertyAttributes
										))?>);

									</script>
								<?endif?>
						<?}?>	
					</div>
				</div>	
					<?
		}
	}
}
//deliv
if (!function_exists("anPrintPropsForm"))
{
	function anPrintPropsForm($arSource = array(), $locationTemplate = ".default")
	{
		if (!empty($arSource))
		{
			?>	
					<div class="form-row form-row--point">	
						<div class="form-col">
							<?
							foreach ($arSource as $arProperties)
							{
								?>
								
									<?
									if ($arProperties["TYPE"] == "TEXT")
									{?>
										<label class="label" data-property-id-row="<?=intval(intval($arProperties["ID"]))?>" <?if($arProperties["ID"]=="7" || $arProperties["ID"]=="13"):?>style="display:none;"<?endif;?>>
											<input type="text" class="input<?if($arProperties["REQUIED_FORMATED"]=="Y"):?> input--required<?endif;?>" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" placeholder="<?=$arProperties["NAME"]?>" />
										</label>
										<?
									}
							}?>
						</div>
					</div>
		<?}
	}
}
//props
if (!function_exists("propPrintPropsForm"))
{
	function propPrintPropsForm($arSource = array())
	{
		{
			?>
			<div class="order-form-item">
                <div class="order-form-item__head">
                    <div class="order-form-item__title title-border"><?=GetMessage("SOA_TEMPL_BUYER_INFO")?></div>
                </div>
                <div class="order-form-item__body">
                	<div class="form-row">
						<?$s=0;

						global $USER;
						$User = CUser::GetByID($USER->GetParam('USER_ID'))->Fetch();
						foreach ($arSource as $arProperties)
						{

								if ($arProperties["TYPE"] == "TEXT")
								{ if($arProperties["ID"]!="15"){$s++;}
									$in=$s%2;?>
									<div class="form-col <?if($arProperties["ID"]=="15" || $arProperties["ID"]=="16"):?>form-col--3<?else:?>form-col--6<?endif;?>">
										<label class="label" data-property-id-row="<?=intval(intval($arProperties["ID"]))?>">
											<input type="text" class="input<?if($arProperties["REQUIED_FORMATED"]=="Y"):?> input--required<?endif;?>" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$User[$arProperties["CODE"]]?>" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>" placeholder="<?=$arProperties["NAME"]?>" />
										</label>
									</div>
									<?if($in == "0"):?>
										</div>
										<div class="form-row">
									<?endif;?>
									<?
								}
						}
						?>
					</div>
				</div>
			</div>	
			<?
		}
	}
}
//check
if (!function_exists("chekPrintPropsForm"))
{
	function chekPrintPropsForm($arSource = array())
	{
		foreach ($arSource as $arProperties)
		{
			if ($arProperties["TYPE"] == "CHECKBOX")
			{?>
				<input type="hidden" name="<?=$arProperties["FIELD_NAME"]?>" value="">
				<input type="checkbox" name="<?=$arProperties["FIELD_NAME"]?>" class="checkbox__input checkbox--required" id="<?=$arProperties["FIELD_NAME"]?>" value="" data-input-required="checkbox">
			<?
			}	
		}	
	}
}







if (!function_exists("showFilePropertyField"))
{
	function showFilePropertyField($name, $property_fields, $values, $max_file_size_show=50000)
	{
		$res = "";

		if (!is_array($values) || empty($values))
			$values = array(
				"n0" => 0,
			);

		if ($property_fields["MULTIPLE"] == "N")
		{
			$res = "<label for=\"\"><input type=\"file\" size=\"".$max_file_size_show."\" value=\"".$property_fields["VALUE"]."\" name=\"".$name."[0]\" id=\"".$name."[0]\"></label>";
		}
		else
		{
			$res = '
			<script type="text/javascript">
				function addControl(item)
				{
					var current_name = item.id.split("[")[0],
						current_id = item.id.split("[")[1].replace("[", "").replace("]", ""),
						next_id = parseInt(current_id) + 1;

					var newInput = document.createElement("input");
					newInput.type = "file";
					newInput.name = current_name + "[" + next_id + "]";
					newInput.id = current_name + "[" + next_id + "]";
					newInput.onchange = function() { addControl(this); };

					var br = document.createElement("br");
					var br2 = document.createElement("br");

					BX(item.id).parentNode.appendChild(br);
					BX(item.id).parentNode.appendChild(br2);
					BX(item.id).parentNode.appendChild(newInput);
				}
			</script>
			';

			$res .= "<label for=\"\"><input type=\"file\" size=\"".$max_file_size_show."\" value=\"".$property_fields["VALUE"]."\" name=\"".$name."[0]\" id=\"".$name."[0]\"></label>";
			$res .= "<br/><br/>";
			$res .= "<label for=\"\"><input type=\"file\" size=\"".$max_file_size_show."\" value=\"".$property_fields["VALUE"]."\" name=\"".$name."[1]\" id=\"".$name."[1]\" onChange=\"javascript:addControl(this);\"></label>";
		}

		return $res;
	}
}
?>