<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<section class="header__top">
	<div class="container">
		<nav class="header-nav">
			<ul class="header-nav-list">
				<?foreach($arResult as $arItem):
					if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
						continue;
				?>
					<?if($arItem["SELECTED"]):?>
						<li class="header-nav-list__item"><a href="<?=$arItem["LINK"]?>" class="header-nav-list__link current"><?=$arItem["TEXT"]?></a></li>
					<?else:?>
						<li class="header-nav-list__item"><a href="<?=$arItem["LINK"]?>" class="header-nav-list__link"><?=$arItem["TEXT"]?></a></li>
					<?endif?>
				<?endforeach?>	
			</ul>
		</nav>
	</div>
</section>
<?endif?>