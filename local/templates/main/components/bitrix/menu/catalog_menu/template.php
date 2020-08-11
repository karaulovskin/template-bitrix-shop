<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$arMenu = Array(); $arLast = Array();
foreach($arResult as $n=>$arItem){
	if($arItem['DEPTH_LEVEL']==1){
		$arMenu[$n] = $arItem;
		$arMenu[$n]['COUNT'] ++;
		$arLast[1] = $n;
	}elseif($arItem['DEPTH_LEVEL']==2){
		$arMenu[$arLast[1]]['SUBMENU'][$n] = $arItem;
		$arMenu[$arLast[1]]['COUNT'] ++;
		$arLast[2] = $n;
	}
}?>
<section class="header__bottom">
	<div class="container">
		<nav class="header-catalog" data-header="catalog">
			<ul class="header-catalog-list" data-move="catalog">
		    	<?foreach ($arMenu as $n1 => $arMenu1):?>
			        <li class="header-catalog-list__item">
                        <a href="<?=$arMenu1['LINK']?>" class="header-catalog-list__link<?=$arMenu1["PARAMS"]["CLASS"];?>" data-picture-hover>
                        	<?if($arMenu1["PARAMS"]["SALE"]):?>
					                <picture class="directory-item-picture directory-item-picture--small">
					                    <img src="<?=$arMenu1["PARAMS"]["UF_ICON"];?>" alt="" class="directory-item-picture__img directory-item-picture__img--repose" data-picture-hover="repose">
					                    <?if($arMenu1["PARAMS"]["UF_HOVER"]):?><img src="<?=$arMenu1["PARAMS"]["UF_HOVER"];?>" alt="" class="directory-item-picture__img directory-item-picture__img--hover" data-picture-hover="hover"><?endif;?>
					                </picture>                        	
                        	<?else:?>
					<picture class="directory-item-picture directory-item-picture--small">
					                <?if($arMenu1["PARAMS"]["UF_ICON"]):?>
					                    <img src="<?=getpuch($arMenu1["PARAMS"]["UF_ICON"]);?>" alt="" class="directory-item-picture__img directory-item-picture__img--repose" data-picture-hover="repose">
					                    <?if($arMenu1["PARAMS"]["UF_HOVER"]):?><img src="<?=getpuch($arMenu1["PARAMS"]["UF_HOVER"]);?>" alt="" class="directory-item-picture__img directory-item-picture__img--hover" data-picture-hover="hover"><?endif;?>
					                <?endif;?>
					</picture>
                            <?endif;?>
                            <span><?=$arMenu1['TEXT'];?></span>
                        </a>
			            <?if($arMenu1['SUBMENU']):?>
			                <ul class="header-sub-catalog-list">
			                    <?foreach ($arMenu1['SUBMENU'] as $n2 => $arMenu2):?>
				                    <li class="header-sub-catalog-list__item">
				                        <a href="<?=$arMenu2["LINK"]?>" class="header-sub-catalog-list__link"><?=$arMenu2["TEXT"];?></a>
				                    </li>
								<?endforeach?>                          
			                </ul>        
						<?endif;?>
			        </li>
		        <?endforeach;?>
        	</ul>
        </nav>
    </div>
</section>