<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<div class="police">
		<?foreach($arResult as $arItem):
			if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
				continue;?>
				<div class="police-item">
					<?if($arItem["SELECTED"]):?>
						<a href="<?=$arItem["LINK"]?>" class="police-item__link current"><?=$arItem["TEXT"]?></a>
					<?else:?>
						<a href="<?=$arItem["LINK"]?>" class="police-item__link"><?=$arItem["TEXT"]?></a>
					<?endif?>
				</div>
		<?endforeach?>
	</div>
<?endif?>