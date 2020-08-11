<?if(!CSite::InDir("/index.php") && !CSite::InDir("/catalog/") && !CSite::InDir("/order/") && !CSite::InDir("/about/") && !CSite::InDir("/contacts/")):?>
           <?if($APPLICATION->GetProperty("INDI")!="Y" && !CSite::InDir("/stocks/") && !CSite::InDir("/delivery/index.php")):?>
                </div>
           <?endif;?>
        <?if(!CSite::InDir("/personal/")):?></div><?endif;?>
    </section>
<?endif;?>                          
		    </div>
            <footer class="footer">
                 <section class="footer__top">
                     <div class="container container--min">
                        <div class="footer-contacts">
                            <div class="footer-contacts__top">
                                <div class="footer-contacts__phone">
                                    <div class="phone">
                                        <a class="phone__link" href="tel:<?=$cont["NUMBER"];?>"><?=$cont["phone"];?></a>
                                    </div>
                                </div>
                                <?if($cont["mail"]):?>
                                    <div class="footer-contacts__mail">
                                        <div class="mail">
                                            <a href="mailto:<?=$cont["mail"];?>" class="mail__link"><?=$cont["mail"];?></a>
                                        </div>
                                    </div>
                                <?endif;?>
                                <div class="footer-contacts__point">
                                    <div class="point">
                                        <p><?=$cont["addres"];?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-contacts__bottom">
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
                                            <div class="payment-list__item">
                                                <div class="payment-item">
                                                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/icons/visa.png" alt="">
                                                </div>
                                            </div>
                                        
                                            <div class="payment-list__item">
                                                <div class="payment-item">
                                                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/icons/master_card.png" alt="">
                                                </div>
                                            </div>
                                        
                                            <div class="payment-list__item">
                                                <div class="payment-item">
                                                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/icons/mip.png" alt="">
                                                </div>
                                            </div>
                                        
                                            <div class="payment-list__item">
                                                <div class="payment-item">
                                                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/icons/jcb.png" alt="">
                                                </div>
                                            </div>
                                        
                                            <div class="payment-list__item">
                                                <div class="payment-item">
                                                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/icons/g_pay.png" alt="">
                                                </div>
                                            </div>
                                        
                                            <div class="payment-list__item">
                                                <div class="payment-item">
                                                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/icons/a_pay.png" alt="">
                                                </div>
                                            </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                 </section>
                 <section class="footer__middle">
                     <div class="container container--min">
                         <div class="footer-content">
                            <div id="footElement1" class="footer-element">
                                <svg class="i-icon">
                                    <use xlink:href="#icon-foot-1"></use>
                                </svg>
                            </div>
                            <div id="footElement2" class="footer-element">
                                <svg class="i-icon">
                                    <use xlink:href="#icon-foot-2"></use>
                                </svg>
                            </div>
                            <div id="footElement3" class="footer-element">
                                <svg class="i-icon">
                                    <use xlink:href="#icon-foot-3"></use>
                                </svg>
                            </div>
                            <div id="footElement4" class="footer-element">
                                <svg class="i-icon">
                                    <use xlink:href="#icon-foot-4"></use>
                                </svg>
                            </div>
                            <div id="footElement5" class="footer-element">
                                <svg class="i-icon">
                                    <use xlink:href="#icon-foot-5"></use>
                                </svg>
                            </div>
                            <div id="footElement6" class="footer-element">
                                <svg class="i-icon">
                                    <use xlink:href="#icon-foot-6"></use>
                                </svg>
                            </div>
                            <div class="footer-content__modal">
                                <div class="modal modal--subscription">
                                    <div class="modal__head">
                                        <div class="modal__title modal__title--small">Подпишитесь на рассылку</div>
                                        <div class="modal__desc modal__desc--small">Узнавайте первым об акциях, новинках и распродажах</div>
                                    </div>
                                    <div class="modal__body">
                                        <form class="modal__form modal__form--small" method="post" action="/local/inc/ajax/subscribe.php" data-form>
                                            <div class="form-row">
                                                <div class="form-col">
                                                    <label class="label">
                                                        <input type="text" class="input" name="email" data-input-required="email">
                                                        <span class="placeholder">
                                                            <span>Ваш e-mail</span>
                                                            <span class="required">*</span>
                                                        </span>
                                                        <button type="submit" class="submit-arrow submit">
                                                            <svg class="i-icon">
                                                                <use xlink:href="#icon-arrow-right"></use>
                                                            </svg>
                                                        </button>
                                                        <p class="error"></p>
                                                    </label>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-content__about">
                                <div class="footer-logo">
                                    <img src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/logo.svg" alt="" class="footer-logo__img">
                                </div>
                                <div class="copyright">
                                    <?$APPLICATION->IncludeComponent(
                                        "bitrix:main.include",
                                        "",
                                        Array(
                                            "AREA_FILE_SHOW" => "file",
                                            "AREA_FILE_SUFFIX" => "inc",
                                            "EDIT_TEMPLATE" => "",
                                            "PATH" => "/local/inc/parts/copy.php"
                                        )
                                    );?>                                
                                </div>
                                <?$APPLICATION->IncludeComponent(
                                    "bitrix:menu", 
                                    "policy", 
                                    array(
                                        "ALLOW_MULTI_SELECT" => "N",
                                        "CHILD_MENU_TYPE" => "userfoot",
                                        "DELAY" => "N",
                                        "MAX_LEVEL" => "1",
                                        "MENU_CACHE_GET_VARS" => array(
                                        ),
                                        "MENU_CACHE_TIME" => "3600",
                                        "MENU_CACHE_TYPE" => "A",
                                        "MENU_CACHE_USE_GROUPS" => "Y",
                                        "ROOT_MENU_TYPE" => "userfoot",
                                        "USE_EXT" => "Y",
                                        "COMPONENT_TEMPLATE" => "policy"
                                    ),
                                    false
                                );?>
                                <div class="developer">
                                    <a class="developer__link" href="https://stratosfera.digital/" target="_blank">
                                        <span class="developer__label">Сделано в</span>
                                        <img class="developer__img" src="<?=SITE_TEMPLATE_PATH;?>/frontend/assets/images/svg/stratosfera.svg" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                     </div>
                 </section>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:menu", 
                    "footmenu", 
                    array(
                        "ALLOW_MULTI_SELECT" => "N",
                        "CHILD_MENU_TYPE" => "footmenu",
                        "DELAY" => "N",
                        "MAX_LEVEL" => "1",
                        "MENU_CACHE_GET_VARS" => array(
                        ),
                        "MENU_CACHE_TIME" => "3600",
                        "MENU_CACHE_TYPE" => "A",
                        "MENU_CACHE_USE_GROUPS" => "Y",
                        "ROOT_MENU_TYPE" => "footmenu",
                        "USE_EXT" => "Y",
                        "COMPONENT_TEMPLATE" => "footmenu"
                    ),
                    false
                );?>
            </footer>
		</div>

    <div id="mobileMenu" class="mobile-menu" data-mobile-menu>
        <div class="mobile-menu__left">
            <button class="mobile-menu__close circle-close" data-mobile-menu-close></button>
        </div>
        <div class="mobile-menu__right">
            <button class="mobile-menu__back" data-mobile-menu-back>
                <svg class="i-icon">
                    <use xlink:href="#icon-arrow-next"></use>
                </svg>
            </button>
            <section class="mobile-menu__section" data-mobile-section>
                <div class="mobile-menu__tile" data-mobile="nav">
                    <a href="#" class="mobile-menu__toggle" data-mobile-catalog-open>
                        <span>Каталог товаров</span>
                        <svg class="i-icon">
                            <use xlink:href="#icon-arrow-next"></use>
                        </svg>
                    </a>
                </div>
                <div class="mobile-menu__tile" data-mobile="location"></div>
                <div class="mobile-menu__tile" data-mobile="call"></div>
            </section>
            <section class="mobile-menu__section" data-mobile-section>
                <div class="mobile-menu__catalog" data-mobile="catalog">

                </div>
            </section>
        </div>
    </div>

        <div id="call" class="modal modal--big">
            <div class="modal__head">
                <div class="modal__title">Заказать звонок</div>
                <div class="modal__desc">Оставьте заявку и наш специалист свяжется с вами</div>
            </div>
            <div class="modal__body">
                <form class="modal__form uniform" method="post" action="/local/inc/ajax/call.php">
                    <div class="form-row">
                        <div class="form-col form-col--6">
                            <label class="label">
                                <input type="text" class="input input--required" placeholder="Имя" name="name" required>
                            </label>
                        </div>
                        <div class="form-col form-col--6">
                            <label class="label">
                                <input type="text" class="input input--required" name="phone" placeholder="Телефон">
                            </label>
                        </div>
                    </div>
                    <div class="modal__bottom">
                        <div class="modal__checkbox">
                            <div class="checkbox">
                                <label class="checkbox__label">
                                    <input class="checkbox__input" type="checkbox" name="check">
                                    <div class="checkbox__emulator">
                                        <svg class="i-icon">
                                            <use xlink:href="#icon-checked"></use>
                                        </svg>
                                    </div>
                                    <div class="checkbox__text">
                                        <span>
                                            Нажимая кнопку “Отправить” я соглашаюсь на обработку моих персональных данных в соответствии с
                                        </span>
                                        <a href="/privacy/" target="_blank">Условиями</a>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <p class="error"></p>
                        <div class="modal__buttons">
                            <input type="submit" class="btn btn--orange" value="Отправить">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div id="coming" class="modal modal--big">
            <div class="modal__head">
                <div class="modal__title">Сообщить о поступлении</div>
            </div>
            <div class="modal__body">
                <form class="modal__form uniform" method="post" action="/local/inc/ajax/goods_order.php">
                    <input type="hidden" name="good" class="nogoods">
                    <div class="form-row">
                        <div class="form-col form-col--6">
                            <label class="label">
                                <input type="text" class="input" name="name" placeholder="Имя" required>
                            </label>
                        </div>
                        <div class="form-col form-col--6">
                            <label class="label">
                                <input type="text" class="input" name="mail" placeholder="E-mail" required>
                            </label>
                        </div>
                    </div>
                    <div class="modal__bottom">
                        <div class="modal__checkbox">
                            <div class="checkbox">
                                <label class="checkbox__label">
                                    <input class="checkbox__input" type="checkbox" name="check">
                                    <div class="checkbox__emulator">
                                        <svg class="i-icon">
                                            <use xlink:href="#icon-checked"></use>
                                        </svg>
                                    </div>
                                    <div class="checkbox__text">
                                        <span>
                                            Нажимая кнопку “Отправить” я соглашаюсь на обработку моих персональных данных в соответствии с
                                        </span>
                                        <a href="/privacy/" target="_blank">Условиями</a>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <p class="error"></p>
                        <div class="modal__buttons">
                            <input type="submit" class="btn btn--orange" value="Отправить">
                        </div>
                    </div>
                </form>
            </div>
        </div>   
        <div id="login" class="modal modal--small">
            <div class="modal__head">
                <div class="modal__title">Войти в кабинет</div>
                <div class="modal__desc">По номеру телефона</div>
            </div>
            <div class="modal__body">
                <form class="modal__form modal__form--small" method="post" action="/local/inc/ajax/auth.php" data-form data-form-open-form-sms data-ajax-url="/local/inc/ajax/auth.php">
                    <div class="form-row">
                        <div class="form-col">
                            <label class="label">
                                <input type="text" class="input input--required" name="phone" data-inputmask data-input-required="phone" placeholder="Телефон">
                            </label>
                        </div>
                    </div>
                    <div class="modal__bottom">
                        <div class="modal__checkbox">
                            <div class="checkbox">
                                <label class="checkbox__label">
                                    <input class="checkbox__input" type="checkbox" name="check" data-input-required="checkbox">
                                    <div class="checkbox__emulator">
                                        <svg class="i-icon">
                                            <use xlink:href="#icon-checked"></use>
                                        </svg>
                                    </div>
                                    <div class="checkbox__text">
                                        <span>
                                            Нажимая кнопку “Отправить” я соглашаюсь на обработку моих персональных данных в соответствии с
                                        </span>

                                        <a href="/privacy/" target="_blank">Условиями</a>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <p class="error"></p>
                        <div class="modal__buttons">
                            <input type="submit" class="btn btn--orange" value="получить sms-код">
                            <div class="modal__note">
                                <a href="/support/" target="_blank">Проблемы со входом?</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>    
        <div id="loginSMS" class="modal modal--small">
            <div class="modal__head">
                <div class="modal__title">Введите код из sms</div>
                <div class="modal__desc modal__desc--black">мы отправили код на  <span data-number-phone-sms></span> <a href="#login" data-modal-open>изменить</a></div>
            </div>
            <div class="modal__body">
                <form class="modal__form modal__form--small uniform" method="post" action="/local/inc/ajax/user.php">
                    <input type="text" name="phonecode" hidden data-number-phone-sms-value>
                    <input type="text" name="phone" hidden data-number-phone-sms-number="">
                    <?if(CSite::InDir("/basket/")):?><input type="hidden" name="basket" value="Y"><?endif;?>
                    <div class="form-row">
                        <div class="form-col">
                            <label class="label">
                                <input type="text" class="input" name="code" placeholder="Ваш код">
                            </label>
                        </div>
                    </div>
                    <div class="modal__bottom">
                        <div class="modal__checkbox">
                            <div class="request-code">
                                <div class="request-code__label">Запросить код повторно можно через</div>
                                <div class="request-code__time"><small class="display">60</small> секунд</div>
                                <a class="request-code__link" style="display:none;" rel="89288426592">запросить код</a>
                            </div>
                        </div>
                        <div class="modal__buttons">
                            <input type="submit" class="btn btn--orange" name="check" value="Отправить">
                            <div class="modal__note">
                                <a href="/support/" target="_blank">Проблемы со входом?</a>
                            </div>
                        </div>
                    </div>
                    <p class="error"></p>
                </form>
            </div>
        </div>
		<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/frontend/assets/bundle.js");?>
        <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/frontend/assets/js/jquery-1.12.4.min.js")?>
        <?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/frontend/assets/js/iarga.js");?>
        <? /*if(CSite::InDir("/catalog/") || CSite::InDir("/basket/")):?>
        <?dump($_SESSION["city"]);?>
            <script id="ISDEKscript" type="text/javascript" src="/local/inc/widget/widjet.js"></script>
                            <script type="text/javascript">
                                var ourWidjet = new ISDEKWidjet ({
                                    defaultCity: '<?=$_SESSION["city"];?>', //какой город отображается по умолчанию
                                    cityFrom: 'Краснодар', // из какого города будет идти доставка
                                    country: '', // можно выбрать страну, для которой отображать список ПВЗ
                                    link: 'maps', // id элемента страницы, в который будет вписан виджет
                                    path: '/local/inc/widget/scripts/', //директория с библиотеками виджета
                                    servicepath: '/local/inc/widget/scripts/service.php',
                                    apikey: 'c05fa83d-9941-4778-beee-f15ef58ae89f'
                                 });
                                <?if(postprice($_SESSION["city"])){?>
                                var price = <?=postprice($_SESSION["city"])?>;
                                    $(".pocht").html('от '+price+' р.');
                                <?}else{?>
                                    $("#pocht").remove();
                                <?}?>
                                <?if(cityprice($_SESSION["city"])){?>
                                var bes = <?=cityprice($_SESSION["city"])?>;
                                    $(".salon").html("0 р.");
                                <?}else{?>
                                    $("#salon").remove();
                                <?}?>
                            </script>
        <?endif; */ ?>
	</body>
</html>