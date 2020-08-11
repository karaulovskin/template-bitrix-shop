<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<section class="footer__bottom">
	<div class="container">
		<nav class="footer-nav">
			<ul class="footer-nav-list" data-move="nav">
				<?foreach($arResult as $arItem):
					if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1) 
						continue;
				?>
					<?if($arItem["SELECTED"]):?>
						<li class="footer-nav-list__item"><a href="<?=$arItem["LINK"]?>" class="footer-nav-list__link current"><?=$arItem["TEXT"]?></a></li>
					<?else:?>
						<li class="footer-nav-list__item"><a href="<?=$arItem["LINK"]?>" class="footer-nav-list__link"><?=$arItem["TEXT"]?></a></li>
					<?endif?>
				<?endforeach?>	
			</ul>
		</nav>
	</div>
</section>
<?endif?>