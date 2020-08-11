<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if(count($arResult["PERSON_TYPE"]) > 1)
{
	?>
	<div class="order-form-item">
        <div class="order-form-item__head">
            <div class="order-form-item__title title-border"><?=GetMessage("SOA_TEMPL_PERSON_TYPE")?></div>
        </div>
        <div class="order-form-item__body">
        	<div class="checkbox-list checkbox-list--center">
				<?foreach($arResult["PERSON_TYPE"] as $v):?>
					<div class="checkbox-list__item">
						<div class="checkbox checkbox--big checkbox--radio">
							<label class="checkbox__label" for="PERSON_TYPE_<?=$v["ID"]?>">
								<input type="radio" class="radio__input" id="PERSON_TYPE_<?=$v["ID"]?>" name="PERSON_TYPE" value="<?=$v["ID"]?>"<?if ($v["CHECKED"]=="Y") echo " checked=\"checked\"";?> onClick="submitForm();">
                                <div class="radio__emulator"></div>
                                <div class="checkbox__text">
                                    <span><?=$v["NAME"]?></span>
                                </div>								
							</label>
						</div>
					</div>
				<?endforeach;?>
			</div>
		</div>
		<input type="hidden" name="PERSON_TYPE_OLD" value="<?=$arResult["USER_VALS"]["PERSON_TYPE_ID"]?>" />
	</div>
	<?
}
else
{
	if(IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"]) > 0)
	{
		//for IE 8, problems with input hidden after ajax
		?>
		<span style="display:none;">
		<input type="text" name="PERSON_TYPE" value="<?=IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"])?>" />
		<input type="text" name="PERSON_TYPE_OLD" value="<?=IntVal($arResult["USER_VALS"]["PERSON_TYPE_ID"])?>" />
		</span>
		<?
	}
	else
	{
		foreach($arResult["PERSON_TYPE"] as $v)
		{
			?>
			<input type="hidden" id="PERSON_TYPE" name="PERSON_TYPE" value="<?=$v["ID"]?>" />
			<input type="hidden" name="PERSON_TYPE_OLD" value="<?=$v["ID"]?>" />
			<?
		}
	}
}
?>