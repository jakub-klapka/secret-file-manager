(function(n){var u,h={bridge:null,version:"0.0.0",pluginType:"unknown",disabled:null,outdated:null,unavailable:null,deactivated:null,overdue:null,ready:null},q={},B=null,J=0,m={},K=0,y={},L=function(){var a,c,b,d,f="ZeroClipboard.swf";if(!document.currentScript||!(d=document.currentScript.src)){var e=document.getElementsByTagName("script");if("readyState"in e[0])for(a=e.length;a--&&("interactive"!==e[a].readyState||!(d=e[a].src)););else if("loading"===document.readyState)d=e[e.length-1].src;else{for(a=
e.length;a--;){b=e[a].src;if(!b){c=null;break}b=b.split("#")[0].split("?")[0];b=b.slice(0,b.lastIndexOf("/")+1);if(null==c)c=b;else if(c!==b){c=null;break}}null!==c&&(d=c)}}d&&(d=d.split("#")[0].split("?")[0],f=d.slice(0,d.lastIndexOf("/")+1)+f);return f}(),M=function(){var a=/\-([a-z])/g,c=function(a,c){return c.toUpperCase()};return function(b){return b.replace(a,c)}}(),E=function(a){a||(a=n.event);var c;this!==n?c=this:a.target?c=a.target:a.srcElement&&(c=a.srcElement);g.activate(c)},C=function(a,
c){if(!a||1!==a.nodeType)return a;if(a.classList)return a.classList.contains(c)||a.classList.add(c),a;if(c&&"string"===typeof c){var b=(c||"").split(/\s+/);if(1===a.nodeType)if(a.className){for(var d=" "+a.className+" ",f=a.className,e=0,g=b.length;e<g;e++)0>d.indexOf(" "+b[e]+" ")&&(f+=" "+b[e]);a.className=f.replace(/^\s+|\s+$/g,"")}else a.className=c}return a},A=function(a,c){if(!a||1!==a.nodeType)return a;if(a.classList)return a.classList.contains(c)&&a.classList.remove(c),a;if(c&&"string"===
typeof c||void 0===c){var b=(c||"").split(/\s+/);if(1===a.nodeType&&a.className)if(c){for(var d=(" "+a.className+" ").replace(/[\n\t]/g," "),f=0,e=b.length;f<e;f++)d=d.replace(" "+b[f]+" "," ");a.className=d.replace(/^\s+|\s+$/g,"")}else a.className=""}return a},v=function(a,c,b){if("function"===typeof c.indexOf)return c.indexOf(a,b);var d=c.length;for("undefined"===typeof b?b=0:0>b&&(b=d+b);b<d;b++)if(c.hasOwnProperty(b)&&c[b]===a)return b;return-1},F=function(a){if("string"===typeof a)throw new TypeError("ZeroClipboard doesn't accept query strings.");
return a.length?a:[a]},N=function(a,c,b,d){d?n.setTimeout(function(){a.apply(c,b)},0):a.apply(c,b)},G=function(a){var c,b;a&&("number"===typeof a&&0<a?c=a:"string"===typeof a&&(b=parseInt(a,10))&&!isNaN(b)&&0<b&&(c=b));c||("number"===typeof k.zIndex&&0<k.zIndex?c=k.zIndex:"string"===typeof k.zIndex&&(b=parseInt(k.zIndex,10))&&!isNaN(b)&&0<b&&(c=b));return c||0},w=function(){var a,c,b,d,f,e=arguments[0]||{};a=1;for(c=arguments.length;a<c;a++)if(null!=(b=arguments[a]))for(d in b)b.hasOwnProperty(d)&&
(f=b[d],e!==f&&void 0!==f&&(e[d]=f));return e},D=function(a){if(null==a||""===a)return null;a=a.replace(/^\s+|\s+$/g,"");if(""===a)return null;var c=a.indexOf("//");a=-1===c?a:a.slice(c+2);var b=a.indexOf("/");return(a=-1===b?a:-1===c||0===b?null:a.slice(0,b))&&".swf"===a.slice(-4).toLowerCase()?null:a||null},O=function(){var a=function(a,b){var d,f,e;if(null!=a&&"*"!==b[0]&&("string"===typeof a&&(a=[a]),"object"===typeof a&&"length"in a))for(d=0,f=a.length;d<f;d++)if(a.hasOwnProperty(d)&&(e=D(a[d]))){if("*"===
e){b.length=0;b.push("*");break}-1===v(e,b)&&b.push(e)}};return function(c,b){var d=D(b.swfPath);null===d&&(d=c);var f=[];a(b.trustedOrigins,f);a(b.trustedDomains,f);var e=f.length;if(0<e){if(1===e&&"*"===f[0])return"always";if(-1!==v(c,f))return 1===e&&c===d?"sameDomain":"always"}return"never"}}(),H=function(a){if(null==a)return[];if(Object.keys)return Object.keys(a);var c=[],b;for(b in a)a.hasOwnProperty(b)&&c.push(b);return c};(function(){function a(a){a=a.match(/[\d]+/g);a.length=3;return a.join(".")}
function c(c){c&&(b=!0,c.version&&(f=a(c.version)),!f&&c.description&&(f=a(c.description)),c.filename&&(c=c.filename,e=!!c&&(c=c.toLowerCase())&&(/^(pepflashplayer\.dll|libpepflashplayer\.so|pepperflashplayer\.plugin)$/.test(c)||"chrome.plugin"===c.slice(-13))))}var b=!1,d=!1,f="",e=!1,g;if(navigator.plugins&&navigator.plugins.length)g=navigator.plugins["Shockwave Flash"],c(g),navigator.plugins["Shockwave Flash 2.0"]&&(b=!0,f="2.0.0.11");else if(navigator.mimeTypes&&navigator.mimeTypes.length)g=(g=
navigator.mimeTypes["application/x-shockwave-flash"])&&g.enabledPlugin,c(g);else if("undefined"!==typeof ActiveXObject){d=!0;try{g=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.7"),b=!0,f=a(g.GetVariable("$version"))}catch(k){try{g=new ActiveXObject("ShockwaveFlash.ShockwaveFlash.6"),b=!0,f="6.0.21"}catch(l){try{g=new ActiveXObject("ShockwaveFlash.ShockwaveFlash"),b=!0,f=a(g.GetVariable("$version"))}catch(n){d=!1}}}}h.disabled=!0!==b;h.outdated=f&&11>parseFloat(f);h.version=f||"0.0.0";h.pluginType=
e?"pepper":d?"activex":b?"netscape":"unknown"})();var g=function(a){if(!(this instanceof g))return new g(a);this.id=""+J++;m[this.id]={instance:this,elements:[],handlers:{}};a&&this.clip(a);"boolean"!==typeof h.ready&&(h.ready=!1);if(!g.isFlashUnusable()&&null===h.bridge){var c=this;a=k.flashLoadTimeout;"number"===typeof a&&0<=a&&setTimeout(function(){"boolean"!==typeof h.deactivated&&(h.deactivated=!0);!0===h.deactivated&&g.emit({type:"error",name:"flash-deactivated",client:c})},a);h.overdue=!1;
P()}};g.prototype.setText=function(a){g.setData("text/plain",a);return this};g.prototype.setHtml=function(a){g.setData("text/html",a);return this};g.prototype.setRichText=function(a){g.setData("application/rtf",a);return this};g.prototype.setData=function(){g.setData.apply(g,Array.prototype.slice.call(arguments,0));return this};g.prototype.clearData=function(){g.clearData.apply(g,Array.prototype.slice.call(arguments,0));return this};g.prototype.setSize=function(a,c){var b=z(h.bridge);b&&(b.style.width=
a+"px",b.style.height=c+"px");return this};g.prototype.destroy=function(){this.unclip();this.off();delete m[this.id]};g.version="2.0.0-beta.4";var k={swfPath:L,trustedDomains:n.location.host?[n.location.host]:[],cacheBust:!0,forceHandCursor:!1,forceEnhancedClipboard:!1,zIndex:999999999,debug:!1,title:null,autoActivate:!0,flashLoadTimeout:3E4};g.isFlashUnusable=function(){return!!(h.disabled||h.outdated||h.unavailable||h.deactivated)};g.config=function(a){"object"===typeof a&&null!==a&&w(k,a);if("string"===
typeof a&&a){if(k.hasOwnProperty(a))return k[a]}else{a={};for(var c in k)k.hasOwnProperty(c)&&(a[c]="object"===typeof k[c]&&null!==k[c]?"length"in k[c]?k[c].slice(0):w({},k[c]):k[c]);return a}};g.destroy=function(){g.deactivate();for(var a in m)if(m.hasOwnProperty(a)&&m[a]){var c=m[a].instance;c&&"function"===typeof c.destroy&&c.destroy()}var b=h.bridge;if(b){var d=z(b);d&&("activex"===h.pluginType&&"readyState"in b?(b.style.display="none",function e(){if(4===b.readyState){for(var a in b)"function"===
typeof b[a]&&(b[a]=null);b.parentNode.removeChild(b);d.parentNode&&d.parentNode.removeChild(d)}else setTimeout(e,10)}()):(b.parentNode.removeChild(b),d.parentNode&&d.parentNode.removeChild(d)));h.ready=null;h.bridge=null;h.deactivated=null}g.clearData()};g.activate=function(a){u&&(A(u,k.hoverClass),A(u,k.activeClass));u=a;C(a,k.hoverClass);Q();var c=k.title||a.getAttribute("title");if(c){var b=z(h.bridge);b&&b.setAttribute("title",c)}if(!(c=!0===k.forceHandCursor)){a:{n.getComputedStyle?c=n.getComputedStyle(a,
null).getPropertyValue("cursor"):(c=M("cursor"),c=a.currentStyle?a.currentStyle[c]:a.style[c]);if(!c||"auto"===c)if(a=a.tagName.toLowerCase(),"a"===a){a="pointer";break a}a=c}c="pointer"===a}!0===h.ready&&h.bridge&&"function"===typeof h.bridge.setHandCursor?h.bridge.setHandCursor(c):h.ready=!1};g.deactivate=function(){var a=z(h.bridge);a&&(a.style.left="0px",a.style.top="-9999px",a.removeAttribute("title"));u&&(A(u,k.hoverClass),A(u,k.activeClass),u=null)};g.state=function(){for(var a=n.navigator,
c=["userAgent","platform","appName"],b={},d=0,f=c.length;d<f;d++)c[d]in a&&(b[c[d]]=a[c[d]]);var a=["bridge"],c={},e;for(e in h)-1===v(e,a)&&(c[e]=h[e]);return{browser:b,flash:c,zeroclipboard:{version:g.version,config:g.config()}}};g.setData=function(a,c){var b;if("object"===typeof a&&a&&"undefined"===typeof c)b=a,g.clearData();else if("string"===typeof a&&a)b={},b[a]=c;else return;for(var d in b)d&&b.hasOwnProperty(d)&&"string"===typeof b[d]&&b[d]&&(q[d]=b[d])};g.clearData=function(a){if("undefined"===
typeof a){if(q)for(var c in q)q.hasOwnProperty(c)&&delete q[c];B=null}else"string"===typeof a&&q.hasOwnProperty(a)&&delete q[a]};var P=function(){var a,c,b=document.getElementById("global-zeroclipboard-html-bridge");if(!b){a=O(n.location.host,k);var d="never"===a?"none":"all",f,b=k,e,r,p,l="",m=[];b.trustedDomains&&("string"===typeof b.trustedDomains?f=[b.trustedDomains]:"object"===typeof b.trustedDomains&&"length"in b.trustedDomains&&(f=b.trustedDomains));if(f&&f.length)for(e=0,r=f.length;e<r;e++)if(f.hasOwnProperty(e)&&
f[e]&&"string"===typeof f[e]&&(p=D(f[e]))){if("*"===p){m=[p];break}m.push.apply(m,[p,"//"+p,n.location.protocol+"//"+p])}m.length&&(l+="trustedOrigins="+encodeURIComponent(m.join(",")));!0===b.forceEnhancedClipboard&&(l+=(l?"&":"")+"forceEnhancedClipboard=true");f=l;b=k.swfPath;e=null==k||k&&!0===k.cacheBust?(-1===k.swfPath.indexOf("?")?"?":"&")+"noCache="+(new Date).getTime():"";r=b+e;b=document.createElement("div");b.id="global-zeroclipboard-html-bridge";b.className="global-zeroclipboard-container";
b.style.position="absolute";b.style.left="0px";b.style.top="-9999px";b.style.width="1px";b.style.height="1px";b.style.zIndex=""+G(k.zIndex);e=document.createElement("div");b.appendChild(e);document.body.appendChild(b);p=document.createElement("div");l="activex"===h.pluginType;p.innerHTML='<object id="global-zeroclipboard-flash-bridge" name="global-zeroclipboard-flash-bridge" width="100%" height="100%" '+(l?'classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000"':'type="application/x-shockwave-flash" data="'+
r+'"')+">"+(l?'<param name="movie" value="'+r+'"/>':"")+'<param name="allowScriptAccess" value="'+a+'"/><param name="allowNetworking" value="'+d+'"/><param name="menu" value="false"/><param name="wmode" value="transparent"/><param name="flashvars" value="'+f+'"/></object>';a=p.firstChild;a.ZeroClipboard=g;b.replaceChild(a,e)}a||((a=document["global-zeroclipboard-flash-bridge"])&&(c=a.length)&&(a=a[c-1]),a||(a=b.firstChild));h.bridge=a||null},z=function(a){for(a=a&&a.parentNode;a&&"OBJECT"===a.nodeName&&
a.parentNode;)a=a.parentNode;return a||null},Q=function(){if(u){var a=u,c=0,b=0,d=0,f=0,e=G(k.zIndex)-1;a.getBoundingClientRect&&(f=a.getBoundingClientRect(),"pageXOffset"in n&&"pageYOffset"in n?(c=n.pageXOffset,b=n.pageYOffset):(c=1,"function"===typeof document.body.getBoundingClientRect&&(c=document.body.getBoundingClientRect(),c=c.right-c.left,b=document.body.offsetWidth,c=Math.round(c/b*100)/100),b=c,c=Math.round(document.documentElement.scrollLeft/b),b=Math.round(document.documentElement.scrollTop/
b)),d=document.documentElement.clientTop||0,c=f.left+c-(document.documentElement.clientLeft||0),b=f.top+b-d,d="width"in f?f.width:f.right-f.left,f="height"in f?f.height:f.bottom-f.top);if(a=z(h.bridge))a.style.top=b+"px",a.style.left=c+"px",a.style.width=d+"px",a.style.height=f+"px",a.style.zIndex=e+1;!0===h.ready&&h.bridge&&"function"===typeof h.bridge.setSize?h.bridge.setSize(d,f):h.ready=!1}return this};g.emit=function(a){var c,b;"string"===typeof a&&a&&(c=a);"object"===typeof a&&a&&"string"===
typeof a.type&&a.type&&(c=a.type,b=a);if(c){a=b;if(c||a&&a.type){a=a||{};c=(c||a.type).toLowerCase();w(a,{type:c,target:a.target||u||null,relatedTarget:a.relatedTarget||null,currentTarget:h&&h.bridge||null});b=R[a.type];"error"===a.type&&a.name&&b&&(b=b[a.name]);b&&(a.message=b);"ready"===a.type&&w(a,{target:null,version:h.version});"error"===a.type&&(a.target=null,/^flash-(outdated|unavailable|deactivated|overdue)$/.test(a.name)&&w(a,{version:h.version,minimumVersion:"11.0.0"}));"copy"===a.type&&
(a.clipboardData={setData:g.setData,clearData:g.clearData});if("aftercopy"===a.type&&(b=B,"object"===typeof a&&a&&"object"===typeof b&&b)){c={};for(var d in a)if("success"!==d&&"data"!==d)c[d]=a[d];else{c[d]={};var f=a[d],e;for(e in f)e&&f.hasOwnProperty(e)&&b.hasOwnProperty(e)&&(c[d][b[e]]=f[e])}a=c}a.target&&!a.relatedTarget&&(d=a,e=(e=(e=a.target)&&e.getAttribute&&e.getAttribute("data-clipboard-target"))?document.getElementById(e):null,d.relatedTarget=e)}else a=void 0;d=a;e=d.target||u;switch(d.type){case "error":v(d.name,
["flash-disabled","flash-outdated","flash-deactivated","flash-overdue"])&&w(h,{disabled:"flash-disabled"===d.name,outdated:"flash-outdated"===d.name,unavailable:"flash-unavailable"===d.name,deactivated:"flash-deactivated"===d.name,overdue:"flash-overdue"===d.name,ready:!1});break;case "ready":var r=!0===h.deactivated;w(h,{disabled:!1,outdated:!1,unavailable:!1,deactivated:!1,overdue:r,ready:!r});break;case "copy":var p,l=d.relatedTarget;!q["text/html"]&&!q["text/plain"]&&l&&(p=l.value||l.outerHTML||
l.innerHTML)&&(r=l.value||l.textContent||l.innerText)?(d.clipboardData.clearData(),d.clipboardData.setData("text/plain",r),p!==r&&d.clipboardData.setData("text/html",p)):!q["text/plain"]&&d.target&&(r=d.target.getAttribute("data-clipboard-text"))&&(d.clipboardData.clearData(),d.clipboardData.setData("text/plain",r));break;case "aftercopy":g.clearData();if(r=e){a:{try{l=document.activeElement;break a}catch(z){}l=null}r=e!==l&&e.focus}r&&e.focus();break;case "mouseover":C(e,k.hoverClass);break;case "mouseout":!0===
k.autoActivate&&g.deactivate();break;case "mousedown":C(e,k.activeClass);break;case "mouseup":A(e,k.activeClass)}if("ready"===a.type&&!0===h.overdue)return g.emit({type:"error",name:"flash-overdue"});r=!/^(before)?copy$/.test(a.type);if(a.client)I.call(a.client,a,r);else{var s;if(a.target&&a.target!==n&&!0===k.autoActivate){l=a.target;p=[];if(l&&1===l.nodeType&&(s=l.zcClippingId)&&y.hasOwnProperty(s)&&(s=y[s])&&s.length)for(l=0,d=s.length;l<d;l++)(e=m[s[l]].instance)&&e instanceof g&&p.push(e);s=
p}else{d=[];e=H(m);s=0;for(p=e.length;s<p;s++)(l=m[e[s]].instance)&&l instanceof g&&d.push(l);s=d}p=0;for(l=s.length;p<l;p++)d=w({},a,{client:s[p]}),I.call(s[p],d,r)}var x;if("copy"===a.type){var t;x={};a={};if("object"===typeof q&&q){for(t in q)if(t&&q.hasOwnProperty(t)&&"string"===typeof q[t]&&q[t])switch(t.toLowerCase()){case "text/plain":case "text":case "air:text":case "flash:text":x.text=q[t];a.text=t;break;case "text/html":case "html":case "air:html":case "flash:html":x.html=q[t];a.html=t;
break;case "application/rtf":case "text/rtf":case "rtf":case "richtext":case "air:rtf":case "flash:rtf":x.rtf=q[t],a.rtf=t}t={data:x,formatMap:a}}else t=void 0;x=t.data;B=t.formatMap}return x}};var I=function(a,c){var b=m[this.id]&&m[this.id].handlers[a.type];if(b&&b.length){var d,f,e,g;d=0;for(f=b.length;d<f;d++)e=b[d],g=this,"string"===typeof e&&"function"===typeof n[e]&&(e=n[e]),"object"===typeof e&&e&&"function"===typeof e.handleEvent&&(g=e,e=e.handleEvent),"function"===typeof e&&N(e,g,[a],c)}return this},
R={ready:"Flash communication is established",error:{"flash-disabled":"Flash is disabled or not installed","flash-outdated":"Flash is too outdated to support ZeroClipboard","flash-unavailable":"Flash is unable to communicate bidirectionally with JavaScript","flash-deactivated":"Flash is too outdated for your browser and/or is configured as click-to-activate","flash-overdue":"Flash communication was established but NOT within the acceptable time limit"}};g.prototype.on=function(a,c){var b,d,f,e={},
k=m[this.id]&&m[this.id].handlers;if("string"===typeof a&&a)f=a.toLowerCase().split(/\s+/);else if("object"===typeof a&&a&&"undefined"===typeof c)for(b in a)if(a.hasOwnProperty(b)&&"string"===typeof b&&b&&"function"===typeof a[b])this.on(b,a[b]);if(f&&f.length){b=0;for(d=f.length;b<d;b++)a=f[b].replace(/^on/,""),e[a]=!0,k[a]||(k[a]=[]),k[a].push(c);e.ready&&h.ready&&g.emit({type:"ready",client:this});if(e.error)for(f=["disabled","outdated","unavailable","deactivated","overdue"],b=0,d=f.length;b<d;b++)if(h[f[b]]){g.emit({type:"error",
name:"flash-"+f[b],client:this});break}}return this};g.prototype.off=function(a,c){var b,d,f,e,g,h=m[this.id]&&m[this.id].handlers;if(0===arguments.length)e=H(h);else if("string"===typeof a&&a)e=a.split(/\s+/);else if("object"===typeof a&&a&&"undefined"===typeof c)for(b in a)a.hasOwnProperty(b)&&"string"===typeof b&&b&&"function"===typeof a[b]&&this.off(b,a[b]);if(e&&e.length)for(b=0,d=e.length;b<d;b++)if(a=e[b].toLowerCase().replace(/^on/,""),(g=h[a])&&g.length)if(c)for(f=v(c,g);-1!==f;)g.splice(f,
1),f=v(c,g,f);else h[a].length=0;return this};g.prototype.handlers=function(a){var c,b=null,d=m[this.id]&&m[this.id].handlers;if(d){if("string"===typeof a&&a)return d[a]?d[a].slice(0):null;b={};for(c in d)d.hasOwnProperty(c)&&d[c]&&(b[c]=d[c].slice(0))}return b};g.prototype.clip=function(a){a=F(a);for(var c=0;c<a.length;c++)if(a.hasOwnProperty(c)&&a[c]&&1===a[c].nodeType){if(a[c].zcClippingId)-1===v(this.id,y[a[c].zcClippingId])&&y[a[c].zcClippingId].push(this.id);else if(a[c].zcClippingId="zcClippingId_"+
K++,y[a[c].zcClippingId]=[this.id],!0===k.autoActivate){var b=a[c],d=E;b&&1===b.nodeType&&(b.addEventListener?b.addEventListener("mouseover",d,!1):b.attachEvent&&b.attachEvent("onmouseover",d))}b=m[this.id].elements;-1===v(a[c],b)&&b.push(a[c])}return this};g.prototype.unclip=function(a){var c=m[this.id];if(c){var c=c.elements,b;a="undefined"===typeof a?c.slice(0):F(a);for(var d=a.length;d--;)if(a.hasOwnProperty(d)&&a[d]&&1===a[d].nodeType){for(b=0;-1!==(b=v(a[d],c,b));)c.splice(b,1);var f=y[a[d].zcClippingId];
if(f){for(b=0;-1!==(b=v(this.id,f,b));)f.splice(b,1);0===f.length&&(!0===k.autoActivate&&(b=a[d],f=E,b&&1===b.nodeType&&(b.removeEventListener?b.removeEventListener("mouseover",f,!1):b.detachEvent&&b.detachEvent("onmouseover",f))),delete a[d].zcClippingId)}}}return this};g.prototype.elements=function(){var a=m[this.id];return a&&a.elements?a.elements.slice(0):[]};k.hoverClass="zeroclipboard-is-hover";k.activeClass="zeroclipboard-is-active";"function"===typeof define&&define.amd?define(function(){return g}):
"object"===typeof module&&module&&"object"===typeof module.exports&&module.exports?module.exports=g:n.ZeroClipboard=g})(function(){return this}());(function(n){n(document).ready(function(){ZeroClipboard.config({swfPath:LumiSecertFilesConfig.swf_path,forceHandCursor:!0});(new ZeroClipboard(n(".copy_to_clipboard"))).on("aftercopy",function(u){u.success?(n(".copied").removeClass("copied"),n(u.target).addClass("copied")):alert("Nepoda\u0159ilo se zkop\u00edrovat data do schr\u00e1nky, pou\u017eijte pros\u00edm textov\u00e9 pole.")})})})(jQuery);
