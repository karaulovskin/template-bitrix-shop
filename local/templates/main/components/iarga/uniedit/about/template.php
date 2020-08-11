<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$bann = CIBlockElement::GetList(Array(),Array("IBLOCK_ID"=>"12","ACTIVE"=>"Y"))->GetNext();
$bann = GetIBlockElement($bann['ID']);?> 
<section class="section-banner" style="background-image: url(<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/content/banner.jpg)">
	<div class="banner">
		<div class="banner__head">
			<div id="bannerElement1" class="banner-element">
				<svg class="i-icon">
					<use xlink:href="#icon-bannerElement1"></use>
				</svg>
			</div>
			<div id="bannerElement3" class="banner-element">
				<svg class="i-icon">
					<use xlink:href="#icon-bannerElement3"></use>
				</svg>
			</div>
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"bredcrumb",
				Array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			);?>
			<div class="h1"><?=$bann["PROPERTIES"]["title"]["~VALUE"]["TEXT"];?></div>
		</div>
		<div class="banner__content">
			<div id="bannerElement2" class="banner-element">
				<svg class="i-icon">
					<use xlink:href="#icon-bannerElement2"></use>
				</svg>
			</div>
			<?if($bann["PREVIEW_TEXT"]):?>
				<p>
					<?=$bann["~PREVIEW_TEXT"];?>
				</p>
			<?endif;?>
		</div>
		<?if($bann["PROPERTIES"]["down"]["VALUE"]):?>
			<div class="banner__button">
				<a href="<?=getpuch($bann["PROPERTIES"]["down"]["VALUE"]);?>" target="_blank" class="btn" download>Скачать каталог</a>
			</div>
		<?endif;?>
	</div>
</section>
<div class="section  bg-beige-bright">
	<div id="stocksElement1" class="stocks-element">
		<svg class="i-icon">
			<use xlink:href="#icon-stocksElement1"></use>
		</svg>
	</div>
	<div id="stocksElement2" class="stocks-element">
		<svg class="i-icon">
			<use xlink:href="#icon-stocksElement2"></use>
		</svg>
	</div>
	<div id="stocksElement3" class="stocks-element">
		<svg class="i-icon">
			<use xlink:href="#icon-stocksElement3"></use>
		</svg>
	</div>
	<div id="stocksElement4" class="stocks-element">
		<svg class="i-icon">
			<use xlink:href="#icon-stocksElement4"></use>
		</svg>
	</div>
	<div id="stocksElement5" class="stocks-element">
		<svg class="i-icon">
			<use xlink:href="#icon-stocksElement5"></use>
		</svg>
	</div>
	<div class="container">
		<?if($bann["PROPERTIES"]["twoname"]["VALUE"]):?>
			<div class="content-head">
				<div class="content-head__title">
					<div class="h1"><?=$bann["PROPERTIES"]["twoname"]["VALUE"];?></div>
				</div>
			</div>
		<?endif;?>
		<div class="stocks-editor">
			<?if($bann["PROPERTIES"]["img"]["VALUE"]):?>
				<picture class="stocks-editor-picture">
					<img src="<?=res($bann["PROPERTIES"]["img"]["VALUE"],810,400, 1);?>" alt="" class="stocks-editor-picture__img">
				</picture>
			<?endif;?>
			<?if($bann["DETAIL_TEXT"]):?>
				<div class="stocks-editor__content">
					<div class="editor">
						<?=$bann["~DETAIL_TEXT"];?>
					</div>
				</div>
			<?endif;?>
		</div>
	</div>
</div>
<?if($bann["PROPERTIES"]["desc"]["VALUE"]):?>
	<section class="section-assemble">
		<div id="assembleElement1" class="assemble-element">
			<svg class="i-icon">
				<use xlink:href="#icon-assembleElement1"></use>
			</svg>
		</div>
		<div id="assembleElement2" class="assemble-element">
			<svg class="i-icon">
				<use xlink:href="#icon-assembleElement2"></use>
			</svg>
		</div>
		<div id="assembleElement3" class="assemble-element">
			<svg class="i-icon">
				<use xlink:href="#icon-assembleElement3"></use>
			</svg>
		</div>
		<div class="container">
			<div class="heart-block heart-block--assemble">
				<div class="heart-block__heart">
					<svg class="i-icon icon-heart">
						<use xlink:href="#icon-heart"></use>
					</svg>
					<svg class="i-icon icon-mish">
						<use xlink:href="#icon-title-mish"></use>
					</svg>
				</div>
				<div class="heart-block__content">
					<div class="heart-block__title">
						<div class="h1 title-border">Реквизиты</div>
					</div>
					<div class="heart-block__desc">
						<p>
							<?foreach($bann["PROPERTIES"]["desc"]["VALUE"] as $desc):?>
								<?=$desc;?><br>
							<?endforeach;?>
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>
<?endif;?>