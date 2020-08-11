<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
	<nav class="tabs-nav">
		<ul class="tabs-nav-list tabs-nav-list--big-border">
			<?
			foreach($arResult as $arItem):
				if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
					continue;
			?>
				<?if($arItem["SELECTED"]):?>
					<li class="tabs-nav-list__item current">
						<a href="<?=$arItem["LINK"]?>" class="tabs-nav-list__link">
							<?=$arItem["TEXT"]?>	
						</a>
					</li>
				<?else:?>
					<li class="tabs-nav-list__item">
						<a href="<?=$arItem["LINK"]?>" class="tabs-nav-list__link">
							<?=$arItem["TEXT"]?>	
						</a>
					</li>
				<?endif?>
			<?endforeach?>
		</ul>
	</nav>
<?endif?>