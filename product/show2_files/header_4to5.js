/*
此文件为v4版与v5版切换所用,即头尾使用新版,中间部分使用老版内容
*/
/*v4版共公js文件*/
//base fn start
(function($){$.fn.hoverClass=function(b){var a=this;a.each(function(c){a.eq(c).mouseenter(function(){$(this).addClass(b)});a.eq(c).mouseleave(function(){$(this).removeClass(b)})});return a};$.fn.overOnlyClass=function(b){var a=this;a.each(function(c){a.eq(c).mouseenter(function(){a.removeClass(b);$(this).addClass(b)})});return a};$.fn.foucsText=function(c){var a=this;var b=(c==null)?$(a).val():c;a.val(b);a.focus(function(){if(a.val()==b){a.val("")}});a.blur(function(){if(a.val()==""){a.val(b)}});return a};$.fn.autoImgW=function(d){var a=this;var b=(d==null)?a.width():d;var c=a.find("img");c.each(function(f){var e=$(this).width();var g=$(this).height();var h=$(this).attr("src");if(e>=b){$(this).css({width:b,height:g*(b/e)}).wrap("<a href="+h+" target='_blank' title='点击在新窗口查看大图'></a>")}});return a};$.fn.foucsText=function(c){var a=this;var b=(c==null)?$(a).val():c;a.val(b);a.focus(function(){if(a.val()==b){a.val("")}});a.blur(function(){if(a.val()==""){a.val(b)}});return a};$.fn.focusChangeStyle=function(b){var a=this;var b=(b==null)?"it_focus":b;a.focus(function(){$(this).addClass(b)});a.blur(function(){$(this).removeClass(b)});return a};$.fn.openSelVal=function(b){var a=this;a.change(function(){if(a.val()!=0){if(b=="self"){window.location=a.val()}else{window.open(a.val())}}});return a}})(jQuery);

//soChange
(function(a){a.fn.extend({soChange:function(b){b=a.extend({thumbObj:null,botPrev:null,botNext:null,thumbNowClass:"now",thumbOverEvent:true,slideTime:1000,autoChange:true,clickFalse:true,overStop:true,changeTime:5000,delayTime:300},b||{});var h=a(this);var i;var k=h.size();var e=0;var g;var c;var f;function d(){if(e!=g){if(b.thumbObj!=null){a(b.thumbObj).removeClass(b.thumbNowClass).eq(g).addClass(b.thumbNowClass)}if(b.slideTime<=0){h.eq(e).hide();h.eq(g).show()}else{h.eq(e).fadeOut(b.slideTime);h.eq(g).fadeIn(b.slideTime)}e=g;if(b.autoChange==true){clearInterval(c);c=setInterval(j,b.changeTime)}}}function j(){g=(e+1)%k;d()}h.hide().eq(0).show();if(b.thumbObj!=null){i=a(b.thumbObj);i.removeClass(b.thumbNowClass).eq(0).addClass(b.thumbNowClass);i.click(function(){g=i.index(a(this));d();if(b.clickFalse==true){return false}});if(b.thumbOverEvent==true){i.mouseenter(function(){g=i.index(a(this));f=setTimeout(function(){d();clearInterval(c)},b.delayTime)});i.mouseleave(function(){clearTimeout(f);d()})}}if(b.botNext!=null){a(b.botNext).click(function(){if(h.queue().length<1){j()}return false})}if(b.botPrev!=null){a(b.botPrev).click(function(){if(h.queue().length<1){g=(e+k-1)%k;d()}return false})}if(b.autoChange==true){clearInterval(c);c=setInterval(j,b.changeTime);if(b.overStop==true){h.mouseenter(function(){clearInterval(c)});h.mouseleave(function(){clearInterval(c);c=setInterval(j,b.changeTime)})}}}})})(jQuery);
function time(){return Math.round(new Date().getTime()/1000)}
function empty(a){var b;if(a===''||a===0||a==='0'||a===null||a===false||a===undefined){return true}if(typeof a=='object'){for(b in a){if(typeof a[b]!=='function'){return false}}return true}return false}
//lazyload
function lazyload(option){var settings={defObj:null,defHeight:-200};settings=$.extend(settings,option||{});var defHeight=settings.defHeight,defObj=(typeof settings.defObj=="object")?settings.defObj.find("img"):$(settings.defObj).find("img");var pageTop=function(){return document.documentElement.clientHeight+Math.max(document.documentElement.scrollTop,document.body.scrollTop)-settings.defHeight};var imgLoad=function(){defObj.each(function(){if($(this).offset().top<=pageTop()){var src2=$(this).attr("src2");if(src2){$(this).attr("src",src2).removeAttr("src2")}}})};imgLoad();$(window).bind("scroll",function(){imgLoad()})}
// BANNER
function load_ads_banner_top_slide(){if($('#js_ads_banner_top_slide').size()){setTimeout(function(){$("#js_ads_banner_top_slide").slideUp(1000,function(){$("#js_ads_banner_top").slideDown(1000)})},2000)}var dom_top_banner=$('#dom_top_banner');if(dom_top_banner.size()){$.getJSON(web_dir+'apps/top_banner_data.php',function(top_banner_data){var top_banner_html='';$.each(top_banner_data,function(i,v){if(between(v.stime,v.etime)){top_banner_html+='<div class="ads_banner_top"><a href="'+v.url+'" target="_blank"><img src="'+v.image+'" width="960" alt="'+v.alt+'" \/></a></div>'}});top_banner_html&&dom_top_banner.html(top_banner_html).show()})}}

//出错调用
function errormessage(_errormessage,_callback){var alertmessage='';if(gettype(_errormessage)=='array'){$.each(_errormessage,function(i,n){if(n.length){alertmessage+=n+"\r\n"}})}else if(gettype(_errormessage)=='string'){if(_errormessage.length){alertmessage=_errormessage}}if(alertmessage.length){alert(alertmessage)}function_exists(_callback)&&_callback.call(_callback);return false}

// 收藏
function add_goods_to_favorites(goods_sku){var url=IMPORT_APPS_URL+'item/ajax/do/add_favourite.html?goods_sku='+goods_sku+'&d='+time();$.ajax({async:true,type:'get',url:url,dataType:'jsonp',jsonp:'jsoncallback',success:function(result){if(result.errorcode==50){alert('您还未登录')}if(result.errorcode==0){alert(result.errormessage)}}});return this}

// 验证码
function load_captcha(self){var src=IMPORT_APPS_URL+'captcha.html?d='+time();$(self).attr('src',src)}
$(function(){ $('[loadcaptcha="true"]').focus(function(){load_captcha('[captcha="true"]');}); });

// ajax 登录
function ajax_login(e,_callback){var result=$.ajax({url:IMPORT_APPS_URL+'user/login/do_login.html?d='+time(),dataType:'jsonp',jsonp:'jsoncallback',data:$(e).serialize(),success:function(result){if(result.errorcode!=0){load_captcha();return errormessage(result.errormessage);}function_exists(_callback)&&_callback.call(_callback)}});return false}

// ajax 注册
function ajax_register(e,_callback){var result=$.ajax({url:IMPORT_APPS_URL+'user/register/do_register.html?d='+time(),dataType:'jsonp',jsonp:'jsoncallback',data:$(e).serialize(),success:function(result){if(result.errorcode!=0){load_captcha();return errormessage(result.errormessage)}function_exists(_callback)&&_callback.call(_callback);return errormessage(result.errormessage)}});return false}



/*v5版新头部所需js代码*/
var CART_URL = IMPORT_CART_URL;
var APPS_URL = IMPORT_APPS_URL;
var WEB_DIR = web_dir;
var SUGGEST_URL = 'http://suggest.search.mbaobao.com/sug';

/*迷你购物车*/
/*迷你购物车*/
function delete_cart_goods(goods_sku) {
    var url = CART_URL + 'do/items/remove/' + goods_sku + '.html?d=' + time();
    var result = $.ajax({
        async: true,
        type: 'get',
        url: url,
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        success: function(result) {
            if (result) load_cart_goods_count()
        }
    })
}
function delete_cart_pointsexc(goods_sku) {
    var url = CART_URL + 'do/pointsexc/remove/' + goods_sku + '.html?d=' + time();
    var result = $.ajax({
        async: true,
        type: 'get',
        url: url,
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        success: function(result) {
            if (result) load_cart_goods_count()
        }
    })
}

function delete_cart_suits(suit_sku, suit_skus) {
    var url = CART_URL + 'do/suits/remove/' + suit_sku + '.html?goods_skus=' + suit_skus + '&d=' + time();
    var result = $.ajax({
        async: true,
        type: 'get',
        url: url,
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        success: function(result) {
            if (result) load_cart_goods_count()
        }
    })
}

function load_cart_goods_count() {
    var ITEM_URL = "http://item.mbaobao.com/";
    var result = $.ajax({
        async: true,
        type: 'get',
        url: CART_URL + 'ajax/do/minicart.html?d=' + time(),
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        success: function(result) {
            if (result.errorcode != 0) return false;
            if (result.data.total.item_quantity > 0) {
                $('#js_cart_goods_number').html(result.data.total.item_quantity);
            }else{
                $('#js_cart_goods_number').html("0");
            }
            var _html = '';
            $.each(result.data.cart_items,
            function(i, n) {
                _html += '<div class="item">';
                _html += '	<div class="pic"><a href="' + ITEM_URL + 'pshow-' + n.goods_sku + '.html" target="_blank"><img src="' + n.image_s_url + '" width="35" height="35" alt="" /></a></div>';
                _html += '	<div class="title"><a href="' + ITEM_URL + 'pshow-' + n.goods_sku + '.html" target="_blank">' + n.goods_name + '</a>';

                if (!n.is_suit && !n.is_pointsexc) _html += '	<div class="red"><span>￥' + n.sale_price + '</span><em class="gray">&emsp;x' + n.buy_quantity + '</em></div></div><div class="del-link"><a href="javascript:void(0);" class="del-link-a" onclick="return delete_cart_goods(\'' + n.goods_sku + '\');">删除</a></div>';

                if (n.is_pointsexc) _html += '	<div class="red"><span>￥' + n.sale_price + '</span><em class="gray">&emsp;x' + n.buy_quantity + '</em></div></div><div class="del-link"><a class="del-link-a" href="javascript:void(0);" onclick="return delete_cart_pointsexc(\'' + n.goods_sku + '\');">删除</a></div>';

                if (n.is_suit) _html += '	<div class="red"><span>￥' + n.sale_price + '</span><em class="gray">&emsp;x' + n.buy_quantity + '</em></div></div><div class="del-link"><a href="javascript:void(\'' + n.suit_sku + '\', \'' + n.suit_skus + '\');" class="del-link-a"  onclick="return delete_cart_suits(\'' + n.suit_sku + '\', \'' + n.suit_skus + '\');">删除</a></div>';

                _html += '</div>'
            });
            _html += '<div class="head-quickbuy-total"> 共 <b class="red">' + result.data.total.item_quantity + '</b> 件商品 金额总计：<b class="red">￥' + result.data.total.order_amount + '</b></div>';
            _html += '<div class="head-gocheck"><a class="head-gocheck-a" href="' + CART_URL + '">查看我的购物车</a></div>';
            $('#top_cart_goods_list').html(_html);
        }
    })
}



