<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Localization\Loc;

/**
 * @var array $mobileColumns
 * @var array $arParams
 * @var string $templateFolder
 */

$usePriceInAdditionalColumn = in_array('PRICE', $arParams['COLUMNS_LIST']) && $arParams['PRICE_DISPLAY_MODE'] === 'Y';
$useSumColumn = in_array('SUM', $arParams['COLUMNS_LIST']);
$useActionColumn = in_array('DELETE', $arParams['COLUMNS_LIST']);

$restoreColSpan = 2 + $usePriceInAdditionalColumn + $useSumColumn + $useActionColumn;

$positionClassMap = array(
	'left' => 'basket-item-label-left',
	'center' => 'basket-item-label-center',
	'right' => 'basket-item-label-right',
	'bottom' => 'basket-item-label-bottom',
	'middle' => 'basket-item-label-middle',
	'top' => 'basket-item-label-top'
);

$discountPositionClass = '';
if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y' && !empty($arParams['DISCOUNT_PERCENT_POSITION']))
{
	foreach (explode('-', $arParams['DISCOUNT_PERCENT_POSITION']) as $pos)
	{
		$discountPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}

$labelPositionClass = '';
if (!empty($arParams['LABEL_PROP_POSITION']))
{
	foreach (explode('-', $arParams['LABEL_PROP_POSITION']) as $pos)
	{
		$labelPositionClass .= isset($positionClassMap[$pos]) ? ' '.$positionClassMap[$pos] : '';
	}
}
?>
<script id="basket-item-template" type="text/html">
	<tr class="basket-items-list-item-container{{#SHOW_RESTORE}} basket-items-list-item-container-expend{{/SHOW_RESTORE}} {{#NOT_AVAILABLE}}basket-items-list-item-container-expend{{/NOT_AVAILABLE}}"
		id="basket-item-{{ID}}" data-entity="basket-item" data-id="{{ID}}">
		{{#SHOW_RESTORE}}
			<td class="basket-items-list-item-descriptions" colspan="<?=$restoreColSpan?>">
				<div class="basket-items-list-item-descriptions-inner" id="basket-item-height-aligner-{{ID}}">
					<?
					if (in_array('PREVIEW_PICTURE', $arParams['COLUMNS_LIST']))
					{
						?>
						<div class="basket-item-block-image">
							{{#DETAIL_PAGE_URL}}
								<a href="{{DETAIL_PAGE_URL}}" class="basket-item-image-link">
							{{/DETAIL_PAGE_URL}}

							<img class="basket-item-image" alt="{{NAME}}"
								src="{{{IMAGE_URL}}}{{^IMAGE_URL}}/upload/no_photo.png{{/IMAGE_URL}}">
							{{#DETAIL_PAGE_URL}}
								</a>
							{{/DETAIL_PAGE_URL}}
						</div>
						<div class="basket-item-block-info">
								<div class="basket-item-block-info__head">
										<h2 class="basket-item-info-name">
											{{#DETAIL_PAGE_URL}}
												<a href="{{DETAIL_PAGE_URL}}" class="basket-item-info-name-link">
											{{/DETAIL_PAGE_URL}}
												<span data-entity="basket-item-name" title="{{NAME}}">{{NAME}}</span>
											{{#DETAIL_PAGE_URL}}
												</a>
											{{/DETAIL_PAGE_URL}}
										</h2>
								</div>
						<?
					}
					?>
				</div>
			</td>
			<td class="basket-items-list-item-price basket-items-list-item-price-for-one hidden-xs">
					<div class="basket-item-block-price">
						{{#SHOW_DISCOUNT_PRICE}}
							<div class="basket-item-price-old">
								<span class="basket-item-price-old-text">
									{{{FULL_PRICE_FORMATED}}}
								</span>
							</div>
						{{/SHOW_DISCOUNT_PRICE}}

						<div class="basket-item-price-current {{#SHOW_DISCOUNT_PRICE}}basket-item-price-current--discount{{/SHOW_DISCOUNT_PRICE}}">
							<span class="basket-item-price-current-text" id="basket-item-price-{{ID}}">
								{{{PRICE_FORMATED}}}
							</span>
						</div>
					</div>
			</td>
			<td class="basket-items-list-item-amount">
				<div class="basket-item-block-amount" data-entity="basket-item-quantity-block">
                    <div class="basket-item-block-amount__text">Товар удален из корзины</div>
                </div>
            </td>
			<td class="basket-items-list-item-price">
                <div class="basket-item-block-price">
                    <div class="basket-item-price-current">
                    	<span class="basket-item-price-current-text" id="basket-item-sum-price-7"></span>
                    </div>
                </div>
            </td>
            <td class="basket-items-list-item-restore-button-custom">
	            <div class="basket-items-list-item-removed-block">
					<a href="javascript:void(0)" data-entity="basket-item-restore-button">
						<svg class="i-icon" viewBox="0 0 19 18">
						<path d="M13.3361 2.05798C13.2586 2.05744 13.183 2.08248 13.1211 2.12925C13.0584 2.17665 13.0134 2.24365 12.9932 2.31958L13.1381 2.35823L12.9932 2.31959C12.9729 2.39552 12.9786 2.47605 13.0094 2.54836C13.0396 2.61937 13.0923 2.67846 13.1593 2.71661C14.3014 3.4259 15.2468 4.41668 15.8606 5.60005C15.8764 5.64365 15.9007 5.68376 15.9321 5.71803L16.0427 5.61672L15.9321 5.71803C15.9668 5.75592 16.0093 5.78576 16.0568 5.80546C16.1043 5.82518 16.1554 5.83424 16.2067 5.83208C16.2581 5.82991 16.3083 5.81657 16.3539 5.79292L16.285 5.65973L16.3539 5.79292C16.3996 5.76929 16.4395 5.73598 16.4709 5.6953L16.3521 5.60366L16.4709 5.6953C16.5022 5.65461 16.5244 5.60755 16.5356 5.55745C16.5469 5.50733 16.5471 5.45536 16.5362 5.40515C16.5264 5.35974 16.5076 5.31677 16.4811 5.27871C15.8056 3.97587 14.7764 2.88592 13.5305 2.11263M13.5305 2.11263C13.5307 2.11279 13.531 2.11295 13.5312 2.11311L13.4506 2.23962L13.5297 2.11216C13.53 2.11232 13.5302 2.11248 13.5305 2.11263ZM18.134 14.2495L18.1339 14.2492L17.1228 11.013C17.1227 11.0126 17.1226 11.0123 17.1225 11.012C17.0966 10.9263 17.0392 10.8536 16.9617 10.8087C16.8839 10.7637 16.7919 10.7501 16.7044 10.7707L16.7044 10.7706L16.6987 10.7721C16.6888 10.7749 16.6791 10.7781 16.6695 10.7816L13.0308 11.9947C13.0307 11.9948 13.0306 11.9948 13.0305 11.9948C12.9866 12.0093 12.9459 12.0322 12.9108 12.0624C12.8756 12.0926 12.8468 12.1294 12.8259 12.1708C12.8049 12.2121 12.7923 12.2572 12.7888 12.3034C12.7853 12.3496 12.7909 12.3961 12.8054 12.4401C12.8198 12.4842 12.8428 12.525 12.873 12.5601L12.9868 12.4624L12.873 12.5601C12.9032 12.5953 12.94 12.6242 12.9814 12.6451C13.0227 12.666 13.0678 12.6786 13.114 12.6822C13.1603 12.6857 13.2067 12.68 13.2508 12.6656L13.2515 12.6653L16.1458 11.6985C15.1 14.5977 12.3584 16.6357 9.09385 16.6357C4.93062 16.6357 1.55469 13.262 1.55469 9.09524C1.55469 4.92847 4.93062 1.55476 9.09385 1.55476C9.97386 1.55476 10.8338 1.67252 11.6126 1.93881L11.6126 1.93882L11.6145 1.93943C11.7034 1.96855 11.8003 1.96114 11.8838 1.91885C11.9672 1.87656 12.0305 1.80284 12.0597 1.71391L11.9171 1.66719L12.0597 1.71391C12.0888 1.62498 12.0815 1.52812 12.0392 1.44461C11.9973 1.36164 11.9243 1.29861 11.8361 1.26915C10.9688 0.972572 10.0358 0.85 9.09385 0.85H8.93994L8.93998 0.851449C4.46302 0.933646 0.85 4.59531 0.85 9.09528C0.85 13.6467 4.5461 17.3405 9.09386 17.3405C12.5771 17.3405 15.5346 15.2047 16.7346 12.1461L17.4551 14.4575C17.4552 14.4577 17.4553 14.458 17.4554 14.4582C17.4689 14.5027 17.491 14.5441 17.5205 14.58C17.5502 14.6162 17.5867 14.6461 17.6279 14.668C17.6691 14.69 17.7143 14.7037 17.7608 14.7082C17.8074 14.7127 17.8543 14.7079 17.899 14.6942C17.9437 14.6805 17.9852 14.6581 18.0212 14.6284C18.0573 14.5986 18.087 14.562 18.1089 14.5206C18.1307 14.4793 18.1442 14.4341 18.1485 14.3876C18.1528 14.341 18.1479 14.2941 18.134 14.2495Z" fill="" stroke="" stroke-width="0.3"></path>
						</svg>
                    </a> 
                   	<span class="basket-items-list-item-clear-btn" data-entity="basket-item-close-restore-button"></span>
	            </div>
			</td>
		{{/SHOW_RESTORE}}
		{{^SHOW_RESTORE}}
			<td class="basket-items-list-item-descriptions">
				<div class="basket-items-list-item-descriptions-inner" id="basket-item-height-aligner-{{ID}}">
					<?
					if (in_array('PREVIEW_PICTURE', $arParams['COLUMNS_LIST']))
					{
						?>
						<div class="basket-item-block-image<?=(!isset($mobileColumns['PREVIEW_PICTURE']) ? ' hidden-xs' : '')?>">
							{{#DETAIL_PAGE_URL}}
								<a href="{{DETAIL_PAGE_URL}}" class="basket-item-image-link">
							{{/DETAIL_PAGE_URL}}

							<img class="basket-item-image" alt="{{NAME}}"
								src="{{{IMAGE_URL}}}{{^IMAGE_URL}}/upload/no_photo.png{{/IMAGE_URL}}">

							{{#SHOW_LABEL}}
								<div class="basket-item-label-text basket-item-label-big <?=$labelPositionClass?>">
									{{#LABEL_VALUES}}

										<div{{#HIDE_MOBILE}} class="hidden-xs"{{/HIDE_MOBILE}}>
											<span title="{{NAME}}">{{NAME}}</span>
										</div>
									{{/LABEL_VALUES}}
								</div>
							{{/SHOW_LABEL}}

							<?
							if ($arParams['SHOW_DISCOUNT_PERCENT'] === 'Y')
							{
								?>
								{{#DISCOUNT_PRICE_PERCENT}}
									<div class="basket-item-label-ring basket-item-label-small <?=$discountPositionClass?>">
										-{{DISCOUNT_PRICE_PERCENT_FORMATED}}
									</div>
								{{/DISCOUNT_PRICE_PERCENT}}
								<?
							}
							?>

							{{#DETAIL_PAGE_URL}}
								</a>
							{{/DETAIL_PAGE_URL}}
						</div>
						<?
					}
					?>
					<div class="basket-item-block-info">
						<div class="basket-item-block-info__head">
							<div class="basket-item-block-info__top">
								<?
								if (!empty($arParams['PRODUCT_BLOCKS_ORDER']))
								{
									foreach ($arParams['PRODUCT_BLOCKS_ORDER'] as $blockName)
									{
										switch (trim((string)$blockName))
										{
											case 'props':
												if (in_array('PROPS', $arParams['COLUMNS_LIST']))
												{
													?>
													{{#PROPS}}
														<div class="basket-item-property<?=(!isset($mobileColumns['PROPS']) ? ' hidden-xs' : '')?>">
															<div class="basket-item-property-name">
																{{{NAME}}}
															</div>
															<div class="basket-item-property-value"
																data-entity="basket-item-property-value" data-property-code="{{CODE}}">
																{{{VALUE}}}
															</div>
														</div>
													{{/PROPS}}
													<?
												}

												break;
											case 'sku':
												?>
												{{#SKU_BLOCK_LIST}}
													{{^IS_IMAGE}}
														<div class="basket-item-block-article">
															<div class="basket-item-block-article__key">Арт:</div>
															<div class="basket-item-block-article__value">
																	{{#SKU_VALUES_LIST}}
																		<li class="basket-item-scu-item{{#SELECTED}} selected{{/SELECTED}}
																			{{#NOT_AVAILABLE_OFFER}} not-available{{/NOT_AVAILABLE_OFFER}}"
																			title="{{NAME}}"
																			data-entity="basket-item-sku-field"
																			data-initial="{{#SELECTED}}true{{/SELECTED}}{{^SELECTED}}false{{/SELECTED}}"
																			data-value-id="{{VALUE_ID}}"
																			data-sku-name="{{NAME}}"
																			data-property="{{PROP_CODE}}">
																			<span class="basket-item-scu-item-inner">{{NAME}}</span>
																		</li>
																	{{/SKU_VALUES_LIST}}
															</div>
														</div>
													{{/IS_IMAGE}}
												{{/SKU_BLOCK_LIST}}

												<?
												break;
											case 'columns':
												?>
												{{#COLUMN_LIST}}
													{{#IS_TEXT}}
														<div class="basket-item-block-article">
															<div class="basket-item-block-article__key">Арт:</div>
															<div class="basket-item-block-article__value">
																{{VALUE}}
															</div>
														</div>
													{{/IS_TEXT}}

													{{#IS_HTML}}
														<div class="basket-item-property-custom basket-item-property-custom-text
															{{#HIDE_MOBILE}}hidden-xs{{/HIDE_MOBILE}}"
															data-entity="basket-item-property">
															<div class="basket-item-property-custom-name">{{NAME}}</div>
															<div class="basket-item-property-custom-value"
																data-column-property-code="{{CODE}}"
																data-entity="basket-item-property-column-value">
																{{{VALUE}}}
															</div>
														</div>
													{{/IS_HTML}}

													{{#IS_LINK}}
														<div class="basket-item-property-custom basket-item-property-custom-text
															{{#HIDE_MOBILE}}hidden-xs{{/HIDE_MOBILE}}"
															data-entity="basket-item-property">
															<div class="basket-item-property-custom-name">{{NAME}}</div>
															<div class="basket-item-property-custom-value"
																data-column-property-code="{{CODE}}"
																data-entity="basket-item-property-column-value">
																{{#VALUE}}
																{{{LINK}}}{{^IS_LAST}}<br>{{/IS_LAST}}
																{{/VALUE}}
															</div>
														</div>
													{{/IS_LINK}}
												{{/COLUMN_LIST}}
												<?
												break;
										}
									}
								}
								?>
							</div>	                        			
							<h2 class="basket-item-info-name">
								{{#DETAIL_PAGE_URL}}
									<a href="{{DETAIL_PAGE_URL}}" class="basket-item-info-name-link">
								{{/DETAIL_PAGE_URL}}
		
								<span data-entity="basket-item-name">{{NAME}}</span>

								{{#DETAIL_PAGE_URL}}
									</a>
								{{/DETAIL_PAGE_URL}}
							</h2>
						</div>
						{{#DELAYED}}
							<div class="basket-items-list-item-warning-container">
								<div class="alert alert-warning text-center">
									<?=Loc::getMessage('SBB_BASKET_ITEM_DELAYED')?>.
									<a href="javascript:void(0)" data-entity="basket-item-remove-delayed">
										<?=Loc::getMessage('SBB_BASKET_ITEM_REMOVE_DELAYED')?>
									</a>
								</div>
							</div>
						{{/DELAYED}}
						{{#WARNINGS.length}}
							<div class="basket-items-list-item-warning-container">
								<div class="alert alert-warning alert-dismissable" data-entity="basket-item-warning-node">
									<span class="close" data-entity="basket-item-warning-close">&times;</span>
										{{#WARNINGS}}
											<div data-entity="basket-item-warning-text">{{{.}}}</div>
										{{/WARNINGS}}
								</div>
							</div>
						{{/WARNINGS.length}}

					</div>
					{{#SHOW_LOADING}}
						<div class="basket-items-list-item-overlay"></div>
					{{/SHOW_LOADING}}
				</div>
			</td>
			<?
			if ($usePriceInAdditionalColumn)
			{?>
				<td class="basket-items-list-item-price basket-items-list-item-price-for-one<?=(!isset($mobileColumns['PRICE']) ? ' hidden-xs' : '')?>">
					<div class="basket-item-block-price">
						{{#SHOW_DISCOUNT_PRICE}}
							<div class="basket-item-price-old">
								<span class="basket-item-price-old-text">
									{{{FULL_PRICE_FORMATED}}}
								</span>
							</div>
						{{/SHOW_DISCOUNT_PRICE}}

						<div class="basket-item-price-current {{#SHOW_DISCOUNT_PRICE}}basket-item-price-current--discount{{/SHOW_DISCOUNT_PRICE}}">
							<span class="basket-item-price-current-text" id="basket-item-price-{{ID}}">
								{{{PRICE_FORMATED}}}
							</span>
						</div>
					</div>
				</td>
				<?
			}
			?>
			<td class="basket-items-list-item-amount">
						{{#NOT_AVAILABLE}}
							<div class="basket-item-block-amount">
								<div class="basket-item-block-amount__text">
									<?=Loc::getMessage('SBB_BASKET_ITEM_NOT_AVAILABLE')?>
								</div>
							</div>
						{{/NOT_AVAILABLE}}

			
				<div class="basket-item-block-amount{{#NOT_AVAILABLE}} disabled{{/NOT_AVAILABLE}}"
					data-entity="basket-item-quantity-block">
					<span class="basket-item-amount-btn-minus" data-entity="basket-item-quantity-minus"></span>
					<div class="basket-item-amount-filed-block">
						<input type="text" class="basket-item-amount-filed" value="{{QUANTITY}}"
							{{#NOT_AVAILABLE}} disabled="disabled"{{/NOT_AVAILABLE}}
							data-value="{{QUANTITY}}" data-entity="basket-item-quantity-field"
							id="basket-item-quantity-{{ID}}">
					</div>
					<span class="basket-item-amount-btn-plus" data-entity="basket-item-quantity-plus"></span>
				</div>
			</td>
			<?
			if ($useSumColumn)
			{
				?>
				<td class="basket-items-list-item-price<?=(!isset($mobileColumns['SUM']) ? ' hidden-xs' : '')?>">
					<div class="basket-item-block-price">
						<div class="basket-item-price-current">
							<span class="basket-item-price-current-text" id="basket-item-sum-price-{{ID}}">
								{{{SUM_PRICE_FORMATED}}}
							</span>
						</div>
						{{#SHOW_LOADING}}
							<div class="basket-items-list-item-overlay"></div>
						{{/SHOW_LOADING}}
					</div>
				</td>
				<?
			}

			if ($useActionColumn)
			{
				?>
				<td class="basket-items-list-item-remove hidden-xs">
					<div class="basket-item-block-actions">
						<span class="basket-item-actions-remove" data-entity="basket-item-delete">
							<svg class="i-icon">
                                <use xlink:href="#icon-reset"></use>
                            </svg>
						</span>
					</div>
				</td>
				<?
			}
			?>
		{{/SHOW_RESTORE}}
	</tr>
</script>