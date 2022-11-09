/**
 * $Id: common.js 7102 2011-05-05 01:29:15Z longmao $
 */

/**
 * Arrays
 */
function array(){return Array.prototype.slice.call(arguments)}
function array_search(a,b,c){var c=!!c;for(var d in b){if((c&&b[d]===a)||(!c&&b[d]==a)){return d}}return false}
function array_merge(){var a=Array.prototype.slice.call(arguments);var b={},k,j=0,i=0;var c;for(i=0,c=true;i<a.length;i++){if(!(a[i] instanceof Array)){c=false;break}}if(c){return a}var d=0;for(i=0,d=0;i<a.length;i++){if(a[i] instanceof Array){for(j=0;j<a[i].length;j++){b[d++]=a[i][j]}}else{for(k in a[i]){if(is_int(k)){b[d++]=a[i][k]}else{b[k]=a[i][k]}}}}return b}
function array_slice(a,b,c,d){var e='';if(!(a instanceof Array)||(d&&b!==0)){var f=0,g={};for(e in a){f+=1;g[e]=a[e]}a=g;b=(b<0)?f+b:b;c=c===undefined?f:(c<0)?f+c-b:c;var h={};var i=false,j=-1,k=0,l=0;for(e in a){++j;if(k>=c){break}if(j==b){i=true}if(!i){continue}++k;if(this.is_int(e)&&!d){h[l++]=a[e]}else{h[e]=a[e]}}return h}if(c===undefined){return a.slice(b)}else if(c>=0){return a.slice(b,b+c)}else{return a.slice(b,c)}}
function array_push(a){var i=0,b='',c=arguments,d=c.length,e=/^\d$/,f=0,g=0,h=0;if(a.hasOwnProperty('length')){for(i=1;i<d;i++){a[a.length]=c[i]}return a.length}for(b in a){if(a.hasOwnProperty(b)){++h;if(e.test(b)){f=parseInt(b,10);g=f>g?f:g}}}for(i=1;i<d;i++){a[++g]=c[i]}return h+i-1}
function count(a,b){var c,cnt=0;if(b=='COUNT_RECURSIVE')b=1;if(b!=1)b=0;for(c in a){cnt++;if(b==1&&a[c]&&(a[c].constructor===Array||a[c].constructor===Object)){cnt+=count(a[c],1)}}return cnt}
function in_array(a,b,c){var d=false,key,c=!!c;for(key in b){if((c&&b[key]===a)||(!c&&b[key]==a)){d=true;break}}return d}
/**
 * Date and Time
 */
function date(d,e){var a,jsdate=((typeof(e)=='undefined')?new Date():(typeof(e)=='number')?new Date(e*1000):new Date(e));var g=function(n,c){if((n=n+"").length<c){return new Array(++c-n.length).join("0")+n}else{return n}};var h=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];var i={1:"st",2:"nd",3:"rd",21:"st",22:"nd",23:"rd",31:"st"};var j=["","January","February","March","April","May","June","July","August","September","October","November","December"];var f={d:function(){return g(f.j(),2)},D:function(){var t=f.l();return t.substr(0,3)},j:function(){return jsdate.getDate()},l:function(){return h[f.w()]},N:function(){return f.w()+1},S:function(){return i[f.j()]?i[f.j()]:'th'},w:function(){return jsdate.getDay()},z:function(){return(jsdate-new Date(jsdate.getFullYear()+"/1/1"))/864e5>>0},W:function(){var a=f.z(),b=364+f.L()-a;var c,nd=(new Date(jsdate.getFullYear()+"/1/1").getDay()||7)-1;if(b<=2&&((jsdate.getDay()||7)-1)<=2-b){return 1}else{if(a<=2&&nd>=4&&a>=(6-nd)){c=new Date(jsdate.getFullYear()-1+"/12/31");return date("W",Math.round(c.getTime()/1000))}else{return(1+(nd<=3?((a+nd)/7):(a-(7-nd))/7)>>0)}}},F:function(){return j[f.n()]},m:function(){return g(f.n(),2)},M:function(){t=f.F();return t.substr(0,3)},n:function(){return jsdate.getMonth()+1},t:function(){var n;if((n=jsdate.getMonth()+1)==2){return 28+f.L()}else{if(n&1&&n<8||!(n&1)&&n>7){return 31}else{return 30}}},L:function(){var y=f.Y();return(!(y&3)&&(y%1e2||!(y%4e2)))?1:0},o:function(){if(f.n()===12&&f.W()===1){return jsdate.getFullYear()+1}if(f.n()===1&&f.W()>=52){return jsdate.getFullYear()-1}return jsdate.getFullYear()},Y:function(){return jsdate.getFullYear()},y:function(){return(jsdate.getFullYear()+"").slice(2)},a:function(){return jsdate.getHours()>11?"pm":"am"},A:function(){return f.a().toUpperCase()},B:function(){var a=(jsdate.getTimezoneOffset()+60)*60;var b=(jsdate.getHours()*3600)+(jsdate.getMinutes()*60)+jsdate.getSeconds()+a;var c=Math.floor(b/86.4);if(c>1000)c-=1000;if(c<0)c+=1000;if((String(c)).length==1)c="00"+c;if((String(c)).length==2)c="0"+c;return c},g:function(){return jsdate.getHours()%12||12},G:function(){return jsdate.getHours()},h:function(){return g(f.g(),2)},H:function(){return g(jsdate.getHours(),2)},i:function(){return g(jsdate.getMinutes(),2)},s:function(){return g(jsdate.getSeconds(),2)},u:function(){return g(jsdate.getMilliseconds()*1000,6)},I:function(){var a=(new Date(jsdate.getFullYear(),6,1,0,0,0));a=a.getHours()-a.getUTCHours();var b=jsdate.getHours()-jsdate.getUTCHours();return b!=a?1:0},O:function(){var t=g(Math.abs(jsdate.getTimezoneOffset()/60*100),4);if(jsdate.getTimezoneOffset()>0)t="-"+t;else t="+"+t;return t},P:function(){var O=f.O();return(O.substr(0,3)+":"+O.substr(3,2))},Z:function(){var t=-jsdate.getTimezoneOffset()*60;return t},c:function(){return f.Y()+"-"+f.m()+"-"+f.d()+"T"+f.h()+":"+f.i()+":"+f.s()+f.P()},r:function(){return f.D()+', '+f.d()+' '+f.M()+' '+f.Y()+' '+f.H()+':'+f.i()+':'+f.s()+' '+f.O()},U:function(){return Math.round(jsdate.getTime()/1000)}};return d.replace(/[\\]?([a-zA-Z])/g,function(t,s){if(t!=s){ret=s}else if(f[s]){ret=f[s]()}else{ret=s}return ret})}
function time(){return Math.round(new Date().getTime()/1000)}
function strtotime(e,f){var i,g,s,h='',j='';h=e;h=h.replace(/\s{2,}|^\s|\s$/g,' ');h=h.replace(/[\t\r\n]/g,'');if(h=='now'){return(new Date()).getTime()/1000}else if(!isNaN(j=Date.parse(h))){return(j/1000)}else if(f){f=new Date(f*1000)}else{f=new Date()}h=h.toLowerCase();var k={day:{'sun':0,'mon':1,'tue':2,'wed':3,'thu':4,'fri':5,'sat':6},mon:{'jan':0,'feb':1,'mar':2,'apr':3,'may':4,'jun':5,'jul':6,'aug':7,'sep':8,'oct':9,'nov':10,'dec':11}};var l=function(m){var a=(m[2]&&m[2]=='ago');var b=(b=m[0]=='last'?-1:1)*(a?-1:1);switch(m[0]){case'last':case'next':switch(m[1].substring(0,3)){case'yea':f.setFullYear(f.getFullYear()+b);break;case'mon':f.setMonth(f.getMonth()+b);break;case'wee':f.setDate(f.getDate()+(b*7));break;case'day':f.setDate(f.getDate()+b);break;case'hou':f.setHours(f.getHours()+b);break;case'min':f.setMinutes(f.getMinutes()+b);break;case'sec':f.setSeconds(f.getSeconds()+b);break;default:var c;if(typeof(c=k.day[m[1].substring(0,3)])!='undefined'){var d=c-f.getDay();if(d==0){d=7*b}else if(d>0){if(m[0]=='last'){d-=7}}else{if(m[0]=='next'){d+=7}}f.setDate(f.getDate()+d)}}break;default:if(/\d+/.test(m[0])){b*=parseInt(m[0],10);switch(m[1].substring(0,3)){case'yea':f.setFullYear(f.getFullYear()+b);break;case'mon':f.setMonth(f.getMonth()+b);break;case'wee':f.setDate(f.getDate()+(b*7));break;case'day':f.setDate(f.getDate()+b);break;case'hou':f.setHours(f.getHours()+b);break;case'min':f.setMinutes(f.getMinutes()+b);break;case'sec':f.setSeconds(f.getSeconds()+b);break}}else{return false}break}return true};g=h.match(/^(\d{2,4}-\d{2}-\d{2})(?:\s(\d{1,2}:\d{2}(:\d{2})?)?(?:\.(\d+))?)?$/);if(g!=null){if(!g[2]){g[2]='00:00:00'}else if(!g[3]){g[2]+=':00'}s=g[1].split(/-/g);for(i in k.mon){if(k.mon[i]==s[1]-1){s[1]=i}}s[0]=parseInt(s[0],10);s[0]=(s[0]>=0&&s[0]<=69)?'20'+(s[0]<10?'0'+s[0]:s[0]+''):(s[0]>=70&&s[0]<=99)?'19'+s[0]:s[0]+'';return parseInt(this.strtotime(s[2]+' '+s[1]+' '+s[0]+' '+g[2])+(g[4]?g[4]/1000:''),10)}var n='([+-]?\\d+\\s'+'(years?|months?|weeks?|days?|hours?|min|minutes?|sec|seconds?'+'|sun\.?|sunday|mon\.?|monday|tue\.?|tuesday|wed\.?|wednesday'+'|thu\.?|thursday|fri\.?|friday|sat\.?|saturday)'+'|(last|next)\\s'+'(years?|months?|weeks?|days?|hours?|min|minutes?|sec|seconds?'+'|sun\.?|sunday|mon\.?|monday|tue\.?|tuesday|wed\.?|wednesday'+'|thu\.?|thursday|fri\.?|friday|sat\.?|saturday))'+'(\\sago)?';g=h.match(new RegExp(n,'g'));if(g==null){return false}for(i=0;i<g.length;i++){if(!l(g[i].split(' '))){return false}}return(f.getTime()/1000)}
/**
 * Function Handling
 */
