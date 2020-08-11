<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */

?>
<div class="search-page">
	<form action="" method="get">
		<?if($arParams["USE_SUGGEST"] === "Y"):
			if(strlen($arResult["REQUEST"]["~QUERY"]) && is_object($arResult["NAV_RESULT"]))
			{
				$arResult["FILTER_MD5"] = $arResult["NAV_RESULT"]->GetFilterMD5();
				$obSearchSuggest = new CSearchSuggest($arResult["FILTER_MD5"], $arResult["REQUEST"]["~QUERY"]);
				$obSearchSuggest->SetResultCount($arResult["NAV_RESULT"]->NavRecordCount);
			}
			?>
			<?$APPLICATION->IncludeComponent(
				"bitrix:search.suggest.input",
				"",
				array(
					"NAME" => "q",
					"VALUE" => $arResult["REQUEST"]["~QUERY"],
					"INPUT_SIZE" => 40,
					"DROPDOWN_SIZE" => 10,
					"FILTER_MD5" => $arResult["FILTER_MD5"],
				),
				$component, array("HIDE_ICONS" => "Y")
			);?>
		<?else:?>
			<input class="input placeholder-uppercase" type="text" name="q" value="<?=$arResult["REQUEST"]["QUERY"]?>" size="40" />
		<?endif;?>
		<?if($arParams["SHOW_WHERE"]):?>
			&nbsp;<select name="where">
			<option value=""><?=GetMessage("SEARCH_ALL")?></option>
			<?foreach($arResult["DROPDOWN"] as $key=>$value):?>
			<option value="<?=$key?>"<?if($arResult["REQUEST"]["WHERE"]==$key) echo " selected"?>><?=$value?></option>
			<?endforeach?>
			</select>
		<?endif;?>
		&nbsp;<input class="search__submit" type="submit" value="<?=GetMessage("SEARCH_GO")?>" />
		<input type="hidden" name="how" value="<?echo $arResult["REQUEST"]["HOW"]=="d"? "d": "r"?>" />
		<?if($arParams["SHOW_WHEN"]):?>
			<script>
			var switch_search_params = function()
			{
				var sp = document.getElementById('search_params');
				var flag;
				var i;

				if(sp.style.display == 'none')
				{
					flag = false;
					sp.style.display = 'block'
				}
				else
				{
					flag = true;
					sp.style.display = 'none';
				}

				var from = document.getElementsByName('from');
				for(i = 0; i < from.length; i++)
					if(from[i].type.toLowerCase() == 'text')
						from[i].disabled = flag;

				var to = document.getElementsByName('to');
				for(i = 0; i < to.length; i++)
					if(to[i].type.toLowerCase() == 'text')
						to[i].disabled = flag;

				return false;
			}
			</script>
		<?endif?>
	</form><br />

	<?if(isset($arResult["REQUEST"]["ORIGINAL_QUERY"])):
		?>
		<div class="search-language-guess">
			<?echo GetMessage("CT_BSP_KEYBOARD_WARNING", array("#query#"=>'<a href="'.$arResult["ORIGINAL_QUERY_URL"].'">'.$arResult["REQUEST"]["ORIGINAL_QUERY"].'</a>'))?>
		</div><br /><?
	endif;?>
</div>