//设置登录的回跳地址
function set_login_referer(referer_url) {
    if (arguments.length == 0 || referer_url==="" || typeof(referer_url) !== "string"){return false;}
    var a_login_path = $('#login-path');
    if (typeof(referer_url) != "string" || referer_url == "" || referer_url == null) return;
    referer_url = encodeURIComponent(referer_url);
    var login_path = a_login_path.attr('href');
    if (login_path) {
        var ref = "";
        if(login_path.indexOf('referer_url') !== -1){
            ref = login_path.replace(/referer_url=[^&]*/ig, "referer_url=" + referer_url);
        }else{
            ref = login_path+((login_path.indexOf("?")!==-1)?"&":"?")+"referer_url=" + referer_url;
        }
        a_login_path.attr("href",ref);
    }
}

//检查登录
function load_user_logged_in(_callback) {
    var NAME_MAX_LEN = 20;
    $.ajax({
        type: 'get',
        url: APPS_URL + 'user/login/logged_in.html',
        dataType: 'jsonp',
        jsonp: 'jsoncallback',
        success: function(result) {
            if (result.errorcode != 0) return false;
            if (result.data) {
                var displayname = (result.data.nickname === "" || typeof(result.data.nickname) === 'undefined') ? result.data.username: result.data.nickname;
				if(displayname.replace(/[\u4e00-\u9fa5wmA-Z]/g, "**").length>NAME_MAX_LEN){
					var max_len = NAME_MAX_LEN-3;
					while(displayname.replace(/[\u4e00-\u9fa5wmA-Z]/g, "**").length>max_len){
						displayname = displayname.substr(0,displayname.length-1);
					}
					displayname=displayname+"...";
				}
                $('#dom_i_link').html(displayname);
                $('#dom_top_welcome_unlogin').hide();
                $('#dom_top_welcome_logined').show();
                _gaq.push(['_setVar', result.data.username]);
            } else {
                $('#dom_top_welcome_logined').hide();
                $('#dom_top_welcome_unlogin').show();
                _gaq.push(['_setVar', 'guest']);
            }
            
            if(_callback && typeof(_callback) === "function" ){
                _callback();
            }
        }
    });
    
    set_login_referer(location.href);
}
//加入收藏夹
function addFavorite(){
    var sURL = "http://www.mbaobao.com" ;
    var sTitle = "麦包包官方网站 - 中国最大的时尚箱包在线商城，购物满99免运费，支持货到付款";
    try{
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e){
        try{
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e){
             alert("对不起，您的浏览器不支持此操作!\n请您使用菜单栏或Ctrl+D收藏本站。");
        }
    }
}

