<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$price = false;
$photoArr = array();
if($arResult["DETAIL_PICTURE"]["ID"]){
	$photoArr[] = res($arResult["DETAIL_PICTURE"]["ID"],1200,1200, 1);
}
if($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"]){
	foreach($arResult["PROPERTIES"]["MORE_PHOTO"]["VALUE"] as $photo){
		$photoArr[] = res($photo,1200,1200, 1);
	}
}
if(baseprice($arResult["ID"])){
	$price = baseprice($arResult["ID"]);
	$price_add = str_replace(' ', '', $price);
}	
if($arResult["PROPERTIES"]["oldprice"]["VALUE"] > $price_add){
	$proc = round(($arResult["PROPERTIES"]["oldprice"]["VALUE"]-$price_add) / $arResult["PROPERTIES"]["oldprice"]["VALUE"] * 100);
}
else $proc = false;	
?>
        <div id="sliderCard" class="slider-card">
            <div class="slider-catalog__container swiper-container">
            	<?if(sizeof($photoArr) > 0):?>
	                <div class="slider-catalog__wrapper swiper-wrapper">
	                	<?foreach($photoArr as $pict):?>
		                    <div class="slider-catalog__slide swiper-slide">
		                        <div class="card-item <?if($arResult["PROPERTIES"]["sound"]["VALUE"]):?>card-item--sound<?endif;?>">
		                            <div class="card-item__top">
		                                <a href="<?=$pict;?>" class="card-item__link" <?if($arResult["PROPERTIES"]["sound"]["VALUE"]):?>data-card-audio-play<?else:?>data-fancybox="card"<?endif;?>>
		                                    <div class="card-item-picture">
		                                        <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/catalog-heart.svg" alt="" class="card-item-picture__bg">
		                                        <img src="<?=$pict;?>" alt="" class="card-item-picture__img">
		                                    </div>
					                        <?if($arResult["PROPERTIES"]["sound"]["VALUE"]):?>
			                                    <audio class="card-item__audio" data-card-audio>
			                                        <source src="<?=getpuch($arResult["PROPERTIES"]["sound"]["VALUE"]);?>" type="audio/mpeg">
			                                    </audio>		   
			                                <?endif;?>                                
		                                </a>
		                            </div>
		                        </div>
		                    </div>
	                    <?endforeach;?>
	                </div>
                <?else:?>
	                <div class="slider-catalog__wrapper swiper-wrapper">
	                	<div class="slider-catalog__slide swiper-slide">
	                		<div class="card-item <?if($arResult["PROPERTIES"]["sound"]["VALUE"]):?>card-item--sound<?endif;?>">
	                			<div class="card-item__top">
	                				<?if($arResult["PROPERTIES"]["sound"]["VALUE"]):?><a class="card-item__link" data-card-audio-play><?endif;?>
	                				<div class="card-item-picture">
	                					<?if($arResult["PROPERTIES"]["sound"]["VALUE"]):?><img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/catalog-heart.svg" alt="" class="card-item-picture__bg"><?endif;?>
	                					<img src="/upload/no_photo.png" alt="" class="card-item-picture__img">
	                				</div>
	                				<?if($arResult["PROPERTIES"]["sound"]["VALUE"]):?>
			                            <audio class="card-item__audio" data-card-audio>
			                                <source src="<?=getpuch($arResult["PROPERTIES"]["sound"]["VALUE"]);?>" type="audio/mpeg">
			                            </audio>		                				
	                				</a>
	                				<?endif;?>
	                			</div>
	                		</div>
	                	</div>
	                </div>
                <?endif;?>
            </div>
                <div class="slider-card__content">
                    <div class="icon-info-list">
                    	<?if($arResult['PROPERTIES']['hit']['VALUE']=="Хит"):?>
	                        <div class="icon-info-list__item">
	                            <div class="icon-info icon-info--hit">Хит</div>
	                        </div>
                        <?endif;?>
                        <?if($proc > 0 && $arResult["PROPERTIES"]["oldprice"]["VALUE"] > 0):?>
	                        <div class="icon-info-list__item">
	                            <div class="icon-info icon-info--discount">-<?=$proc;?>%</div>
	                        </div>
                        <?endif;?>
                        <?if($arResult['PROPERTIES']['new']['VALUE']=="Новинка"):?>
	                        <div class="icon-info-list__item">
	                            <div class="icon-info icon-info--new">New</div>
	                        </div>
                        <?endif;?>
                    </div>    
                    <div class="swiper-button-prev slider-card__swiper-button">
                        <svg class="i-icon">
                            <use xlink:href="#icon-arrow-left"></use>
                        </svg>
                    </div>
                    <div class="swiper-button-next slider-card__swiper-button">
                        <svg class="i-icon">
                            <use xlink:href="#icon-arrow-right"></use>
                        </svg>
                    </div>
                    <div class="slider-catalog__pagination swiper-pagination"></div>
                    <div class="card-item__bottom">
                    	<?if($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE']):?><div class="card-item__article">Арт: <?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></div><?endif;?>
                    	<div class="card-item__buy">
	                        <?if($arResult["CATALOG_QUANTITY"]>0 && $price>0):?>
	                            <a class="btn-basket-circle btn-basket-circle--black detal_cart" data-rel="<?=$arResult["ID"];?>">
	                                <svg class="i-icon">
	                                    <use xlink:href="#icon-basket-catalog"></use>
	                                </svg>
	                            </a>
	                        <?endif;?>
	                        <div class="card-item__price">
	                        	<div class="price price--big">
	                                <?if($arResult["PROPERTIES"]["oldprice"]["VALUE"] > $price && $arResult["PROPERTIES"]["oldprice"]["VALUE"]>"0"):?>
		                                <div class="price__value catalog-item-price__value--sale"><?=$arResult["PROPERTIES"]["oldprice"]["VALUE"];?> р</div>
		                                <div class="price__discount"><?=$price;?> р</div>	                                	
	                                <?elseif($price):?>
	                                    <div class="price__value"><?=$price;?> р</div>
	                                <?endif;?>
	                            </div>
	                            <div class="card-item__note">
	                            	<?if($arResult['PROPERTIES']['srok']['VALUE']):?><div class="card-item-note">Скидка действует до <?=$arResult['PROPERTIES']['srok']['VALUE'];?></div><?endif;?>
	                            	<?if($arResult["CATALOG_QUANTITY"]==0):?>
	                            		<a href="#coming" class="search-tooltip-item__coming search-tooltip-item__coming--big" data-modal-open data-rel="<?=$arResult["ID"];?>">Сообщить о поступлении</a> 
	                            	<?endif;?>
	                            </div>
	                        </div>	    	                      	                                               
                    	</div>
                    	<div class="card-item__status">
                    		<?if($arResult["CATALOG_QUANTITY"]>0):?>
                    			В наличии
                    		<?else:?>
                    			Под заказ
                    		<?endif;?>
                    	</div>
                    </div>
                </div>  
        </div>
        <?if($arResult['PROPERTIES']['popul']['VALUE'] && $arResult["CATALOG_QUANTITY"]>0): $noblock=false;?>
        	<?foreach($arResult['PROPERTIES']['popul']['VALUE'] as $poplist):?>
        		<?$addelem = catalogbyid($poplist);
        		if($addelem["QUANTITY"]=="0"){
        			$noblock = "Y";
        		}?>
        	<?endforeach;?>
        	<?if($noblock!="Y"):?>
		        <div class="card-kit">
				    <div class="card-kit__head">
				        <div class="h2 title-border">Популярный набор</div>
				    </div>
				    <div class="card-kit__body">
				    	<div class="catalog-list">
					            <div class="catalog-list__item catalog-list__item--complete">
					            	<?$pricelict[] = $price_add;?>
					                <div class="catalog-item">
					                    <div class="icon-info-list">
					                    	<?if($arResult['DISPLAY_PROPERTIES']['hit']['VALUE']=="Хит"):?>
						                        <div class="icon-info-list__item">
						                            <div class="icon-info icon-info--hit">Хит</div>
						                        </div>
					                        <?endif;?>
											<?if($earResultlem['DISPLAY_PROPERTIES']['new']['VALUE']=="Новинка"):?>
				                                <div class="icon-info-list__item">
				                                    <div class="icon-info icon-info--new">New</div>
				                                </div>	  
				                            <?endif;?>
					                        <?if($proc > 0 && $arResult["PROPERTIES"]["oldprice"]["VALUE"] > 0):?>
						                        <div class="icon-info-list__item">
						                            <div class="icon-info icon-info--discount">-<?=$proc;?>%</div>
						                        </div>
					                        <?endif;?>			                            
					                    </div>
					                    <div class="catalog-item__top">
					                        <a class="catalog-item__link">
					                            <?if($arResult['PROPERTIES']['CML2_ARTICLE']['VALUE']):?><div class="catalog-item__article">Арт: <?=$arResult['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></div><?endif;?>
					                            <div class="catalog-item-picture">
					                            	<?if($arResult["DETAIL_PICTURE"]["ID"]):?>
						                                <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/catalog-heart.svg" alt="" class="catalog-item-picture__bg">
						                                <img src="<?=res($arResult["DETAIL_PICTURE"]["ID"],570,530, 1);?>" alt="" class="catalog-item-picture__img">
						                            <?else:?>
						                            	<img src="/upload/no_photo.png" alt="" class="card-item-picture__img">
					                                <?endif;?>
					                            </div>
					                            <div class="catalog-item__status">
						                    		<?if($arResult["CATALOG_QUANTITY"]>0):?>
						                    			В наличии
						                    		<?else:?>
						                    			Под заказ
						                    		<?endif;?>				                            
					                            </div>
					                            <div class="catalog-item__name"><?=$arResult["NAME"];?></div>
					                        </a>
					                    </div>
					                    <div class="catalog-item__bottom">
					                        <div class="catalog-item-price">
				                                <?if($arResult["PROPERTIES"]["oldprice"]["VALUE"] > $price && $arResult["PROPERTIES"]["oldprice"]["VALUE"]>"0"):?>
					                                <div class="price__value catalog-item-price__value--sale"><?=$arResult["PROPERTIES"]["oldprice"]["VALUE"];?> р</div>
					                                <div class="price__discount"><?=$price;?> р</div>	                                	
				                                <?elseif($price):?>
				                                    <div class="price__value"><?=$price;?> р</div>
				                                <?endif;?>
					                        </div>
					                    </div>
					                </div>
					            </div>

				    		<?$i=0;foreach($arResult['PROPERTIES']['popul']['VALUE'] as $popul): $i++;
				    		$elem = GetIBlockElement($popul);
							if(baseprice($elem["ID"])){
								$pricem = baseprice($elem["ID"]);
								$pricemadd = str_replace(' ', '', $pricem);

								$pricelict[] = $pricemadd;
							}	
							if($elem["PROPERTIES"]["oldprice"]["VALUE"] > $pricemadd){
								$procm = round(($elem["PROPERTIES"]["oldprice"]["VALUE"]-$pricemadd) / $elem["PROPERTIES"]["oldprice"]["VALUE"] * 100);
							}
							else $procm = false;	
				    		?>
					            <div class="catalog-list__item catalog-list__item--complete">
					                <div class="catalog-item">
					                    <div class="icon-info-list">
					                    	<?if($elem['DISPLAY_PROPERTIES']['hit']['VALUE']=="Хит"):?>
						                        <div class="icon-info-list__item">
						                            <div class="icon-info icon-info--hit">Хит</div>
						                        </div>
					                        <?endif;?>
											<?if($elem['DISPLAY_PROPERTIES']['new']['VALUE']=="Новинка"):?>
				                                <div class="icon-info-list__item">
				                                    <div class="icon-info icon-info--new">New</div>
				                                </div>	  
				                            <?endif;?>
					                    </div>
					                    <div class="catalog-item__top">
					                        <a href="<?=$elem["DETAIL_PAGE_URL"];?>" class="catalog-item__link">
					                            <?if($elem['PROPERTIES']['CML2_ARTICLE']['VALUE']):?><div class="catalog-item__article">Арт: <?=$elem['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></div><?endif;?>
					                            <div class="catalog-item-picture">
					                            	<?if($elem["DETAIL_PICTURE"]):?>
						                                <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/catalog-heart.svg" alt="" class="catalog-item-picture__bg">
						                                <img src="<?=res($elem["DETAIL_PICTURE"],570,530, 1);?>" alt="" class="catalog-item-picture__img">
					                                <?else:?>
					                                	<img src="/upload/no_photo.png" alt="" class="card-item-picture__img">
					                                <?endif;?>
					                            </div>
					                            <div class="catalog-item__status">В наличии</div>
					                            <div class="catalog-item__name"><?=$elem["NAME"];?></div>
					                        </a>
					                    </div>
					                    <div class="catalog-item__bottom">
					                        <div class="catalog-item-price">
				                                <?if($elem["PROPERTIES"]["oldprice"]["VALUE"] > $pricem && $elem["PROPERTIES"]["oldprice"]["VALUE"]>"0"):?>
					                                <div class="price__value catalog-item-price__value--sale"><?=$elem["PROPERTIES"]["oldprice"]["VALUE"];?> р</div>
					                                <div class="price__discount"><?=$pricem;?> р</div>	                                	
				                                <?elseif($pricem):?>
				                                    <div class="price__value"><?=$pricem;?> р</div>
				                                <?endif;?>
					                        </div>
					                    </div>
					                </div>
					            </div>
				   			<?endforeach;?>
				   			<div class="catalog-list__item catalog-list__item--complete">
								<div class="catalog-complete">
								    <div class="catalog-complete__icon">
								        <div class="icon-smooth"></div>
								    </div>
								    <div class="catalog-complete__price">
								        <div class="price price--big">
								            <div class="price__value"><?=number_format(array_sum($pricelict),0," "," ");?> р</div>
								        </div>
								    </div>
								    <?$array_id = $arResult['ID'].'#'. implode('#', $arResult['PROPERTIES']['popul']['VALUE']);?>
								    <div class="catalog-complete__basket">
								        <a class="btn-basket-circle kit_cart" rel="<?=$array_id;?>">
								            <svg class="i-icon">
								               <use xlink:href="#icon-basket-catalog"></use>
								            </svg>
								        </a>
								    </div> 
								</div>					   			
				   			</div>
				   		</div>

				   	</div>
		        </div>
	        <?endif;?>
        <?endif;?>
    </div>
</section>
<section class="section section-card-about bg-white">
	<div class="container">
        <div class="page-head">
            <div class="page-head__title">
                <div class="h2 title-border">О товаре</div>
            </div>
        </div>
        <div class="tabs" data-tabs>
            <nav class="tabs-nav" data-tabs-nav>
                <ul class="tabs-nav-list" data-tabs-nav-list>
                    <li class="tabs-nav-list__item current" data-tabs-nav-item>
                        <a href="#" class="tabs-nav-list__link" data-tabs-nav-toggle>О товаре</a>
                    </li>
                    <?if($arResult["PROPERTIES"]["video"]["VALUE"]):?>
	                    <li class="tabs-nav-list__item" data-tabs-nav-item>
	                        <a href="#" class="tabs-nav-list__link" data-tabs-nav-toggle>Видео</a>
	                    </li>
                    <?endif;?>
                    <li class="tabs-nav-list__item" data-tabs-nav-item>
                        <a href="#" class="tabs-nav-list__link" data-tabs-nav-toggle>Доставка</a>
                    </li>
                    <li class="tabs-nav-list__item" data-tabs-nav-item>
                        <a href="#" class="tabs-nav-list__link" data-tabs-nav-toggle>Наличие в магазинах</a>
                    </li>
                </ul>
            </nav>
            <div class="tabs-content" data-tabs-content>
                <div class="tabs-content__item current" data-tabs-content-item>
                    <div class="grid">
                    	<?if($arResult["DETAIL_TEXT"]):?>
	                        <div class="grid__col grid__col--9">
	                            <div class="editor">
	                            <?=$arResult["~DETAIL_TEXT"];?>
	                            </div>
	                        </div>
                        <?endif;?>
                        <?if($arResult["DISPLAY_PROPERTIES"]):?>
	                        <div class="grid__col grid__col--3">
	                            <div class="specifications">
	                            	<?foreach($arResult["DISPLAY_PROPERTIES"] as $displayprop):?>
	                                    <div class="specifications-item">
	                                        <div class="specifications-item__key"><?=$displayprop["NAME"];?>:</div>
	                                        <div class="specifications-item__val"><?=$displayprop["VALUE"];?></div>
	                                    </div>
	                                <?endforeach;?>
	                            </div>
	                        </div>
                        <?endif;?>
                    </div>
                </div>
                <?if($arResult["PROPERTIES"]["video"]["VALUE"]):?>
	                <div class="tabs-content__item" data-tabs-content-item>
	                    <div class="video-wrapper">
	                        <div class="video" data-video>
	                            <a class="video__link" href="<?=$arResult["PROPERTIES"]["video"]["VALUE"];?>" data-video-link>
	                            	<?if($arResult["PROPERTIES"]["imgvideo"]["VALUE"]):?>
		                                <picture>
		                                    <img class="video__media" src="<?=res($arResult["PROPERTIES"]["imgvideo"]["VALUE"],810,455, 1);?>" alt="" data-video-media>
		                                </picture>
		                            <?endif;?>
	                            </a>
	                            <button class="video__button" type="button" aria-label="Запустить видео" data-video-button>
	                                <svg class="video__play i-icon">
	                                    <use xlink:href="#icon-play"></use>
	                                </svg>
	                                <svg class="video__play--mobile i-icon">
	                                    <use xlink:href="#icon-play"></use>
	                                </svg>
	                            </button>
	                        </div>
	                    </div>
	                    <?if($arResult["PROPERTIES"]["textvideo"]["VALUE"]):?>
		                    <div class="video-desc">
		                        <div class="editor editor--center">
		                            <p>
		                                <?=$arResult["PROPERTIES"]["textvideo"]["~VALUE"]["TEXT"];?>
		                            </p>
		                        </div>
		                    </div>
		                <?endif;?>
	                </div>
                <?endif;?>
                <div class="tabs-content__item goods--deliv" data-tabs-content-item>
					<?include($_SERVER['DOCUMENT_ROOT'].'/local/inc/ajax/goods_deliv.php');?>
                </div>
               <?$res= CCatalogStore::GetList(array(), array('PRODUCT_ID' =>$arResult["ID"]), false, false, array('PRODUCT_AMOUNT', 'XML_ID')); 
				while($arStore = $res->GetNext()){
					$storeim = CIBlockElement::GetList(Array(),Array("IBLOCK_ID"=>"9","ACTIVE"=>"Y","XML_ID"=>$arStore["XML_ID"]), false, false,array("PROPERTY_city"))->GetNext();
					 if($storeim["PROPERTY_CITY_VALUE"]){ $citylist[] = $storeim["PROPERTY_CITY_VALUE"];}
				}
				$citylist = array_unique($citylist);
				global $goodsid;
                $goodsid["ID"] = $arResult["ID"];?>
				
                <div class="tabs-content__item" data-tabs-content-item>
                    <div class="availability-nav">
                        <div class="circle-list circle-list--availability">
                        	<?foreach($citylist as $i=>$arcity):
                        	$city = CIBlockElement::GetByID($arcity)->GetNext();?> 
	                        		<?if($i=="0"):?><?$goodsid["CITY"]=$city["NAME"];?><?endif;?>                     	
		                            <div class="circle-list__item <?if($i=="0"):?>current<?endif;?>">
		                                <div class="circle-item circle-item--availability">
		                                    <a class="circle-item__link" rel="<?=$arResult["ID"];?>" data-rel="<?=$city["NAME"];?>">
		                                        <i class="circle-item__icon circle-item__icon--small">
		                                            <svg class="i-icon i-icon--availability">
		                                                <use xlink:href="#icon-point"></use>
		                                            </svg>
		                                        </i>
		                                        <span class="circle-item__label circle-item__label--uppercase"><?=$city["NAME"];?></span>
		                                    </a>
		                                </div>
		                            </div>
                            <?endforeach;?>
                        </div>
                    </div>
                    <div class="availability-table">

                    	<?include($_SERVER['DOCUMENT_ROOT'].'/local/inc/ajax/storegods.php');?>                                     
                    </div>
                </div>
            </div>
        </div>

	</div>
</section>		
<section class="section-catalog">
    <div class="container">
    	<?if($arResult["PROPERTIES"]["goods"]["VALUE"]):?>
    		<?foreach($arResult["PROPERTIES"]["goods"]["VALUE"] as $isec=>$goodslist){
	    		$catlist = CIBlockElement::GetList(Array(),Array("ID"=>$goodslist,"ACTIVE"=>"Y"),false,false,array("IBLOCK_SECTION_ID","ID"))->GetNext();
	    		$res = CIBlockSection::GetByID($catlist["IBLOCK_SECTION_ID"])->GetNext();
	    		$sectionlist[] = $res["IBLOCK_SECTION_ID"];
	    		if($isec=="0"){$onesect = $res["IBLOCK_SECTION_ID"];}
	    			$elementlist[$res["IBLOCK_SECTION_ID"]][] = $catlist["ID"];
	    	}
	    	$sectionlist = array_unique($sectionlist);?>
	        <div class="slider-catalog-wrapper">
	            <div class="slider-head">
	                <div class="slider-head__title">
	                    <div class="h2">Собери комплект!</div>
	                </div>
	                <div class="tabs-nav">
	                    <ul class="tabs-nav-list">
	                    	<?foreach($sectionlist as $is=>$section):
	                    	$isection = CIBlockSection::GetByID($section)->GetNext();?> 
		                        <li class="tabs-nav-list__item <?if($is==0):?>current<?endif;?>">
		                            <a class="tabs-nav-list__link add-section" rel="<?=$isection["ID"];?>" data-rel="<?=implode("#",$elementlist[$isection["ID"]]);?>"><?=$isection["NAME"];?></a>
		                        </li>
							<?endforeach;?>	                        
	                    </ul>
	                </div>
	            </div>
	            <div id="sliderHit" class="slider-catalog swiper-ajax">
	                <div class="slider-catalog__head">
	                    <div class="swiper-button-prev">
	                        <svg class="i-icon">
	                            <use xlink:href="#icon-arrow-left"></use>
	                        </svg>
	                    </div>
	                    <div class="swiper-button-next">
	                        <svg class="i-icon">
	                            <use xlink:href="#icon-arrow-right"></use>
	                        </svg>
	                    </div>
	                </div>
	                <div class="slider-catalog__container swiper-container">
	                    <div class="slider-catalog__wrapper swiper-wrapper">
	                    
	                    	<?foreach($elementlist[$onesect] as $elemarray):
	                    	$compgood = GetIBlockElement($elemarray);
							$price = false;
							$pict = false;
							if($compgood["~DETAIL_PICTURE"]){
								$pict = res($compgood["~DETAIL_PICTURE"],180,180, 1);
							}						
							if(baseprice($compgood["ID"])){
								$price = str_replace(' ', '', baseprice($compgood["ID"]));
							}
							if($compgood["PROPERTIES"]["oldprice"]["VALUE"] > $price){
								$proc = round(($compgood["PROPERTIES"]["oldprice"]["VALUE"]-$price) / $compgood["PROPERTIES"]["oldprice"]["VALUE"] * 100);
							}
							else $proc = false;	
	                    	?>
		                        <div class="slider-catalog__slide swiper-slide">
		                            <div class="catalog-item">
		                                <div class="icon-info-list">
			                            	<?if($compgood['DISPLAY_PROPERTIES']['hit']['VALUE']=="Хит"):?>
				                                <div class="icon-info-list__item">
				                                    <div class="icon-info icon-info--hit">Хит</div>
				                                </div>
			                                <?endif;?>
			                                <?if($compgood['DISPLAY_PROPERTIES']['new']['VALUE']=="Новинка"):?>
				                                <div class="icon-info-list__item">
				                                    <div class="icon-info icon-info--new">New</div>
				                                </div>	  
				                            <?endif;?>                           
			                                <?if($proc > 0 && $compgood["PROPERTIES"]["oldprice"]["VALUE"] > 0):?>
				                                <div class="icon-info-list__item">
				                                    <div class="icon-info icon-info--discount">-<?=$proc;?>%</div>
				                                </div>	                                
			                                <?endif;?>
		                                </div>
		                                <div class="catalog-item__top">
		                                    <a href="<?=$compgood["DETAIL_PAGE_URL"];?>" class="catalog-item__link">
		                                        <?if($compgood['PROPERTIES']['CML2_ARTICLE']['VALUE']):?><div class="catalog-item__article">Арт: <?=$compgood['PROPERTIES']['CML2_ARTICLE']['VALUE'];?></div><?endif;?>
		                                        <div class="catalog-item-picture">
			                                    	<?if($pict):?>
				                                        <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/catalog-heart.svg" alt="" class="catalog-item-picture__bg">
				                                        <img src="<?=$pict;?>" alt="" class="catalog-item-picture__img">
				                                    <?else:?>
				                                    	<img src="/upload/no_photo.png" alt="" class="catalog-item-picture__img">
			                                        <?endif;?>
		                                        </div>
		                                        <div class="catalog-item__status">
				                                    <?if($compgood["PROPERTIES"]["quan"]["VALUE"]!=""):?>
				                                    	В наличии
				                                    <?else:?>
				                                    	Под заказ
				                                    <?endif;?>
		                                        </div>
		                                        <div class="catalog-item__name"><?=$compgood["NAME"];?></div>
		                                    </a>
		                                </div>
		                                <div class="catalog-item__bottom">
		                                    <div class="catalog-item-price">
			                                	<?if($compgood["PROPERTIES"]["oldprice"]["VALUE"] > $price && $compgood["PROPERTIES"]["oldprice"]["VALUE"]>"0"):?>
				                                    <div class="catalog-item-price__value catalog-item-price__value--sale"><?=$compgood["PROPERTIES"]["oldprice"]["VALUE"];?> р</div>
				                                    <div class="catalog-item-price__discount"><?=$price;?> р</div>	                                	
			                                	<?elseif($price):?>
			                                    	<div class="catalog-item-price__value"><?=$price;?> р</div>
			                                    <?endif;?>
		                                    </div>
		                                    <a href="#" class="catalog-item__basket">
		                                        <svg class="i-icon">
		                                            <use xlink:href="#icon-basket-catalog"></use>
		                                        </svg>
		                                    </a>
		                                </div>
		                            </div>
		                        </div>
	                        <?endforeach;?>
	                    </div>
	                    <div class="slider-catalog__pagination swiper-pagination"></div>
	                </div>
	            </div>
	        </div>
	    <?endif;?>
