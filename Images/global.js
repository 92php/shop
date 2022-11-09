/*
    @2011-8-08  by shuangzhu
    常用扩展及函数，依赖jquery.1.3.2
    全局变量说明：
        WEB_DIR:    当前执行目录
        CART_URL:   购物车数据查询路径
        APPS_URL:   部分应用调用接口路径
        USER_LOGIN： 用户是否登录 "1":登录 "0"未登录
*/

(function($){
    //使对象产生hover事件
    $.fn.hoverClass = function(b) {
        var a = this;
        a.each(function(c) {
            a.eq(c).hover(function() {
                $(this).addClass(b)
            },
            function() {
                $(this).removeClass(b)
            });
        });
        return a;
    };
    //输入框占位符效果
    $.fn.focusText = function(c) {
        var a = this;
        if(typeof(c) === "boolean" && !c){ //可以传入false取消占位符
            a.unbind("focus",_focus);
            a.unbind("blur",_blur);
            return;
        }
        var b = (c == null) ? $(a).val() : c;
        a.val(b);
        a.bind("focus",{"target":a,"placeholder":b},_focus);
        a.bind("blur",{"target":a,"placeholder":b},_blur);
        function _focus(event){
            var tar = event.data.target;
            var text = event.data.placeholder;
            if (tar.val() === text) {
                tar.val("")
            }
        }
        function _blur(event){
            var tar = event.data.target;
            var text = event.data.placeholder;
            if (tar.val() === "") {
                tar.val(text);
            }
        }
        return a;
    };
    //输入框焦点样式
    $.fn.focusChangeStyle = function(b) {
        var a = this;
        var b = (b == null) ? "it_focus": b;
        a.focus(function() {
            $(this).addClass(b)
        });
        a.blur(function() {
            $(this).removeClass(b)
        });
        return a
    };
    //设置图片统一大小
    $.fn.autoImgW = function(d) {
        var a = this;
        var b = (d == null) ? a.width() : d;
        var c = a.find("img");
        c.each(function(f) {
            var e = $(this).width();
            var g = $(this).height();
            var h = $(this).attr("src");
            if (e >= b) {
                $(this).css({
                    width: b,
                    height: g * (b / e)
                }).wrap("<a href=" + h + " target='_blank' title='点击在新窗口查看大图'></a>")
            }
        });
        return a;
    };
    //设置下拉跳转链接
    $.fn.openSelVal = function(b) {
        var a = this;
        a.change(function() {
            if (a.val() !== 0) {
                if (b === "self") {
                    window.location = a.val()
                } else {
                    window.open(a.val())
                }
            }
        });
        return a
    };
    //类似tab切换效果
    $.fn.overOnlyClass = function(b) {
        var a = this;
        a.each(function(c) {
            a.eq(c).mouseenter(function() {
                a.removeClass(b);
                $(this).addClass(b)
            })
        });
        return a
    };
    
    //广告切换插件 by yinlong
    $.fn.soChange = function(b) {
        b = $.extend({
            botPrev:null,//按钮上一个
			botNext:null,//按钮下一个
            changeType:'',//切换方式，可选：fade,slide，默认为fade
            slideTime:1000,//平滑过渡时间，默认为1000ms，为0或负值时，忽略changeType方式，切换效果为直接显示隐藏
            thumbObj: null, //导航元素
            thumbNowClass: "now", //导航当前项样式
            changeClass: null, //轮播主体如果以改变样方式显示请设置此项
            thumbOverEvent: true,//导航元素是否直接mouseover动作
            autoChange: true, //是否自动开始轮播
            clickFalse: true, //禁止导航点击冒泡
            overStop: true, //鼠标在导航时是否停止所有
            changeTime: 5000, //轮播间隔时间
            delayTime: 400, //导航上鼠标事件延迟时间
            start:1 //初始项
        },
        b || {});
        var h = this;
        var i;
        var k = h.length;
        var e = 0;
        var g = 0;
        var c = [];
        var f;
        var hasthumb;
        var thumb;
        
        if(b.thumbObj != null){
            hasthumb = true;
            thumb = $(b.thumbObj);
        }else{
            hasthumb = false;
        }
        
        if($(h).size()<=1){ //只有一张图或没有图，就不要显示导航和执行轮播了
            if (hasthumb) {
                thumb.remove();
            }
            return;
        }
        
        function d() {
            if (e != g) {
                
                if (hasthumb) {
                    thumb.removeClass(b.thumbNowClass).eq(g).addClass(b.thumbNowClass)
                }
                
                if (b.changeClass != null) {
                    h.eq(e).removeClass(b.changeClass);
                    h.eq(g).addClass(b.changeClass)
                } else {
                        
                    if(b.changeType=='fade' && b.slideTime > 0){
                        h.eq(g).fadeIn(b.slideTime);
                        h.eq(e).fadeOut(b.slideTime);
                    }else{
                        h.eq(g).css("visibility", "visible");
                        h.eq(e).css("visibility", "hidden")
                    }
                }
                e = g;
                if (b.autoChange == true) {
                    stopAll();
                    start();
                }
            }
        }
        function stopAll() {
            for (var i = 0; i < c.length; i++) {
                clearInterval(c[i])
            }
        }
        function start() {
            c.push(setInterval(j, b.changeTime))
        }
        function j() {
            g = (e + 1) % k;
            d();
        }
        
        //点击上一个
		if (b.botNext!=null) {
			$(b.botNext).click(function () {
				if(h.queue().length<1){
				runNext();}
				return false;
			});
		}

        //点击下一个
		if (b.botPrev!=null) {
			$(b.botPrev).click(function () {
				if(h.queue().length<1){
				g = (e + 1) % k;
				d();}
				return false;
		});
		}
        
        if (hasthumb) {
            if(thumb.index($("."+b.thumbNowClass)[0]) !== -1 ){ //如果设定首显项
                g = thumb.index($("."+b.thumbNowClass)[0]);
            }else{
                g = b.start-1; //没有首显项就使用配置信息的值
                thumb.removeClass(b.thumbNowClass).eq(0).addClass(b.thumbNowClass);
            }
            
            thumb.click(function() {
                g = thumb.index($(this));
                d();
                if (b.clickFalse == true) {
                    return false
                }
            });
            
            if (b.thumbOverEvent == true) {
                thumb.hover(function() {
                    g = thumb.index($(this));
                    f = setTimeout(function() {
                        d();
                        stopAll()
                    },
                    b.delayTime);
                    return false
                },
                function() {
                    clearTimeout(f);
                    return false
                })
            }
        }
        
        if (b.changeClass != null) {
            h.removeClass(b.changeClass).eq(g).addClass(b.changeClass)
        } else {
            if(b.changeType=='fade' && b.slideTime > 0){
                h.css("display", "none").eq(g).css("display", "block")
            }else{
                h.css("visibility", "hidden").eq(g).css("visibility", "visible")
            }
        }
        
        if (b.autoChange == true) {
            c.push(setInterval(j, b.changeTime));
            if (b.overStop == true) {
                h.mouseover(function() {
                    stopAll();
                    return false
                }).mouseout(function() {
                    start();
                    return false
                })
            }
        }
        
        d(); //初始化时就执行一下轮播
        
        this.stop = stopAll;
        this.start = start;
        h.bind("soChange",
        function(event, i) {
            g = i;
            d()
        });
        return this
    }
})(jQuery);

//lazyload
function lazyload(option) {
    var settings = {
        defObj: null,
        defHeight: -200
    };
    settings = $.extend(settings, option || {});
    var defHeight = settings.defHeight,
    defObj = (typeof settings.defObj == "object") ? settings.defObj.find("img") : $(settings.defObj).find("img");
    var pageTop = function() {
        return document.documentElement.clientHeight + Math.max(document.documentElement.scrollTop, document.body.scrollTop) - settings.defHeight
    };
    var imgLoad = function() {
        defObj.each(function() {
            if ($(this).offset().top <= pageTop()) {
                var src2 = $(this).attr("src2");
                if (src2) {
                    $(this).attr("src", src2).removeAttr("src2")
                }
            }
        })
    };
    imgLoad();
    $(window).bind("scroll",
    function() {
        imgLoad()
    })
}
$(function(){
    lazyload({defObj:".lazybox"});
})
function time() {
    return Math.round(new Date().getTime() / 1000)
}