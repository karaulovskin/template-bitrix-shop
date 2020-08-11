<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
<div class="header__socials" data-header="socials">
	<div class="circle-list" data-move="socials">
		<?foreach($arResult["ITEMS"] as $arItem):?>
			<?
			$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
			$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
			?>
			<div class="circle-list__item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
				<div class="circle-item circle-item--socials <?=$arItem["CODE"];?>">
				   <a href="<?=$arItem["PROPERTIES"]["url"]["VALUE"];?>" target="_blank" class="circle-item__link">
					<i class="circle-item__icon">
					        <svg class="i-icon">
					            <use xlink:href="#<?=$arItem["PROPERTIES"]["icon"]["VALUE"];?>"></use>
					        </svg>
					</i>
				    </a>
				</div>
			</div>	
		<?endforeach;?>
	</div>
</div>