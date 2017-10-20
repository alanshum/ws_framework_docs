
/**
 * Avoid `console` errors in browsers that lack a console.
 * From initializr
 */

(function(){for(var a,e=function(){},b="assert clear count debug dir dirxml error exception group groupCollapsed groupEnd info log markTimeline profile profileEnd table time timeEnd timeStamp trace warn".split(" "),c=b.length,d=window.console=window.console||{};c--;)a=b[c],d[a]||(d[a]=e)})();



/**
 * jquery-sticky v1.0.2
 * http://labs.anthonygarand.com/sticky
 */
!function(t){var e=Array.prototype.slice,r=Array.prototype.splice,i={topSpacing:0,bottomSpacing:0,className:"is-sticky",wrapperClassName:"sticky-wrapper",center:!1,getWidthFrom:"",widthFromWrapper:!0,responsiveWidth:!1},n=t(window),s=t(document),o=[],a=n.height(),c=function(){for(var e=n.scrollTop(),r=s.height(),i=r-a,c=e>i?i-e:0,p=0;p<o.length;p++){var l=o[p],u=l.stickyWrapper.offset().top,d=u-l.topSpacing-c;if(d>=e)null!==l.currentTop&&(l.stickyElement.css({width:"",position:"",top:""}),l.stickyElement.parent().removeClass(l.className),l.stickyElement.trigger("sticky-end",[l]),l.currentTop=null);else{var h=r-l.stickyElement.outerHeight()-l.topSpacing-l.bottomSpacing-e-c;if(0>h?h+=l.topSpacing:h=l.topSpacing,l.currentTop!=h){var g;l.getWidthFrom?g=t(l.getWidthFrom).width()||null:l.widthFromWrapper&&(g=l.stickyWrapper.width()),null==g&&(g=l.stickyElement.width()),l.stickyElement.css("width",g).css("position","fixed").css("top",h),l.stickyElement.parent().addClass(l.className),null===l.currentTop?l.stickyElement.trigger("sticky-start",[l]):l.stickyElement.trigger("sticky-update",[l]),l.currentTop===l.topSpacing&&l.currentTop>h||null===l.currentTop&&h<l.topSpacing?l.stickyElement.trigger("sticky-bottom-reached",[l]):null!==l.currentTop&&h===l.topSpacing&&l.currentTop<h&&l.stickyElement.trigger("sticky-bottom-unreached",[l]),l.currentTop=h}}}},p=function(){a=n.height();for(var e=0;e<o.length;e++){var r=o[e],i=null;r.getWidthFrom?r.responsiveWidth===!0&&(i=t(r.getWidthFrom).width()):r.widthFromWrapper&&(i=r.stickyWrapper.width()),null!=i&&r.stickyElement.css("width",i)}},l={init:function(e){var r=t.extend({},i,e);return this.each(function(){var e=t(this),n=e.attr("id"),s=e.outerHeight(),a=n?n+"-"+i.wrapperClassName:i.wrapperClassName,c=t("<div></div>").attr("id",a).addClass(r.wrapperClassName);e.wrapAll(c);var p=e.parent();r.center&&p.css({width:e.outerWidth(),marginLeft:"auto",marginRight:"auto"}),"right"==e.css("float")&&e.css({"float":"none"}).parent().css({"float":"right"}),p.css("height",s),r.stickyElement=e,r.stickyWrapper=p,r.currentTop=null,o.push(r)})},update:c,unstick:function(){return this.each(function(){for(var e=this,i=t(e),n=-1,s=o.length;s-->0;)o[s].stickyElement.get(0)===e&&(r.call(o,s,1),n=s);-1!=n&&(i.unwrap(),i.css({width:"",position:"",top:"","float":""}))})}};window.addEventListener?(window.addEventListener("scroll",c,!1),window.addEventListener("resize",p,!1)):window.attachEvent&&(window.attachEvent("onscroll",c),window.attachEvent("onresize",p)),t.fn.sticky=function(r){return l[r]?l[r].apply(this,e.call(arguments,1)):"object"!=typeof r&&r?void t.error("Method "+r+" does not exist on jQuery.sticky"):l.init.apply(this,arguments)},t.fn.unstick=function(r){return l[r]?l[r].apply(this,e.call(arguments,1)):"object"!=typeof r&&r?void t.error("Method "+r+" does not exist on jQuery.sticky"):l.unstick.apply(this,arguments)},t(function(){setTimeout(c,0)})}(jQuery);


