<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();?>
<section class="section-directory bg-beige-bright">
	<div class="container">
		<div class="content-head">
			<?$APPLICATION->IncludeComponent(
				"bitrix:breadcrumb",
				"bredcrumb",
				Array(
					"PATH" => "",
					"SITE_ID" => "s1",
					"START_FROM" => "0"
				)
			);?>		
            <div class="content-head__title">
                <h1 class="h1"><?=$APPLICATION->ShowTitle(false);?></h1>
            </div>
		</div>		
			<?$APPLICATION->IncludeComponent(
				"bitrix:catalog.section.list",
				"",
				array(
					"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
					"IBLOCK_ID" => $arParams["IBLOCK_ID"],
					"SECTION_USER_FIELDS" => array('UF_*'),
					"CACHE_TYPE" => $arParams["CACHE_TYPE"],
					"CACHE_TIME" => $arParams["CACHE_TIME"],
					"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
					"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
					"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
					"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
					"VIEW_MODE" => $arParams["SECTIONS_VIEW_MODE"],
					"SHOW_PARENT_NAME" => $arParams["SECTIONS_SHOW_PARENT_NAME"],
					"HIDE_SECTION_NAME" => (isset($arParams["SECTIONS_HIDE_SECTION_NAME"]) ? $arParams["SECTIONS_HIDE_SECTION_NAME"] : "N"),
					"ADD_SECTIONS_CHAIN" => (isset($arParams["ADD_SECTIONS_CHAIN"]) ? $arParams["ADD_SECTIONS_CHAIN"] : '')
				),
				$component,
				($arParams["SHOW_TOP_ELEMENTS"] !== "N" ? array("HIDE_ICONS" => "Y") : array())
			);
			?>

	</div>
</section>
<section class="seo">
    <div id="seoElement1" class="seo-element">
        <svg class="i-icon">
            <use xlink:href="#icon-seo-1"></use>
        </svg>
    </div>
    <div id="seoElement2" class="seo-element">
        <svg class="i-icon">
            <use xlink:href="#icon-seo-2"></use>
        </svg>
    </div>
    <div id="seoElement3" class="seo-element">
        <svg class="i-icon">
            <use xlink:href="#icon-seo-3"></use>
        </svg>
    </div>
    <div class="container container--min">
        <div class="seo__block"> 
            <div class="seo__content">
				<?$APPLICATION->IncludeComponent(
					"bitrix:main.include", 
					".default", 
					array(
						"AREA_FILE_SHOW" => "file",
						"AREA_FILE_SUFFIX" => "/inc/parts/",
						"EDIT_TEMPLATE" => "",
						"PATH" => "/local/inc/parts/catalog_text.php",
						"COMPONENT_TEMPLATE" => ".default"
					),
					false
				);?>
            </div>
        </div>
    </div>
</section>