function func_get_args(){if(!arguments.callee.caller){try{throw new Error('Either you are using this in a browser which does not support the "caller" property or you are calling this from a global context');}catch(e){return false}}return Array.prototype.slice.call(arguments.callee.caller.arguments)}
function func_num_args(){if(!arguments.callee.caller){try{throw new Error('Either you are using this in a browser which does not support the "caller" property or you are calling this from a global context');}catch(e){return false}}return arguments.callee.caller.arguments.length}
function function_exists(a){if(typeof a=='string'){return(typeof window[a]=='function')}else{return(a instanceof Function)}}
/**
 * URLs
 */
function urldecode(e){var f={},histogram_r={},code=0,str_tmp=[];var g=e.toString();var h=function(a,b,c){var d=[];d=c.split(a);return d.join(b)};f['!']='%21';f['%20']='+';for(replace in f){search=f[replace];g=h(search,replace,g)}g=decodeURIComponent(g);return g}
function urlencode(e){var f={},histogram_r={},code=0,tmp_arr=[];var g=e.toString();var h=function(a,b,c){var d=[];d=c.split(a);return d.join(b)};f['!']='%21';f['%20']='+';g=encodeURIComponent(g);for(search in f){replace=f[search];g=h(search,replace,g)}return g.replace(/(\%([a-z0-9]{2}))/g,function(a,b,c){return"%"+c.toUpperCase()});return g}
function parse_url(a,b){var o={strictMode:false,key:["source","protocol","authority","userInfo","user","password","host","port","relative","path","directory","file","query","anchor"],q:{name:"queryKey",parser:/(?:^|&)([^&=]*)=?([^&]*)/g},parser:{strict:/^(?:([^:\/?#]+):)?(?:\/\/((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?))?((((?:[^?#\/]*\/)*)([^?#]*))(?:\?([^#]*))?(?:#(.*))?)/,loose:/^(?:(?![^:@]+:[^:@\/]*@)([^:\/?#.]+):)?(?:\/\/\/?)?((?:(([^:@]*):?([^:@]*))?@)?([^:\/?#]*)(?::(\d*))?)(((\/(?:[^?#](?![^?#\/]*\.[^?#\/.]+(?:[?#]|$)))*\/?)?([^?#\/]*))(?:\?([^#]*))?(?:#(.*))?)/}};var m=o.parser[o.strictMode?"strict":"loose"].exec(a),c={},i=14;while(i--){c[o.key[i]]=m[i]||""}switch(b){case'PHP_URL_SCHEME':return c.protocol;case'PHP_URL_HOST':return c.host;case'PHP_URL_PORT':return c.port;case'PHP_URL_USER':return c.user;case'PHP_URL_PASS':return c.password;case'PHP_URL_PATH':return c.path;case'PHP_URL_QUERY':return c.query;case'PHP_URL_FRAGMENT':return c.anchor;default:var d={};if(c.protocol!==''){d.scheme=c.protocol}if(c.host!==''){d.host=c.host}if(c.port!==''){d.port=c.port}if(c.user!==''){d.user=c.user}if(c.password!==''){d.pass=c.password}if(c.path!==''){d.path=c.path}if(c.query!==''){d.query=c.query}if(c.anchor!==''){d.fragment=c.anchor}return d}}
/**
 * Miscellaneous Functions
 */
function die(a){return exit(a)}
function exit(a){var i;if(typeof a==='string'){alert(a)}window.addEventListener('error',function(e){e.preventDefault();e.stopPropagation()},false);var b=['copy','cut','paste','beforeunload','blur','change','click','contextmenu','dblclick','focus','keydown','keypress','keyup','mousedown','mousemove','mouseout','mouseover','mouseup','resize','scroll','DOMNodeInserted','DOMNodeRemoved','DOMNodeRemovedFromDocument','DOMNodeInsertedIntoDocument','DOMAttrModified','DOMCharacterDataModified','DOMElementNameChanged','DOMAttributeNameChanged','DOMActivate','DOMFocusIn','DOMFocusOut','online','offline','textInput','abort','close','dragdrop','load','paint','reset','select','submit','unload'];function stopPropagation(e){e.stopPropagation()}for(i=0;i<b.length;i++){window.addEventListener(b[i],stopPropagation,true)}throw'';}
/**
 * Strings
 */
function echo(){var a='',argc=arguments.length,argv=arguments,i=0;var b=[],body,elmt;b=document.getElementsByTagName("body");if(!b||!b[0]){return false}body=b[0];for(i=0;i<argc;i++){a=argv[i];if(document.createDocumentFragment&&document.createTextNode&&document.appendChild){var c=document.createDocumentFragment();var d=document.createTextNode(a);c.appendChild(d);document.body.appendChild(c)}else if(document.write){document.write(a)}else{print(a)}}return null}
function ltrim(a,b){b=!b?' \s\xA0':(b+'').replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g,'\$1');var c=new RegExp('^['+b+']+','g');return(a+'').replace(c,'')}
function rtrim(a,b){b=!b?' \\s\u00A0':(b+'').replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g,'\\$1');var c=new RegExp('['+b+']+$','g');return(a+'').replace(c,'')}
function trim(a,b){var c,l=0,i=0;a+='';if(!b){c=" \n\r\t\f\x0b\xa0\u2000\u2001\u2002\u2003\u2004\u2005\u2006\u2007\u2008\u2009\u200a\u200b\u2028\u2029\u3000"}else{b+='';c=b.replace(/([\[\]\(\)\.\?\/\*\{\}\+\$\^\:])/g,'\$1')}l=a.length;for(i=0;i<l;i++){if(c.indexOf(a.charAt(i))===-1){a=a.substring(i);break}}l=a.length;for(i=l-1;i>=0;i--){if(c.indexOf(a.charAt(i))===-1){a=a.substring(0,i+1);break}}return c.indexOf(a.charAt(0))===-1?a:''}
function max(){var f,g,i=0,n=0;var h=arguments,j=h.length;var k=function(a){if(a instanceof Array){return a}else{var b=[];for(var i in a){b.push(a[i])}return b}};var l=function(a,b){var i=0,n=0,c=0;var d=0,e=0;if(a===b){return 0}else if(typeof a=='object'){if(typeof b=='object'){a=k(a);b=k(b);e=a.length;d=b.length;if(d>e){return 1}else if(d<e){return-1}else{for(i=0,n=e;i<n;++i){c=l(a[i],b[i]);if(c==1){return 1}else if(c==-1){return-1}}return 0}}else{return-1}}else if(typeof b=='object'){return 1}else if(isNaN(b)&&!isNaN(a)){if(a==0){return 0}else{return(a<0?1:-1)}}else if(isNaN(a)&&!isNaN(b)){if(b==0){return 0}else{return(b>0?1:-1)}}else{if(b==a){return 0}else{return(b>a?1:-1)}}};if(j===0){throw new Error('At least one value should be passed to max()');}else if(j===1){if(typeof h[0]==='object'){f=k(h[0])}else{throw new Error('Wrong parameter count for max()');}if(f.length===0){throw new Error('Array must contain at least one element for max()');}}else{f=h}g=f[0];for(i=1,n=f.length;i<n;++i){if(l(g,f[i])==1){g=f[i]}}return g}
function md5(j){var l=function(a,b){return(a<<b)|(a>>>(32-b))};var m=function(a,b){var c,lY4,lX8,lY8,lResult;lX8=(a&0x80000000);lY8=(b&0x80000000);c=(a&0x40000000);lY4=(b&0x40000000);lResult=(a&0x3FFFFFFF)+(b&0x3FFFFFFF);if(c&lY4){return(lResult^0x80000000^lX8^lY8)}if(c|lY4){if(lResult&0x40000000){return(lResult^0xC0000000^lX8^lY8)}else{return(lResult^0x40000000^lX8^lY8)}}else{return(lResult^lX8^lY8)}};var F=function(x,y,z){return(x&y)|((~x)&z)};var G=function(x,y,z){return(x&z)|(y&(~z))};var H=function(x,y,z){return(x^y^z)};var I=function(x,y,z){return(y^(x|(~z)))};var n=function(a,b,c,d,x,s,e){a=m(a,m(m(F(b,c,d),x),e));return m(l(a,s),b)};var o=function(a,b,c,d,x,s,e){a=m(a,m(m(G(b,c,d),x),e));return m(l(a,s),b)};var p=function(a,b,c,d,x,s,e){a=m(a,m(m(H(b,c,d),x),e));return m(l(a,s),b)};var q=function(a,b,c,d,x,s,e){a=m(a,m(m(I(b,c,d),x),e));return m(l(a,s),b)};var r=function(a){var b;var c=a.length;var d=c+8;var e=(d-(d%64))/64;var f=(e+1)*16;var g=Array(f-1);var h=0;var i=0;while(i<c){b=(i-(i%4))/4;h=(i%4)*8;g[b]=(g[b]|(a.charCodeAt(i)<<h));i++}b=(i-(i%4))/4;h=(i%4)*8;g[b]=g[b]|(0x80<<h);g[f-2]=c<<3;g[f-1]=c>>>29;return g};var t=function(a){var b="",WordToHexValue_temp="",lByte,lCount;for(lCount=0;lCount<=3;lCount++){lByte=(a>>>(lCount*8))&255;WordToHexValue_temp="0"+lByte.toString(16);b=b+WordToHexValue_temp.substr(WordToHexValue_temp.length-2,2)}return b};var x=Array();var k,AA,BB,CC,DD,a,b,c,d;var u=7,S12=12,S13=17,S14=22;var v=5,S22=9,S23=14,S24=20;var w=4,S32=11,S33=16,S34=23;var A=6,S42=10,S43=15,S44=21;j=utf8_encode(j);x=r(j);a=0x67452301;b=0xEFCDAB89;c=0x98BADCFE;d=0x10325476;xl=x.length;for(k=0;k<xl;k+=16){AA=a;BB=b;CC=c;DD=d;a=n(a,b,c,d,x[k+0],u,0xD76AA478);d=n(d,a,b,c,x[k+1],S12,0xE8C7B756);c=n(c,d,a,b,x[k+2],S13,0x242070DB);b=n(b,c,d,a,x[k+3],S14,0xC1BDCEEE);a=n(a,b,c,d,x[k+4],u,0xF57C0FAF);d=n(d,a,b,c,x[k+5],S12,0x4787C62A);c=n(c,d,a,b,x[k+6],S13,0xA8304613);b=n(b,c,d,a,x[k+7],S14,0xFD469501);a=n(a,b,c,d,x[k+8],u,0x698098D8);d=n(d,a,b,c,x[k+9],S12,0x8B44F7AF);c=n(c,d,a,b,x[k+10],S13,0xFFFF5BB1);b=n(b,c,d,a,x[k+11],S14,0x895CD7BE);a=n(a,b,c,d,x[k+12],u,0x6B901122);d=n(d,a,b,c,x[k+13],S12,0xFD987193);c=n(c,d,a,b,x[k+14],S13,0xA679438E);b=n(b,c,d,a,x[k+15],S14,0x49B40821);a=o(a,b,c,d,x[k+1],v,0xF61E2562);d=o(d,a,b,c,x[k+6],S22,0xC040B340);c=o(c,d,a,b,x[k+11],S23,0x265E5A51);b=o(b,c,d,a,x[k+0],S24,0xE9B6C7AA);a=o(a,b,c,d,x[k+5],v,0xD62F105D);d=o(d,a,b,c,x[k+10],S22,0x2441453);c=o(c,d,a,b,x[k+15],S23,0xD8A1E681);b=o(b,c,d,a,x[k+4],S24,0xE7D3FBC8);a=o(a,b,c,d,x[k+9],v,0x21E1CDE6);d=o(d,a,b,c,x[k+14],S22,0xC33707D6);c=o(c,d,a,b,x[k+3],S23,0xF4D50D87);b=o(b,c,d,a,x[k+8],S24,0x455A14ED);a=o(a,b,c,d,x[k+13],v,0xA9E3E905);d=o(d,a,b,c,x[k+2],S22,0xFCEFA3F8);c=o(c,d,a,b,x[k+7],S23,0x676F02D9);b=o(b,c,d,a,x[k+12],S24,0x8D2A4C8A);a=p(a,b,c,d,x[k+5],w,0xFFFA3942);d=p(d,a,b,c,x[k+8],S32,0x8771F681);c=p(c,d,a,b,x[k+11],S33,0x6D9D6122);b=p(b,c,d,a,x[k+14],S34,0xFDE5380C);a=p(a,b,c,d,x[k+1],w,0xA4BEEA44);d=p(d,a,b,c,x[k+4],S32,0x4BDECFA9);c=p(c,d,a,b,x[k+7],S33,0xF6BB4B60);b=p(b,c,d,a,x[k+10],S34,0xBEBFBC70);a=p(a,b,c,d,x[k+13],w,0x289B7EC6);d=p(d,a,b,c,x[k+0],S32,0xEAA127FA);c=p(c,d,a,b,x[k+3],S33,0xD4EF3085);b=p(b,c,d,a,x[k+6],S34,0x4881D05);a=p(a,b,c,d,x[k+9],w,0xD9D4D039);d=p(d,a,b,c,x[k+12],S32,0xE6DB99E5);c=p(c,d,a,b,x[k+15],S33,0x1FA27CF8);b=p(b,c,d,a,x[k+2],S34,0xC4AC5665);a=q(a,b,c,d,x[k+0],A,0xF4292244);d=q(d,a,b,c,x[k+7],S42,0x432AFF97);c=q(c,d,a,b,x[k+14],S43,0xAB9423A7);b=q(b,c,d,a,x[k+5],S44,0xFC93A039);a=q(a,b,c,d,x[k+12],A,0x655B59C3);d=q(d,a,b,c,x[k+3],S42,0x8F0CCC92);c=q(c,d,a,b,x[k+10],S43,0xFFEFF47D);b=q(b,c,d,a,x[k+1],S44,0x85845DD1);a=q(a,b,c,d,x[k+8],A,0x6FA87E4F);d=q(d,a,b,c,x[k+15],S42,0xFE2CE6E0);c=q(c,d,a,b,x[k+6],S43,0xA3014314);b=q(b,c,d,a,x[k+13],S44,0x4E0811A1);a=q(a,b,c,d,x[k+4],A,0xF7537E82);d=q(d,a,b,c,x[k+11],S42,0xBD3AF235);c=q(c,d,a,b,x[k+2],S43,0x2AD7D2BB);b=q(b,c,d,a,x[k+9],S44,0xEB86D391);a=m(a,AA);b=m(b,BB);c=m(c,CC);d=m(d,DD)}var B=t(a)+t(b)+t(c)+t(d);return B.toLowerCase()}
function explode(a,b,c){var d={0:''};if(arguments.length<2||typeof arguments[0]=='undefined'||typeof arguments[1]=='undefined'){return null}if(a===''||a===false||a===null){return false}if(typeof a=='function'||typeof a=='object'||typeof b=='function'||typeof b=='object'){return d}if(a===true){a='1'}if(!c){return b.toString().split(a.toString())}else{var e=b.toString().split(a.toString());var f=e.splice(0,c-1);var g=e.join(a.toString());f.push(g);return f}}
function split(a,b){return explode(a,b)}
function sprintf(){var u=/%%|%(\d+\$)?([-+\'#0 ]*)(\*\d+\$|\*|\d+)?(\.(\*\d+\$|\*|\d+))?([scboxXuidfegEG])/g;var a=arguments,i=0,v=a[i++];var w=function(a,b,c,d){if(!c){c=' '}var e=(a.length>=b)?'':Array(1+b-a.length>>>0).join(c);return d?a+e:e+a};var x=function(a,b,c,d,e,f){var g=d-a.length;if(g>0){if(c||!e){a=w(a,d,f,c)}else{a=a.slice(0,b.length)+w('',g,'0',true)+a.slice(b.length)}}return a};var y=function(a,b,c,d,e,f,g){var h=a>>>0;c=c&&h&&{'2':'0b','8':'0','16':'0x'}[b]||'';a=c+w(h.toString(b),f||0,'0',false);return x(a,c,d,e,g)};var z=function(a,b,c,d,e,f){if(d!=null){a=a.slice(0,d)}return x(a,'',b,c,e,f)};var A=function(b,c,d,e,_,f,g){var h;var k;var l;var m;var n;if(b=='%%'){return'%'}var o=false,p='',q=false,r=false,s=' ';var t=d.length;for(var j=0;d&&j<t;j++){switch(d.charAt(j)){case' ':p=' ';break;case'+':p='+';break;case'-':o=true;break;case"'":s=d.charAt(j+1);break;case'0':q=true;break;case'#':r=true;break}}if(!e){e=0}else if(e=='*'){e=+a[i++]}else if(e.charAt(0)=='*'){e=+a[e.slice(1,-1)]}else{e=+e}if(e<0){e=-e;o=true}if(!isFinite(e)){throw new Error('sprintf: (minimum-)width must be finite');}if(!f){f='fFeE'.indexOf(g)>-1?6:(g=='d')?0:undefined}else if(f=='*'){f=+a[i++]}else if(f.charAt(0)=='*'){f=+a[f.slice(1,-1)]}else{f=+f}n=c?a[c.slice(0,-1)]:a[i++];switch(g){case's':return z(String(n),o,e,f,q,s);case'c':return z(String.fromCharCode(+n),o,e,f,q);case'b':return y(n,2,r,o,e,f,q);case'o':return y(n,8,r,o,e,f,q);case'x':return y(n,16,r,o,e,f,q);case'X':return y(n,16,r,o,e,f,q).toUpperCase();case'u':return y(n,10,r,o,e,f,q);case'i':case'd':h=parseInt(+n,10);k=h<0?'-':p;n=k+w(String(Math.abs(h)),f,'0',false);return x(n,k,o,e,q);case'e':case'E':case'f':case'F':case'g':case'G':h=+n;k=h<0?'-':p;l=['toExponential','toFixed','toPrecision']['efg'.indexOf(g.toLowerCase())];m=['toString','toUpperCase']['eEfFgG'.indexOf(g)%2];n=k+Math.abs(h)[l](f);return x(n,k,o,e,q)[m]();default:return b}};return v.replace(u,A)}
function vsprintf(a,b){return this.sprintf.apply(this,[a].concat(b))}
function str_replace(a,b,c){var f=a,r=b,s=c;var d=r instanceof Array,sa=s instanceof Array,f=[].concat(f),r=[].concat(r),i=(s=[].concat(s)).length;while(j=0,i--){if(s[i]){while(s[i]=(s[i]+'').split(f[j]).join(d?r[j]||"":r[0]),++j in f){}}};return sa?s:s[0]}
function substr(a,b,c){a+='';var d=a.length;if(b<0){b+=d}d=typeof c==='undefined'?d:(c<0?c+d:c+b);return b>=a.length||b<0||b>d?!1:a.slice(b,d)}
function strlen(a){return(a+'').length}
function strpos(a,b,c){var i=(a+'').indexOf(b,c);return i===-1?false:i}
function number_format(b,c,d,e){var n=b,f=c;var g=function(n,a){var k=Math.pow(10,a);return(Math.round(n*k)/k).toString()};n=!isFinite(+n)?0:+n;f=!isFinite(+f)?0:Math.abs(f);var h=(typeof e==='undefined')?',':e;var j=(typeof d==='undefined')?'.':d;var s=(f>0)?g(n,f):g(Math.round(n),f);var l=g(Math.abs(n),f);var _,i;if(l>=1000){_=l.split(/\D/);i=_[0].length%3||3;_[0]=s.slice(0,i+(n<0))+_[0].slice(i).replace(/(\d{3})/g,h+'$1');s=_.join(j)}else{s=s.replace('.',j)}var m=s.indexOf(j);if(f>=1&&m!==-1&&(s.length-m-1)<f){s+=new Array(f-(s.length-m-1)).join(0)+'0'}else if(f>=1&&m===-1){s+=j+new Array(f).join(0)+'0'}return s}
function mt_rand(min,max){var argc=arguments.length;if(argc===0){min=0;max=2147483647}else if(argc===1){throw new Error('Warning: mt_rand() expects exactly 2 parameters, 1 given');}return Math.floor(Math.random()*(max-min+1))+min}
/**
 * Variable handling
 */
function empty(a){var b;if(a===''||a===0||a==='0'||a===null||a===false||a===undefined){return true}if(typeof a=='object'){for(b in a){if(typeof a[b]!=='function'){return false}}return true}return false}
function gettype(b){var c;var d=function(a){var s=typeof a;if(s==='object'){if(a){if(typeof a.length==='number'&&!(a.propertyIsEnumerable('length'))&&typeof a.splice==='function'){s='array'}}else{s='null'}}return s};switch(c=d(b)){case'number':return(is_float(b))?'double':'integer';break;case'object':case'array':if(is_array(b)){return'array'}else if(is_object(b)){return'object'}break}return c}
function intval(a,b){var c;var d=typeof(a);if(d==='boolean'){return(a)?1:0}else if(d==='string'){c=parseInt(a,b||10);return(isNaN(c)||!isFinite(c))?0:c}else if(d==='number'&&isFinite(a)){return Math.floor(a)}else{return 0}}
function is_array(a){if(!a){return false}if(typeof a==='object'){return true}return false}
function is_int(a){var y=parseInt(a*1);if(isNaN(y)){return false}return a==y&&a.toString()==y.toString()}
function is_integer(a){return is_int(a)}
function is_numeric(a){return!isNaN(a)}
function is_object(a){if(a instanceof Array){return false}else{return(a!==null)&&(typeof(a)=='object')}}
function is_string(a){return(typeof(a)=='string')}
function is_float(a){return parseFloat(a*1)!=parseInt(a*1)}
function isset(){var a=arguments;var l=a.length;var i=0;if(l==0){throw new Error('Empty isset');}while(i!=l){if(typeof(a[i])=='undefined'||a[i]===null){return false}else{i++}}return true}
function var_dump(){var output="",pad_char=" ",pad_val=4,lgth=0,i=0,d=this.window.document;var getFuncName=function(fn){var name=(/\W*function\s+([\w\$]+)\s*\(/).exec(fn);if(!name){return'(Anonymous)'}return name[1]};var repeat_char=function(len,pad_char){var str="";for(var i=0;i<len;i++){str+=pad_char}return str};var getScalarVal=function(val){var ret='';if(val===null){ret='NULL'}else if(typeof val==='boolean'){ret='bool('+val+')'}else if(typeof val==='string'){ret='string('+val.length+') "'+val+'"'}else if(typeof val==='number'){if(parseFloat(val)==parseInt(val,10)){ret='int('+val+')'}else{ret='float('+val+')'}}else if(val===undefined){ret='UNDEFINED'}else if(typeof val==='function'){ret='FUNCTION'}return ret};var formatArray=function(obj,cur_depth,pad_val,pad_char){var someProp='';if(cur_depth>0){cur_depth++}var base_pad=repeat_char(pad_val*(cur_depth-1),pad_char);var thick_pad=repeat_char(pad_val*(cur_depth+1),pad_char);var str="";var val='';if(typeof obj==='object'&&obj!==null){if(obj.constructor&&getFuncName(obj.constructor)==='PHPJS_Resource'){return obj.var_dump()}lgth=0;for(someProp in obj){lgth++}str+="array("+lgth+") {\n";for(var key in obj){if(typeof obj[key]==='object'&&obj[key]!==null){str+=thick_pad+"["+key+"] =>\n"+thick_pad+formatArray(obj[key],cur_depth+1,pad_val,pad_char)}else{val=getScalarVal(obj[key]);str+=thick_pad+"["+key+"] =>\n"+thick_pad+val+"\n"}}str+=base_pad+"}\n"}else{str=getScalarVal(obj)}return str};output=formatArray(arguments[0],0,pad_val,pad_char);for(i=1;i<arguments.length;i++){output+='\n'+formatArray(arguments[i],0,pad_val,pad_char)}if(d.body){this.echo(output)}else{try{d=XULDocument;this.echo('<pre xmlns="http://www.w3.org/1999/xhtml" style="white-space:pre;">'+output+'</pre>')}catch(e){this.echo(output)}}}
/**
 * XML Parser
 */
function utf8_decode(a){var b=[],i=0,c=0,d=0,e=0,f=0;a+='';while(i<a.length){d=a.charCodeAt(i);if(d<128){b[c++]=String.fromCharCode(d);i++}else if((d>191)&&(d<224)){e=a.charCodeAt(i+1);b[c++]=String.fromCharCode(((d&31)<<6)|(e&63));i+=2}else{e=a.charCodeAt(i+1);f=a.charCodeAt(i+2);b[c++]=String.fromCharCode(((d&15)<<12)|((e&63)<<6)|(f&63));i+=3}}return b.join('')}
function utf8_encode(a){var b=(a+'');var c="";var d,e;var f=0;d=e=0;f=b.length;for(var n=0;n<f;n++){var g=b.charCodeAt(n);var h=null;if(g<128){e++}else if(g>127&&g<2048){h=String.fromCharCode((g>>6)|192)+String.fromCharCode((g&63)|128)}else{h=String.fromCharCode((g>>12)|224)+String.fromCharCode(((g>>6)&63)|128)+String.fromCharCode((g&63)|128)}if(h!==null){if(e>d){c+=b.substring(d,e)}c+=h;d=e=n+1}}if(e>d){c+=b.substring(d,b.length)}return c}

/**
 * 定义语言包对象
 *
 * @return null
 */
var _LANG = {};

/**
 * 初始化页面动作侦听
 *
 * @return null
 */
$(function() { });

/***********************************************************
 * 新老购物车兼容性切换
 */
//function logged_in(){return intval(user_login,'boolean')}
function logged_in(_callback1,_callback2){var result=$.ajax({async:true,type:'get',url:IMPORT_APPS_URL+'user/login/logged_in.html?d='+time(),dataType:'jsonp',jsonp:'jsoncallback',success:function(result){if(result.errorcode!=0){return errormessage(result.errormessage)}if(Boolean(result.data)){function_exists(_callback1)&&_callback1.call(_callback1)}else{function_exists(_callback2)&&_callback2.call(_callback2)}}})}

function add_goods_to_cart(iGoodsId, openwin){IMPORT_CART ? add_goods_to_cart2(iGoodsId, openwin) : add_goods_to_cart1(iGoodsId, openwin);}
function add_goods_to_cart1(iGoodsId,openwin){var i_buy_number=max(0,intval($('#input_goods_buy_number').val(),'number'));var s_url=web_dir+'goods/ajax/add_goods_to_cart.php';$.ajax({type:'POST',url:s_url,data:{id:iGoodsId,buy_number:i_buy_number},success:function(sReturn){if(sReturn=='err_not_login'){alert(get_language('err_not_login'));return false}if(sReturn=='err_goods_not_exists'){alert(get_language('err_goods_not_exists'));return false}if(sReturn=='err_goods_stock_out'){alert(get_language('err_goods_stock_out'));return false}if(sReturn=='err_goods_stock_overflow'){alert(get_language('err_goods_stock_overflow'));return false}$('#span_goods_cart_number').html(sReturn);var s_referer_url=location.href;if(openwin===true){window.open(web_dir+'goods/cart.php?referer_url='+encodeURIComponent(s_referer_url),'open_goods_cart');return false}location.href=web_dir+'goods/cart.php?referer_url='+encodeURIComponent(s_referer_url)}})}
function add_goods_to_cart2(iGoodsId, openwin){var s_url = web_dir + 'goods/ajax/add_goods_to_cart2.php';$.ajax({type: 'POST',url: s_url,data:{id: iGoodsId},success: function(goods_sku){location.href = IMPORT_CART_URL+"do/items/add/"+goods_sku+".html";}});}
function add_pointsexc_to_cart(goods_sku){return logged_in(function(){location.href=IMPORT_CART_URL+"do/pointsexc/add/"+goods_sku+".html"},function(){location.href=web_dir+"user/login.php?referer_url="+urlencode(IMPORT_CART_URL+"do/pointsexc/add/"+goods_sku+".html")})}

function delete_cart_goods(mixedId){IMPORT_CART ? delete_cart_goods2(mixedId) : delete_cart_goods1(mixedId);}
function delete_cart_goods1(id){var s_url = web_dir + 'goods/cart.php?action=delete&id=' + id;$.ajax({type: 'GET',url: s_url,data: {},beforeSend: function() {},error: function() {},success: function(sReturn){load_goods_cart_list_v4();load_cart_goods_count();} });}
function delete_cart_goods2(goods_sku){var url=IMPORT_CART_URL+'do/items/remove/'+goods_sku+'.html?d='+time();var result=$.ajax({async:true,type:'get',url:url,dataType:'jsonp',jsonp:'jsoncallback',success:function(result){if(result)load_cart_goods_count()}})}
function delete_cart_pointsexc2(goods_sku){var url=IMPORT_CART_URL+'do/pointsexc/remove/'+goods_sku+'.html?d='+time();var result=$.ajax({async:true,type:'get',url:url,dataType:'jsonp',jsonp:'jsoncallback',success:function(result){if(result)load_cart_goods_count()}})}
function delete_cart_suits2(suit_sku,suit_skus){var url=IMPORT_CART_URL+'do/suits/remove/'+suit_sku+'.html?goods_skus='+suit_skus+'&d='+time();var result=$.ajax({async:true,type:'get',url:url,dataType:'jsonp',jsonp:'jsoncallback',success:function(result){if(result)load_cart_goods_count()}})}

function load_goods_cart_list_v4(){IMPORT_CART ? load_goods_cart_list_v42() : load_goods_cart_list_v41();}
function load_goods_cart_list_v41(){var s_url = web_dir + 'goods/ajax/load_goods_cart_list_v4.php';$.ajax({type: 'POST',url: s_url,data: {},beforeSend: function() {},error: function() {},success: function(sReturn){$('#top_cart_goods_list').html(sReturn);} });}
function load_goods_cart_list_v42(){return load_cart_goods_count2();}

$(function(){load_cart_goods_count();});
function load_cart_goods_count(){IMPORT_CART ? load_cart_goods_count2() : load_cart_goods_count1();}
function load_cart_goods_count1(){var s_url = web_dir + 'goods/ajax/load_goods_cart_goods_number_v4.php';$.ajax({type: 'POST',url: s_url,data: {},beforeSend: function() {},error: function() {},success: function(sReturn){$('#js_cart_goods_number').html(sReturn);}});}
function load_cart_goods_count2(){var result=$.ajax({async:true,type:'get',url:IMPORT_CART_URL+'ajax/do/minicart.html?d='+time(),dataType:'jsonp',jsonp:'jsoncallback',success:function(result){if(result.errorcode!=0)return gb.ajax.errormessage(result.errormessage);$('#js_cart_goods_number').html(result.data.total.item_quantity);var _html='';$.each(result.data.cart_items,function(i,n){_html+='<dl class="dl_cartpro">';_html+='	<dt><a class="a_title" href="">'+n.goods_name+'</a><b class="b_num">x'+n.buy_quantity+'</b></dt>';_html+='	<dd class="ddthumb"><a href=""><img src="'+n.image_s_url+'" width="52" height="52" alt="" /></a></dd>';if(!n.is_suit&&!n.is_pointsexc)_html+='	<dd class="ddcont"><span>￥'+n.sale_price+'</span><a href="javascript:void(0);" onclick="return delete_cart_goods(\''+n.goods_sku+'\');">[移除]</a></dd>';if(n.is_pointsexc)_html+='	<dd class="ddcont"><span>￥'+n.sale_price+'</span><a href="javascript:void(0);" onclick="return delete_cart_pointsexc2(\''+n.goods_sku+'\');">[移除]</a></dd>';if(n.is_suit)_html+='	<dd class="ddcont"><span>￥'+n.sale_price+'</span><a href="javascript:void(\''+n.suit_sku+'\', \''+n.suit_skus+'\');" onclick="return delete_cart_suits2(\''+n.suit_sku+'\', \''+n.suit_skus+'\');">[移除]</a></dd>';_html+='</dl>'});_html+='<p class="p_carttotal"> 共 <b class="red">'+result.data.total.item_quantity+'</b> 件商品 金额总计：<b class="red">￥'+result.data.total.order_amount+'</b></p>';_html+='<p class="p_gotocheck"><a class="a_gotocheck" href="'+web_dir+'goods/cart.php">去结算</a></p>';$('#top_cart_goods_list').html(_html)}})}

/*
 * 时间比对
 */
function between(start_time, end_time, than)
{
	than = empty(than) ? time() : parseFloat(than);
	return Boolean(than >= strtotime(start_time)) && (than <= strtotime(end_time));
}

/**
 * 更新验证码
 *
 * @param string oElement 对象ID
 * @return null
 */
function change_verifycode(e)
{
	var u = web_dir + 'apps/verifycode.php?tmp='+time();
	$(e).attr('src', u);
}

/**
 * 促发验证码
 *
 * @param string oElement 对象ID
 * @return null
 */
function focus_verifycode(e)
{
	var u = web_dir + 'apps/verifycode.php?tmp='+time();
	$('img'+e).attr('src', u).show();
}

/**
 * 检测确认操作
 *
 * @param string sMessage 显示的确认信息
 * @return null
 */
function check_confirm(sMessage)
{
	return window.confirm(sMessage) ? true : false;
}

/**
 * 设置语言包
 *
 * @param string sName 语言名称
 * @param string sValue 语言值
 * @return null
 */
function set_language(sName, sValue)
{
	_LANG[sName] = sValue;
}

/**
 * 获得语言值
 *
 * @param string sName 语言名称
 * @return string
 */
function get_language(sName)
{
	if (! _LANG[sName])
	{
		return 'undefined language "' + sName + '"';
	}
	return _LANG[sName];
}

/**
 * 复选或不复选所有的列表多选框
 *
 * @param string sFormName 表单名称
 * @return string
 */
function select_batch_checkbox(sFormName)
{
	var b_is_checked = $('form[name="' + sFormName + '"] #select_all').attr('checked');
	$('form[name="' + sFormName + '"] input[name="select_id[]"]').attr('checked', b_is_checked);
}

/**
 * 检查批量操作提交
 *
 * @param string sFormName 表单名称
 * @param string sMessage 提示信息
 * @return string
 */
function check_batch_post(sFormName, sMessage)
{
	if ($('form[name="' + sFormName + '"] input[name="select_id[]"]:checked').size() < 1)
	{
		alert(get_language('err_batch_no_select'));
		return false;
	}
	if (! check_confirm(sMessage))
	{
		return false;
	}
	return true;
}

/**
 * 获得随机的字符串
 *
 * @param integer iLength 生成的字符串的长度
 * @param integer iType 类型 1: 全小写 2: 全大写 3: 数字+小写 4: 数字+大写 5: 小写+大写 6: 数字+小写+大写
 * @return string
 */
function get_random_string(iLength, iType)
{
	var s_random_string = '';
	if (! iType)
	{
		iType = 0;
	}
	switch (iType)
	{
		case 1:
			s_characters = 'abcdefghijklmnopqrstuvwxyz';
			break;
		case 2:
			s_characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			break;
		case 3:
			s_characters = '0123456789abcdefghijklmnopqrstuvwxyz';
			break;
		case 4:
			s_characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			break;
		case 5:
			s_characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			break;
		case 6:
			s_characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			break;
		default:
			s_characters = '0123456789';
			break;
	}
	var a_characters = s_characters.split('');
	var i_length_max = s_characters.length - 1;
	var s_random_string = '';
	for(i = 0; i < iLength; i++)
	{
		s_random_string += a_characters[Math.floor(Math.random() * i_length_max)];
	}
	return s_random_string;
}

/**
 * 检测邮件格式
 *
 * @param string
 * @return bool
 */
function check_mail(obj)
{
	var objVal = $(obj).val();
	var reg = /^\w+((-\w+)|(\.\w+))*\@[A-Za-z0-9]+((\.|-)[A-Za-z0-9]+)*\.[A-Za-z0-9]+$/;
	if(!reg.test(objVal)){alert('邮箱格式不正确');return false;}else{return true;}
}

/**
 * 设为首页
 *
 * @param object oElement DOM对象
 * @param string sUrl 首页地址
 * @return null
 */
function set_homepage(oElement, sUrl)
{
	if ($.browser.msie)
	{
		oElement.style.behavior = 'url(#default#homepage)';
		oElement.setHomePage(sUrl);
	}
	else if ($.browser.mozilla)
	{
		try
		{
			netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
		}
		catch (e)
		{
			alert('error');
		}
		var o_prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
		o_prefs.setCharPref('browser.startup.homepage', sUrl);
	}
}

/**
 * 添加到收藏夹
 *
 * @param string sTitle 标题
 * @param string sUrl 首页地址
 * @return null
 */
function add_favorites(sTitle, sUrl)
{
	if ($.browser.msie)
	{
		window.external.AddFavorite(sUrl, sTitle);
	}
	else if (window.sidebar)
	{
		window.sidebar.addPanel(sTitle, sUrl, "");
	}
}

/**
 * 复制文本到粘贴板
 *
 * @param string text
 * @param object callback
 * @return void
 */
function copy_text(text, callback)
{
	if( ! is_string(text) )
	{
		return false;
	}

	if( window.clipboardData )
	{
		window.clipboardData.setData('Text', text);
	}
	else
	{
		var e = $('#flashcopier');
		if( ! e.size() )
		{
			var tag = document.createElement('div');
			tag.id = 'flashcopier';
			$('body').append(tag);
		}
		e = $('#flashcopier');
		var html = '<embed src="' + skin_dir + 'images/flashcopy.swf?d=' + time() + '" FlashVars="clipboard=' + encodeURIComponent(text) + '" width="0" height="0" type="application/x-shockwave-flash"></embed>';
		e.html(html);
	}
	function_exists(callback) && callback.call(callback);
}


/**
 * ads 定位
 */
function ads_auto_location()
{
	if (strpos(location.href, '#show_ads_location') !== false)
	{
		$(function(){
			$('div[ads_key]').each(function()
			{
				var self = $(this);
				self.css({'position':'relative', 'overflow':'hidden'}).show();
				$('div', this).css('position', 'absolute');
				var key = self.attr('ads_key');
				var name = self.attr('ads_name');
				var width = parseInt(self.width());
				var height = parseInt(self.height());
				var float_div_html = '';
				float_div_html += '<div onmouseover="$(this).css(\'background\', \'#000000\');" onmouseout="$(this).css(\'background\', \'#222222\');" style="position:absolute;width:' + width + 'px;height:' + height + 'px;z-index:9999;filter:alpha(opacity=80);-moz-opacity:0.8;opacity:0.8;background:#222222;overflow:hidden;">';
				float_div_html += '	<p style="padding-left:10px;padding-top:10px;font-size:12px;color:#FFFFFF;">';
				float_div_html += '		<strong>' + name + '</strong><br/>' + key + '<br/>' + width + 'x' + height + '';
				float_div_html += '	</p>';
				float_div_html += '</div>';
				self.append(float_div_html);
			});
		});
	}
}
ads_auto_location();


/**
 * 全局 ajax 注册
 */
function do_register(options)
{
	var default_options = {
		id: '',
		url: '',
		data: '',
		style: 'window',
		start: function(){},
		succeed: function(){},
		error: function(){}
	};
	options = array_merge(default_options, options);
	function_exists(options['start']) && options['start'].call(options['start']);

	if (! $('#' + options['id']).size())
	{
		return false;
	}
	if (strpos(options['url'], 'http://') !== false)
	{
		alert('dsa');
		jQuery.get(options['url'], {}, function(result)
		{
			$('#' + options['id']).append(result);
		});
	}
	options['data'] = $('#' + options['id'] + ' input').serialize();
	$.ajax(
	{
		type: 'POST',
		url: web_dir + 'apps/register.php',
		data: options['data'],
		success: function(result)
		{
			if (is_object(result))
			{
				if (result['status'] == 'succeed')
				{
					function_exists(options['succeed']) && options['succeed'].call(result);
				}
				else if (result['status'] == 'error')
				{
					function_exists(options['error']) && options['error'].call(result);
				}
			}
		},
		error: function(XMLHttpRequest, textStatus, errorThrown)
		{
			//ajax
		}
	});

	return false;
}

/**
 * 首页下拉菜单
 */
function indexmenu()
{
	//下拉菜单
	$("#nav li").mouseover(function()
	{
		$('dl', this).show();
	}
	).mouseout(function()
	{
		$('dl', this).hide();
	})

	//菜单加亮
	var arr = location.href.match(/^http:\/\/(.+?)\/(.+?)(\/|\.html|\.php)/i);
	var has = false;
	if (! empty(arr))
	{
		if (arr.length === 4)
		{
			if( $('.dom_indexmenu[href$="' + arr[2] + arr[3] + '"]').size() )
			{
				has = true;
			}
		}
		return has ? $('.dom_indexmenu[href$="' + arr[2] + arr[3] + '"]').addClass('on') : $('#sub_nav_01 a').addClass('on');
	}
}

/**
* 首页底部滚动条
*/


/**
* 单行向上滚动
* intervaltime 代表每次滚动的间隔时间
* movetime 代表每次滚动所用的时间
*
*/
(function($){
	$.fn.topToRoll = function(intervaltime,movetime)
	{
		var self = this ;
		var inttime = intervaltime | 5000 ;
		var mvtime = movetime | 800 ;
		var mrtop = $(self).outerHeight(); //根据自身高度判断向上滚动的距离

		if ($('li',self).size() > 1 )
		{

			var cango = setInterval(function()
					{
						$(self).find('ul:first').animate({
							marginTop:"-"+mrtop+"px"
						},mvtime, function(){
							$(this).css({marginTop:'0px'}).find('li:first').appendTo(this);
						});
					},inttime);

			$(self).mouseover(
				function(){ clearInterval(cango); }
			);

			$(self).mouseout(function(){
				cango = setInterval(function()
					{
						$(self).find('ul:first').animate({
							marginTop:"-"+mrtop+"px"
						},mvtime, function(){
							$(this).css({marginTop:'0px'}).find('li:first').appendTo(this);
						});
					},inttime);
			});

		}
	}
})(jQuery);


$(function()
{
	indexmenu();
});

drawimg = function(dom, max_width, max_height)
{
	var width = $(dom).width();
	var height = $(dom).height();

	var max_w = parseInt(max_width) ? parseInt(max_width) : 100;
	var max_h = parseInt(max_height) ? parseInt(max_height) : 100;

	if (width > max_w)
	{
		var scale = max_w/width;
		$(dom).width(max_w).height(height*scale);
	}
	if (height > max_h)
	{
		var scale = max_h/height;
		$(dom).height(max_h).width(width*scale);
	}
};