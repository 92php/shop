/*function area*/
(function ($) {
$.fn.hoverClass=function(b){var a=this;a.each(function(c){a.eq(c).mouseenter(function(){$(this).addClass(b)});a.eq(c).mouseleave(function(){$(this).removeClass(b)})});return a};

$.fn.overOnlyClass=function(b){var a=this;a.each(function(c){a.eq(c).mouseenter(function(){a.removeClass(b);$(this).addClass(b)})});return a};

$.fn.foucsText=function(c){var a=this;var b=(c==null)?$(a).val():c;a.val(b);a.focus(function(){if(a.val()==b){a.val("")}});a.blur(function(){if(a.val()==""){a.val(b)}});return a};

})(jQuery);

/* soChange 1.6 */
(function(a){a.fn.extend({soChange:function(b){b=a.extend({thumbObj:null,botPrev:null,botNext:null,changeType:"fade",thumbNowClass:"now",thumbOverEvent:true,slideTime:1000,autoChange:true,clickFalse:true,overStop:true,changeTime:5000,delayTime:300},b||{});var h=a(this);var i;var k=h.size();var e=0;var g;var c;var f;function d(){if(e!=g){if(b.thumbObj!=null){a(b.thumbObj).removeClass(b.thumbNowClass).eq(g).addClass(b.thumbNowClass)}if(b.slideTime<=0){h.eq(e).hide();h.eq(g).show()}else{if(b.changeType=="fade"){h.eq(e).fadeOut(b.slideTime);h.eq(g).fadeIn(b.slideTime)}else{h.eq(e).slideUp(b.slideTime);h.eq(g).slideDown(b.slideTime)}}e=g;if(b.autoChange==true){clearInterval(c);c=setInterval(j,b.changeTime)}}}function j(){g=(e+1)%k;d()}h.hide().eq(0).show();if(b.thumbObj!=null){i=a(b.thumbObj);i.removeClass(b.thumbNowClass).eq(0).addClass(b.thumbNowClass);i.click(function(){g=i.index(a(this));d();if(b.clickFalse==true){return false}});if(b.thumbOverEvent==true){i.mouseenter(function(){g=i.index(a(this));f=setTimeout(d,b.delayTime)});i.mouseleave(function(){clearTimeout(f)})}}if(b.botNext!=null){a(b.botNext).click(function(){if(h.queue().length<1){j()}return false})}if(b.botPrev!=null){a(b.botPrev).click(function(){if(h.queue().length<1){g=(e+k-1)%k;d()}return false})}if(b.autoChange==true){c=setInterval(j,b.changeTime);if(b.overStop==true){h.mouseenter(function(){clearInterval(c)});h.mouseleave(function(){c=setInterval(j,b.changeTime)})}}}})})(jQuery);

