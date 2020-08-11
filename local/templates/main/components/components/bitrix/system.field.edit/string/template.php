<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
	<?if($arParams["arUserField"]["FIELD_NAME"]=="UF_RS"):?>
</div>
<div class="form-row">
<div class="form-col form-col--6" id="main_<?=$arParams["arUserField"]["FIELD_NAME"]?>">
	<?else:?>
<div class="form-col form-col--3" id="main_<?=$arParams["arUserField"]["FIELD_NAME"]?>">		
	<?endif;?>
	<?
	foreach ($arResult["VALUE"] as $res):
	?>

	    <label class="label">
	        <input type="text" name="<?=$arParams["arUserField"]["FIELD_NAME"]?>" value="<?=$res?>" class="input<?if($arParams["arUserField"]["FIELD_NAME"]=="UF_INN"):?> input--required<?endif;?>" placeholder="<?=$arParams["arUserField"]["EDIT_FORM_LABEL"];?>" <?if($arParams["arUserField"]["FIELD_NAME"]=="UF_INN"):?>required=""<?endif;?>>
	   	</label>
	<?endforeach;?>
</div>