/**
 * SmoothScroll
 * This helper script created by DWUser.com.  Copyright 2013 DWUser.com.
 * Dual-licensed under the GPL and MIT licenses.
 * All individual scripts remain property of their copyrighters.
 * Date: 10-Sep-2013
 * Version: 1.0.1
 */
if (!window['jQuery']) alert('The jQuery library must be included before the smoothscroll.js file.  The plugin will not work propery.');

/**
 * jQuery.ScrollTo - Easy element scrolling using jQuery.
 * Copyright (c) 2007-2013 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * @author Ariel Flesler
 * @version 1.4.3.1
 */
;(function($){var h=$.scrollTo=function(a,b,c){$(window).scrollTo(a,b,c)};h.defaults={axis:'xy',duration:parseFloat($.fn.jquery)>=1.3?0:1,limit:true};h.window=function(a){return $(window)._scrollable()};$.fn._scrollable=function(){return this.map(function(){var a=this,isWin=!a.nodeName||$.inArray(a.nodeName.toLowerCase(),['iframe','#document','html','body'])!=-1;if(!isWin)return a;var b=(a.contentWindow||a).document||a.ownerDocument||a;return/webkit/i.test(navigator.userAgent)||b.compatMode=='BackCompat'?b.body:b.documentElement})};$.fn.scrollTo=function(e,f,g){if(typeof f=='object'){g=f;f=0}if(typeof g=='function')g={onAfter:g};if(e=='max')e=9e9;g=$.extend({},h.defaults,g);f=f||g.duration;g.queue=g.queue&&g.axis.length>1;if(g.queue)f/=2;g.offset=both(g.offset);g.over=both(g.over);return this._scrollable().each(function(){if(e==null)return;var d=this,$elem=$(d),targ=e,toff,attr={},win=$elem.is('html,body');switch(typeof targ){case'number':case'string':if(/^([+-]=)?\d+(\.\d+)?(px|%)?$/.test(targ)){targ=both(targ);break}targ=$(targ,this);if(!targ.length)return;case'object':if(targ.is||targ.style)toff=(targ=$(targ)).offset()}$.each(g.axis.split(''),function(i,a){var b=a=='x'?'Left':'Top',pos=b.toLowerCase(),key='scroll'+b,old=d[key],max=h.max(d,a);if(toff){attr[key]=toff[pos]+(win?0:old-$elem.offset()[pos]);if(g.margin){attr[key]-=parseInt(targ.css('margin'+b))||0;attr[key]-=parseInt(targ.css('border'+b+'Width'))||0}attr[key]+=g.offset[pos]||0;if(g.over[pos])attr[key]+=targ[a=='x'?'width':'height']()*g.over[pos]}else{var c=targ[pos];attr[key]=c.slice&&c.slice(-1)=='%'?parseFloat(c)/100*max:c}if(g.limit&&/^\d+$/.test(attr[key]))attr[key]=attr[key]<=0?0:Math.min(attr[key],max);if(!i&&g.queue){if(old!=attr[key])animate(g.onAfterFirst);delete attr[key]}});animate(g.onAfter);function animate(a){$elem.animate(attr,f,g.easing,a&&function(){a.call(this,e,g)})}}).end()};h.max=function(a,b){var c=b=='x'?'Width':'Height',scroll='scroll'+c;if(!$(a).is('html,body'))return a[scroll]-$(a)[c.toLowerCase()]();var d='client'+c,html=a.ownerDocument.documentElement,body=a.ownerDocument.body;return Math.max(html[scroll],body[scroll])-Math.min(html[d],body[d])};function both(a){return typeof a=='object'?a:{top:a,left:a}}})(jQuery);

/**
 * jQuery.LocalScroll
 * Copyright (c) 2007-2010 Ariel Flesler - aflesler(at)gmail(dot)com | http://flesler.blogspot.com
 * Dual licensed under MIT and GPL.
 * Date: 05/31/2010
 * @author Ariel Flesler
 * @version 1.2.8b
 **/
