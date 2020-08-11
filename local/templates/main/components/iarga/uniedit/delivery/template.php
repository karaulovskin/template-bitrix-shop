<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$bann = CIBlockElement::GetList(Array(),Array("IBLOCK_ID"=>"16","ACTIVE"=>"Y"))->GetNext();
$bann = GetIBlockElement($bann['ID']);?> 
        <?if($bann["PROPERTIES"]["title_del"]["VALUE"]):?>
            <div class="page-head">
                <div class="page-head__title">
                    <div class="h2"><?=$bann["PROPERTIES"]["title_del"]["VALUE"];?></div>
                </div>
            </div>
        <?endif;?>
        <div class="delivery-list">
            <?if($bann["PROPERTIES"]["name_s"]["VALUE"]):?>
                <div class="delivery-list__item">
                    <div class="delivery-item">
                        <div class="delivery-item__left">
                            <picture class="picture-heart">
                                <img src="<?=res($bann["PROPERTIES"]["pict_s"]["VALUE"],177,163, 1);?>" alt="" class="picture-heart__img">
                                <svg width="0" height="0">
                                    <defs>
                                        <clipPath id="myClip">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M88.5 19.2874C78.8535 8.03124 64.074 0.908203 48.675 0.908203C21.417 0.908203 0 22.1894 0 49.2745C0 82.5153 30.09 109.6 75.6675 150.756L88.5 162.276L101.332 150.668C146.91 109.6 177 82.5153 177 49.2745C177 22.1894 155.583 0.908203 128.325 0.908203C112.926 0.908203 98.1465 8.03124 88.5 19.2874Z"/>
                                        </clipPath>
                                    </defs>
                                </svg>
                            </picture>
                        </div>
                        <div class="delivery-item__right">
                            <div class="delivery-item__title"><?=$bann["PROPERTIES"]["name_s"]["VALUE"];?></div>
                            <div class="delivery-item__desc">
                                <?=$bann["PROPERTIES"]["text_s"]["~VALUE"]["TEXT"];?>
                            </div>
                        </div>
                    </div>
                </div>
            <?endif;?>
            <?if($bann["PROPERTIES"]["name_d"]["VALUE"]):?>
                <div class="delivery-list__item">
                    <div class="delivery-item">
                        <div class="delivery-item__left">
                            <picture class="picture-heart">
                                <img src="<?=res($bann["PROPERTIES"]["pict_d"]["VALUE"],177,163, 1);?>" alt="" class="picture-heart__img">
                            </picture>
                        </div>
                        <div class="delivery-item__right">
                            <div class="delivery-item__title"><?=$bann["PROPERTIES"]["name_d"]["VALUE"];?></div>
                            <div class="delivery-city">
                            	<?if($bann["PROPERTIES"]["country"]["VALUE"]):?>
	                                <nav class="nav-title">
	                                    <ul class="nav-title-list">
	                                        <?$i=0; foreach($bann["PROPERTIES"]["country"]["VALUE"] as $country): $i++;?>
		                                        <li class="nav-title-list__item <?if($i=="1"):?>current<?endif;?>">
		                                            <a class="nav-title-list__link city__link" rel="<?=$country;?>" data-rel="<?=$bann["ID"];?>"><?if($country=="Россия"):?>России<?elseif($country=="Украина"):?>Украины<?elseif($country=="Беларусь"):?>Респ. Беларусь<?elseif($country=="Казахстан"):?>Респ. Казахстан<?else:?><?=$country;?><?endif;?></a>
		                                        </li>
											<?endforeach;?>	                                        
	                                    </ul>
	                                </nav>
                                <?endif;?>
								<?if($bann["PROPERTIES"]["country"]["VALUE_XML_ID"][0]):?>  
								 	<?$code = $bann["PROPERTIES"]["country"]["VALUE_XML_ID"][0];?>
									<?if($code):?>
		                                <nav class="nav-city">
		                                    <ul class="nav-city-list">                  
		                                      	<?foreach($bann["PROPERTIES"][$code]["VALUE"] as $citylist):?>
			                                        <li class="nav-city-list__item">
			                                            <a href="/delivery/dostavka-v-<?=ib_translit(str_replace("ё","е",$citylist));?>/" class="nav-city-list__link">
			                                                <div class="icon-circle">
			                                                    <svg class="i-icon">
			                                                        <use xlink:href="#icon-point"></use>
			                                                    </svg>
			                                                </div>
			                                                <span><?=$citylist;?></span>
			                                            </a>
			                                        </li>
		                                        <?endforeach?>
		                                    </ul>
		                                </nav>
	                                <?endif;?>
	                            <?endif;?>
								<?
								$filter = array("LID" => LANGUAGE_ID);
								$filter = array("LID" => LANGUAGE_ID);
								$filter["COUNTRY_NAME"] = $bann["PROPERTIES"]["country"]["VALUE"][0];
								$db_vars = CSaleLocation::GetList(array("CITY_NAME"=>"ASC"),$filter,false, false,array());
									while($city = $db_vars->GetNext()){
									if($city['CITY_NAME']){
										$rest[] = mb_substr($city['CITY_NAME'], 0, 1,"UTF-8");
										$arraycity[] = $city['CITY_NAME'];
									}
								}
								$result = array_unique($rest);
        						sort($result);?>
                                <div class="nav-alphabet">
                                    <div class="nav-alphabet-nav">
                                        <div class="nav-alphabet-list">
                                        <div class="nav-alphabet-list__item current">
                                            <a class="nav-alphabet-list__link" rel="<?=$bann["PROPERTIES"]["country"]["VALUE"][0];?>">Все города</a>
                                        </div>
                                        <?foreach($result as $alphabet):?>
	                                        <div class="nav-alphabet-list__item ">
	                                            <a class="nav-alphabet-list__link" rel="<?=$bann["PROPERTIES"]["country"]["VALUE"][0];?>"><?=$alphabet;?></a>
	                                        </div>
                                        <?endforeach;?>                                       
                                    </div>
                                    </div>
                                    <div class="nav-alphabet-content-wrapper">
                                        <div class="nav-alphabet-content-clipper" data-scrollbar-horizontal>
                                            <div class="nav-alphabet-content" data-scrollbar-horizontal-clipper>
                                            	<?foreach($arraycity as $cityname):?>
                                              		<div class="nav-alphabet-content__item">
													   	<a href='/delivery/dostavka-v-<?=ib_translit(str_replace("ё","е",$cityname));?>/' class="nav-alphabet-content__link"><?=$cityname;?></a>
													</div> 
                                                <?endforeach;?>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            <?endif;?>
        </div>
        <div class="page-head">
            <?if($bann["PROPERTIES"]["title_pay"]["VALUE"]):?>
                <div class="page-head__title">
                    <div class="h2"><?=$bann["PROPERTIES"]["title_pay"]["VALUE"];?></div>
                </div>
            <?endif;?>
            <?if($bann["PROPERTIES"]["title_pay"]["VALUE"]):?>
                <div class="page-head__subtitle">
                    <div class="payment">
                        <div class="payment-label">
                            <i class="payment-label__icon">
                                <svg class="i-icon">
                                    <use xlink:href="#icon-payment-label"></use>
                                </svg>
                            </i>
                            <div class="payment-label__text">Принимаем к оплате</div>
                        </div>
                        <div class="payment-list">
                            <?foreach($bann["PROPERTIES"]["icon"]["VALUE"] as $icon):?>
                                <div class="payment-list__item">
                                    <div class="payment-item">
                                        <img src="<?=res($icon,90,80, 1);?>" alt="">
                                    </div>
                                </div>
                            <?endforeach;?>                           
                        </div>
                    </div>
                </div>
            <?endif;?>
        </div>
        <?if($bann["PROPERTIES"]["pays"]["VALUE"]):?>
            <div class="delivery-list">
                <?foreach($bann["PROPERTIES"]["pays"]["VALUE"] as $pays):
                $pay = GetIBlockElement($pays);?>
                    <div class="delivery-list__item">
                        <div class="delivery-item">
                            <div class="delivery-item__left">
                                <picture class="picture-heart">
                                    <img src="<?=res($pay["PROPERTIES"]["pict"]["VALUE"],177,163, 1);?>" alt="" class="picture-heart__img">
                                </picture>
                            </div>
                            <div class="delivery-item__right">
                                <div class="delivery-item__title"><?=$pay["NAME"];?></div>
                                <div class="delivery-item__desc">
                                    <?=$pay["PROPERTIES"]["text"]["~VALUE"]["TEXT"];?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?endforeach;?>
            </div>
        <?endif;?>

<?if($bann["PROPERTIES"]["seo_title"]["VALUE"]):?>
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
                    <h2><?=$bann["PROPERTIES"]["seo_title"]["VALUE"];?></h2>
                    <?=$bann["PROPERTIES"]["seo_text"]["~VALUE"]["TEXT"];?>
                </div>
            </div>        
<?endif;?>