<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
IncludeTemplateLangFile(__FILE__);?>
<?if(isset($_GET['city'])) $_SESSION['city'] = $_GET['city'] ;
elseif(!isset($_SESSION['city'])) $_SESSION['city'] = ip_city();?>
<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
	<head>
	    <meta charset="UTF-8">
	    <title><?=$APPLICATION->ShowTitle();?></title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
	    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
	    <script src="https://api-maps.yandex.ru/2.1/?apikey=61536017-f4a7-4aaf-a708-fa73ef88c02d&amp;lang=ru_RU" type="text/javascript"></script>
	    <?$APPLICATION->ShowHead();?>
		<?$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/frontend/assets/styles/main.css");?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=UA-160656593-1"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());
		  gtag('config', 'UA-160656593-1');
		</script>
	</head>
	<body>
	<!-- Yandex.Metrika counter -->
	<script type="text/javascript" >
	   (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
	   m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
	   (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");
	   ym(60924583, "init", {
	        clickmap:true,
	        trackLinks:true,
	        accurateTrackBounce:true,
	        webvisor:true
	   });
	</script>
	<noscript><div><img src="https://mc.yandex.ru/watch/60924583" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
	<!-- /Yandex.Metrika counter -->
		<?global $cont;?>
		<?$APPLICATION->ShowPanel()?>
		<div class="flow-container<?if(CSite::InDir("/index.php")):?> flow-container--main<?endif;?>">
		    <div class="content">
		    	<header class="header" data-header>
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"menu", 
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "",
							"DELAY" => "N",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "head",
							"USE_EXT" => "Y",
							"COMPONENT_TEMPLATE" => "menu"
						),
						false
					);?>
		            <section class="header__middle">
		                <div class="container">
		                    <div class="header-middle">
		                        <div class="header-middle__left">
		                            <div class="header-middle__nav">
                                        <div class="header__burger">
                                            <div class="circle-list">
                                                <div class="circle-list__item">
                                                    <div class="circle-item circle-item--burger">
                                                        <a href="#" class="circle-item__link" data-mobile-burger>
                                                            <i class="circle-item__icon">
                                                                <svg class="i-icon">
                                                                    <use xlink:href="#icon-burger"></use>
                                                                </svg>
                                                            </i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
										<?$APPLICATION->IncludeComponent(
											"bitrix:news.list", 
											"soc", 
											array(
												"ACTIVE_DATE_FORMAT" => "",
												"ADD_SECTIONS_CHAIN" => "N",
												"AJAX_MODE" => "N",
												"AJAX_OPTION_ADDITIONAL" => "",
												"AJAX_OPTION_HISTORY" => "N",
												"AJAX_OPTION_JUMP" => "N",
												"AJAX_OPTION_STYLE" => "N",
												"CACHE_FILTER" => "N",
												"CACHE_GROUPS" => "Y",
												"CACHE_TIME" => "3600",
												"CACHE_TYPE" => "A",
												"CHECK_DATES" => "Y",
												"DETAIL_URL" => "",
												"DISPLAY_BOTTOM_PAGER" => "N",
												"DISPLAY_DATE" => "Y",
												"DISPLAY_NAME" => "Y",
												"DISPLAY_PICTURE" => "Y",
												"DISPLAY_PREVIEW_TEXT" => "Y",
												"DISPLAY_TOP_PAGER" => "N",
												"FIELD_CODE" => array(
													0 => "",
													1 => "",
												),
												"FILTER_NAME" => "",
												"HIDE_LINK_WHEN_NO_DETAIL" => "N",
												"IBLOCK_ID" => "1",
												"IBLOCK_TYPE" => "shop",
												"INCLUDE_IBLOCK_INTO_CHAIN" => "N",
												"INCLUDE_SUBSECTIONS" => "N",
												"MESSAGE_404" => "",
												"NEWS_COUNT" => "2",
												"PAGER_BASE_LINK_ENABLE" => "N",
												"PAGER_DESC_NUMBERING" => "N",
												"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
												"PAGER_SHOW_ALL" => "N",
												"PAGER_SHOW_ALWAYS" => "N",
												"PAGER_TEMPLATE" => ".default",
												"PAGER_TITLE" => "Новости",
												"PARENT_SECTION" => "",
												"PARENT_SECTION_CODE" => "",
												"PREVIEW_TRUNCATE_LEN" => "",
												"PROPERTY_CODE" => array(
													0 => "url",
													1 => "icon",
													2 => "",
												),
												"SET_BROWSER_TITLE" => "N",
												"SET_LAST_MODIFIED" => "N",
												"SET_META_DESCRIPTION" => "N",
												"SET_META_KEYWORDS" => "N",
												"SET_STATUS_404" => "N",
												"SET_TITLE" => "N",
												"SHOW_404" => "N",
												"SORT_BY1" => "SORT",
												"SORT_BY2" => "",
												"SORT_ORDER1" => "ASC",
												"SORT_ORDER2" => "",
												"STRICT_SECTION_CHECK" => "N",
												"COMPONENT_TEMPLATE" => "soc"
											),
											false
										);?>		                            
		                                <div class="header__location">
		                                    <div class="circle-list">
		                                        <div class="circle-list__item">
		                                            <div class="circle-item circle-item--location" data-location>
		                                                <a href="#" class="circle-item__link" data-location-confirm-open>
                                                            <i class="circle-item__icon">
                                                                <svg class="i-icon i-icon--location">
                                                                    <use xlink:href="#icon-point"></use>
                                                                </svg>
                                                            </i>                                                      
		                                                    <span class="circle-item__label"><?=$_SESSION['city'];?></span>
		                                                </a>
							                            <div class="modal-location" data-modal-location="confirm">
							                                <button class="modal-location__close" aria-label="Закрыть окно" data-modal-location-close></button>
							                                <div class="modal-location__head">
							                                    <div class="modal-location-title">
							                                        <div class="modal-location-title__label">Ваш город:</div>
							                                        <div class="modal-location-title__city"><?=$_SESSION['city'];?></div>
							                                    </div>
							                                </div>
							                                <div class="modal-location__body">
							                                    <div class="modal-location__buttons">
							                                        <div class="buttons-list">
							                                            <div class="buttons-list__item">
							                                                <a class="btn" data-modal-location-close>Да, верно</a>
							                                            </div>
							                                            <div class="buttons-list__item">
							                                                <a href="#" class="btn btn--black" data-location-select-open>Нет, выбрать другой</a>
							                                            </div>
							                                        </div>
							                                    </div>
							                                </div>
							                            </div>
							                            <div class="modal-location" data-modal-location="select">
							                                <button class="modal-location__close" aria-label="Закрыть окно" data-modal-location-close></button>
							                                <div class="modal-location__head">
							                                    <div class="modal-location-title">
							                                        <div class="modal-location-title__label">Введите<br> название города:</div>
							                                    </div>
							                                    <div class="modal-location__form">
							                                        <form action="" class="modal-location-form">
							                                            <input class="input" type="text" data-location-search>
							                                            <button class="submit">
							                                                <svg class="i-icon">
							                                                    <use xlink:href="#icon-search"></use>
							                                                </svg>
							                                            </button>
							                                        </form>
							                                    </div>
							                                </div>
							                                <div class="modal-location__body" data-location-list>
							                                    <ul class="modal-location-list">
																	<?$cy = CIBlockElement::GetList(Array("SORT"=>"ASC"), Array("IBLOCK_ID"=>"7", "ACTIVE"=>"Y"), false, false, Array("ID", "NAME"));
																	while($ct = $cy->GetNextElement())
																	{
																	 $arcity = $ct->GetFields();?>
							                                            <li class="modal-location-list__item">
							                                                <a href="?city=<?=$arcity['NAME']?>" class="modal-location-list__link">
							                                                    <i class="modal-location-list__icon">
							                                                        <svg class="i-icon i-icon--location">
							                                                            <use xlink:href="#icon-point"></use>
							                                                        </svg>
							                                                    </i>
							                                                    <span><?=$arcity["NAME"];?></span>
							                                                </a>
							                                            </li>
																	<?}?>								                                        
							                                    </ul>
							                                </div>
							                            </div>		                                                
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                            </div>
		                            <div class="header__contacts">
		                                <div class="header__call" data-header="call">
		                                    <div class="request-call" data-move="call">
		                                        <a href="#call" class="request-call__link" data-modal-open>
                                                    <i class="circle-item__icon">
                                                        <svg class="i-icon">
                                                            <use xlink:href="#icon-phone-2"></use>
                                                        </svg>
                                                    </i>
                                                    <span>Заказать звонок</span>
                                                </a>
		                                    </div>
		                                </div>
		                                <div class="header__phone" data-header="phone">
		                                    <div class="phone" data-move="phone">
		                                        <a class="phone__link phone__link--small" href="tel:<?=$cont["NUMBER"];?>"><?=$cont["phone"];?></a>
		                                        <?if($cont["text"]):?><div class="phone__label"><?=$cont["text"];?></div><?endif;?>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="header-middle__center" data-header="logo">
		                            <a <?=(!CSite::InDir('/index.php'))?'href="/"':'';?> class="header-logo" data-move="logo">
		                                <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/logo.svg" alt="" class="header-logo__img">
		                            </a>
		                        </div>
		                        <div class="header-middle__right">
		                            <div class="header__search" data-header="search">
		                                <div class="search" data-move="search" data-search>
							                <form class="search__form" action="/catalog/">
							                    <div class="search__block">
							                        <input type="text" name="q" class="input placeholder-uppercase" placeholder="Поиск по сайту" data-search-input>
							                        <input type="submit" class="search__submit" value="Поиск">
							                    </div>
							                </form>
							                <div class="search-tooltip" data-search-tooltip></div>
		                                </div>
		                            </div>
		                            <div class="header__profile" data-header="profile">
		                                <div class="circle-list" data-move="profile">
                                            <div class="circle-list__item">
                                                <div class="circle-item circle-item--search">
                                                    <a href="#" class="circle-item__link" data-mobile-search>
                                                        <i class="circle-item__icon">
                                                            <svg class="i-icon">
                                                                <use xlink:href="#icon-search-profile"></use>
                                                            </svg>
                                                        </i>
                                                    </a>
                                                </div>
                                            </div>
		                                    <div class="circle-list__item">
		                                        <div class="circle-item circle-item--user">
		                                        	<?if ($USER->IsAuthorized()):?>
		                                            <a href="/personal/" class="circle-item__link">
		                                            <?else:?>
		                                            <a href="#login" data-modal-open class="circle-item__link">
		                                            <?endif;?>
		                                            	<i class="circle-item__icon">
			                                                <svg class="i-icon">
			                                                    <use xlink:href="#icon-user"></use>
			                                                </svg>
			                                            </i>
		                                            </a>
		                                        </div>
		                                    </div>
		                                    <div class="circle-list__item">
		                                        <div class="circle-item circle-item--basket info-amount"><?include($_SERVER['DOCUMENT_ROOT']."/local/inc/ajax/basket.php");?></div>
		                                    </div>
		                                </div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </section>
						<?$APPLICATION->IncludeComponent(
							"bitrix:menu",
							"catalog_menu",
							Array(
								"ALLOW_MULTI_SELECT" => "N",
								"CHILD_MENU_TYPE" => "top_catalog",
								"DELAY" => "N",
								"MAX_LEVEL" => "1",
								"MENU_CACHE_GET_VARS" => array(""),
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"ROOT_MENU_TYPE" => "top_catalog",
								"USE_EXT" => "Y"
							)
						);?>
		            <div class="header-sticky" data-header-sticky>
		                <div class="header-sticky__middle">
		                    <div class="container">
		                        <div class="header-middle">
		                            <div class="header-middle__left">
		                                <div class="header-middle__nav header-middle__nav--sticky">
		                                    <div class="header__socials" data-sticky="socials"></div>
		                                    <div class="header__burger">
		                                        <div class="circle-list">
		                                            <div class="circle-list__item">
		                                                <div class="circle-item circle-item--burger">
		                                                    <a href="#" class="circle-item__link" data-burger>
                                                                <i class="circle-item__icon">
                                                                    <svg class="i-icon">
                                                                        <use xlink:href="#icon-burger"></use>
                                                                    </svg>
                                                                </i>
		                                                        <span class="circle-item__label">Каталог</span>
		                                                    </a>
		                                                </div>
		                                            </div>
		                                        </div>
		                                    </div>
		                                </div>
		                                <div class="header-middle__contacts header-middle__contacts--sticky">
		                                    <div class="header__call" data-sticky="call"></div>
		                                    <div class="header__phone" data-sticky="phone"></div>
		                                </div>
		                            </div>
		                            <div class="header-middle__center" data-sticky="logo"></div>
		                            <div class="header-middle__right">
		                                <div class="header__search" data-sticky="search"></div>
		                                <div class="header__profile" data-sticky="profile"></div>
		                            </div>
		                        </div>
		                    </div>
		                </div>
		                <div class="header-sticky__bottom" data-header-sticky-catalog>
		                    <div class="container">
		                        <nav class="header-catalog" data-sticky="catalog"></nav>
		                    </div>
		                </div>
		            </div>
		        </header>		
