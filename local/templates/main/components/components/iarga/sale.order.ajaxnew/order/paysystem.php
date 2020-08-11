<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<script type="text/javascript">
		function changePaySystem(param)
		{
			if (BX("account_only") && BX("account_only").value == 'Y') // PAY_CURRENT_ACCOUNT checkbox should act as radio
			{
				if (param == 'account')
				{
					if (BX("PAY_CURRENT_ACCOUNT"))
					{
						BX("PAY_CURRENT_ACCOUNT").checked = true;
						BX("PAY_CURRENT_ACCOUNT").setAttribute("checked", "checked");
						BX.addClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');

						// deselect all other
						var el = document.getElementsByName("PAY_SYSTEM_ID");
						for(var i=0; i<el.length; i++)
							el[i].checked = false;
					}
				}
				else
				{
					BX("PAY_CURRENT_ACCOUNT").checked = false;
					BX("PAY_CURRENT_ACCOUNT").removeAttribute("checked");
					BX.removeClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
				}
			}
			else if (BX("account_only") && BX("account_only").value == 'N')
			{
				if (param == 'account')
				{
					if (BX("PAY_CURRENT_ACCOUNT"))
					{
						BX("PAY_CURRENT_ACCOUNT").checked = !BX("PAY_CURRENT_ACCOUNT").checked;

						if (BX("PAY_CURRENT_ACCOUNT").checked)
						{
							BX("PAY_CURRENT_ACCOUNT").setAttribute("checked", "checked");
							BX.addClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
						}
						else
						{
							BX("PAY_CURRENT_ACCOUNT").removeAttribute("checked");
							BX.removeClass(BX("PAY_CURRENT_ACCOUNT_LABEL"), 'selected');
						}
					}
				}
			}

			submitForm();
		}
	</script>
	<div class="order-form-item">
        <div class="order-form-item__head">
            <div class="order-form-item__title title-border"><?=GetMessage("SOA_TEMPL_PAY_SYSTEM")?></div>
        </div>	
        <div class="order-form-item__body">
	        <div class="checkbox-list">
				<?
				if ($arResult["PAY_FROM_ACCOUNT"] == "Y")
				{
					$accountOnly = ($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y") ? "Y" : "N";
					?>
					<input type="hidden" id="account_only" value="<?=$accountOnly?>" />
					<div class="bx_block w100 vertical">
						<div class="bx_element">
							<input type="hidden" name="PAY_CURRENT_ACCOUNT" value="N">
							<label for="PAY_CURRENT_ACCOUNT" id="PAY_CURRENT_ACCOUNT_LABEL" onclick="changePaySystem('account');" class="<?if($arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y") echo "selected"?>">
								<input type="checkbox" name="PAY_CURRENT_ACCOUNT" id="PAY_CURRENT_ACCOUNT" value="Y"<?if($arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y") echo " checked=\"checked\"";?>>
								<div class="bx_logotype">
									<span style="background-image:url(<?=$templateFolder?>/images/logo-default-ps.gif);"></span>
								</div>
								<div class="bx_description">
									<strong><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT")?></strong>
									<p>
										<div><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT1")." <b>".$arResult["CURRENT_BUDGET_FORMATED"]?></b></div>
										<? if ($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y"):?>
											<div><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT3")?></div>
										<? else:?>
											<div><?=GetMessage("SOA_TEMPL_PAY_ACCOUNT2")?></div>
										<? endif;?>
									</p>
								</div>
							</label>
							<div class="clear"></div>
						</div>
					</div>
					<?
				}

				uasort($arResult["PAY_SYSTEM"], "cmpBySort"); // resort arrays according to SORT value

				foreach($arResult["PAY_SYSTEM"] as $arPaySystem)
				{
					if (strlen(trim(str_replace("<br />", "", $arPaySystem["DESCRIPTION"]))) > 0 || intval($arPaySystem["PRICE"]) > 0)
					{
						if (count($arResult["PAY_SYSTEM"]) == 1)
						{
							?>
							<div class="checkbox-list__item">
								<div class="checkbox checkbox--big">
									<label class="checkbox__label" for="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>" onclick="BX('ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>').checked=true;changePaySystem();">
										<input type="hidden" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>">
										<input type="radio"
											id="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>"
											name="PAY_SYSTEM_ID"
											value="<?=$arPaySystem["ID"]?>"
											<?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?>
											onclick="changePaySystem();"
											class="checkbox__input"
											/>
	                                        <div class="checkbox__emulator">
	                                            <svg class="i-icon">
	                                                <use xlink:href="#icon-checked"></use>
	                                            </svg>
	                                        </div>
	                                        <div class="checkbox__text">
	                                            <span><?=$arPaySystem["PSA_NAME"];?></span>
	                                        </div>
									</label>
								</div>
							</div>
							<?
						}
						else // more than one
						{
						?>
							<div class="checkbox-list__item">
								<div class="checkbox checkbox--big">
									<label class="checkbox__label" for="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>" onclick="BX('ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>').checked=true;changePaySystem();">
										<input type="radio"
											id="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>"
											name="PAY_SYSTEM_ID"
											value="<?=$arPaySystem["ID"]?>"
											class="checkbox__input"
											<?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?>
											onclick="changePaySystem();" />
									
                                        <div class="checkbox__emulator">
                                            <svg class="i-icon">
                                                <use xlink:href="#icon-checked"></use>
                                            </svg>
                                        </div>
                                         <div class="checkbox__text">
                                            <span><?=$arPaySystem["PSA_NAME"];?></span>
                                        </div>                                       
									</label>
								</div>
							</div>
						<?
						}
					}

					if (strlen(trim(str_replace("<br />", "", $arPaySystem["DESCRIPTION"]))) == 0 && intval($arPaySystem["PRICE"]) == 0)
					{
						if (count($arResult["PAY_SYSTEM"]) == 1)
						{
							?>
							<div class="checkbox-list__item">
								<div class="checkbox checkbox--big">
									<label class="checkbox__label" for="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>" onclick="BX('ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>').checked=true;changePaySystem();">
										<input type="hidden" name="PAY_SYSTEM_ID" value="<?=$arPaySystem["ID"]?>">
										<input type="radio"
											id="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>"
											name="PAY_SYSTEM_ID"
											value="<?=$arPaySystem["ID"]?>"
											<?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?>
											class="checkbox__input"
											onclick="changePaySystem();"
											/>
									
                                        <div class="checkbox__emulator">
                                            <svg class="i-icon">
                                                <use xlink:href="#icon-checked"></use>
                                            </svg>
                                        </div>
                                        <div class="checkbox__text">
                                            <span><?=$arPaySystem["PSA_NAME"];?></span>
                                        </div>
								</div>
							</div>
						<?
						}
						else // more than one
						{
						?>
							<div class="checkbox-list__item">
								<div class="checkbox checkbox--big">
									<label class="checkbox__label" for="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>" onclick="BX('ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>').checked=true;changePaySystem();">
										<input type="radio"
											id="ID_PAY_SYSTEM_ID_<?=$arPaySystem["ID"]?>"
											name="PAY_SYSTEM_ID"
											value="<?=$arPaySystem["ID"]?>"
											class="checkbox__input"
											<?if ($arPaySystem["CHECKED"]=="Y" && !($arParams["ONLY_FULL_PAY_FROM_ACCOUNT"] == "Y" && $arResult["USER_VALS"]["PAY_CURRENT_ACCOUNT"]=="Y")) echo " checked=\"checked\"";?>
											onclick="changePaySystem();" />
	                                        <div class="checkbox__emulator">
	                                            <svg class="i-icon">
	                                                <use xlink:href="#icon-checked"></use>
	                                            </svg>
	                                        </div>
	                                        <div class="checkbox__text">
	                                            <span><?=$arPaySystem["PSA_NAME"];?></span>
	                                        </div> 
									</label>
								</div>
							</div>
						<?
						}
					}
				}
				?>
			</div>
		</div>
	</div>
<?=propPrintPropsForm($arResult["ORDER_PROP"]["USER_PROPS_N"]);?>