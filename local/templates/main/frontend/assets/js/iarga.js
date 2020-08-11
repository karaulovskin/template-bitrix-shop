var antiCusel = 0;
var get = new Array;

$(function(){
	$(".uniform").initUnuform();
	//карточка. ниличие в магазинах
	$(document).on('click', ".circle-item--availability .circle-item__link", function(){
		$(".availability-table").load("/local/inc/ajax/storegods.php",{"product":$(this).attr('rel'),"id":$(this).attr('data-rel')});
		$(".circle-list__item ").removeClass("current");
		$(this).closest(".circle-list__item").addClass("current");
		return false;
	});
	//оформление заказа. выбрать магазин
	$(document).on('click', ".add-shops", function(){
		$(".add-shops").removeClass("btn--active").html('Выбрать');
		$(this).addClass("active btn--active").html('Выбран');
		$("#ORDER_PROP_7").val($(this).attr("rel"));
		$("#ORDER_PROP_13").val($(this).attr("rel"));
	});
	//карточка. собери комплект
	$(document).on('click', ".add-section", function(){
		$(".swiper-ajax").load("/local/inc/ajax/ajax-kit.php",{"sect":$(this).attr('rel'),"list":$(this).attr('data-rel')});
		$(".tabs-nav-list__item").removeClass("current");
		$(this).closest(".tabs-nav-list__item").addClass("current");
		setTimeout(function () {
			App.Sliders.init();
		}, 300);
		return false;
	});
	//таймер
	 function a_loaded(){
		  var display = $('.request-code__time .display');
			var timeLeft = parseInt(display.html());
		  var timer = setInterval(function(){

		    if (--timeLeft >= 0) {
		    	display.html(timeLeft);
		    } else {
		    	$('.request-code .request-code__label').attr("style", "display: none");
		    	$('.request-code .request-code__time').attr("style", "display: none");
		      	$('.request-code .request-code__link').attr("style", "display: block");
		      clearInterval(timer);
		    }
		  }, 1000)
		}

		// a_loaded();
	//отправим смс повторно
	$(document).on('click', ".request-code .request-code__link", function(){
		//$.post("/local/inc/ajax/auth.php",{"phone":$("[data-number-phone-sms-number]").val()});
		var form = $('[data-form-open-form-sms]');
		var formData = new FormData(form[0]);
		var phone = $('[data-number-phone-sms-number]').val();

		App.Forms.FormSend.sendSms(form, formData);
		$('.request-code__time .display').html(60);
	    $('.request-code .request-code__label').attr("style", "display: block");
	    $('.request-code .request-code__time').attr("style", "display: block");
	    $('.request-code .request-code__link').attr("style", "display: none");
	    a_loaded();
	});

	//собрать игрушку
	$(document).on('click', "[data-animate-toy-controls-item]", function(){
		$(".toy-list-wrapper--ajax").load("/local/inc/ajax/toy.php",{"add":$(this).attr('data-rel'),"id":$(this).attr('id')});
		$( "[data-animate-toy-controls-item]").removeClass("active");
		$(this).addClass("active");
	});

	//показать еще товары
	$(document).on('click','#ajax_product', function() {
		$.post($(this).attr('href'), {ajax:"Y"}, function(data) {

			$("no_sorting").remove();
			$(".sstring_lod").remove();
			$(".load-more").remove();
			$(".paginator").remove();
			$(".page-lists").remove();
			$('.ajax_load').append($(data).find('.ajax_load').html());
		});
		return false;
	});
	//контакты. сменим город
	$(document).on('click','.circle-item__link', function() {
		$(".shops").load("/local/inc/ajax/contact_city.php",{"add":$(this).attr('rel')});
		$(".ajax-map").load("/local/inc/ajax/ajax-map.php",{},function() {App.Map.init();});
	});
	//выбор города
	$("[data-location-search]").on('keyup', function(){
		$('.city-head').load('/local/inc/ajax/cities.php', {'name':$(this).val()});
	});
	//страница доставки
	$(document).on('click', ".city__link", function(){
		$(".nav-city").load("/local/inc/ajax/delivery_citylist.php",{"name":$(this).attr("rel"),"id":$(this).attr("data-rel")});
		$(".nav-title-list__item").removeClass("current");
		$(this).closest(".nav-title-list__item").addClass("current");
		$(".nav-alphabet").load("/local/inc/ajax/delivery_alphabet.php",{"name":$(this).attr("rel"),"id":$(this).attr("data-rel")},function(){App.CityList.init(); App.Sliders.init();});

	});
	$(document).on('click', ".nav-alphabet-list__link", function(){
		$(".nav-alphabet").load("/local/inc/ajax/delivery_alphabet.php",{"name":$(this).attr("rel"),"alph":$(this).html()},function(){App.CityList.init(); App.Sliders.init();});
		$(".nav-alphabet-list__item").removeClass("current");
		$(this).closest(".nav-alphabet-list__item").addClass("current");

	});
	//вывод доставки/ смена города ajax
	$(document).on('click', ".ajax--city", function(){
		$(".goods--deliv").load("/local/inc/ajax/goods_deliv.php",{"name":$(this).attr("rel")});
	});
	$(document).on('keyup', "[data-location-searchs]", function(){
		$('.city-goods').load('/local/inc/ajax/good_cities.php', {'name':$(this).val()});
	});	

});