<?if(!CSite::InDir("/index.php") && !CSite::InDir("/catalog/") && !CSite::InDir("/personal/") && !CSite::InDir("/about/")):?>
	<section class="section bg-beige-bright">
		<?if($APPLICATION->GetProperty("INDI")!="Y"):?>
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
		<?endif;?>
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
	                <h1 class="h1<?if(CSite::InDir("/delivery/index.php")):?>  title-border<?endif;?>"><?=$APPLICATION->ShowTitle(false);?></h1>
	            </div>
	        </div>
	       <?if($APPLICATION->GetProperty("INDI")!="Y" && !CSite::InDir("/contacts/") && !CSite::InDir("/stocks/") && !CSite::InDir("/delivery/index.php")):?>
	       		<div class="editor-wrapper">
	       <?endif;?>
	<?if(CSite::InDir("/order/")):?>
	    </div>
	</section>

	<?endif;?> 
<?elseif(CSite::InDir("/personal/")):?>       
	<section class="bg-beige-bright">
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
	                <div class="h1"><?=$APPLICATION->ShowTitle(false);?></div>
	            </div>
	            <div class="content-head__subtitle">
					<?$APPLICATION->IncludeComponent(
						"bitrix:menu", 
						"personal_menu", 
						array(
							"ALLOW_MULTI_SELECT" => "N",
							"CHILD_MENU_TYPE" => "left",
							"DELAY" => "N",
							"MAX_LEVEL" => "1",
							"MENU_CACHE_GET_VARS" => array(
							),
							"MENU_CACHE_TIME" => "3600",
							"MENU_CACHE_TYPE" => "A",
							"MENU_CACHE_USE_GROUPS" => "Y",
							"ROOT_MENU_TYPE" => "left",
							"USE_EXT" => "N",
							"COMPONENT_TEMPLATE" => "personal_menu"
						),
						false
					);?>
					<?if ($USER->IsAuthorized()):?>
		                <div class="logout">
		                    <a href="/?logout=yes" class="logout__link">
		                        <span>Выйти</span>
		                        <svg class="i-icon">
		                            <use xlink:href="#icon-logout"></use>
		                        </svg>
		                    </a>
		                </div>
	                <?endif;?>
	            </div>
	        </div>
	    </div>
	</section>
	<section class="section-personal bg-white">
<?endif;?>		                    