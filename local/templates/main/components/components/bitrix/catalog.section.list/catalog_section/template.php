<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult['SECTIONS'])):?>
    <div class="sub-directory" data-desktop="sub-directory">
    	<ul class="sub-directory-list" data-move="sub-directory">
    		<?foreach ($arResult['SECTIONS'] as $arSection):?>
    			<?$this->AddEditAction($arSection['ID'], $arSection['EDIT_LINK'], $strSectionEdit);
    			$this->AddDeleteAction($arSection['ID'], $arSection['DELETE_LINK'], $strSectionDelete, $arSectionDeleteParams);?>
                        <li class="sub-directory-list__item">
                            <div class="sub-directory-item">
                                <a href="<?=$arSection["SECTION_PAGE_URL"];?>" class="sub-directory-item__link">
                                    <?=$arSection["NAME"];?>
                                </a>
                            </div>
                        </li>
    		<?endforeach;?>
    	</ul>
    </div>
<?endif;?>