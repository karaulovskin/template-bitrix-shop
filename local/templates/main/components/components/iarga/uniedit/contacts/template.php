<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$elm = CIBlockElement::GetList(Array("SORT"=>"ASC"),Array("IBLOCK_ID"=>"18","ACTIVE"=>"Y"),false,false,array("ID"));
while($eob = $elm->GetNextElement())
{
 $cont = $eob->GetFields();
 $contact_list[] = $cont["ID"];
}

$res = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>"9","ACTIVE"=>"Y"), false, false, Array("ID"));
while($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
	$list = GetIBlockElement($arFields['ID']);
	$citylist[] = $list["PROPERTIES"]["city"]["VALUE"];
	$elementlist[$list["PROPERTIES"]["city"]["VALUE"]][]=$list;
}
$citylist = array_unique($citylist);?>
		<?if($contact_list):?>
	        <div class="office">
	            <div class="office-list">
	            	<?$i=0; foreach($contact_list as $otdellist): $i++;
	            	$otdel = GetIBlockElement($otdellist);?>
						<?if($i=="1"):?>	
			                <div class="office-list__item">
			                    <div class="office-item office-item--main">
			                        <div class="office-item__content">
			                            <div class="office-item__title"><?=$otdel["NAME"];?></div>
			                            <div class="list-contacts">
			                            	<?if($otdel["PROPERTIES"]["phone"]["VALUE"]):?>
				                                <div class="list-contacts__item">
				                                    <div class="list-contacts-item">
				                                        <a href="tel:<?=preg_replace("#[^0-9]#","",$otdel["PROPERTIES"]["phone"]["VALUE"]);?>" class="list-contacts-item__link">
				                                            <div class="list-contacts-item__icon">
				                                                <svg class="i-icon">
				                                                    <use xlink:href="#icon-phone"></use>
				                                                </svg>
				                                            </div>
				                                            <div class="list-contacts-item__label list-contacts-item__label--big"><?=$otdel["PROPERTIES"]["phone"]["VALUE"];?></div>
				                                        </a>
				                                    </div>
				                                </div>
			                                <?endif;?>
			                                <?if($otdel["PROPERTIES"]["mail"]["VALUE"]):?>
				                                <div class="list-contacts__item">
				                                    <div class="list-contacts-item">
				                                        <a href="mailto:<?=$otdel["PROPERTIES"]["mail"]["VALUE"];?>" class="list-contacts-item__link">
				                                            <div class="list-contacts-item__icon">
				                                                <svg class="i-icon i-icon--mail">
				                                                    <use xlink:href="#icon-mail"></use>
				                                                </svg>
				                                            </div>
				                                            <div class="list-contacts-item__label"><?=$otdel["PROPERTIES"]["mail"]["VALUE"];?></div>
				                                        </a>
				                                    </div>
				                                </div>
			                                <?endif;?>
			                                <?if($otdel["PROPERTIES"]["time"]["VALUE"]):?>
				                                <div class="list-contacts__item">
				                                    <div class="list-contacts-item">
				                                        <a class="list-contacts-item__link">
				                                            <div class="list-contacts-item__icon">
				                                                <svg class="i-icon">
				                                                    <use xlink:href="#icon-period"></use>
				                                                </svg>
				                                            </div>
				                                            <div class="list-contacts-item__label"><?=$otdel["PROPERTIES"]["time"]["VALUE"];?></div>
				                                        </a>
				                                    </div>
				                                </div>
				                            <?endif;?>
				                            <?if($otdel["PROPERTIES"]["adress"]["VALUE"]):?>
				                                <div class="list-contacts__item">
				                                    <div class="list-contacts-item">
				                                        <a class="list-contacts-item__link">
				                                            <div class="list-contacts-item__icon">
				                                                <svg class="i-icon">
				                                                    <use xlink:href="#icon-point"></use>
				                                                </svg>
				                                            </div>
				                                            <div class="list-contacts-item__label">
				                                                <?=$otdel["PROPERTIES"]["adress"]["~VALUE"]["TEXT"];?>
				                                            </div>
				                                        </a>
				                                    </div>
				                                </div>
				                            <?endif;?>
			                            </div>
			                        </div>
			                        <?if($otdel["PROPERTIES"]["photo"]["VALUE"]):?>
			                      	  <div class="office-item__picture" style="background-image: url(<?=crop($otdel["PROPERTIES"]["photo"]["VALUE"],880,389, 1);?>)"></div>
			                        <?endif;?>
			                    </div>
			                </div>
						<?else:?>
			                <div class="office-list__item office-list__item--6">
			                    <div class="office-item">
			                        <div class="office-item__content">
			                            <div class="office-item__title"><?=$otdel["NAME"];?></div>
			                            <div class="list-contacts">
			                            	<?if($otdel["PROPERTIES"]["phone"]["VALUE"]):?>
				                                <div class="list-contacts__item">
				                                    <div class="list-contacts-item">
				                                        <a href="tel:<?=preg_replace("#[^0-9]#","",$otdel["PROPERTIES"]["phone"]["VALUE"]);?>" class="list-contacts-item__link">
				                                            <div class="list-contacts-item__icon">
				                                                <svg class="i-icon">
				                                                    <use xlink:href="#icon-phone"></use>
				                                                </svg>
				                                            </div>
				                                            <div class="list-contacts-item__label list-contacts-item__label--big"><?=$otdel["PROPERTIES"]["phone"]["VALUE"];?></div>
				                                        </a>
				                                    </div>
				                                </div>
			                                <?endif;?>
			                                <?if($otdel["PROPERTIES"]["mail"]["VALUE"]):?>
				                                <div class="list-contacts__item">
				                                    <div class="list-contacts-item">
				                                        <a href="mailto:<?=$otdel["PROPERTIES"]["mail"]["VALUE"];?>" class="list-contacts-item__link">
				                                            <div class="list-contacts-item__icon">
				                                                <svg class="i-icon i-icon--mail">
				                                                    <use xlink:href="#icon-mail"></use>
				                                                </svg>
				                                            </div>
				                                            <div class="list-contacts-item__label"><?=$otdel["PROPERTIES"]["mail"]["VALUE"];?></div>
				                                        </a>
				                                    </div>
				                                </div>
			                                <?endif;?>
			                                <?if($otdel["PROPERTIES"]["time"]["VALUE"]):?>
				                                <div class="list-contacts__item">
				                                    <div class="list-contacts-item">
				                                        <a class="list-contacts-item__link">
				                                            <div class="list-contacts-item__icon">
				                                                <svg class="i-icon">
				                                                    <use xlink:href="#icon-period"></use>
				                                                </svg>
				                                            </div>
				                                            <div class="list-contacts-item__label"><?=$otdel["PROPERTIES"]["time"]["VALUE"];?></div>
				                                        </a>
				                                    </div>
				                                </div>
				                            <?endif;?>
			                            </div>
			                        </div>
			                    </div>
			                </div>						  
						<?endif;?>          	
	            	<?endforeach;?>           
	            </div>
	        </div>
	        <a id="shop"></a>
	    <?endif;?>
    </div>