;(function(b){function g(a,e,d){var h=e.hash.slice(1),f=document.getElementById(h)||document.getElementsByName(h)[0];if(f){a&&a.preventDefault();var c=b(d.target);if(!(d.lock&&c.is(":animated")||d.onBefore&&!1===d.onBefore(a,f,c))){d.stop&&c._scrollable().stop(!0);if(d.hash){var a=f.id==h?"id":"name",g=b("<a> </a>").attr(a,h).css({position:"absolute",top:b(window).scrollTop(),left:b(window).scrollLeft()});f[a]="";b("body").prepend(g);location=e.hash;g.remove();f[a]=h}c.scrollTo(f,d).trigger("notify.serialScroll",
[f])}}}var i=location.href.replace(/#.*/,""),c=b.localScroll=function(a){b("body").localScroll(a)};c.defaults={duration:1E3,axis:"y",event:"click",stop:!0,target:window,reset:!0};c.hash=function(a){if(location.hash){a=b.extend({},c.defaults,a);a.hash=!1;if(a.reset){var e=a.duration;delete a.duration;b(a.target).scrollTo(0,a);a.duration=e}g(0,location,a)}};b.fn.localScroll=function(a){function e(){return!!this.href&&!!this.hash&&this.href.replace(this.hash,"")==i&&(!a.filter||b(this).is(a.filter))}
a=b.extend({},c.defaults,a);return a.lazy?this.bind(a.event,function(d){var c=b([d.target,d.target.parentNode]).filter(e)[0];c&&g(d,c,a)}):this.find("a,area").filter(e).bind(a.event,function(b){g(b,this,a)}).end().end()}})(jQuery);



/**
 * Anchorific.js
 * converts headings to ul list for nav
 * @link http://renaysha.me/anchorific-js
 */
"function"!==typeof Object.create&&(Object.create=function(c){function f(){}f.prototype=c;return new f});
(function(c,f,k,g){var h={init:function(a,b){this.elem=b;this.$elem=c(b);this.opt=c.extend({},this.opt,a);this.headers=this.$elem.find("h2, h3, h4, h5, h6");this.previous=0;0!==this.headers.length&&(this.first=parseInt(this.headers.prop("nodeName").substring(1),null));this.build()},opt:{navigation:".anchorific",speed:200,anchorClass:"anchor",anchorText:"#",top:".top",spy:!0,position:"append",spyOffset:!0},build:function(){var a=this,b,d=function(){};a.opt.navigation&&(c(a.opt.navigation).append("<ul />"),
a.previous=c(a.opt.navigation).find("ul").last(),d=function(b){return a.navigations(b)});for(var e=0;e<a.headers.length;e++)b=a.headers.eq(e),d(b),a.anchor(b);a.opt.spy&&a.spy();a.opt.top&&a.back()},navigations:function(a){var b;b=this.name(a);a.attr("id")!==g&&(b=a.attr("id"));b=c("<a />").attr("href","#"+b).text(a.text());b=c("<li />").append(b);a=parseInt(a.prop("nodeName").substring(1),null);b.attr("data-tag",a);this.subheadings(a,b);this.first=a},subheadings:function(a,b){c(this.opt.navigation).find("ul");
var d=c(this.opt.navigation).find("li");a===this.first?this.previous.append(b):(a>this.first?(d.last().append("<ul />"),c(this.opt.navigation).find("ul").last().append(b)):c("li[data-tag="+a+"]").last().parent().append(b),this.previous=b.parent())},name:function(a){return a.text().replace(/[^\w\s]/gi,"").replace(/\s+/g,"-").toLowerCase()},anchor:function(a){var b=this.name(a),d;d=this.opt.anchorText;var e=this.opt.anchorClass;a.attr("id")===g&&a.attr("id",b);b=a.attr("id");d=c("<a />").attr("href",
"#"+b).html(d).addClass(e);"append"===this.opt.position?a.append(d):a.prepend(d)},back:function(){var a=this,b=c("body, html");c(a.opt.top).on("click",function(c){c.preventDefault();b.animate({scrollTop:0},a.opt.speed)})},top:function(a){var b=this.opt.top;!1!==b&&(200<c(a).scrollTop()?c(b).fadeIn():c(b).fadeOut())},spy:function(){var a=this,b,d,e;c(f).scroll(function(h){a.top(this);b=a.headers.map(function(b){if(c(this).offset().top-c(f).scrollTop()<a.opt.spyOffset)return this});(b=c(b).eq(b.length-
1))&&b.length&&(d=c('li:has(a[href="#'+b.attr("id")+'"])'),e!==g&&e.removeClass("active"),d.addClass("active"),e=d)})}};c.fn.anchorific=function(a){return this.each(function(){if(!c.data(this,"anchorific")){var b=Object.create(h);b.init(a,this);c.data(this,"anchorific",b)}})}})(jQuery,window,document);


