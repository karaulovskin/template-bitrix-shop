<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div class="directory">
	<ul class="directory-list">
		<?foreach ($arResult['SECTIONS'] as $arSection):?>
			<?$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);?>
                    <li class="directory-list__item">
                        <div class="directory-item">
                            <a href="<?=$arSection["SECTION_PAGE_URL"];?>" class="directory-item__link " data-picture-hover>
                                <picture class="directory-item-picture">
                                    <?if($arSection["UF_ICON"]):?><img src="<?=getpuch($arSection["UF_ICON"]);?>" alt="" class="directory-item-picture__img directory-item-picture__img--repose"><?endif;?>
                                    <?if($arSection["UF_HOVER"]):?><img src="<?=getpuch($arSection["UF_HOVER"]);?>" alt="" class="directory-item-picture__img directory-item-picture__img--hover"><?endif;?>
                                </picture>
                                <div class="directory-item__title"><?=$arSection["NAME"];?></div>
                            </a>
                        </div>
                    </li>
		<?endforeach;?>
	</ul>
</div>