//菜单高亮
function setMenu(){
    var cid = {"100":"women","110":"men","120":"leather","130":"canvas","140":"wallets","150":"outdoor","160":"digital","171":"new"};//二级目录查询频道标示
    var url = location.href.toLowerCase();
    var nav_url_arr = [];
    
    $(".main-nav-a,.main-nav-a2").each(function(i){
        nav_url_arr.push($(this).attr("href").toLowerCase());
    });
 
    var nav_url_arr_len = nav_url_arr.length;
    
    var two_content_reg = url.match(/^http:\/\/list\.[^\/]+\/([\w]+)([\/#])?(\?.*)?$/,"i");//二级目录
    if(two_content_reg !== null){
        if(search_nav(new RegExp("http:\/\/list\.mbaobao\.com\/"+two_content_reg[1]))){
            return;
        }
    }
    
    var two_c_search_reg = url.match(/[&\?]cid=(\d+)/,"i");//二级目录查询
    if(two_c_search_reg !== null){
        if(search_nav(new RegExp("http:\/\/list\.mbaobao\.com\/"+cid[two_c_search_reg[1]]))){
            return;
        }
    }
    
    var two_domain_reg =  url.match(/^http:\/\/(\w+)\.mbaobao\./,"i");//二级域名
    if(two_domain_reg !== null){
        if(two_domain_reg[1] !== "list" && two_domain_reg[1] !== "www" && search_nav(new RegExp("http:\/\/"+two_domain_reg[1]+"\.mbaobao\.com"))){
            return;
        }
    }
    
    var dir_url_reg = url.match(/^http:\/\/[^?#]+/,"i");//直接匹配地址，不包括查询
    if(dir_url_reg !== null){
        var dir_url_str = dir_url_reg[0];
        if(dir_url_str == "http://itemsearch.mbaobao.com/search.html"){ //新选包中心地址，头部新地址上线后去除些代码
            dir_url_str = "http://www.mbaobao.com/goods/search.php";
        }
        if(search_nav(new RegExp(dir_url_str))){
            return;
        }
    }

    function search_nav(reg){
        for(var i=0;i<nav_url_arr_len;i++){
            if(reg.test(nav_url_arr[i])){
                $(".main-nav-a,.main-nav-a2").eq(i).parent().addClass("m-current");
                return true;
            }
        }
        return false;
    }
}

//顶部搜索suggest
if(typeof YAHOO=="undefined"||!YAHOO){var YAHOO={};}YAHOO.namespace=function(){var A=arguments,E=null,C,B,D;for(C=0;C<A.length;C=C+1){D=(""+A[C]).split(".");E=YAHOO;for(B=(D[0]=="YAHOO")?1:0;B<D.length;B=B+1){E[D[B]]=E[D[B]]||{};E=E[D[B]];}}return E;};YAHOO.log=function(D,A,C){var B=YAHOO.widget.Logger;if(B&&B.log){return B.log(D,A,C);}else{return false;}};YAHOO.register=function(A,E,D){var I=YAHOO.env.modules,B,H,G,F,C;if(!I[A]){I[A]={versions:[],builds:[]};}B=I[A];H=D.version;G=D.build;F=YAHOO.env.listeners;B.name=A;B.version=H;B.build=G;B.versions.push(H);B.builds.push(G);B.mainClass=E;for(C=0;C<F.length;C=C+1){F[C](B);}if(E){E.VERSION=H;E.BUILD=G;}else{YAHOO.log("mainClass is undefined for module "+A,"warn");}};YAHOO.env=YAHOO.env||{modules:[],listeners:[]};YAHOO.env.getVersion=function(A){return YAHOO.env.modules[A]||null;};YAHOO.env.ua=function(){var C={ie:0,opera:0,gecko:0,webkit:0,mobile:null,air:0,caja:0},B=navigator.userAgent,A;if((/KHTML/).test(B)){C.webkit=1;}A=B.match(/AppleWebKit\/([^\s]*)/);if(A&&A[1]){C.webkit=parseFloat(A[1]);if(/ Mobile\//.test(B)){C.mobile="Apple";}else{A=B.match(/NokiaN[^\/]*/);if(A){C.mobile=A[0];}}A=B.match(/AdobeAIR\/([^\s]*)/);if(A){C.air=A[0];}}if(!C.webkit){A=B.match(/Opera[\s\/]([^\s]*)/);if(A&&A[1]){C.opera=parseFloat(A[1]);A=B.match(/Opera Mini[^;]*/);if(A){C.mobile=A[0];}}else{A=B.match(/MSIE\s([^;]*)/);if(A&&A[1]){C.ie=parseFloat(A[1]);}else{A=B.match(/Gecko\/([^\s]*)/);if(A){C.gecko=1;A=B.match(/rv:([^\s\)]*)/);if(A&&A[1]){C.gecko=parseFloat(A[1]);}}}}}A=B.match(/Caja\/([^\s]*)/);if(A&&A[1]){C.caja=parseFloat(A[1]);}return C;}();(function(){YAHOO.namespace("util","widget","example");if("undefined"!==typeof YAHOO_config){var B=YAHOO_config.listener,A=YAHOO.env.listeners,D=true,C;if(B){for(C=0;C<A.length;C=C+1){if(A[C]==B){D=false;break;}}if(D){A.push(B);}}}})();YAHOO.lang=YAHOO.lang||{};(function(){var B=YAHOO.lang,F="[object Array]",C="[object Function]",A=Object.prototype,E=["toString","valueOf"],D={isArray:function(G){return A.toString.apply(G)===F;},isBoolean:function(G){return typeof G==="boolean";},isFunction:function(G){return A.toString.apply(G)===C;},isNull:function(G){return G===null;},isNumber:function(G){return typeof G==="number"&&isFinite(G);},isObject:function(G){return(G&&(typeof G==="object"||B.isFunction(G)))||false;},isString:function(G){return typeof G==="string";},isUndefined:function(G){return typeof G==="undefined";},_IEEnumFix:(YAHOO.env.ua.ie)?function(I,H){var G,K,J;for(G=0;G<E.length;G=G+1){K=E[G];J=H[K];if(B.isFunction(J)&&J!=A[K]){I[K]=J;}}}:function(){},extend:function(J,K,I){if(!K||!J){throw new Error("extend failed, please check that "+"all dependencies are included.");}var H=function(){},G;H.prototype=K.prototype;J.prototype=new H();J.prototype.constructor=J;J.superclass=K.prototype;if(K.prototype.constructor==A.constructor){K.prototype.constructor=K;}if(I){for(G in I){if(B.hasOwnProperty(I,G)){J.prototype[G]=I[G];}}B._IEEnumFix(J.prototype,I);}},augmentObject:function(K,J){if(!J||!K){throw new Error("Absorb failed, verify dependencies.");}var G=arguments,I,L,H=G[2];if(H&&H!==true){for(I=2;I<G.length;I=I+1){K[G[I]]=J[G[I]];}}else{for(L in J){if(H||!(L in K)){K[L]=J[L];}}B._IEEnumFix(K,J);}},augmentProto:function(J,I){if(!I||!J){throw new Error("Augment failed, verify dependencies.");}var G=[J.prototype,I.prototype],H;for(H=2;H<arguments.length;H=H+1){G.push(arguments[H]);}B.augmentObject.apply(this,G);},dump:function(G,L){var I,K,N=[],O="{...}",H="f(){...}",M=", ",J=" => ";if(!B.isObject(G)){return G+"";}else{if(G instanceof Date||("nodeType" in G&&"tagName" in G)){return G;}else{if(B.isFunction(G)){return H;}}}L=(B.isNumber(L))?L:3;if(B.isArray(G)){N.push("[");for(I=0,K=G.length;I<K;I=I+1){if(B.isObject(G[I])){N.push((L>0)?B.dump(G[I],L-1):O);}else{N.push(G[I]);}N.push(M);}if(N.length>1){N.pop();}N.push("]");}else{N.push("{");for(I in G){if(B.hasOwnProperty(G,I)){N.push(I+J);if(B.isObject(G[I])){N.push((L>0)?B.dump(G[I],L-1):O);}else{N.push(G[I]);}N.push(M);}}if(N.length>1){N.pop();}N.push("}");}return N.join("");},substitute:function(V,H,O){var L,K,J,R,S,U,Q=[],I,M="dump",P=" ",G="{",T="}",N;for(;;){L=V.lastIndexOf(G);if(L<0){break;}K=V.indexOf(T,L);if(L+1>=K){break;}I=V.substring(L+1,K);R=I;U=null;J=R.indexOf(P);if(J>-1){U=R.substring(J+1);R=R.substring(0,J);}S=H[R];if(O){S=O(R,S,U);}if(B.isObject(S)){if(B.isArray(S)){S=B.dump(S,parseInt(U,10));}else{U=U||"";N=U.indexOf(M);if(N>-1){U=U.substring(4);}if(S.toString===A.toString||N>-1){S=B.dump(S,parseInt(U,10));}else{S=S.toString();}}}else{if(!B.isString(S)&&!B.isNumber(S)){S="~-"+Q.length+"-~";Q[Q.length]=I;}}V=V.substring(0,L)+S+V.substring(K+1);}for(L=Q.length-1;L>=0;L=L-1){V=V.replace(new RegExp("~-"+L+"-~"),"{"+Q[L]+"}","g");}return V;},trim:function(G){try{return G.replace(/^\s+|\s+$/g,"");}catch(H){return G;}},merge:function(){var J={},H=arguments,G=H.length,I;for(I=0;I<G;I=I+1){B.augmentObject(J,H[I],true);}return J;},later:function(N,H,O,J,K){N=N||0;H=H||{};var I=O,M=J,L,G;if(B.isString(O)){I=H[O];}if(!I){throw new TypeError("method undefined");}if(!B.isArray(M)){M=[J];}L=function(){I.apply(H,M);};G=(K)?setInterval(L,N):setTimeout(L,N);return{interval:K,cancel:function(){if(this.interval){clearInterval(G);}else{clearTimeout(G);}}};},isValue:function(G){return(B.isObject(G)||B.isString(G)||B.isNumber(G)||B.isBoolean(G));}};B.hasOwnProperty=(A.hasOwnProperty)?function(G,H){return G&&G.hasOwnProperty(H);}:function(G,H){return !B.isUndefined(G[H])&&G.constructor.prototype[H]!==G[H];};D.augmentObject(B,D,true);YAHOO.util.Lang=B;B.augment=B.augmentProto;YAHOO.augment=B.augmentProto;YAHOO.extend=B.extend;})();YAHOO.register("yahoo",YAHOO,{version:"2.7.0",build:"1796"});(function(){YAHOO.env._id_counter=YAHOO.env._id_counter||0;var E=YAHOO.util,L=YAHOO.lang,m=YAHOO.env.ua,A=YAHOO.lang.trim,d={},h={},N=/^t(?:able|d|h)$/i,X=/color$/i,K=window.document,W=K.documentElement,e="ownerDocument",n="defaultView",v="documentElement",t="compatMode",b="offsetLeft",P="offsetTop",u="offsetParent",Z="parentNode",l="nodeType",C="tagName",O="scrollLeft",i="scrollTop",Q="getBoundingClientRect",w="getComputedStyle",a="currentStyle",M="CSS1Compat",c="BackCompat",g="class",F="className",J="",B=" ",s="(?:^|\\s)",k="(?= |$)",U="g",p="position",f="fixed",V="relative",j="left",o="top",r="medium",q="borderLeftWidth",R="borderTopWidth",D=m.opera,I=m.webkit,H=m.gecko,T=m.ie;E.Dom={CUSTOM_ATTRIBUTES:(!W.hasAttribute)?{"for":"htmlFor","class":F}:{"htmlFor":"for","className":g},get:function(y){var AA,Y,z,x,G;if(y){if(y[l]||y.item){return y;}if(typeof y==="string"){AA=y;y=K.getElementById(y);if(y&&y.id===AA){return y;}else{if(y&&K.all){y=null;Y=K.all[AA];for(x=0,G=Y.length;x<G;++x){if(Y[x].id===AA){return Y[x];}}}}return y;}if(y.DOM_EVENTS){y=y.get("element");}if("length" in y){z=[];for(x=0,G=y.length;x<G;++x){z[z.length]=E.Dom.get(y[x]);}return z;}return y;}return null;},getComputedStyle:function(G,Y){if(window[w]){return G[e][n][w](G,null)[Y];}else{if(G[a]){return E.Dom.IE_ComputedStyle.get(G,Y);}}},getStyle:function(G,Y){return E.Dom.batch(G,E.Dom._getStyle,Y);},_getStyle:function(){if(window[w]){return function(G,y){y=(y==="float")?y="cssFloat":E.Dom._toCamel(y);var x=G.style[y],Y;if(!x){Y=G[e][n][w](G,null);if(Y){x=Y[y];}}return x;};}else{if(W[a]){return function(G,y){var x;switch(y){case"opacity":x=100;try{x=G.filters["DXImageTransform.Microsoft.Alpha"].opacity;}catch(z){try{x=G.filters("alpha").opacity;}catch(Y){}}return x/100;case"float":y="styleFloat";default:y=E.Dom._toCamel(y);x=G[a]?G[a][y]:null;return(G.style[y]||x);}};}}}(),setStyle:function(G,Y,x){E.Dom.batch(G,E.Dom._setStyle,{prop:Y,val:x});},_setStyle:function(){if(T){return function(Y,G){var x=E.Dom._toCamel(G.prop),y=G.val;if(Y){switch(x){case"opacity":if(L.isString(Y.style.filter)){Y.style.filter="alpha(opacity="+y*100+")";if(!Y[a]||!Y[a].hasLayout){Y.style.zoom=1;}}break;case"float":x="styleFloat";default:Y.style[x]=y;}}else{}};}else{return function(Y,G){var x=E.Dom._toCamel(G.prop),y=G.val;if(Y){if(x=="float"){x="cssFloat";}Y.style[x]=y;}else{}};}}(),getXY:function(G){return E.Dom.batch(G,E.Dom._getXY);},_canPosition:function(G){return(E.Dom._getStyle(G,"display")!=="none"&&E.Dom._inDoc(G));},_getXY:function(){if(K[v][Q]){return function(y){var z,Y,AA,AF,AE,AD,AC,G,x,AB=Math.floor,AG=false;if(E.Dom._canPosition(y)){AA=y[Q]();AF=y[e];z=E.Dom.getDocumentScrollLeft(AF);Y=E.Dom.getDocumentScrollTop(AF);AG=[AB(AA[j]),AB(AA[o])];if(T&&m.ie<8){AE=2;AD=2;AC=AF[t];G=S(AF[v],q);x=S(AF[v],R);if(m.ie===6){if(AC!==c){AE=0;AD=0;}}if((AC==c)){if(G!==r){AE=parseInt(G,10);}if(x!==r){AD=parseInt(x,10);}}AG[0]-=AE;AG[1]-=AD;}if((Y||z)){AG[0]+=z;AG[1]+=Y;}AG[0]=AB(AG[0]);AG[1]=AB(AG[1]);}else{}return AG;};}else{return function(y){var x,Y,AA,AB,AC,z=false,G=y;if(E.Dom._canPosition(y)){z=[y[b],y[P]];x=E.Dom.getDocumentScrollLeft(y[e]);Y=E.Dom.getDocumentScrollTop(y[e]);AC=((H||m.webkit>519)?true:false);while((G=G[u])){z[0]+=G[b];z[1]+=G[P];if(AC){z=E.Dom._calcBorders(G,z);}}if(E.Dom._getStyle(y,p)!==f){G=y;while((G=G[Z])&&G[C]){AA=G[i];AB=G[O];if(H&&(E.Dom._getStyle(G,"overflow")!=="visible")){z=E.Dom._calcBorders(G,z);}if(AA||AB){z[0]-=AB;z[1]-=AA;}}z[0]+=x;z[1]+=Y;}else{if(D){z[0]-=x;z[1]-=Y;}else{if(I||H){z[0]+=x;z[1]+=Y;}}}z[0]=Math.floor(z[0]);z[1]=Math.floor(z[1]);}else{}return z;};}}(),getX:function(G){var Y=function(x){return E.Dom.getXY(x)[0];};return E.Dom.batch(G,Y,E.Dom,true);},getY:function(G){var Y=function(x){return E.Dom.getXY(x)[1];};return E.Dom.batch(G,Y,E.Dom,true);},setXY:function(G,x,Y){E.Dom.batch(G,E.Dom._setXY,{pos:x,noRetry:Y});},_setXY:function(G,z){var AA=E.Dom._getStyle(G,p),y=E.Dom.setStyle,AD=z.pos,Y=z.noRetry,AB=[parseInt(E.Dom.getComputedStyle(G,j),10),parseInt(E.Dom.getComputedStyle(G,o),10)],AC,x;if(AA=="static"){AA=V;y(G,p,AA);}AC=E.Dom._getXY(G);if(!AD||AC===false){return false;}if(isNaN(AB[0])){AB[0]=(AA==V)?0:G[b];}if(isNaN(AB[1])){AB[1]=(AA==V)?0:G[P];}if(AD[0]!==null){y(G,j,AD[0]-AC[0]+AB[0]+"px");}if(AD[1]!==null){y(G,o,AD[1]-AC[1]+AB[1]+"px");}if(!Y){x=E.Dom._getXY(G);if((AD[0]!==null&&x[0]!=AD[0])||(AD[1]!==null&&x[1]!=AD[1])){E.Dom._setXY(G,{pos:AD,noRetry:true});}}},setX:function(Y,G){E.Dom.setXY(Y,[G,null]);},setY:function(G,Y){E.Dom.setXY(G,[null,Y]);},getRegion:function(G){var Y=function(x){var y=false;if(E.Dom._canPosition(x)){y=E.Region.getRegion(x);}else{}return y;};return E.Dom.batch(G,Y,E.Dom,true);},getClientWidth:function(){return E.Dom.getViewportWidth();},getClientHeight:function(){return E.Dom.getViewportHeight();},getElementsByClassName:function(AB,AF,AC,AE,x,AD){AB=L.trim(AB);AF=AF||"*";AC=(AC)?E.Dom.get(AC):null||K;if(!AC){return[];}var Y=[],G=AC.getElementsByTagName(AF),z=E.Dom.hasClass;for(var y=0,AA=G.length;y<AA;++y){if(z(G[y],AB)){Y[Y.length]=G[y];}}if(AE){E.Dom.batch(Y,AE,x,AD);}return Y;},hasClass:function(Y,G){return E.Dom.batch(Y,E.Dom._hasClass,G);},_hasClass:function(x,Y){var G=false,y;if(x&&Y){y=E.Dom.getAttribute(x,F)||J;if(Y.exec){G=Y.test(y);}else{G=Y&&(B+y+B).indexOf(B+Y+B)>-1;}}else{}return G;},addClass:function(Y,G){return E.Dom.batch(Y,E.Dom._addClass,G);},_addClass:function(x,Y){var G=false,y;if(x&&Y){y=E.Dom.getAttribute(x,F)||J;if(!E.Dom._hasClass(x,Y)){E.Dom.setAttribute(x,F,A(y+B+Y));G=true;}}else{}return G;},removeClass:function(Y,G){return E.Dom.batch(Y,E.Dom._removeClass,G);},_removeClass:function(y,x){var Y=false,AA,z,G;if(y&&x){AA=E.Dom.getAttribute(y,F)||J;E.Dom.setAttribute(y,F,AA.replace(E.Dom._getClassRegex(x),J));z=E.Dom.getAttribute(y,F);if(AA!==z){E.Dom.setAttribute(y,F,A(z));Y=true;if(E.Dom.getAttribute(y,F)===""){G=(y.hasAttribute&&y.hasAttribute(g))?g:F;y.removeAttribute(G);}}}else{}return Y;},replaceClass:function(x,Y,G){return E.Dom.batch(x,E.Dom._replaceClass,{from:Y,to:G});
},_replaceClass:function(y,x){var Y,AB,AA,G=false,z;if(y&&x){AB=x.from;AA=x.to;if(!AA){G=false;}else{if(!AB){G=E.Dom._addClass(y,x.to);}else{if(AB!==AA){z=E.Dom.getAttribute(y,F)||J;Y=(B+z.replace(E.Dom._getClassRegex(AB),B+AA)).split(E.Dom._getClassRegex(AA));Y.splice(1,0,B+AA);E.Dom.setAttribute(y,F,A(Y.join(J)));G=true;}}}}else{}return G;},generateId:function(G,x){x=x||"yui-gen";var Y=function(y){if(y&&y.id){return y.id;}var z=x+YAHOO.env._id_counter++;if(y){if(y[e].getElementById(z)){return E.Dom.generateId(y,z+x);}y.id=z;}return z;};return E.Dom.batch(G,Y,E.Dom,true)||Y.apply(E.Dom,arguments);},isAncestor:function(Y,x){Y=E.Dom.get(Y);x=E.Dom.get(x);var G=false;if((Y&&x)&&(Y[l]&&x[l])){if(Y.contains&&Y!==x){G=Y.contains(x);}else{if(Y.compareDocumentPosition){G=!!(Y.compareDocumentPosition(x)&16);}}}else{}return G;},inDocument:function(G,Y){return E.Dom._inDoc(E.Dom.get(G),Y);},_inDoc:function(Y,x){var G=false;if(Y&&Y[C]){x=x||Y[e];G=E.Dom.isAncestor(x[v],Y);}else{}return G;},getElementsBy:function(Y,AF,AB,AD,y,AC,AE){AF=AF||"*";AB=(AB)?E.Dom.get(AB):null||K;if(!AB){return[];}var x=[],G=AB.getElementsByTagName(AF);for(var z=0,AA=G.length;z<AA;++z){if(Y(G[z])){if(AE){x=G[z];break;}else{x[x.length]=G[z];}}}if(AD){E.Dom.batch(x,AD,y,AC);}return x;},getElementBy:function(x,G,Y){return E.Dom.getElementsBy(x,G,Y,null,null,null,true);},batch:function(x,AB,AA,z){var y=[],Y=(z)?AA:window;x=(x&&(x[C]||x.item))?x:E.Dom.get(x);if(x&&AB){if(x[C]||x.length===undefined){return AB.call(Y,x,AA);}for(var G=0;G<x.length;++G){y[y.length]=AB.call(Y,x[G],AA);}}else{return false;}return y;},getDocumentHeight:function(){var Y=(K[t]!=M||I)?K.body.scrollHeight:W.scrollHeight,G=Math.max(Y,E.Dom.getViewportHeight());return G;},getDocumentWidth:function(){var Y=(K[t]!=M||I)?K.body.scrollWidth:W.scrollWidth,G=Math.max(Y,E.Dom.getViewportWidth());return G;},getViewportHeight:function(){var G=self.innerHeight,Y=K[t];if((Y||T)&&!D){G=(Y==M)?W.clientHeight:K.body.clientHeight;}return G;},getViewportWidth:function(){var G=self.innerWidth,Y=K[t];if(Y||T){G=(Y==M)?W.clientWidth:K.body.clientWidth;}return G;},getAncestorBy:function(G,Y){while((G=G[Z])){if(E.Dom._testElement(G,Y)){return G;}}return null;},getAncestorByClassName:function(Y,G){Y=E.Dom.get(Y);if(!Y){return null;}var x=function(y){return E.Dom.hasClass(y,G);};return E.Dom.getAncestorBy(Y,x);},getAncestorByTagName:function(Y,G){Y=E.Dom.get(Y);if(!Y){return null;}var x=function(y){return y[C]&&y[C].toUpperCase()==G.toUpperCase();};return E.Dom.getAncestorBy(Y,x);},getPreviousSiblingBy:function(G,Y){while(G){G=G.previousSibling;if(E.Dom._testElement(G,Y)){return G;}}return null;},getPreviousSibling:function(G){G=E.Dom.get(G);if(!G){return null;}return E.Dom.getPreviousSiblingBy(G);},getNextSiblingBy:function(G,Y){while(G){G=G.nextSibling;if(E.Dom._testElement(G,Y)){return G;}}return null;},getNextSibling:function(G){G=E.Dom.get(G);if(!G){return null;}return E.Dom.getNextSiblingBy(G);},getFirstChildBy:function(G,x){var Y=(E.Dom._testElement(G.firstChild,x))?G.firstChild:null;return Y||E.Dom.getNextSiblingBy(G.firstChild,x);},getFirstChild:function(G,Y){G=E.Dom.get(G);if(!G){return null;}return E.Dom.getFirstChildBy(G);},getLastChildBy:function(G,x){if(!G){return null;}var Y=(E.Dom._testElement(G.lastChild,x))?G.lastChild:null;return Y||E.Dom.getPreviousSiblingBy(G.lastChild,x);},getLastChild:function(G){G=E.Dom.get(G);return E.Dom.getLastChildBy(G);},getChildrenBy:function(Y,y){var x=E.Dom.getFirstChildBy(Y,y),G=x?[x]:[];E.Dom.getNextSiblingBy(x,function(z){if(!y||y(z)){G[G.length]=z;}return false;});return G;},getChildren:function(G){G=E.Dom.get(G);if(!G){}return E.Dom.getChildrenBy(G);},getDocumentScrollLeft:function(G){G=G||K;return Math.max(G[v].scrollLeft,G.body.scrollLeft);},getDocumentScrollTop:function(G){G=G||K;return Math.max(G[v].scrollTop,G.body.scrollTop);},insertBefore:function(Y,G){Y=E.Dom.get(Y);G=E.Dom.get(G);if(!Y||!G||!G[Z]){return null;}return G[Z].insertBefore(Y,G);},insertAfter:function(Y,G){Y=E.Dom.get(Y);G=E.Dom.get(G);if(!Y||!G||!G[Z]){return null;}if(G.nextSibling){return G[Z].insertBefore(Y,G.nextSibling);}else{return G[Z].appendChild(Y);}},getClientRegion:function(){var x=E.Dom.getDocumentScrollTop(),Y=E.Dom.getDocumentScrollLeft(),y=E.Dom.getViewportWidth()+Y,G=E.Dom.getViewportHeight()+x;return new E.Region(x,y,G,Y);},setAttribute:function(Y,G,x){G=E.Dom.CUSTOM_ATTRIBUTES[G]||G;Y.setAttribute(G,x);},getAttribute:function(Y,G){G=E.Dom.CUSTOM_ATTRIBUTES[G]||G;return Y.getAttribute(G);},_toCamel:function(Y){var x=d;function G(y,z){return z.toUpperCase();}return x[Y]||(x[Y]=Y.indexOf("-")===-1?Y:Y.replace(/-([a-z])/gi,G));},_getClassRegex:function(Y){var G;if(Y!==undefined){if(Y.exec){G=Y;}else{G=h[Y];if(!G){Y=Y.replace(E.Dom._patterns.CLASS_RE_TOKENS,"\\$1");G=h[Y]=new RegExp(s+Y+k,U);}}}return G;},_patterns:{ROOT_TAG:/^body|html$/i,CLASS_RE_TOKENS:/([\.\(\)\^\$\*\+\?\|\[\]\{\}])/g},_testElement:function(G,Y){return G&&G[l]==1&&(!Y||Y(G));},_calcBorders:function(x,y){var Y=parseInt(E.Dom[w](x,R),10)||0,G=parseInt(E.Dom[w](x,q),10)||0;if(H){if(N.test(x[C])){Y=0;G=0;}}y[0]+=G;y[1]+=Y;return y;}};var S=E.Dom[w];if(m.opera){E.Dom[w]=function(Y,G){var x=S(Y,G);if(X.test(G)){x=E.Dom.Color.toRGB(x);}return x;};}if(m.webkit){E.Dom[w]=function(Y,G){var x=S(Y,G);if(x==="rgba(0, 0, 0, 0)"){x="transparent";}return x;};}})();YAHOO.util.Region=function(C,D,A,B){this.top=C;this.y=C;this[1]=C;this.right=D;this.bottom=A;this.left=B;this.x=B;this[0]=B;this.width=this.right-this.left;this.height=this.bottom-this.top;};YAHOO.util.Region.prototype.contains=function(A){return(A.left>=this.left&&A.right<=this.right&&A.top>=this.top&&A.bottom<=this.bottom);};YAHOO.util.Region.prototype.getArea=function(){return((this.bottom-this.top)*(this.right-this.left));};YAHOO.util.Region.prototype.intersect=function(E){var C=Math.max(this.top,E.top),D=Math.min(this.right,E.right),A=Math.min(this.bottom,E.bottom),B=Math.max(this.left,E.left);if(A>=C&&D>=B){return new YAHOO.util.Region(C,D,A,B);
}else{return null;}};YAHOO.util.Region.prototype.union=function(E){var C=Math.min(this.top,E.top),D=Math.max(this.right,E.right),A=Math.max(this.bottom,E.bottom),B=Math.min(this.left,E.left);return new YAHOO.util.Region(C,D,A,B);};YAHOO.util.Region.prototype.toString=function(){return("Region {"+"top: "+this.top+", right: "+this.right+", bottom: "+this.bottom+", left: "+this.left+", height: "+this.height+", width: "+this.width+"}");};YAHOO.util.Region.getRegion=function(D){var F=YAHOO.util.Dom.getXY(D),C=F[1],E=F[0]+D.offsetWidth,A=F[1]+D.offsetHeight,B=F[0];return new YAHOO.util.Region(C,E,A,B);};YAHOO.util.Point=function(A,B){if(YAHOO.lang.isArray(A)){B=A[1];A=A[0];}YAHOO.util.Point.superclass.constructor.call(this,B,A,B,A);};YAHOO.extend(YAHOO.util.Point,YAHOO.util.Region);(function(){var B=YAHOO.util,A="clientTop",F="clientLeft",J="parentNode",K="right",W="hasLayout",I="px",U="opacity",L="auto",D="borderLeftWidth",G="borderTopWidth",P="borderRightWidth",V="borderBottomWidth",S="visible",Q="transparent",N="height",E="width",H="style",T="currentStyle",R=/^width|height$/,O=/^(\d[.\d]*)+(em|ex|px|gd|rem|vw|vh|vm|ch|mm|cm|in|pt|pc|deg|rad|ms|s|hz|khz|%){1}?/i,M={get:function(X,Z){var Y="",a=X[T][Z];if(Z===U){Y=B.Dom.getStyle(X,U);}else{if(!a||(a.indexOf&&a.indexOf(I)>-1)){Y=a;}else{if(B.Dom.IE_COMPUTED[Z]){Y=B.Dom.IE_COMPUTED[Z](X,Z);}else{if(O.test(a)){Y=B.Dom.IE.ComputedStyle.getPixel(X,Z);}else{Y=a;}}}}return Y;},getOffset:function(Z,e){var b=Z[T][e],X=e.charAt(0).toUpperCase()+e.substr(1),c="offset"+X,Y="pixel"+X,a="",d;if(b==L){d=Z[c];if(d===undefined){a=0;}a=d;if(R.test(e)){Z[H][e]=d;if(Z[c]>d){a=d-(Z[c]-d);}Z[H][e]=L;}}else{if(!Z[H][Y]&&!Z[H][e]){Z[H][e]=b;}a=Z[H][Y];}return a+I;},getBorderWidth:function(X,Z){var Y=null;if(!X[T][W]){X[H].zoom=1;}switch(Z){case G:Y=X[A];break;case V:Y=X.offsetHeight-X.clientHeight-X[A];break;case D:Y=X[F];break;case P:Y=X.offsetWidth-X.clientWidth-X[F];break;}return Y+I;},getPixel:function(Y,X){var a=null,b=Y[T][K],Z=Y[T][X];Y[H][K]=Z;a=Y[H].pixelRight;Y[H][K]=b;return a+I;},getMargin:function(Y,X){var Z;if(Y[T][X]==L){Z=0+I;}else{Z=B.Dom.IE.ComputedStyle.getPixel(Y,X);}return Z;},getVisibility:function(Y,X){var Z;while((Z=Y[T])&&Z[X]=="inherit"){Y=Y[J];}return(Z)?Z[X]:S;},getColor:function(Y,X){return B.Dom.Color.toRGB(Y[T][X])||Q;},getBorderColor:function(Y,X){var Z=Y[T],a=Z[X]||Z.color;return B.Dom.Color.toRGB(B.Dom.Color.toHex(a));}},C={};C.top=C.right=C.bottom=C.left=C[E]=C[N]=M.getOffset;C.color=M.getColor;C[G]=C[P]=C[V]=C[D]=M.getBorderWidth;C.marginTop=C.marginRight=C.marginBottom=C.marginLeft=M.getMargin;C.visibility=M.getVisibility;C.borderColor=C.borderTopColor=C.borderRightColor=C.borderBottomColor=C.borderLeftColor=M.getBorderColor;B.Dom.IE_COMPUTED=C;B.Dom.IE_ComputedStyle=M;})();(function(){var C="toString",A=parseInt,B=RegExp,D=YAHOO.util;D.Dom.Color={KEYWORDS:{black:"000",silver:"c0c0c0",gray:"808080",white:"fff",maroon:"800000",red:"f00",purple:"800080",fuchsia:"f0f",green:"008000",lime:"0f0",olive:"808000",yellow:"ff0",navy:"000080",blue:"00f",teal:"008080",aqua:"0ff"},re_RGB:/^rgb\(([0-9]+)\s*,\s*([0-9]+)\s*,\s*([0-9]+)\)$/i,re_hex:/^#?([0-9A-F]{2})([0-9A-F]{2})([0-9A-F]{2})$/i,re_hex3:/([0-9A-F])/gi,toRGB:function(E){if(!D.Dom.Color.re_RGB.test(E)){E=D.Dom.Color.toHex(E);}if(D.Dom.Color.re_hex.exec(E)){E="rgb("+[A(B.$1,16),A(B.$2,16),A(B.$3,16)].join(", ")+")";}return E;},toHex:function(H){H=D.Dom.Color.KEYWORDS[H]||H;if(D.Dom.Color.re_RGB.exec(H)){var G=(B.$1.length===1)?"0"+B.$1:Number(B.$1),F=(B.$2.length===1)?"0"+B.$2:Number(B.$2),E=(B.$3.length===1)?"0"+B.$3:Number(B.$3);H=[G[C](16),F[C](16),E[C](16)].join("");}if(H.length<6){H=H.replace(D.Dom.Color.re_hex3,"$1$1");}if(H!=="transparent"&&H.indexOf("#")<0){H="#"+H;}return H.toLowerCase();}};}());YAHOO.register("dom",YAHOO.util.Dom,{version:"2.7.0",build:"1796"});YAHOO.util.CustomEvent=function(D,C,B,A){this.type=D;this.scope=C||window;this.silent=B;this.signature=A||YAHOO.util.CustomEvent.LIST;this.subscribers=[];if(!this.silent){}var E="_YUICEOnSubscribe";if(D!==E){this.subscribeEvent=new YAHOO.util.CustomEvent(E,this,true);}this.lastError=null;};YAHOO.util.CustomEvent.LIST=0;YAHOO.util.CustomEvent.FLAT=1;YAHOO.util.CustomEvent.prototype={subscribe:function(A,B,C){if(!A){throw new Error("Invalid callback for subscriber to '"+this.type+"'");}if(this.subscribeEvent){this.subscribeEvent.fire(A,B,C);}this.subscribers.push(new YAHOO.util.Subscriber(A,B,C));},unsubscribe:function(D,F){if(!D){return this.unsubscribeAll();}var E=false;for(var B=0,A=this.subscribers.length;B<A;++B){var C=this.subscribers[B];if(C&&C.contains(D,F)){this._delete(B);E=true;}}return E;},fire:function(){this.lastError=null;var K=[],E=this.subscribers.length;if(!E&&this.silent){return true;}var I=[].slice.call(arguments,0),G=true,D,J=false;if(!this.silent){}var C=this.subscribers.slice(),A=YAHOO.util.Event.throwErrors;for(D=0;D<E;++D){var M=C[D];if(!M){J=true;}else{if(!this.silent){}var L=M.getScope(this.scope);if(this.signature==YAHOO.util.CustomEvent.FLAT){var B=null;if(I.length>0){B=I[0];}try{G=M.fn.call(L,B,M.obj);}catch(F){this.lastError=F;if(A){throw F;}}}else{try{G=M.fn.call(L,this.type,I,M.obj);}catch(H){this.lastError=H;if(A){throw H;}}}if(false===G){if(!this.silent){}break;}}}return(G!==false);},unsubscribeAll:function(){var A=this.subscribers.length,B;for(B=A-1;B>-1;B--){this._delete(B);}this.subscribers=[];return A;},_delete:function(A){var B=this.subscribers[A];if(B){delete B.fn;delete B.obj;}this.subscribers.splice(A,1);},toString:function(){return"CustomEvent: "+"'"+this.type+"', "+"context: "+this.scope;}};YAHOO.util.Subscriber=function(A,B,C){this.fn=A;this.obj=YAHOO.lang.isUndefined(B)?null:B;this.overrideContext=C;};YAHOO.util.Subscriber.prototype.getScope=function(A){if(this.overrideContext){if(this.overrideContext===true){return this.obj;}else{return this.overrideContext;}}return A;};YAHOO.util.Subscriber.prototype.contains=function(A,B){if(B){return(this.fn==A&&this.obj==B);}else{return(this.fn==A);}};YAHOO.util.Subscriber.prototype.toString=function(){return"Subscriber { obj: "+this.obj+", overrideContext: "+(this.overrideContext||"no")+" }";};if(!YAHOO.util.Event){YAHOO.util.Event=function(){var H=false;var I=[];var J=[];var G=[];var E=[];var C=0;var F=[];var B=[];var A=0;var D={63232:38,63233:40,63234:37,63235:39,63276:33,63277:34,25:9};var K=YAHOO.env.ua.ie?"focusin":"focus";var L=YAHOO.env.ua.ie?"focusout":"blur";return{POLL_RETRYS:2000,POLL_INTERVAL:20,EL:0,TYPE:1,FN:2,WFN:3,UNLOAD_OBJ:3,ADJ_SCOPE:4,OBJ:5,OVERRIDE:6,lastError:null,isSafari:YAHOO.env.ua.webkit,webkit:YAHOO.env.ua.webkit,isIE:YAHOO.env.ua.ie,_interval:null,_dri:null,DOMReady:false,throwErrors:false,startInterval:function(){if(!this._interval){var M=this;var N=function(){M._tryPreloadAttach();};this._interval=setInterval(N,this.POLL_INTERVAL);}},onAvailable:function(S,O,Q,R,P){var M=(YAHOO.lang.isString(S))?[S]:S;for(var N=0;N<M.length;N=N+1){F.push({id:M[N],fn:O,obj:Q,overrideContext:R,checkReady:P});}C=this.POLL_RETRYS;this.startInterval();},onContentReady:function(P,M,N,O){this.onAvailable(P,M,N,O,true);},onDOMReady:function(M,N,O){if(this.DOMReady){setTimeout(function(){var P=window;if(O){if(O===true){P=N;}else{P=O;}}M.call(P,"DOMReady",[],N);},0);}else{this.DOMReadyEvent.subscribe(M,N,O);}},_addListener:function(O,M,Y,S,W,b){if(!Y||!Y.call){return false;}if(this._isValidCollection(O)){var Z=true;for(var T=0,V=O.length;T<V;++T){Z=this.on(O[T],M,Y,S,W)&&Z;}return Z;}else{if(YAHOO.lang.isString(O)){var R=this.getEl(O);if(R){O=R;}else{this.onAvailable(O,function(){YAHOO.util.Event.on(O,M,Y,S,W);});return true;}}}if(!O){return false;}if("unload"==M&&S!==this){J[J.length]=[O,M,Y,S,W];return true;}var N=O;if(W){if(W===true){N=S;}else{N=W;}}var P=function(c){return Y.call(N,YAHOO.util.Event.getEvent(c,O),S);};var a=[O,M,Y,P,N,S,W];var U=I.length;I[U]=a;if(this.useLegacyEvent(O,M)){var Q=this.getLegacyIndex(O,M);if(Q==-1||O!=G[Q][0]){Q=G.length;B[O.id+M]=Q;G[Q]=[O,M,O["on"+M]];E[Q]=[];O["on"+M]=function(c){YAHOO.util.Event.fireLegacyEvent(YAHOO.util.Event.getEvent(c),Q);};}E[Q].push(a);}else{try{this._simpleAdd(O,M,P,b);}catch(X){this.lastError=X;this.removeListener(O,M,Y);return false;}}return true;},addListener:function(N,Q,M,O,P){return this._addListener(N,Q,M,O,P,false);},addFocusListener:function(N,M,O,P){return this._addListener(N,K,M,O,P,true);},removeFocusListener:function(N,M){return this.removeListener(N,K,M);},addBlurListener:function(N,M,O,P){return this._addListener(N,L,M,O,P,true);},removeBlurListener:function(N,M){return this.removeListener(N,L,M);},fireLegacyEvent:function(R,P){var T=true,M,V,U,N,S;V=E[P].slice();for(var O=0,Q=V.length;O<Q;++O){U=V[O];if(U&&U[this.WFN]){N=U[this.ADJ_SCOPE];S=U[this.WFN].call(N,R);T=(T&&S);}}M=G[P];if(M&&M[2]){M[2](R);}return T;},getLegacyIndex:function(N,O){var M=this.generateId(N)+O;if(typeof B[M]=="undefined"){return -1;}else{return B[M];}},useLegacyEvent:function(M,N){return(this.webkit&&this.webkit<419&&("click"==N||"dblclick"==N));},removeListener:function(N,M,V){var Q,T,X;if(typeof N=="string"){N=this.getEl(N);}else{if(this._isValidCollection(N)){var W=true;for(Q=N.length-1;Q>-1;Q--){W=(this.removeListener(N[Q],M,V)&&W);}return W;}}if(!V||!V.call){return this.purgeElement(N,false,M);}if("unload"==M){for(Q=J.length-1;Q>-1;Q--){X=J[Q];if(X&&X[0]==N&&X[1]==M&&X[2]==V){J.splice(Q,1);return true;}}return false;}var R=null;var S=arguments[3];if("undefined"===typeof S){S=this._getCacheIndex(N,M,V);}if(S>=0){R=I[S];}if(!N||!R){return false;}if(this.useLegacyEvent(N,M)){var P=this.getLegacyIndex(N,M);var O=E[P];if(O){for(Q=0,T=O.length;Q<T;++Q){X=O[Q];if(X&&X[this.EL]==N&&X[this.TYPE]==M&&X[this.FN]==V){O.splice(Q,1);break;}}}}else{try{this._simpleRemove(N,M,R[this.WFN],false);}catch(U){this.lastError=U;return false;}}delete I[S][this.WFN];delete I[S][this.FN];
I.splice(S,1);return true;},getTarget:function(O,N){var M=O.target||O.srcElement;return this.resolveTextNode(M);},resolveTextNode:function(N){try{if(N&&3==N.nodeType){return N.parentNode;}}catch(M){}return N;},getPageX:function(N){var M=N.pageX;if(!M&&0!==M){M=N.clientX||0;if(this.isIE){M+=this._getScrollLeft();}}return M;},getPageY:function(M){var N=M.pageY;if(!N&&0!==N){N=M.clientY||0;if(this.isIE){N+=this._getScrollTop();}}return N;},getXY:function(M){return[this.getPageX(M),this.getPageY(M)];},getRelatedTarget:function(N){var M=N.relatedTarget;if(!M){if(N.type=="mouseout"){M=N.toElement;}else{if(N.type=="mouseover"){M=N.fromElement;}}}return this.resolveTextNode(M);},getTime:function(O){if(!O.time){var N=new Date().getTime();try{O.time=N;}catch(M){this.lastError=M;return N;}}return O.time;},stopEvent:function(M){this.stopPropagation(M);this.preventDefault(M);},stopPropagation:function(M){if(M.stopPropagation){M.stopPropagation();}else{M.cancelBubble=true;}},preventDefault:function(M){if(M.preventDefault){M.preventDefault();}else{M.returnValue=false;}},getEvent:function(O,M){var N=O||window.event;if(!N){var P=this.getEvent.caller;while(P){N=P.arguments[0];if(N&&Event==N.constructor){break;}P=P.caller;}}return N;},getCharCode:function(N){var M=N.keyCode||N.charCode||0;if(YAHOO.env.ua.webkit&&(M in D)){M=D[M];}return M;},_getCacheIndex:function(Q,R,P){for(var O=0,N=I.length;O<N;O=O+1){var M=I[O];if(M&&M[this.FN]==P&&M[this.EL]==Q&&M[this.TYPE]==R){return O;}}return -1;},generateId:function(M){var N=M.id;if(!N){N="yuievtautoid-"+A;++A;M.id=N;}return N;},_isValidCollection:function(N){try{return(N&&typeof N!=="string"&&N.length&&!N.tagName&&!N.alert&&typeof N[0]!=="undefined");}catch(M){return false;}},elCache:{},getEl:function(M){return(typeof M==="string")?document.getElementById(M):M;},clearCache:function(){},DOMReadyEvent:new YAHOO.util.CustomEvent("DOMReady",this),_load:function(N){if(!H){H=true;var M=YAHOO.util.Event;M._ready();M._tryPreloadAttach();}},_ready:function(N){var M=YAHOO.util.Event;if(!M.DOMReady){M.DOMReady=true;M.DOMReadyEvent.fire();M._simpleRemove(document,"DOMContentLoaded",M._ready);}},_tryPreloadAttach:function(){if(F.length===0){C=0;if(this._interval){clearInterval(this._interval);this._interval=null;}return;}if(this.locked){return;}if(this.isIE){if(!this.DOMReady){this.startInterval();return;}}this.locked=true;var S=!H;if(!S){S=(C>0&&F.length>0);}var R=[];var T=function(V,W){var U=V;if(W.overrideContext){if(W.overrideContext===true){U=W.obj;}else{U=W.overrideContext;}}W.fn.call(U,W.obj);};var N,M,Q,P,O=[];for(N=0,M=F.length;N<M;N=N+1){Q=F[N];if(Q){P=this.getEl(Q.id);if(P){if(Q.checkReady){if(H||P.nextSibling||!S){O.push(Q);F[N]=null;}}else{T(P,Q);F[N]=null;}}else{R.push(Q);}}}for(N=0,M=O.length;N<M;N=N+1){Q=O[N];T(this.getEl(Q.id),Q);}C--;if(S){for(N=F.length-1;N>-1;N--){Q=F[N];if(!Q||!Q.id){F.splice(N,1);}}this.startInterval();}else{if(this._interval){clearInterval(this._interval);this._interval=null;}}this.locked=false;},purgeElement:function(Q,R,T){var O=(YAHOO.lang.isString(Q))?this.getEl(Q):Q;var S=this.getListeners(O,T),P,M;if(S){for(P=S.length-1;P>-1;P--){var N=S[P];this.removeListener(O,N.type,N.fn);}}if(R&&O&&O.childNodes){for(P=0,M=O.childNodes.length;P<M;++P){this.purgeElement(O.childNodes[P],R,T);}}},getListeners:function(O,M){var R=[],N;if(!M){N=[I,J];}else{if(M==="unload"){N=[J];}else{N=[I];}}var T=(YAHOO.lang.isString(O))?this.getEl(O):O;for(var Q=0;Q<N.length;Q=Q+1){var V=N[Q];if(V){for(var S=0,U=V.length;S<U;++S){var P=V[S];if(P&&P[this.EL]===T&&(!M||M===P[this.TYPE])){R.push({type:P[this.TYPE],fn:P[this.FN],obj:P[this.OBJ],adjust:P[this.OVERRIDE],scope:P[this.ADJ_SCOPE],index:S});}}}}return(R.length)?R:null;},_unload:function(T){var N=YAHOO.util.Event,Q,P,O,S,R,U=J.slice(),M;for(Q=0,S=J.length;Q<S;++Q){O=U[Q];if(O){M=window;if(O[N.ADJ_SCOPE]){if(O[N.ADJ_SCOPE]===true){M=O[N.UNLOAD_OBJ];}else{M=O[N.ADJ_SCOPE];}}O[N.FN].call(M,N.getEvent(T,O[N.EL]),O[N.UNLOAD_OBJ]);U[Q]=null;}}O=null;M=null;J=null;if(I){for(P=I.length-1;P>-1;P--){O=I[P];if(O){N.removeListener(O[N.EL],O[N.TYPE],O[N.FN],P);}}O=null;}G=null;N._simpleRemove(window,"unload",N._unload);},_getScrollLeft:function(){return this._getScroll()[1];},_getScrollTop:function(){return this._getScroll()[0];},_getScroll:function(){var M=document.documentElement,N=document.body;if(M&&(M.scrollTop||M.scrollLeft)){return[M.scrollTop,M.scrollLeft];}else{if(N){return[N.scrollTop,N.scrollLeft];}else{return[0,0];}}},regCE:function(){},_simpleAdd:function(){if(window.addEventListener){return function(O,P,N,M){O.addEventListener(P,N,(M));};}else{if(window.attachEvent){return function(O,P,N,M){O.attachEvent("on"+P,N);};}else{return function(){};}}}(),_simpleRemove:function(){if(window.removeEventListener){return function(O,P,N,M){O.removeEventListener(P,N,(M));};}else{if(window.detachEvent){return function(N,O,M){N.detachEvent("on"+O,M);};}else{return function(){};}}}()};}();(function(){var EU=YAHOO.util.Event;EU.on=EU.addListener;EU.onFocus=EU.addFocusListener;EU.onBlur=EU.addBlurListener;
/* DOMReady: based on work by: Dean Edwards/John Resig/Matthias Miller */
if(EU.isIE){YAHOO.util.Event.onDOMReady(YAHOO.util.Event._tryPreloadAttach,YAHOO.util.Event,true);var n=document.createElement("p");EU._dri=setInterval(function(){try{n.doScroll("left");clearInterval(EU._dri);EU._dri=null;EU._ready();n=null;}catch(ex){}},EU.POLL_INTERVAL);}else{if(EU.webkit&&EU.webkit<525){EU._dri=setInterval(function(){var rs=document.readyState;if("loaded"==rs||"complete"==rs){clearInterval(EU._dri);EU._dri=null;EU._ready();}},EU.POLL_INTERVAL);}else{EU._simpleAdd(document,"DOMContentLoaded",EU._ready);}}EU._simpleAdd(window,"load",EU._load);EU._simpleAdd(window,"unload",EU._unload);EU._tryPreloadAttach();})();}YAHOO.util.EventProvider=function(){};YAHOO.util.EventProvider.prototype={__yui_events:null,__yui_subscribers:null,subscribe:function(A,C,F,E){this.__yui_events=this.__yui_events||{};var D=this.__yui_events[A];if(D){D.subscribe(C,F,E);
}else{this.__yui_subscribers=this.__yui_subscribers||{};var B=this.__yui_subscribers;if(!B[A]){B[A]=[];}B[A].push({fn:C,obj:F,overrideContext:E});}},unsubscribe:function(C,E,G){this.__yui_events=this.__yui_events||{};var A=this.__yui_events;if(C){var F=A[C];if(F){return F.unsubscribe(E,G);}}else{var B=true;for(var D in A){if(YAHOO.lang.hasOwnProperty(A,D)){B=B&&A[D].unsubscribe(E,G);}}return B;}return false;},unsubscribeAll:function(A){return this.unsubscribe(A);},createEvent:function(G,D){this.__yui_events=this.__yui_events||{};var A=D||{};var I=this.__yui_events;if(I[G]){}else{var H=A.scope||this;var E=(A.silent);var B=new YAHOO.util.CustomEvent(G,H,E,YAHOO.util.CustomEvent.FLAT);I[G]=B;if(A.onSubscribeCallback){B.subscribeEvent.subscribe(A.onSubscribeCallback);}this.__yui_subscribers=this.__yui_subscribers||{};var F=this.__yui_subscribers[G];if(F){for(var C=0;C<F.length;++C){B.subscribe(F[C].fn,F[C].obj,F[C].overrideContext);}}}return I[G];},fireEvent:function(E,D,A,C){this.__yui_events=this.__yui_events||{};var G=this.__yui_events[E];if(!G){return null;}var B=[];for(var F=1;F<arguments.length;++F){B.push(arguments[F]);}return G.fire.apply(G,B);},hasEvent:function(A){if(this.__yui_events){if(this.__yui_events[A]){return true;}}return false;}};(function(){var A=YAHOO.util.Event,C=YAHOO.lang;YAHOO.util.KeyListener=function(D,I,E,F){if(!D){}else{if(!I){}else{if(!E){}}}if(!F){F=YAHOO.util.KeyListener.KEYDOWN;}var G=new YAHOO.util.CustomEvent("keyPressed");this.enabledEvent=new YAHOO.util.CustomEvent("enabled");this.disabledEvent=new YAHOO.util.CustomEvent("disabled");if(C.isString(D)){D=document.getElementById(D);}if(C.isFunction(E)){G.subscribe(E);}else{G.subscribe(E.fn,E.scope,E.correctScope);}function H(O,N){if(!I.shift){I.shift=false;}if(!I.alt){I.alt=false;}if(!I.ctrl){I.ctrl=false;}if(O.shiftKey==I.shift&&O.altKey==I.alt&&O.ctrlKey==I.ctrl){var J,M=I.keys,L;if(YAHOO.lang.isArray(M)){for(var K=0;K<M.length;K++){J=M[K];L=A.getCharCode(O);if(J==L){G.fire(L,O);break;}}}else{L=A.getCharCode(O);if(M==L){G.fire(L,O);}}}}this.enable=function(){if(!this.enabled){A.on(D,F,H);this.enabledEvent.fire(I);}this.enabled=true;};this.disable=function(){if(this.enabled){A.removeListener(D,F,H);this.disabledEvent.fire(I);}this.enabled=false;};this.toString=function(){return"KeyListener ["+I.keys+"] "+D.tagName+(D.id?"["+D.id+"]":"");};};var B=YAHOO.util.KeyListener;B.KEYDOWN="keydown";B.KEYUP="keyup";B.KEY={ALT:18,BACK_SPACE:8,CAPS_LOCK:20,CONTROL:17,DELETE:46,DOWN:40,END:35,ENTER:13,ESCAPE:27,HOME:36,LEFT:37,META:224,NUM_LOCK:144,PAGE_DOWN:34,PAGE_UP:33,PAUSE:19,PRINTSCREEN:44,RIGHT:39,SCROLL_LOCK:145,SHIFT:16,SPACE:32,TAB:9,UP:38};})();YAHOO.register("event",YAHOO.util.Event,{version:"2.7.0",build:"1796"});YAHOO.register("yahoo-dom-event", YAHOO, {version: "2.7.0", build: "1796"});
/* kissy suggest */
var KISSY=window.KISSY||{};(function(NS){var Y=YAHOO.util,Dom=Y.Dom,Event=Y.Event,Lang=YAHOO.lang,head=document.getElementsByTagName("head")[0],ie=YAHOO.env.ua.ie,ie6=(ie===6),CALLBACK_STR="KISSY.Suggest.callback",STYLE_ID="suggest-style",CONTAINER_CLASS="suggest-container",KEY_EL_CLASS="suggest-key",RESULT_EL_CLASS="suggest-result",SELECTED_ITEM_CLASS="selected",BOTTOM_CLASS="suggest-bottom",CLOSE_BTN_CLASS="suggest-close-btn",SHIM_CLASS="suggest-shim",BEFORE_DATA_REQUEST="beforeDataRequest",ON_DATA_RETURN="onDataReturn",BEFORE_SHOW="beforeShow",ON_ITEM_SELECT="onItemSelect",defaultConfig={containerClass:"",containerWidth:"auto",resultFormat:"约%result%条结果",showCloseBtn:false,closeBtnText:"关闭",useShim:ie6,timerDelay:200,autoFocus:false,submitFormOnClickSelect:true};NS.Suggest=function(textInput,dataSource,config){this.textInput=Dom.get(textInput);this.dataSource=dataSource;this.JSONDataSource=Lang.isObject(dataSource)?dataSource:null;this.returnedData=null;this.config=Lang.merge(defaultConfig,config||{});this.container=null;this.query="";this.queryParams="";this._timer=null;this._isRunning=false;this.dataScript=null;this._dataCache={};this._latestScriptTime="";this._scriptDataIsOut=false;this._onKeyboardSelecting=false;this.selectedItem=null;this._init();};Lang.augmentObject(NS.Suggest.prototype,{_init:function(){this._initTextInput();this._initContainer();if(this.config.useShim)this._initShim();this._initStyle();this.createEvent(BEFORE_DATA_REQUEST);this.createEvent(ON_DATA_RETURN);this.createEvent(BEFORE_SHOW);this.createEvent(ON_ITEM_SELECT);this._initResizeEvent();},_initTextInput:function(){var instance=this;this.textInput.setAttribute("autocomplete","off");Event.on(this.textInput,"focus",function(){instance.start();});Event.on(this.textInput,"blur",function(){instance.stop();instance.hide();});if(this.config.autoFocus)this.textInput.focus();var pressingCount=0;Event.on(this.textInput,"keydown",function(ev){var keyCode=ev.charCode||ev.keyCode;switch(keyCode){case 27:instance.hide();instance.textInput.value=instance.query;break;case 13:instance.textInput.blur();if(instance._onKeyboardSelecting){if(instance.textInput.value==instance._getSelectedItemKey()){instance.fireEvent(ON_ITEM_SELECT,instance.textInput.value);}}
instance._submitForm();break;case 40:case 38:if(pressingCount++==0){if(instance._isRunning)instance.stop();instance._onKeyboardSelecting=true;instance.selectItem(keyCode==40);}else if(pressingCount==3){pressingCount=0;}
break;}
if(keyCode!=40&&keyCode!=38){if(!instance._isRunning){instance.start();}
instance._onKeyboardSelecting=false;}});Event.on(this.textInput,"keyup",function(){pressingCount=0;});},_initContainer:function(){var container=document.createElement("div"),customContainerClass=this.config.containerClass;container.className=CONTAINER_CLASS;if(customContainerClass){container.className+=" "+customContainerClass;}
container.style.position="absolute";container.style.visibility="hidden";this.container=container;this._setContainerRegion();this._initContainerEvent();document.body.insertBefore(container,document.body.firstChild);},_setContainerRegion:function(){var r=Dom.getRegion(this.textInput);var left=r.left,w=r.right-left-2;var docMode=document.documentMode;if(docMode===7&&(ie===7||ie===8)){left-=2;}else if(YAHOO.env.ua.gecko){left++;}
this.container.style.left=left+"px";this.container.style.top=r.bottom+"px";if(this.config.containerWidth=="auto"){this.container.style.width=w+"px";}else{this.container.style.width=this.config.containerWidth;}},_initContainerEvent:function(){var instance=this;Event.on(this.container,"mousemove",function(ev){var target=Event.getTarget(ev);if(target.nodeName!="LI"){target=Dom.getAncestorByTagName(target,"li");}
if(Dom.isAncestor(instance.container,target)){if(target!=instance.selectedItem){instance._removeSelectedItem();instance._setSelectedItem(target);}}});var mouseDownItem=null;this.container.onmousedown=function(e){e=e||window.event;mouseDownItem=e.target||e.srcElement;instance.textInput.onbeforedeactivate=function(){window.event.returnValue=false;instance.textInput.onbeforedeactivate=null;};return false;};Event.on(this.container,"mouseup",function(ev){if(!instance._isInContainer(Event.getXY(ev)))return;var target=Event.getTarget(ev);if(target!=mouseDownItem)return;if(target.className==CLOSE_BTN_CLASS){instance.hide();return;}
if(target.nodeName!="LI"){target=Dom.getAncestorByTagName(target,"li");}
if(Dom.isAncestor(instance.container,target)){instance._updateInputFromSelectItem(target);instance.fireEvent(ON_ITEM_SELECT,instance.textInput.value);instance.textInput.blur();instance._submitForm();}});},_submitForm:function(){if(this.config.submitFormOnClickSelect){var form=this.textInput.form;if(!form)return;if(document.createEvent){var evObj=document.createEvent("MouseEvents");evObj.initEvent("submit",true,false);form.dispatchEvent(evObj);}
else if(document.createEventObject){form.fireEvent("onsubmit");}
form.submit();}},_isInContainer:function(p){var r=Dom.getRegion(this.container);return p[0]>=r.left&&p[0]<=r.right&&p[1]>=r.top&&p[1]<=r.bottom;},_initShim:function(){var iframe=document.createElement("iframe");iframe.src="about:blank";iframe.className=SHIM_CLASS;iframe.style.position="absolute";iframe.style.visibility="hidden";iframe.style.border="none";this.container.shim=iframe;this._setShimRegion();document.body.insertBefore(iframe,document.body.firstChild);},_setShimRegion:function(){var container=this.container,shim=container.shim;if(shim){shim.style.left=(parseInt(container.style.left)-2)+"px";shim.style.top=container.style.top;shim.style.width=(parseInt(container.style.width)+2)+"px";}},_initStyle:function(){var styleEl=Dom.get(STYLE_ID);if(styleEl)return;var style=".suggest-container{background:white;border:1px solid #999;z-index:99999}";style+=".suggest-shim{z-index:99998}";style+=".suggest-container li{color:#404040;padding:1px 0 2px;font-size:12px;line-height:18px;float:left;width:100%}";style+=".suggest-container li.selected{background-color:#39F;cursor:default}";style+=".suggest-key{float:left;text-align:left;padding-left:5px}";style+=".suggest-result{float:right;text-align:right;padding-right:5px;color:green}";style+=".suggest-container li.selected span{color:#FFF;cursor:default}";style+=".suggest-bottom{padding:0 5px 5px}";style+=".suggest-close-btn{float:right}";style+=".suggest-container li,.suggest-bottom{overflow:hidden;zoom:1;clear:both}";style+=".suggest-container{*margin-left:2px;_margin-left:-2px;_margin-top:-3px}";styleEl=document.createElement("style");styleEl.id=STYLE_ID;styleEl.type="text/css";head.appendChild(styleEl);if(styleEl.styleSheet){styleEl.styleSheet.cssText=style;}else{styleEl.appendChild(document.createTextNode(style));}},_initResizeEvent:function(){var instance=this,resizeTimer;Event.on(window,"resize",function(){if(resizeTimer){clearTimeout(resizeTimer);}
resizeTimer=setTimeout(function(){instance._setContainerRegion();instance._setShimRegion();},50);});},start:function(){NS.Suggest.focusInstance=this;var instance=this;instance._timer=setTimeout(function(){instance.updateData();instance._timer=setTimeout(arguments.callee,instance.config.timerDelay);},instance.config.timerDelay);this._isRunning=true;},stop:function(){NS.Suggest.focusInstance=null;clearTimeout(this._timer);this._isRunning=false;},show:function(){if(this.isVisible())return;var container=this.container,shim=container.shim;container.style.visibility="";if(shim){if(!shim.style.height){var r=Dom.getRegion(container);shim.style.height=(r.bottom-r.top-2)+"px";}
shim.style.visibility="";}},hide:function(){if(!this.isVisible())return;var container=this.container,shim=container.shim;if(shim)shim.style.visibility="hidden";container.style.visibility="hidden";},isVisible:function(){return this.container.style.visibility!="hidden";},updateData:function(){if(!this._needUpdate())return;this._updateQueryValueFromInput();var q=this.query;if(!Lang.trim(q).length){this._fillContainer("");this.hide();return;}
if(typeof this._dataCache[q]!="undefined"){this.returnedData="using cache";this._fillContainer(this._dataCache[q]);this._displayContainer();}else if(this.JSONDataSource){this.handleResponse(this.JSONDataSource[q]);}else{this.requestData();}},_needUpdate:function(){return this.textInput.value!=this.query;},requestData:function(){if(!ie)this.dataScript=null;if(!this.dataScript){var script=document.createElement("script");script.type="text/javascript";script.charset="utf-8";head.insertBefore(script,head.firstChild);this.dataScript=script;if(!ie){var t=new Date().getTime();this._latestScriptTime=t;script.setAttribute("time",t);Event.on(script,"load",function(){this._scriptDataIsOut=script.getAttribute("time")!=this._latestScriptTime;},this,true);}}
this.queryParams="q="+encodeURIComponent(this.query)+"&code=utf-8&callback="+CALLBACK_STR;this.fireEvent(BEFORE_DATA_REQUEST,this.query);this.dataScript.src=this.dataSource+"?"+this.queryParams;},handleResponse:function(data){if(this._scriptDataIsOut)return;this.returnedData=data;this.fireEvent(ON_DATA_RETURN,data);this.returnedData=this.formatData(this.returnedData);var content="";var len=this.returnedData.length;if(len>0){var list=document.createElement("ol");for(var i=0;i<len;++i){var itemData=this.returnedData[i];var li=this.formatItem(itemData["key"],itemData["result"]);li.setAttribute("key",itemData["key"]);list.appendChild(li);}
content=list;}
this._fillContainer(content);if(len>0)this.appendBottom();if(Lang.trim(this.container.innerHTML)){this.fireEvent(BEFORE_SHOW,this.container);}
this._dataCache[this.query]=this.container.innerHTML;this._displayContainer();},formatData:function(data){var arr=[];if(!data)return arr;if(Lang.isArray(data["result"]))data=data["result"];var len=data.length;if(!len)return arr;var item;for(var i=0;i<len;++i){item=data[i];if(Lang.isString(item)){arr[i]={"key":item};}else if(Lang.isArray(item)&&item.length>=2){arr[i]={"key":item[0],"result":item[1]};}else{arr[i]=item;}}
return arr;},formatItem:function(key,result){var li=document.createElement("li");var keyEl=document.createElement("span");keyEl.className=KEY_EL_CLASS;keyEl.appendChild(document.createTextNode(key));li.appendChild(keyEl);if(typeof result!="undefined"){var resultText=this.config.resultFormat.replace("%result%",result);if(Lang.trim(resultText)){var resultEl=document.createElement("span");resultEl.className=RESULT_EL_CLASS;resultEl.appendChild(document.createTextNode(resultText));li.appendChild(resultEl);}}
return li;},appendBottom:function(){var bottom=document.createElement("div");bottom.className=BOTTOM_CLASS;if(this.config.showCloseBtn){var closeBtn=document.createElement("a");closeBtn.href="javascript: void(0)";closeBtn.setAttribute("target","_self");closeBtn.className=CLOSE_BTN_CLASS;closeBtn.appendChild(document.createTextNode(this.config.closeBtnText));bottom.appendChild(closeBtn);}
if(Lang.trim(bottom.innerHTML)){this.container.appendChild(bottom);}},_fillContainer:function(content){if(content.nodeType==1){this.container.innerHTML="";this.container.appendChild(content);}else{this.container.innerHTML=content;}
this.selectedItem=null;},_displayContainer:function(){if(Lang.trim(this.container.innerHTML)){this.show();}else{this.hide();}},selectItem:function(down){var items=this.container.getElementsByTagName("li");if(items.length==0)return;if(!this.isVisible()){this.show();return;}
var newSelectedItem;if(!this.selectedItem){newSelectedItem=items[down?0:items.length-1];}else{newSelectedItem=Dom[down?"getNextSibling":"getPreviousSibling"](this.selectedItem);if(!newSelectedItem){this.textInput.value=this.query;}}
this._removeSelectedItem();if(newSelectedItem){this._setSelectedItem(newSelectedItem);this._updateInputFromSelectItem();}},_removeSelectedItem:function(){Dom.removeClass(this.selectedItem,SELECTED_ITEM_CLASS);this.selectedItem=null;},_setSelectedItem:function(item){Dom.addClass((item),SELECTED_ITEM_CLASS);this.selectedItem=(item);},_getSelectedItemKey:function(){if(!this.selectedItem)return"";return this.selectedItem.getAttribute("key");},_updateQueryValueFromInput:function(){this.query=this.textInput.value;},_updateInputFromSelectItem:function(){this.textInput.value=this._getSelectedItemKey(this.selectedItem);}});Lang.augmentProto(NS.Suggest,Y.EventProvider);NS.Suggest.focusInstance=null;NS.Suggest.callback=function(data){if(!NS.Suggest.focusInstance)return;setTimeout(function(){NS.Suggest.focusInstance.handleResponse(data);},0);};})(KISSY);

/*初始化*/
$(function() {
   //头部初始化
    $(".top-my-mbb").hoverClass("my-mbb-over");
    $(".header-search-input").bind("focus",function(){
        $(".header-search-form").addClass("header-search-over");
    }).bind("blur",function(){
        $(".header-search-form").removeClass("header-search-over");
    });
    $(".header-search-input").foucsText();
    $(".main-nav li").hoverClass("over");
    $(".head-quickbuy").hoverClass("head-quickbuy-over");
    $(".sub-nav dl").hoverClass("s-over");
    
    load_user_logged_in();
    load_cart_goods_count();
    setMenu();
    
    //二级页面弹出大banner
    if ($("#js_ads_banner_top_slide").length) {
        var $slidebannertop = $("#js_ads_banner_top_slide"),
        $bannertop = $("#js_ads_banner_top"),
        startloadslide,
        startbanner,
        startbanner;
        startloadslide = setTimeout(function() {
            $slidebannertop.find('img').attr('src', $slidebannertop.find('img').attr('src2'));
        },
        2000);
        startbanner = setTimeout(function() {
            $bannertop.slideUp(1000);
            $slidebannertop.slideDown(1000);
        },
        2500);
        startbanner = setTimeout(function() {
            $slidebannertop.slideUp(1000,
            function() {
                $bannertop.slideDown(1000);
            });
        },
        8500);
    }
    
    if($("#input_goods_search_keyword").length>0 && typeof(SUGGEST_URL) !== "undefined" ){
        new KISSY.Suggest('input_goods_search_keyword',SUGGEST_URL,{autoFocus:false,resultFormat:'约%result%个商品'});
    }
    
    lazyload({defObj: ".lazybox"});
});