/**
 * jQuery.print, version 1.3.3
 * @link: https://github.com/DoersGuild/jQuery.print
 * Licence: CC-By (http://creativecommons.org/licenses/by/3.0/)
 */
(function(c){function m(a){var b=c("");try{b=c(a).clone()}catch(d){b=c("<span />").html(a)}return b}function n(a,b){var d=c.Deferred();try{setTimeout(function(){a.focus();try{a.document.execCommand("print",!1,null)||a.print()}catch(b){a.print()}a.close();d.resolve()},b)}catch(f){d.reject(f)}return d}function l(a,b){var c=window.open();c.document.write(a);c.document.close();return n(c,b)}function p(a){return!!("object"===typeof Node?a instanceof Node:a&&"object"===typeof a&&"number"===typeof a.nodeType&&
"string"===typeof a.nodeName)}c.print=c.fn.print=function(){var a,b;b=this;b instanceof c&&(b=b.get(0));p(b)?(b=c(b),0<arguments.length&&(a=arguments[0])):0<arguments.length?(b=c(arguments[0]),p(b[0])?1<arguments.length&&(a=arguments[1]):(a=arguments[0],b=c("html"))):b=c("html");var d={globalStyles:!0,mediaPrint:!0,stylesheet:null,noPrintSelector:".no-print",iframe:!0,append:null,prepend:null,manuallyCopyFormValues:!0,deferred:c.Deferred(),timeout:1000};a=c.extend({},d,a||{});d=c("");a.globalStyles?
d=c("style, link, meta, title"):a.mediaPrint&&(d=c("link[media=print]"));a.stylesheet&&(d=c.merge(d,c('<link rel="stylesheet" href="'+a.stylesheet+'">')));b=b.clone();b=c("<span/>").append(b);b.find(a.noPrintSelector).remove();b.append(d.clone());b.append(m(a.append));b.prepend(m(a.prepend));a.manuallyCopyFormValues&&(b.find("input").each(function(){var a=c(this);a.is("[type='radio']")||a.is("[type='checkbox']")?a.prop("checked")&&a.attr("checked","checked"):a.attr("value",a.val())}),b.find("select").each(function(){c(this).find(":selected").attr("selected",
"selected")}),b.find("textarea").each(function(){var a=c(this);a.text(a.val())}));var f=b.html();try{a.deferred.notify("generated_markup",f,b)}catch(g){console.warn("Error notifying deferred",g)}b.remove();if(a.iframe)try{var h=c(a.iframe+""),q=h.length;0===q&&(h=c('<iframe height="0" width="0" border="0" wmode="Opaque"/>').prependTo("body").css({position:"absolute",top:-999,left:-999}));var e,k;e=h.get(0);e=e.contentWindow||e.contentDocument||e;k=e.document||e.contentDocument||e;k.open();k.write(f);
k.close();n(e,a.timeout).done(function(){setTimeout(function(){0===q&&h.remove()},100)}).fail(function(b){console.error("Failed to print from iframe",b);l(f,a.timeout)}).always(function(){try{a.deferred.resolve()}catch(b){console.warn("Error notifying deferred",b)}})}catch(g){console.error("Failed to print from iframe",g.stack,g.message),l(f,a.timeout).always(function(){try{a.deferred.resolve()}catch(b){console.warn("Error notifying deferred",b)}})}else l(f,a.timeout).always(function(){try{a.deferred.resolve()}catch(b){console.warn("Error notifying deferred",
b)}});return this}})(jQuery);