//  Uniform 
$.fn.initUnuform = function(){
	// jquery uniform - needs Jquery
	$("<input type='hidden' name='antibot' value='1'>").appendTo($(this));

	$(this).find("input.repl, textarea.repl").focus(function(){if($(this).val()==$(this).attr("data-alt")) $(this).val("");});
	$(this).find("input.repl, textarea.repl").blur(function(){if($(this).val()=="") $(this).val($(this).attr("data-alt"));});
	$(this).find("input.repl, textarea.repl").keyup(function(){if($(this).val()=="" || $(this).val()==$(this).attr("data-alt")) $(this).removeClass("act"); else $(this).addClass("act");});
	$(this).find("input.repl, textarea.repl").keyup();

	$(this).find(".submit").off('click').on('click',function(){
		if($(this).attr('name')!=undefined) $("<input type='hidden' name='"+$(this).attr('name')+"' class='tempadd'  value='1'>").appendTo($(this).parents('form'));		
		$(this).parents('form').submit(); return false;
	});

	$(this).find("input").on('keypress',function(event,form){
		if(event.keyCode==13){
			$(this).parents("form").submit();
		}
	});
	
	$(this).submit(function(){

		if(antiCusel == 0){
			$(".uniform.active p.step").html('');
			$(".uniform.active .errortext").each(function(){$(this).closest(".error").removeClass("error")})
			$(this).addClass("active").removeClass("success");
			$(this).find(".element-form").removeClass("error");
			if($(this).find('.preloader').length){
				$(this).find('.preloader').show().removeClass("success");
			}
			else{
				$(this).find("p.error").show().removeClass("success");
			}
			var inps = $(this).find("input.repl, textarea.repl");
			for(i=0;i<inps.length;i++){
				$("<input type='hidden' name='"+inps.eq(i).attr("name")+"_default_value' value='"+inps.eq(i).attr('data-alt')+"' class='tempadd'>").appendTo($(this));
			}

			$("#newframe").remove();
			var newframe = $('<iframe id="newframe" name="newframe" src="'+$(this).attr('action')+'"></iframe>').appendTo("body").hide();
			var newform = $(this).attr("target","newframe").attr("method","post").attr("enctype","multipart/form-data");
			
			//newform.submit();

			newframe.bind('load',function(){
				$(".tempadd").remove();
				var data = $(this).contents().find('body').html();
				if (typeof handler == 'function') {
					handler(data);
				}
				if(data.match("step") && $(".uniform.active").find(".step").length){
					var mat = data.match(/step ([0-9]+):([0-9]+)/);
					$(".uniform.active").find(".skipadr").remove();
					$(".uniform.active").find(".skip_adr").remove();
					$(".uniform.active").append($("<input type='hidden' name='skip' class='skip'>").val(mat[2]));
					$(".uniform.active").append($("<input type='hidden' name='skip_adr' class='skip_adr'>").val(mat[1]));
					$(".uniform.active p.step").html($(".uniform.active p.step").html()+'<br>'+data.replace('step','').replace('error',''));
					$(".uniform.active p.active").html('');
					setTimeout(function(){$(".uniform.active").removeClass('active').submit();},2000);
				}else if(data.match("error")){
					setTimeout((function(data_){return function(){
						var mat = data.match(/errorblock/);
						if(mat){
							dataArr = data.replace("error ","").split(/errorblock:[0-9a-zA-Z_\-]+/);
							codesArr = data.replace("error ","").match(/errorblock:[0-9a-zA-Z_\-]+/g);	
							for(i in dataArr){
								if(codesArr[i]!=undefined){
									code = codesArr[i].replace('errorblock:','');
									$code = $(".uniform.active").find("input[name='"+code+"'], textarea[name='"+code+"']");
									if($code.length){
										$code.parent().addClass("error").find(".errortext").html(dataArr[i]);
										data = data.replace(dataArr[i]+codesArr[i],"");
									}else{
										data = data.replace(dataArr[i],"");
									}
								}
							}
							if($(".uniform.active .incorrect-password div.error").length){
								$(".uniform.active .incorrect-password").show().find('div.error').html(data.replace("error ","")).fadeIn();
							}
							else{
								$(".uniform.active p.error").html(data.replace("error ","")).fadeIn();
								$(".uniform.active .performed, .uniform.active .preloader").hide();
							}
							$(".uniform.active").removeClass("active");
						}else{
							if($(".uniform.active .incorrect-password div.error").length){
								$(".uniform.active .incorrect-password").show().find('div.error').html(data.replace("error ","")).fadeIn();
							}
							else{
								$(".uniform.active p.error").html(data.replace("error ","")).fadeIn();
								$(".uniform.active .performed, .uniform.active .preloader").hide();
							}
						}
					}})(data),200);			
				}else  if(data.match("success")){
					setTimeout((function(data_){return function(){
						if(data.match("refresh")) history.go(0);
						else if(data.match("redirect")){
							location.href = "/personal/";
						}
						else if(data.match("basket")){
							location.href = "/order/";
						}
						else if(data.match("alert")){
							alert("success");
						}else if(data.match("closeit")){
							$(".uniform.active").html("<p>"+data.replace("success ","").replace("closeit","")+"</p>");
							setTimeout(function(){$(".popup_bg").click();},3000);
						}else{
							if(data.match("clear")){
								data = data.replace("clear", "");
								$(".uniform.active input, .uniform.active textarea").each(function(){
									if($(this).attr("type")=="text") $(this).val("");
									else if($(this).is("textarea")) $(this).val("");
									else if($(this).attr("type")=="checkbox") $(this).arrt("checked", false);
									else if($(this).attr("type")=="radio") $(this).arrt("checked", false);
								});
							}						
							if(data.match("nodelete")){
								if($('.performed').length){
									$(".uniform.active .performed").html(data.replace("success ","").replace("nodelete","")).show();
									$(".uniform.active .error, .uniform.active .preloader").hide();
								}
								else{
									$(".uniform.active p.error").html(data.replace("success ","").replace("nodelete","")).addClass("success");
								}
								//$(".phone-ajax").load("/local/inc/ajax/phone.php");
							}else{
								$(".uniform.active").html("<p>"+data.replace("success ","")+"</p>");
							}
							//$(".uniform.active p.error").html(data.replace("success ","")).addClass("success").fadeIn();
						}
						$(".uniform.active").removeClass("active");
					}})(data),200);		
				}else{
					$(".uniform.active p.error").html("").fadeIn();
					$(".uniform.active").removeClass("active");
				}
			});
		}
		//return false;
	});
}
function preloader_start(){
	pretout = setTimeout(function(){
		$("<img src='/upload/preloader.gif' class='iarga_preloared'>").appendTo($('body')).css({'position':'fixed','top':'50%','left':'50%','z-index':1000}).fadeIn();
		setTimeout(function(){$(".iarga_preloared").fadeOut(function(){$(this).remove();});},3000);
	},300);
}
function preloader_stop(){
	clearTimeout(pretout);
	$(".iarga_preloared").fadeOut(function(){$(this).remove();});
}
function ajaxFilter(targ){
	preloader_start();
	$("#newframe1").remove();
	$form = $(targ).closest("form");
	var adr = ("?"+$form.serialize()+'&ajax_filter=1&ajax=y');

	$.post("/local/inc/ajax/filterprovider.php", {'adr':adr, 'base':location.href},function( data ) {
		var splitarr = data.split('\'SEF_SET_FILTER_URL\':\'');
		var splitarr1 = splitarr[1].split('\'');
		var link = splitarr1[0];
		linkarr = link.split('/');
		if(linkarr[2].match('-is-')) link = link.replace('/catalog/', '/catalog/all/');
		window.history.pushState('2','Title', link);
		$.post(link,{'ajax':'1'},function(data){

			$("<div id='ajax_load'></div>").appendTo($('body')).html(data);
			$(".ajax_load").eq(0).html($('#ajax_load').find(".ajax_load").html());
			$('#ajax_load').find(".bx_filter_param_text").each(function(){
				var $span = $(this).find("span[data-role]");
				if($span.length){
					var role = $span.attr("data-role");
					var $targ = $("span[data-role='"+role+"']");
					$targ.html($span.html());
					if(parseInt($span.html()) == 0) $targ.closest("label").addClass("disabled");
					else $targ.closest("label").removeClass("disabled");
				}
			});
			$('#ajax_load').remove();		
			preloader_stop();
		});

	});
}
$(function(){
	//товар в корзине
	App.Search.checkedBasketLaded = function(){
			$(".info-amount input").each(function(){
			 	if($(this).attr("name")!=" "){
			      var cell = $(".to_cart[data-rel="+$(this).attr("name")+"]").addClass("catalog-item__basket--go-basket");
			      cart = $(".detal_cart[data-rel="+$(this).attr("name")+"]").removeClass("btn-basket-circle--black").addClass("btn-basket-circle--orange");
			      $('input[data-rel='+$(this).attr("name")+']').val($(this).val());
			    }
			});
	}
	// Добавление в корзину карточка товара 
	$(document).on('click', ".detal_cart", function(){
		if($(this).hasClass("btn-basket-circle--orange")){
			location.href = '/basket/';
		}else{		
			$(".info-amount").load("/local/inc/ajax/basket.php",{"add":$(this).attr('data-rel'),'num':1},App.Search.checkedBasketLaded);
		}
		return false;
	});
	$(document).on('click', ".kit_cart", function(){
		if($(this).hasClass("btn-basket-circle--orange")){
			location.href = '/basket/';
		}else{		
			$(".info-amount").load("/local/inc/ajax/basket-kit.php",{"add":$(this).attr('rel')},App.Search.checkedBasketLaded);
			$(this).addClass("btn-basket-circle--orange");
		}
		return false;
	});
	// Добавление в корзину список 
	$(document).on('click', ".to_cart", function(){
		if($(this).hasClass("catalog-item__basket--go-basket")){
			location.href = '/basket/';
		}else{		
			$(".info-amount").load("/local/inc/ajax/basket.php",{"add":$(this).attr('data-rel'),'num':1},App.Search.checkedBasketLaded);
		}
		return false;
	});
	App.Search.checkedBasketLaded();
});