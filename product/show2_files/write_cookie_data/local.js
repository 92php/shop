// Copyright (c) 2009, Baidu Inc. All rights reserved.
// 
// Licensed under the BSD License
// you may not use this file except in compliance with the License.
// You may obtain a copy of the License at
// 
//      http:// tangram.baidu.com/license.html
// 
// Unless required by applicable law or agreed to in writing, software
// distributed under the License is distributed on an "AS-IS" BASIS,
// WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
// See the License for the specific language governing permissions and
// limitations under the License.


 /**
 * @namespace T Tangram七巧板
 * @name T
 * @version 1.3.9
*/

/**
 * 声明baidu包
 * @author: allstar, erik, meizz, berg
 */
var T,
    baidu = T = baidu || {version: "1.3.9"}; 

//提出guid，防止在与老版本Tangram混用时
//在下一行错误的修改window[undefined]
baidu.guid = "$BAIDU$";

//Tangram可能被放在闭包中
//一些页面级别唯一的属性，需要挂载在window[baidu.guid]上
window[baidu.guid] = window[baidu.guid] || {};

/**
 * @namespace baidu.swf 操作flash对象的方法，包括创建flash对象、获取flash对象以及判断flash插件的版本号。
*/
baidu.swf = baidu.swf || {};


/**
 * 浏览器支持的flash插件版本
 * @property version 浏览器支持的flash插件版本
 * @grammar baidu.swf.version 
 * @meta standard
 */
baidu.swf.version = (function () {
    var n = navigator;
    if (n.plugins && n.mimeTypes.length) {
        var plugin = n.plugins["Shockwave Flash"];
        if (plugin && plugin.description) {
            return plugin.description
                    .replace(/([a-zA-Z]|\s)+/, "")
                    .replace(/(\s)+r/, ".") + ".0";
        }
    } else if (window.ActiveXObject && !window.opera) {
        for (var i = 12; i >= 2; i--) {
            try {
                var c = new ActiveXObject('ShockwaveFlash.ShockwaveFlash.' + i);
                if (c) {
                    var version = c.GetVariable("$version");
                    return version.replace(/WIN/g,'').replace(/,/g,'.');
                }
            } catch(e) {}
        }
    }
})();
/**
 * @namespace baidu.string 操作字符串的方法。
 */
baidu.string = baidu.string || {};


/**
 * 对目标字符串进行html编码
 * @name baidu.string.encodeHTML
 * @function
 * @grammar baidu.string.encodeHTML(source)
 * @param {string} source 目标字符串
 * @remark
 * 编码字符有5个：&<>"'
 * @shortcut encodeHTML
 * @meta standard
 * @see baidu.string.decodeHTML
 *             
 * @returns {string} html编码后的字符串
 */