/*use*/
$(function () {

	/*mainNav*/
	if ($('.ul_mainNav').length) {$('.ul_mainNav li').hoverClass('over');}

	/* p_topSearch */
	if ($('.p_topSearch').length) {$('.p_topSearch .txt').foucsText();}

	/* cart */
	if ($('.div_quickBuy').length) {
		var $cartTitle = $('.div_quickBuy .a_myCart'),$cartBox = $('.div_quickBuy .div_cart'),ss;
		window.cartHide = function() {$cartBox.fadeOut();}
		$cartTitle.bind('mouseenter',function () {clearTimeout(ss);$cartBox.show();}).bind('mouseleave',function () {ss = setTimeout('cartHide()',1200);});
		$cartBox.bind('mouseenter',function () {	clearTimeout(ss);}).bind('mouseleave',function () {ss = setTimeout('cartHide()',1200);});
	}


	/* tabbox */
	if ($('.tabbox_a').length) {

		$('.tabbox_a .tabtitle span').hoverClass('over');
		$('.h3_eachtitle:gt(2)').hide();
		$('.tabcont:gt(3)').hide();
		$('.tabbox_a .tabtitle span:gt(0)').click(function () {
			var indx= $('.tabbox_a .tabtitle span').index($(this));
			$('.h3_eachtitle').hide();
			$('.tabbox_a .tabtitle span').removeClass('now').eq(indx).addClass('now');
			$('.tabcont').hide().eq(indx).show();
		});

		$('.tabbox_a .tabtitle_1 span').addClass('now').click(function (){
			$('.h3_eachtitle').show();
			$('.h3_eachtitle:gt(2)').hide();
			$('.tabcont').show();
			$('.tabcont:gt(3)').hide();
			$('.tabbox_a .tabtitle span').removeClass('now');
			$(this).addClass('now');
		});
	}


	/* ul_prolist */
	if ($('.ul_prolist').length) {
		$('.ul_prolist li').hoverClass('over');
		$(".ul_prolist li:nth-child(4n)").addClass('li_r');
	}

	/* div_prokinds */
	if ($('.div_prokinds').length) {
		$('.div_prokinds h3').click(function () {
			var nu = $(this).next('ul');
			if (nu.css('display')=='block') {$(this).removeClass('now');nu.hide();}else{$(this).addClass('now');nu.show();}
		});
	}

	/* dl_consult */
	//if ($('.dl_consult').length) {
	//	$('.dl_consult:odd').addClass('dl_comdb');
	//}
	//if ($('.dl_comment').length) {
	//	$('.dl_comment:odd').addClass('dl_comdb');
	//}

	if ($('.a_tocomments').length) {	
		$('.a_tocomments').click(function () {
			$('.tabtitle_4 span').trigger('click');
		});
	}

	if ($('.a_toreadyinfo').length) {
		$('.a_toreadyinfo').click(function () {
			$('.tabtitle_1 span').trigger('click');
		});
	}

	if ($('.floatquick').length) {
		var ts;
		window.floatquickshow =function(){$('.floatquick').removeClass('floatquickover');} 
		$('.floatquick .h3_op').bind('mouseenter',function () {clearTimeout(ts);$('.floatquick').addClass('floatquickover');}).bind('mouseleave',function () {	ts = setTimeout('floatquickshow()',1200);});
		$('.floatquick .p_quickbtn').bind('mouseenter',function () {clearTimeout(ts);}).bind('mouseleave',function () {	ts = setTimeout('floatquickshow()',1200);});

		$(window).scroll(function(){
			var $top = $(document).scrollTop();
			if ($top>980) {
				$('.floatquick').css('top', (parseInt($(document).scrollTop()) -980+220) + 'px');
				if (parseInt($('.floatquick').css('top')) < 220){
					$('.floatquick').css('top', '220px');
				}
			}
		})
	}


	if ($('.ajaxlogin').length) {
		//var dH=$(document).height();
		function setPos(o) {
			var $o = $(o),t=Math.floor($o.height()/2+20),l=Math.floor($o.width()/2+20);
			$o.css({'marginTop':-t,'marginLeft':-l});
			return $o;
		}
		window.showLogin =function () {
			setPos(".ajaxlogin").fadeIn();
		}
		window.hideLogin =function () {
			$(".ajaxlogin").fadeOut();
		}
		$(".ajaxlogin .a_close").click(function () {hideLogin();return false;});
	}


	/* detailsPicZoom */
	if ($(".proviewbox").length) {
		var page = 0;
		var $ul = $(".ul_prothumb"),$li = $(".ul_prothumb li");
		var $liL = $li.length;
		var $bigShowBox = $(".probigshow");
		var str = '<div class="zoomplepopup"></div><div id="probig_preview" ><img width="1024" height="1024" alt="" /></div>';
		$bigShowBox.append(str);

		var $pre = $("#probig_preview");
		var $preimg = $("#probig_preview img");
		var $zoom = $(".probigshow .zoomplepopup");
		var $link = $('#a_enlarge').attr('href');
		var $SPage = Math.floor($liL / 5),sLong = $li.width() * 5;
		var sto;

		function btnStyle() {
			if (page == 0) {$('.span_prev').addClass('span_prevb');} else {$('.span_prev').removeClass('span_prevb');}
			if (page == $SPage) {$('.span_next').addClass('span_nextb');} else {$('.span_next').removeClass('span_nextb');}
		};

		if (page < 1){
			var _src = $(".a_probigshow:first").attr("ref");
			$preimg.attr("src", _src);
		}else{
			$preimg.attr("src", $li.find("a").attr("href"));
		}
		btnStyle();

		//$li.overOnlyClass("now");
		$('#a_enlarge').attr('href',$link+'#'+'0');

		$(".span_prev").click(function() {
			if (page > 0) {page--;$(".ul_prothumb").animate({left: "+=" + sLong});};
			btnStyle();
		});
		$(".span_next").click(function() {
			if (page < $SPage) {page++;$(".ul_prothumb").animate({left: "-=" + sLong});};
			btnStyle();
		});
		window.lichange = function (indx) {
			var obj = $li.eq(indx);
			$preimg.attr("src",(obj.find("a").attr("href")));
			$(".a_probigshow img").attr("src", obj.find("img").attr("longdesc"));
			$('#a_enlarge').attr('href',$link+'#'+indx);
			$li.removeClass('now').eq(indx).addClass('now');
		}
		$li.mouseenter(function() {
			var indx = $li.index($(this));
			sto = setTimeout('lichange('+indx+')',150);
		}).mouseleave(function () {
			clearTimeout(sto);
			})	.click(function() {
			var indx = $li.index($(this));lichange(indx);
			return false;
		});

		var zoompos = {x: 0,y: 0};
		var p_w = $preimg.width();
		var p_h = $preimg.height();
		$bigShowBox.bind("mouseenter",function(g) {
			$pre.css({visibility: "visible"});
			var f = $(this);
			var a = $(this).width(),c = $(this).height();
			var b = $pre.width(),d = $pre.height();
			$zoom.width(b * a / p_w).height(d * c / p_h).show();
			PositionPopupZoom(f, $zoom, g.pageX, g.pageY, p_w, p_h);
			f.bind("mousemove",function(h) {
				setTimeout(function() {PositionPopupZoom(f, $zoom, h.pageX, h.pageY, p_w, p_h)},5);
			})
		}).bind("mouseleave",function() {
			var a = $(this);
			$zoom.hide();
			$pre.css({visibility: "hidden"});
		});
		function PositionPopupZoom(a, o, m, k, n, f) {
			var c = a.offset().left;
			var i = a.offset().top;
			var d = o.width();
			var e = o.height();
			var l = a.width();
			var j = a.height();
			zoompos.x = m - c - (d / 2);
			zoompos.y = k - i - (e / 2);
			if (zoompos.x <= 0) {zoompos.x = 0}
			if (zoompos.y <= 0) {zoompos.y = 0}
			if (zoompos.x + d >= l) {zoompos.x = l - d}
			if (zoompos.y + e >= j) {zoompos.y = j - e}
			var b = n / l, g = f / j;
			o.css({left: zoompos.x,top: zoompos.y});
			$preimg.css({left: -(zoompos.x * b),top: -(zoompos.y * g)});
		}
	};



	/*
	//storeinfo
	if ($('#js_storeinfo_box').length)
	{
		var $storeinfo_box =$('#js_storeinfo_box');
		$('.storearea_box').mouseenter(function () {
			$storeinfo_box.addClass('storeinfo_over');
		});
		$storeinfo_box.mouseleave(function () {
			$storeinfo_box.removeClass('storeinfo_over');
		});

		$storeinfo_box.find('.span_close').click(function () {
			$storeinfo_box.removeClass('storeinfo_over');
		});

		$('.dl_storearea_list a').click(function () {
			$('#js_b_nowarea').text($(this).text());
			$storeinfo_box.removeClass('storeinfo_over');
			return false;
		});
	}
	*/


	//details gallery
	if ($(".div_gallerybigshow").length) {
		var $bigshowbox = $(".div_gallerybigshow");
		var $imga = $(".ul_gallerythumb a");
		var $img = $("#img_bigshow");
		var len = $imga.length,imgh;
		var page = 1,aZoom = 0,sLong = 308,$SPage = Math.ceil(len / 80);
		var httpHref = window.location.href;
		//var nowL = parseInt(httpHref.substr(httpHref.indexOf("#") + 1));
		var  nowL =((/.*#(\d+)$/.exec(httpHref))==null)?0:parseInt(/.*#(\d+)$/.exec(httpHref)[1]);

		function mPosition(c) {
			var a = c.pageX;
			var b = c.pageY;
			return {t: b,l: a}
		}
		function autoW(b, a) {
			b.css({width: "auto",height: "auto"});
			iW = b.width();
			iH = b.height();
			if (iW > a) {b.css({width: a,height: parseInt(iH * a / iW)});aZoom = 1;} else {aZoom = 0};
			imgh = b.height();
		}
		function loadImg(a) {
			$img.load(function() {
				autoW($(this), 500);
				$bigshowbox.removeClass("preloading");
				$(this).fadeIn();
				$('.div_gallerybigshow .span_left,.div_gallerybigshow .span_right').height(imgh);
			}).hide().attr("src", a);
		}

		function thumbStyle(a) {$imga.removeClass("now").eq(a).addClass("now");}

		function pageStyle() {
			if (page == 1) {$(".b_prev").addClass("b_prevb");} else { $(".b_prev").removeClass("b_prevb")};
			if (page == $SPage) {$(".b_next").addClass("b_nextb");} else {$(".b_next").removeClass("b_nextb");}
			$(".em_totalpage").html($SPage);
			$(".em_nowpage").html(page);
		}
		function changeDo(a) {
			nowL = a;
			thumbStyle(nowL);
			$bigshowbox.addClass("preloading");
			loadImg($imga.eq(nowL).attr("href"));
		}
		function pageChange(b, a) {
			if (b == "add") {
				if (page > 1) {
					page = page - a;
					$(".ul_gallerythumb").animate({top: "+=" + (a * sLong)},"fast");
					pageStyle();
				}} else {
				if (b == "reduce") {
					if (page < $SPage) {
						page = page + a;
						$(".ul_gallerythumb").animate({top: "-=" + (a * sLong)},"fast");
						pageStyle();
					}
				}
			}
		}
		function pageDo(a) {
			p = Math.ceil((a + 1) / 8);
			if (p > page) {pageChange("reduce", (p - page));};
			if (p < page) {pageChange("add", (page - p))};
		}

		//初始化
		$(".em_gallerynum").html(len);
		nowL = (!isNaN(nowL) && nowL < len) ? nowL: 0;
		pageStyle();
		changeDo(nowL);
		pageDo(nowL);

		$imga.click(function() {
			var a = $imga.index($(this));
			changeDo(a);
			return false;
		});

		$img.mousemove(function() {
			if (aZoom == 1) {
				$(this).unbind("click").removeClass().addClass("mousezoom").attr("title", "点击查看大图").bind("click",function() {
					window.open($(this).attr("src"));
				})}else {
					$(this).unbind("click").removeClass();}
			});


		if (len>1) {
			var strhtml = "<span class='span_left' title='点击查看上一张'>prev</span><span class='span_right' title='点击查看下一张'>next</span>";
			$bigshowbox.append(strhtml);

			$('.div_gallerybigshow .span_left').click(function () {
				nowL = (nowL + len - 1) % len;
				changeDo(nowL);
				pageDo(nowL);
			});
			$('.div_gallerybigshow .span_right').click(function () {
				nowL = (nowL + 1) % len;
				changeDo(nowL);
				pageDo(nowL);
			});	
		}

		$(".b_prev").click(function() { pageChange("add", 1);});
		$(".b_next").click(function() {pageChange("reduce", 1);});
	}

	loadStoreInfo();
});

var STOREDATA = [[{"id":9,"name":"\u4e0a\u6d77"},{"id":10,"name":"\u6c5f\u82cf"},{"id":11,"name":"\u6d59\u6c5f"},{"id":12,"name":"\u5b89\u5fbd"},{"id":15,"name":"\u5c71\u4e1c"},{"id":3245,"name":"\u6d77\u5916"}],[{"id":19,"name":"\u5e7f\u4e1c"},{"id":13,"name":"\u798f\u5efa"},{"id":20,"name":"\u5e7f\u897f"},{"id":21,"name":"\u6d77\u5357"}],[{"id":1,"name":"\u5317\u4eac"},{"id":2,"name":"\u5929\u6d25"},{"id":3,"name":"\u6cb3\u5317"},{"id":4,"name":"\u5c71\u897f"},{"id":6,"name":"\u8fbd\u5b81"},{"id":7,"name":"\u5409\u6797"},{"id":8,"name":"\u9ed1\u9f99\u6c5f"},{"id":5,"name":"\u5185\u8499\u53e4"},{"id":30,"name":"\u5b81\u590f"},{"id":31,"name":"\u65b0\u7586"}],[{"id":23,"name":"\u56db\u5ddd"},{"id":22,"name":"\u91cd\u5e86"},{"id":25,"name":"\u4e91\u5357"},{"id":24,"name":"\u8d35\u5dde"},{"id":26,"name":"\u897f\u85cf"},{"id":27,"name":"\u9655\u897f"},{"id":28,"name":"\u7518\u8083"},{"id":29,"name":"\u9752\u6d77"}],[{"id":17,"name":"\u6e56\u5317"},{"id":18,"name":"\u6e56\u5357"},{"id":16,"name":"\u6cb3\u5357"},{"id":14,"name":"\u6c5f\u897f"}]];
function loadStoreCurrent(goods_sku, regionName)
{
	var get_like_url = IMPORT_APPS_URL+'m2capi/item/getWareHouse.html?shop_id=101&user_id=0&area='+regionName+'&sku='+goods_sku+':0:1';
	$.ajax({'url':get_like_url,dataType:'jsonp',jsonp:'jsoncallback','success':function(json){
		return showStoreIntroText(json.data[goods_sku]);
    }});
};

function showStoreIntroText(data)
{
	if (data)
	{
		store_introtext = '有货，将从'+data+'发货';
	}
	else
	{
		store_introtext = '无货';
	}
	$("#js_store_introtext").html(store_introtext);

	$.each(STOREDATA, function(i, n)
	{
		$.each(n, function(ii, nn)
		{
			if (nn.id == data.regionid)
			{
				$("#js_b_nowarea").html(nn.name);
			}
		});
	});

	$('#js_storeinfo_box').removeClass('storeinfo_over');
}

function loadStoreInfo()
{
	 
}