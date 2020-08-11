<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $arParams
 */
?>
<script id="basket-total-template" type="text/html">
	<div class="basket-checkout-container" data-entity="basket-checkout-aligner">
		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
			?>
			<div class="basket-coupon-section">
				<div class="basket-coupon-block-field">
					<div class="basket-coupon-block-field-description">
						<?=Loc::getMessage('SBB_COUPON_ENTER')?>
					</div>
					<div class="form">
						<div class="form-group" style="position: relative;">
							<input type="text" class="form-control input" id=""  placeholder="Ваш промокод" data-entity="basket-coupon-input">
							<span class="basket-coupon-block-coupon-btn basket-coupon-block-coupon-btn submit-arrow">
                                <svg class="i-icon">
                                    <use xlink:href="#icon-arrow-right"></use>
                                </svg>
							</span>
						</div>
					</div>
				</div>
			</div>
		<?
		if ($arParams['HIDE_COUPON'] !== 'Y')
		{
		?>
			<div class="basket-coupon-alert-section">
				<div class="basket-coupon-alert-inner">
					{{#COUPON_LIST}}
					<div class="basket-coupon-alert text-{{CLASS}}">
						<span class="basket-coupon-text">
							<strong>{{COUPON}}</strong> - <?=Loc::getMessage('SBB_COUPON')?> {{JS_CHECK_CODE}}
							{{#DISCOUNT_NAME}}({{DISCOUNT_NAME}}){{/DISCOUNT_NAME}}
						</span>
						<span class="close-link" data-entity="basket-coupon-delete" data-coupon="{{COUPON}}">
							<?=Loc::getMessage('SBB_DELETE')?>
						</span>
					</div>
					{{/COUPON_LIST}}
				</div>
			</div>
			<?
		}
		?>			
			<?
		}
		?>
					<div class="basket-list">
						<div class="basket-list__item">
							<div class="basket-location" data-location>
								<div class="sorting-select" data-location-select-open>
									<div class="sorting-select__label">Доставка в город</div>
									<div class="sorting-select__value">
										<span data-sorting-value><?=$_SESSION["city"];?></span>
										<svg class="i-icon">
											<use xlink:href="#icon-select"></use>
										</svg>
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
						<?$deliv = CIBlockElement::GetList(Array("SORT"=>"DESC"), Array("IBLOCK_ID"=>"15", "ACTIVE"=>"Y"), false, false, Array("ID", "NAME","CODE","PREVIEW_PICTURE"));
						while($cdel = $deliv->GetNextElement())
						{
						 $delivery = $cdel->GetFields();
						 	$delivlist[] = $delivery;

						}?>	
													
							<div class="orders-item__props">
								<?foreach($delivlist as $deliverylist):?>
									<?if($deliverylist["CODE"]=="salon" && cityprice($_SESSION["city"])):?>
										<dl id="<?=$deliverylist["CODE"];?>">
											<dt>Доставка до пункта выдачи:</dt>
											<dd class="<?=$deliverylist["CODE"];?>">0 р.</dd>
										</dl>										
									<?elseif(!cityprice($_SESSION["city"]) && $deliverylist["CODE"]=="pocht" && postprice($_SESSION["city"])):?>
										<dl id="<?=$deliverylist["CODE"];?>">
											<dt>Доставка до пункта выдачи:</dt>
											<dd class="<?=$deliverylist["CODE"];?>">от <?=postprice($_SESSION["city"]);?> р.</dd>
										</dl>	
									<?elseif(!cityprice($_SESSION["city"]) && !postprice($_SESSION["city"]) && $deliverylist["CODE"]=="sdek-pickup"):?>
										<dl id="<?=$deliverylist["CODE"];?>">
											<dt>Доставка до пункта выдачи:</dt>
											<dd class="<?=$deliverylist["CODE"];?>">уточняется</dd>
										</dl>
									<?endif;?>
									<?if($deliverylist["CODE"]=="sdek-cour"):?>
										<dl id="<?=$deliverylist["CODE"];?>">
											<dt>Курьерская доставка:</dt>
											<dd class="<?=$deliverylist["CODE"];?>">уточняется</dd>
										</dl>
									<?endif;?>
								<?endforeach;?>
							</div>
						</div>
                            <div class="basket-list__item">
                                <div class="basket-checkout-block basket-checkout-block-total">
                                    <div class="basket-checkout-block-total-inner">
                                        <div class="basket-checkout-block-total-title">Стоимость товаров:</div>
                                        <div class="basket-checkout-block-total-description">
                                        </div>
                                    </div>
                                </div>
                                <div class="basket-checkout-block basket-checkout-block-total-price">
                                    <div class="basket-checkout-block-total-price-inner">
                                        <div class="basket-coupon-block-total-price-current" data-entity="basket-total-price">{{{PRICE_FORMATED}}}</div>
                                        {{#DISCOUNT_PRICE_FORMATED}}
	                                        <div class="basket-coupon-block-total-price-discount">
	                                            <div class="orders-item__props">
	                                                <dl>
	                                                    <dt>Ваша скидка:</dt>
	                                                    <dd>{{{DISCOUNT_PRICE_FORMATED}}}</dd>
	                                                </dl>
	                                            </div>
	                                        </div>
                                        {{/DISCOUNT_PRICE_FORMATED}}
                                    </div>
                                </div>
                            </div>
					</div>
	</div>
</script>
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
                                <?}?>       

                            </script>  