baidu.string.encodeHTML = function (source) {
    return String(source)
                .replace(/&/g,'&amp;')
                .replace(/</g,'&lt;')
                .replace(/>/g,'&gt;')
                .replace(/"/g, "&quot;")
                .replace(/'/g, "&#39;");
};

baidu.encodeHTML = baidu.string.encodeHTML;

/**
 * 创建flash对象的html字符串
 * @name baidu.swf.createHTML
 * @function
 * @grammar baidu.swf.createHTML(options)
 * 
 * @param {Object} 	options 					创建flash的选项参数
 * @param {string} 	options.id 					要创建的flash的标识
 * @param {string} 	options.url 				flash文件的url
 * @param {String} 	options.errorMessage 		未安装flash player或flash player版本号过低时的提示
 * @param {string} 	options.ver 				最低需要的flash player版本号
 * @param {string} 	options.width 				flash的宽度
 * @param {string} 	options.height 				flash的高度
 * @param {string} 	options.align 				flash的对齐方式，允许值：middle/left/right/top/bottom
 * @param {string} 	options.base 				设置用于解析swf文件中的所有相对路径语句的基本目录或URL
 * @param {string} 	options.bgcolor 			swf文件的背景色
 * @param {string} 	options.salign 				设置缩放的swf文件在由width和height设置定义的区域内的位置。允许值：l/r/t/b/tl/tr/bl/br
 * @param {boolean} options.menu 				是否显示右键菜单，允许值：true/false
 * @param {boolean} options.loop 				播放到最后一帧时是否重新播放，允许值： true/false
 * @param {boolean} options.play 				flash是否在浏览器加载时就开始播放。允许值：true/false
 * @param {string} 	options.quality 			设置flash播放的画质，允许值：low/medium/high/autolow/autohigh/best
 * @param {string} 	options.scale 				设置flash内容如何缩放来适应设置的宽高。允许值：showall/noborder/exactfit
 * @param {string} 	options.wmode 				设置flash的显示模式。允许值：window/opaque/transparent
 * @param {string} 	options.allowscriptaccess 	设置flash与页面的通信权限。允许值：always/never/sameDomain
 * @param {string} 	options.allownetworking 	设置swf文件中允许使用的网络API。允许值：all/internal/none
 * @param {boolean} options.allowfullscreen 	是否允许flash全屏。允许值：true/false
 * @param {boolean} options.seamlesstabbing 	允许设置执行无缝跳格，从而使用户能跳出flash应用程序。该参数只能在安装Flash7及更高版本的Windows中使用。允许值：true/false
 * @param {boolean} options.devicefont 			设置静态文本对象是否以设备字体呈现。允许值：true/false
 * @param {boolean} options.swliveconnect 		第一次加载flash时浏览器是否应启动Java。允许值：true/false
 * @param {Object} 	options.vars 				要传递给flash的参数，支持JSON或string类型。
 * 
 * @see baidu.swf.create
 * @meta standard
 * @returns {string} flash对象的html字符串
 */
baidu.swf.createHTML = function (options) {
    options = options || {};
    var version = baidu.swf.version, 
        needVersion = options['ver'] || '6.0.0', 
        vUnit1, vUnit2, i, k, len, item, tmpOpt = {},
        encodeHTML = baidu.string.encodeHTML;
    
    // 复制options，避免修改原对象
    for (k in options) {
        tmpOpt[k] = options[k];
    }
    options = tmpOpt;
    
    // 浏览器支持的flash插件版本判断
    if (version) {
        version = version.split('.');
        needVersion = needVersion.split('.');
        for (i = 0; i < 3; i++) {
            vUnit1 = parseInt(version[i], 10);
            vUnit2 = parseInt(needVersion[i], 10);
            if (vUnit2 < vUnit1) {
                break;
            } else if (vUnit2 > vUnit1) {
                return ''; // 需要更高的版本号
            }
        }
    } else {
        return ''; // 未安装flash插件
    }
    
    var vars = options['vars'],
        objProperties = ['classid', 'codebase', 'id', 'width', 'height', 'align'];
    
    // 初始化object标签需要的classid、codebase属性值
    options['align'] = options['align'] || 'middle';
    options['classid'] = 'clsid:d27cdb6e-ae6d-11cf-96b8-444553540000';
    options['codebase'] = 'http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0';
    options['movie'] = options['url'] || '';
    delete options['vars'];
    delete options['url'];
    
    // 初始化flashvars参数的值
    if ('string' == typeof vars) {
        options['flashvars'] = vars;
    } else {
        var fvars = [];
        for (k in vars) {
            item = vars[k];
            fvars.push(k + "=" + encodeURIComponent(item));
        }
        options['flashvars'] = fvars.join('&');
    }
    
    // 构建IE下支持的object字符串，包括属性和参数列表
    var str = ['<object '];
    for (i = 0, len = objProperties.length; i < len; i++) {
        item = objProperties[i];
        str.push(' ', item, '="', encodeHTML(options[item]), '"');
    }
    str.push('>');
    var params = {
        'wmode'             : 1,
        'scale'             : 1,
        'quality'           : 1,
        'play'              : 1,
        'loop'              : 1,
        'menu'              : 1,
        'salign'            : 1,
        'bgcolor'           : 1,
        'base'              : 1,
        'allowscriptaccess' : 1,
        'allownetworking'   : 1,
        'allowfullscreen'   : 1,
        'seamlesstabbing'   : 1,
        'devicefont'        : 1,
        'swliveconnect'     : 1,
        'flashvars'         : 1,
        'movie'             : 1
    };
    
    for (k in options) {
        item = options[k];
        k = k.toLowerCase();
        if (params[k] && (item || item === false || item === 0)) {
            str.push('<param name="' + k + '" value="' + encodeHTML(item) + '" />');
        }
    }
    
    // 使用embed时，flash地址的属性名是src，并且要指定embed的type和pluginspage属性
    options['src']  = options['movie'];
    options['name'] = options['id'];
    delete options['id'];
    delete options['movie'];
    delete options['classid'];
    delete options['codebase'];
    options['type'] = 'application/x-shockwave-flash';
    options['pluginspage'] = 'http://www.macromedia.com/go/getflashplayer';
    
    
    // 构建embed标签的字符串
    str.push('<embed');
    // 在firefox、opera、safari下，salign属性必须在scale属性之后，否则会失效
    // 经过讨论，决定采用BT方法，把scale属性的值先保存下来，最后输出
    var salign;
    for (k in options) {
        item = options[k];
        if (item || item === false || item === 0) {
            if ((new RegExp("^salign\x24", "i")).test(k)) {
                salign = item;
                continue;
            }
            
            str.push(' ', k, '="', encodeHTML(item), '"');
        }
    }
    
    if (salign) {
        str.push(' salign="', encodeHTML(salign), '"');
    }
    str.push('></embed></object>');
    
    return str.join('');
};


/**
 * 在页面中创建一个flash对象
 * @name baidu.swf.create
 * @function
 * @grammar baidu.swf.create(options[, container])
 * 
 * @param {Object} 	options 					创建flash的选项参数
 * @param {string} 	options.id 					要创建的flash的标识
 * @param {string} 	options.url 				flash文件的url
 * @param {String} 	options.errorMessage 		未安装flash player或flash player版本号过低时的提示
 * @param {string} 	options.ver 				最低需要的flash player版本号
 * @param {string} 	options.width 				flash的宽度
 * @param {string} 	options.height 				flash的高度
 * @param {string} 	options.align 				flash的对齐方式，允许值：middle/left/right/top/bottom
 * @param {string} 	options.base 				设置用于解析swf文件中的所有相对路径语句的基本目录或URL
 * @param {string} 	options.bgcolor 			swf文件的背景色
 * @param {string} 	options.salign 				设置缩放的swf文件在由width和height设置定义的区域内的位置。允许值：l/r/t/b/tl/tr/bl/br
 * @param {boolean} options.menu 				是否显示右键菜单，允许值：true/false
 * @param {boolean} options.loop 				播放到最后一帧时是否重新播放，允许值： true/false
 * @param {boolean} options.play 				flash是否在浏览器加载时就开始播放。允许值：true/false
 * @param {string} 	options.quality 			设置flash播放的画质，允许值：low/medium/high/autolow/autohigh/best
 * @param {string} 	options.scale 				设置flash内容如何缩放来适应设置的宽高。允许值：showall/noborder/exactfit
 * @param {string} 	options.wmode 				设置flash的显示模式。允许值：window/opaque/transparent
 * @param {string} 	options.allowscriptaccess 	设置flash与页面的通信权限。允许值：always/never/sameDomain
 * @param {string} 	options.allownetworking 	设置swf文件中允许使用的网络API。允许值：all/internal/none
 * @param {boolean} options.allowfullscreen 	是否允许flash全屏。允许值：true/false
 * @param {boolean} options.seamlesstabbing 	允许设置执行无缝跳格，从而使用户能跳出flash应用程序。该参数只能在安装Flash7及更高版本的Windows中使用。允许值：true/false
 * @param {boolean} options.devicefont 			设置静态文本对象是否以设备字体呈现。允许值：true/false
 * @param {boolean} options.swliveconnect 		第一次加载flash时浏览器是否应启动Java。允许值：true/false
 * @param {Object} 	options.vars 				要传递给flash的参数，支持JSON或string类型。
 * 
 * @param {HTMLElement|string} [container] 		flash对象的父容器元素，不传递该参数时在当前代码位置创建flash对象。
 * @meta standard
 * @see baidu.swf.createHTML,baidu.swf.getMovie
 */
baidu.swf.create = function (options, target) {
    options = options || {};
    var html = baidu.swf.createHTML(options) 
               || options['errorMessage'] 
               || '';
    if (target && 'string' == typeof target) {
        target = document.getElementById(target);
    }
    if (target) {
        target.innerHTML = html;
    } else {
        document.write(html);
    }
};


SWFObject_baidu = function(json, cid) {
	this.cid = cid;
	this.swfId = json.id;
	
	this.options = json;
	this.asObjects = {};
	this.onLoadInit = function(){};
	
	SWFObject_baidu.instances[this.swfId] = this;
};

SWFObject_baidu.prototype.load = function() {
	baidu.swf.create(this.options, this.cid);
};

SWFObject_baidu.prototype.getASObject = function(json) {
	return this.asObjects[json.asoId];
};

SWFObject_baidu.prototype.registerASObject = function(json) {
	var asoId = json.asoId;
	var swfId = this.swfId;
	return this.asObjects[asoId] = new ASObject_baidu({asoId : asoId, swfId : swfId});
};

SWFObject_baidu.prototype.getASObjectProperty = function(json) {
	if (this.swf == null) {
		this.swf = document[this.swfId] || window[this.swfId];
	}
	return this.swf.getASObjectProperty(json);
};

SWFObject_baidu.prototype.setASObjectProperty = function(json) {
	if (this.swf == null) {
		this.swf = document[this.swfId] || window[this.swfId];
	}
	this.swf.setASObjectProperty(json);
};

SWFObject_baidu.prototype.callASObjectMethod = function(json) {
	if (this.swf == null) {
		this.swf = document[this.swfId] || window[this.swfId];
	}
	return this.swf.callASObjectMethod(json);
};

SWFObject_baidu.instances = {};

SWFObject_baidu.getSWFObject = function(json) {
	return SWFObject_baidu.instances[json.swfId];
};

SWFObject_baidu.dispatchASObjectEvent = function(json) {
	var swfId = json.swfId;
	var asoId = json.asoId;
	var type = json.type;
	var data = json.data;
	
	var swfObject = SWFObject_baidu.getSWFObject({swfId : swfId});
	var targetObject = (asoId == undefined) ? swfObject : swfObject.getASObject({asoId : asoId});
	var callback = "on" + type.substr(0, 1).toUpperCase() + type.substr(1);
	if (targetObject[callback] != null) {
		targetObject[callback](data);
	}
};

SWFObject_baidu.registerASObject = function(json) {
	var swfId = json.swfId;
	var asoId = json.asoId;
	
	var swfObject = SWFObject_baidu.getSWFObject(json);
	swfObject.registerASObject(json);
};

ASObject_baidu = function(json) {
	this.swfId = json.swfId;
	this.asoId = json.asoId;
	this.swfObject = SWFObject_baidu.getSWFObject(json);
	
	if (ASObject_baidu.instances[this.swfId] == null) {
		ASObject_baidu.instances[this.swfId] = {};
	}
	ASObject_baidu.instances[this.swfId][this.asoId] = this;
};

ASObject_baidu.prototype.get = function(property) {
	return this.swfObject.getASObjectProperty({asoId : this.asoId, property : property});
};

ASObject_baidu.prototype.set = function(property, value) {
	this.swfObject.setASObjectProperty({asoId : this.asoId, property : property, value : value});
};

ASObject_baidu.prototype.call = function(method, parameters) {
	return this.swfObject.callASObjectMethod({asoId : this.asoId, method : method, parameters : parameters});
};

ASObject_baidu.instances = {};

window.baiduLS = window.baiduLS || {
	version : "1-0-0"
};

baiduLS.localStorage = baiduLS.localStorage || {
	onLoadInit : function(){}
};

/**
 * 加载
 * @param {Object} options 选项
 * @param {String} cid 容器id
 */
baiduLS.localStorage.load = function(options, cid) {
	baiduLS.localStorage.so = new SWFObject_baidu(options,cid);
	var so = baiduLS.localStorage.so;
	so.onLoadInit = function(json) {
		baiduLS.localStorage.ao = so.asObjects["localStorage"];
		if (baiduLS.localStorage.onLoadInit) {
			baiduLS.localStorage.onLoadInit();
		}
    };
    so.load();
};

/**
 * 读取
 * @param {String} id
 * @param {String} key
 * @return {Object|String|Number|Boolean}
 */
baiduLS.localStorage.read = function(id, key) {
	return baiduLS.localStorage.ao.call("read", [id, key]);
};

/**
 * 写数据
 * @param {String} id
 * @param {String} key
 * @param {Object|String|Number|Boolean} value
 * @return {Boolean} 是否成功
 */
baiduLS.localStorage.write = function(id, key, value) {
	return baiduLS.localStorage.ao.call("write", [id, key, value]);
};

/**
 * 删除存储对象的某个字段
 * @param {String} id
 * @param {String} key
 * @return {Boolean} 是否成功
 */
baiduLS.localStorage.remove = function(id, key) {
	return baiduLS.localStorage.ao.call("remove", [id, key]);
};

/**
 * 删除存储对象
 * @param {String} id
 * @return {Boolean} 是否成功
 */
baiduLS.localStorage.clear = function(id) {
	return baiduLS.localStorage.ao.call("clear", [id]);
};



baiduLS.localStorage.load({
	id     : "BDBridgeSwf",
	width  : 2,
	height : 2,
	menu : false,
	url    : "./local_storage.swf",
	wmode  : "transparent",
	allowscriptaccess : "always"
}, "mediavLS");
mediav.storage = baiduLS.localStorage;
mediav.storage.get = function(key) {
	return this.read("mediav", key);
} 
mediav.storage.set = function(key, value) {
	return this.write("mediav", key, value);
} 