</section>
	
<?if($citylist):?>
	<section class="section-shops">
	    <div class="container">
	        <div class="page-head">
	            <div class="page-head__title">
	                <div class="h2 title-border">Наши магазины</div>
	            </div>
	            <div class="page-head__subtitle">
	                <div class="availability-nav availability-nav--center">
	                    <div class="circle-list circle-list--availability">
	                    	<?foreach($citylist as $i=>$city):
	                    	$id = CIBlockElement::GetByID($city)->GetNext();
	                    	if($i=="0"){$sityid=$city;}?>
		                        <div class="circle-list__item <?if($i=="0"):?>current<?endif;?>">
		                            <div class="circle-item circle-item--availability">
		                                <a class="circle-item__link" rel="<?=$city;?>">
		                                    <i class="circle-item__icon circle-item__icon--small">
		                                        <svg class="i-icon i-icon--availability">
		                                            <use xlink:href="#icon-point"></use>
		                                        </svg>
		                                    </i>
		                                    <span class="circle-item__label circle-item__label--uppercase"><?=$id["NAME"];?></span>
		                                </a>
		                            </div>
		                        </div>
	                        <?endforeach;?>
	                    </div>
	                </div>
	            </div>
	        </div>

	        <div class="shops">
	            <div class="shops-list">
	                <?foreach($elementlist[$sityid] as $newshop):?>	               
		                <div class="shops-list__item">
		                    <div class="shops-item">
		                    	<?if($newshop["PROPERTIES"]["noom"]["VALUE"]):?>
			                        <div class="shops-item__number">
			                            <span>№<?=$newshop["PROPERTIES"]["noom"]["VALUE"];?></span>
			                        </div>
		                        <?endif;?>
		                        <?if($newshop["PREVIEW_PICTURE"]):?>
			                        <picture class="shops-item-picture">
			                            <img src="<?=res($newshop["PREVIEW_PICTURE"],500,500, 1);?>" alt="" class="shops-item-picture__img">
			                        </picture>
			                    <?else:?>
			                        <picture class="shops-item-picture">
			                            <img src="/upload/no_photo.png" alt="" class="shops-item-picture__img">
			                        </picture> 
		                        <?endif;?>
		                        <div class="shops-item__content">
		                            <div class="shops-item__row">
		                                <div class="shops-item__title"><?=$newshop["NAME"];?></div>
		                            </div>
		                            <div class="shops-item__row">
		                            	<?if($newshop["PROPERTIES"]["phone"]["VALUE"]):?>
			                                <div class="shops-item-phone">
			                                    <a href="tel:+<?=preg_replace("#[^0-9]#","",$newshop["PROPERTIES"]["phone"]["VALUE"]);?>" class="shops-item-phone__link"><?=$newshop["PROPERTIES"]["phone"]["VALUE"];?></a>
			                                </div>
			                            <?endif;?>
			                            <?if($newshop["PROPERTIES"]["worktime"]["VALUE"]):?>
			                                <div class="shops-item__mode">
			                                    <?=$newshop["PROPERTIES"]["worktime"]["VALUE"];?>
			                                </div>
		                                <?endif;?>
		                                <?if($newshop["PROPERTIES"]["addr"]["VALUE"]):?>
		                                	<div class="shops-item__point"><?=$newshop["PROPERTIES"]["addr"]["VALUE"];?></div>
		                                <?endif;?>
		                                <?if($newshop["PROPERTIES"]["metro"]["VALUE"]):?>
			                                <div class="shops-item-metro">
			                                    <svg class="i-icon">
			                                        <use xlink:href="#icon-metro"></use>
			                                    </svg>
			                                    <span><?=$newshop["PROPERTIES"]["metro"]["VALUE"];?></span>
			                                </div>
		                                <?endif;?>
		                            </div>
			                        <div class="shops-item__row">
			                        	<?if($newshop["PROPERTIES"]["map"]["VALUE"]):
			                        	$cord = explode(",",$newshop["PROPERTIES"]["map"]["VALUE"]);?>
			                                <div class="shops-item-button">
			                                    <a class="shops-item-button__link" data-map-point data-lon="<?=$cord[0];?>" data-lat="<?=$cord[1];?>">
			                                        <svg class="i-icon">
			                                            <use xlink:href="#icon-circle-point"></use>
			                                        </svg>
			                                        <span>Показать на карте</span>
			                                    </a>
			                                </div>
			                            <?endif;?>
			                            <?if($newshop["PROPERTIES"]["img"]["VALUE"]):?>
			                                <div class="shops-item-button">
			                                    <a href="<?=res($newshop["PROPERTIES"]["img"]["VALUE"],700,700, 1);?>" class="shops-item-button__link" data-fancybox-second>
			                                        <svg class="i-icon">
			                                            <use xlink:href="#icon-circle-sheme"></use>
			                                        </svg>
			                                        <span>На схеме ТЦ</span>
			                                    </a>
			                                </div>
			                            <?endif;?>
			                        </div>
		                        </div>
		                    </div>
		                </div>
	                <?endforeach;?>          
	            </div>
	        </div>
	    </div>
	</section>
	<section class="ajax-map">
		<div id="map" class="section-map"></div>
	</section>
<?endif;?>




