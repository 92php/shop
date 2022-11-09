/**
 * $Id: language.js 1125 2010-06-10 12:17:56Z Z352 $
 */
var lang = {};
var __=function(a){var b=lang[a]||("Error["+a+"]");if(is_string(b)&&func_num_args()>1){var c=array_slice(func_get_args(),1);b=vsprintf(b,is_array(c[0])?c[0]:c)}return b};
lang.extend=function(a,b){for(var i in a){lang[i]=!!b==false?a[i]:lang[i]}};
lang.extend(
{
	"000001": "正在处理，请稍候。。。",

	"200001": "组合不存在",
	"200002": "组合不存在",

"0" : ""});
