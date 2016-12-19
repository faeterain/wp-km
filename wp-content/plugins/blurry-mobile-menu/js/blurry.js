
/*! Hammer.JS - v2.0.4 - 2014-09-28
 * http://hammerjs.github.io/
 *
 * Copyright (c) 2014 Jorik Tangelder;
 * Licensed under the MIT license */
!function(a,b,c,d){"use strict";function e(a,b,c){return setTimeout(k(a,c),b)}function f(a,b,c){return Array.isArray(a)?(g(a,c[b],c),!0):!1}function g(a,b,c){var e;if(a)if(a.forEach)a.forEach(b,c);else if(a.length!==d)for(e=0;e<a.length;)b.call(c,a[e],e,a),e++;else for(e in a)a.hasOwnProperty(e)&&b.call(c,a[e],e,a)}function h(a,b,c){for(var e=Object.keys(b),f=0;f<e.length;)(!c||c&&a[e[f]]===d)&&(a[e[f]]=b[e[f]]),f++;return a}function i(a,b){return h(a,b,!0)}function j(a,b,c){var d,e=b.prototype;d=a.prototype=Object.create(e),d.constructor=a,d._super=e,c&&h(d,c)}function k(a,b){return function(){return a.apply(b,arguments)}}function l(a,b){return typeof a==kb?a.apply(b?b[0]||d:d,b):a}function m(a,b){return a===d?b:a}function n(a,b,c){g(r(b),function(b){a.addEventListener(b,c,!1)})}function o(a,b,c){g(r(b),function(b){a.removeEventListener(b,c,!1)})}function p(a,b){for(;a;){if(a==b)return!0;a=a.parentNode}return!1}function q(a,b){return a.indexOf(b)>-1}function r(a){return a.trim().split(/\s+/g)}function s(a,b,c){if(a.indexOf&&!c)return a.indexOf(b);for(var d=0;d<a.length;){if(c&&a[d][c]==b||!c&&a[d]===b)return d;d++}return-1}function t(a){return Array.prototype.slice.call(a,0)}function u(a,b,c){for(var d=[],e=[],f=0;f<a.length;){var g=b?a[f][b]:a[f];s(e,g)<0&&d.push(a[f]),e[f]=g,f++}return c&&(d=b?d.sort(function(a,c){return a[b]>c[b]}):d.sort()),d}function v(a,b){for(var c,e,f=b[0].toUpperCase()+b.slice(1),g=0;g<ib.length;){if(c=ib[g],e=c?c+f:b,e in a)return e;g++}return d}function w(){return ob++}function x(a){var b=a.ownerDocument;return b.defaultView||b.parentWindow}function y(a,b){var c=this;this.manager=a,this.callback=b,this.element=a.element,this.target=a.options.inputTarget,this.domHandler=function(b){l(a.options.enable,[a])&&c.handler(b)},this.init()}function z(a){var b,c=a.options.inputClass;return new(b=c?c:rb?N:sb?Q:qb?S:M)(a,A)}function A(a,b,c){var d=c.pointers.length,e=c.changedPointers.length,f=b&yb&&d-e===0,g=b&(Ab|Bb)&&d-e===0;c.isFirst=!!f,c.isFinal=!!g,f&&(a.session={}),c.eventType=b,B(a,c),a.emit("hammer.input",c),a.recognize(c),a.session.prevInput=c}function B(a,b){var c=a.session,d=b.pointers,e=d.length;c.firstInput||(c.firstInput=E(b)),e>1&&!c.firstMultiple?c.firstMultiple=E(b):1===e&&(c.firstMultiple=!1);var f=c.firstInput,g=c.firstMultiple,h=g?g.center:f.center,i=b.center=F(d);b.timeStamp=nb(),b.deltaTime=b.timeStamp-f.timeStamp,b.angle=J(h,i),b.distance=I(h,i),C(c,b),b.offsetDirection=H(b.deltaX,b.deltaY),b.scale=g?L(g.pointers,d):1,b.rotation=g?K(g.pointers,d):0,D(c,b);var j=a.element;p(b.srcEvent.target,j)&&(j=b.srcEvent.target),b.target=j}function C(a,b){var c=b.center,d=a.offsetDelta||{},e=a.prevDelta||{},f=a.prevInput||{};(b.eventType===yb||f.eventType===Ab)&&(e=a.prevDelta={x:f.deltaX||0,y:f.deltaY||0},d=a.offsetDelta={x:c.x,y:c.y}),b.deltaX=e.x+(c.x-d.x),b.deltaY=e.y+(c.y-d.y)}function D(a,b){var c,e,f,g,h=a.lastInterval||b,i=b.timeStamp-h.timeStamp;if(b.eventType!=Bb&&(i>xb||h.velocity===d)){var j=h.deltaX-b.deltaX,k=h.deltaY-b.deltaY,l=G(i,j,k);e=l.x,f=l.y,c=mb(l.x)>mb(l.y)?l.x:l.y,g=H(j,k),a.lastInterval=b}else c=h.velocity,e=h.velocityX,f=h.velocityY,g=h.direction;b.velocity=c,b.velocityX=e,b.velocityY=f,b.direction=g}function E(a){for(var b=[],c=0;c<a.pointers.length;)b[c]={clientX:lb(a.pointers[c].clientX),clientY:lb(a.pointers[c].clientY)},c++;return{timeStamp:nb(),pointers:b,center:F(b),deltaX:a.deltaX,deltaY:a.deltaY}}function F(a){var b=a.length;if(1===b)return{x:lb(a[0].clientX),y:lb(a[0].clientY)};for(var c=0,d=0,e=0;b>e;)c+=a[e].clientX,d+=a[e].clientY,e++;return{x:lb(c/b),y:lb(d/b)}}function G(a,b,c){return{x:b/a||0,y:c/a||0}}function H(a,b){return a===b?Cb:mb(a)>=mb(b)?a>0?Db:Eb:b>0?Fb:Gb}function I(a,b,c){c||(c=Kb);var d=b[c[0]]-a[c[0]],e=b[c[1]]-a[c[1]];return Math.sqrt(d*d+e*e)}function J(a,b,c){c||(c=Kb);var d=b[c[0]]-a[c[0]],e=b[c[1]]-a[c[1]];return 180*Math.atan2(e,d)/Math.PI}function K(a,b){return J(b[1],b[0],Lb)-J(a[1],a[0],Lb)}function L(a,b){return I(b[0],b[1],Lb)/I(a[0],a[1],Lb)}function M(){this.evEl=Nb,this.evWin=Ob,this.allow=!0,this.pressed=!1,y.apply(this,arguments)}function N(){this.evEl=Rb,this.evWin=Sb,y.apply(this,arguments),this.store=this.manager.session.pointerEvents=[]}function O(){this.evTarget=Ub,this.evWin=Vb,this.started=!1,y.apply(this,arguments)}function P(a,b){var c=t(a.touches),d=t(a.changedTouches);return b&(Ab|Bb)&&(c=u(c.concat(d),"identifier",!0)),[c,d]}function Q(){this.evTarget=Xb,this.targetIds={},y.apply(this,arguments)}function R(a,b){var c=t(a.touches),d=this.targetIds;if(b&(yb|zb)&&1===c.length)return d[c[0].identifier]=!0,[c,c];var e,f,g=t(a.changedTouches),h=[],i=this.target;if(f=c.filter(function(a){return p(a.target,i)}),b===yb)for(e=0;e<f.length;)d[f[e].identifier]=!0,e++;for(e=0;e<g.length;)d[g[e].identifier]&&h.push(g[e]),b&(Ab|Bb)&&delete d[g[e].identifier],e++;return h.length?[u(f.concat(h),"identifier",!0),h]:void 0}function S(){y.apply(this,arguments);var a=k(this.handler,this);this.touch=new Q(this.manager,a),this.mouse=new M(this.manager,a)}function T(a,b){this.manager=a,this.set(b)}function U(a){if(q(a,bc))return bc;var b=q(a,cc),c=q(a,dc);return b&&c?cc+" "+dc:b||c?b?cc:dc:q(a,ac)?ac:_b}function V(a){this.id=w(),this.manager=null,this.options=i(a||{},this.defaults),this.options.enable=m(this.options.enable,!0),this.state=ec,this.simultaneous={},this.requireFail=[]}function W(a){return a&jc?"cancel":a&hc?"end":a&gc?"move":a&fc?"start":""}function X(a){return a==Gb?"down":a==Fb?"up":a==Db?"left":a==Eb?"right":""}function Y(a,b){var c=b.manager;return c?c.get(a):a}function Z(){V.apply(this,arguments)}function $(){Z.apply(this,arguments),this.pX=null,this.pY=null}function _(){Z.apply(this,arguments)}function ab(){V.apply(this,arguments),this._timer=null,this._input=null}function bb(){Z.apply(this,arguments)}function cb(){Z.apply(this,arguments)}function db(){V.apply(this,arguments),this.pTime=!1,this.pCenter=!1,this._timer=null,this._input=null,this.count=0}function eb(a,b){return b=b||{},b.recognizers=m(b.recognizers,eb.defaults.preset),new fb(a,b)}function fb(a,b){b=b||{},this.options=i(b,eb.defaults),this.options.inputTarget=this.options.inputTarget||a,this.handlers={},this.session={},this.recognizers=[],this.element=a,this.input=z(this),this.touchAction=new T(this,this.options.touchAction),gb(this,!0),g(b.recognizers,function(a){var b=this.add(new a[0](a[1]));a[2]&&b.recognizeWith(a[2]),a[3]&&b.requireFailure(a[3])},this)}function gb(a,b){var c=a.element;g(a.options.cssProps,function(a,d){c.style[v(c.style,d)]=b?a:""})}function hb(a,c){var d=b.createEvent("Event");d.initEvent(a,!0,!0),d.gesture=c,c.target.dispatchEvent(d)}var ib=["","webkit","moz","MS","ms","o"],jb=b.createElement("div"),kb="function",lb=Math.round,mb=Math.abs,nb=Date.now,ob=1,pb=/mobile|tablet|ip(ad|hone|od)|android/i,qb="ontouchstart"in a,rb=v(a,"PointerEvent")!==d,sb=qb&&pb.test(navigator.userAgent),tb="touch",ub="pen",vb="mouse",wb="kinect",xb=25,yb=1,zb=2,Ab=4,Bb=8,Cb=1,Db=2,Eb=4,Fb=8,Gb=16,Hb=Db|Eb,Ib=Fb|Gb,Jb=Hb|Ib,Kb=["x","y"],Lb=["clientX","clientY"];y.prototype={handler:function(){},init:function(){this.evEl&&n(this.element,this.evEl,this.domHandler),this.evTarget&&n(this.target,this.evTarget,this.domHandler),this.evWin&&n(x(this.element),this.evWin,this.domHandler)},destroy:function(){this.evEl&&o(this.element,this.evEl,this.domHandler),this.evTarget&&o(this.target,this.evTarget,this.domHandler),this.evWin&&o(x(this.element),this.evWin,this.domHandler)}};var Mb={mousedown:yb,mousemove:zb,mouseup:Ab},Nb="mousedown",Ob="mousemove mouseup";j(M,y,{handler:function(a){var b=Mb[a.type];b&yb&&0===a.button&&(this.pressed=!0),b&zb&&1!==a.which&&(b=Ab),this.pressed&&this.allow&&(b&Ab&&(this.pressed=!1),this.callback(this.manager,b,{pointers:[a],changedPointers:[a],pointerType:vb,srcEvent:a}))}});var Pb={pointerdown:yb,pointermove:zb,pointerup:Ab,pointercancel:Bb,pointerout:Bb},Qb={2:tb,3:ub,4:vb,5:wb},Rb="pointerdown",Sb="pointermove pointerup pointercancel";a.MSPointerEvent&&(Rb="MSPointerDown",Sb="MSPointerMove MSPointerUp MSPointerCancel"),j(N,y,{handler:function(a){var b=this.store,c=!1,d=a.type.toLowerCase().replace("ms",""),e=Pb[d],f=Qb[a.pointerType]||a.pointerType,g=f==tb,h=s(b,a.pointerId,"pointerId");e&yb&&(0===a.button||g)?0>h&&(b.push(a),h=b.length-1):e&(Ab|Bb)&&(c=!0),0>h||(b[h]=a,this.callback(this.manager,e,{pointers:b,changedPointers:[a],pointerType:f,srcEvent:a}),c&&b.splice(h,1))}});var Tb={touchstart:yb,touchmove:zb,touchend:Ab,touchcancel:Bb},Ub="touchstart",Vb="touchstart touchmove touchend touchcancel";j(O,y,{handler:function(a){var b=Tb[a.type];if(b===yb&&(this.started=!0),this.started){var c=P.call(this,a,b);b&(Ab|Bb)&&c[0].length-c[1].length===0&&(this.started=!1),this.callback(this.manager,b,{pointers:c[0],changedPointers:c[1],pointerType:tb,srcEvent:a})}}});var Wb={touchstart:yb,touchmove:zb,touchend:Ab,touchcancel:Bb},Xb="touchstart touchmove touchend touchcancel";j(Q,y,{handler:function(a){var b=Wb[a.type],c=R.call(this,a,b);c&&this.callback(this.manager,b,{pointers:c[0],changedPointers:c[1],pointerType:tb,srcEvent:a})}}),j(S,y,{handler:function(a,b,c){var d=c.pointerType==tb,e=c.pointerType==vb;if(d)this.mouse.allow=!1;else if(e&&!this.mouse.allow)return;b&(Ab|Bb)&&(this.mouse.allow=!0),this.callback(a,b,c)},destroy:function(){this.touch.destroy(),this.mouse.destroy()}});var Yb=v(jb.style,"touchAction"),Zb=Yb!==d,$b="compute",_b="auto",ac="manipulation",bc="none",cc="pan-x",dc="pan-y";T.prototype={set:function(a){a==$b&&(a=this.compute()),Zb&&(this.manager.element.style[Yb]=a),this.actions=a.toLowerCase().trim()},update:function(){this.set(this.manager.options.touchAction)},compute:function(){var a=[];return g(this.manager.recognizers,function(b){l(b.options.enable,[b])&&(a=a.concat(b.getTouchAction()))}),U(a.join(" "))},preventDefaults:function(a){if(!Zb){var b=a.srcEvent,c=a.offsetDirection;if(this.manager.session.prevented)return void b.preventDefault();var d=this.actions,e=q(d,bc),f=q(d,dc),g=q(d,cc);return e||f&&c&Hb||g&&c&Ib?this.preventSrc(b):void 0}},preventSrc:function(a){this.manager.session.prevented=!0,a.preventDefault()}};var ec=1,fc=2,gc=4,hc=8,ic=hc,jc=16,kc=32;V.prototype={defaults:{},set:function(a){return h(this.options,a),this.manager&&this.manager.touchAction.update(),this},recognizeWith:function(a){if(f(a,"recognizeWith",this))return this;var b=this.simultaneous;return a=Y(a,this),b[a.id]||(b[a.id]=a,a.recognizeWith(this)),this},dropRecognizeWith:function(a){return f(a,"dropRecognizeWith",this)?this:(a=Y(a,this),delete this.simultaneous[a.id],this)},requireFailure:function(a){if(f(a,"requireFailure",this))return this;var b=this.requireFail;return a=Y(a,this),-1===s(b,a)&&(b.push(a),a.requireFailure(this)),this},dropRequireFailure:function(a){if(f(a,"dropRequireFailure",this))return this;a=Y(a,this);var b=s(this.requireFail,a);return b>-1&&this.requireFail.splice(b,1),this},hasRequireFailures:function(){return this.requireFail.length>0},canRecognizeWith:function(a){return!!this.simultaneous[a.id]},emit:function(a){function b(b){c.manager.emit(c.options.event+(b?W(d):""),a)}var c=this,d=this.state;hc>d&&b(!0),b(),d>=hc&&b(!0)},tryEmit:function(a){return this.canEmit()?this.emit(a):void(this.state=kc)},canEmit:function(){for(var a=0;a<this.requireFail.length;){if(!(this.requireFail[a].state&(kc|ec)))return!1;a++}return!0},recognize:function(a){var b=h({},a);return l(this.options.enable,[this,b])?(this.state&(ic|jc|kc)&&(this.state=ec),this.state=this.process(b),void(this.state&(fc|gc|hc|jc)&&this.tryEmit(b))):(this.reset(),void(this.state=kc))},process:function(){},getTouchAction:function(){},reset:function(){}},j(Z,V,{defaults:{pointers:1},attrTest:function(a){var b=this.options.pointers;return 0===b||a.pointers.length===b},process:function(a){var b=this.state,c=a.eventType,d=b&(fc|gc),e=this.attrTest(a);return d&&(c&Bb||!e)?b|jc:d||e?c&Ab?b|hc:b&fc?b|gc:fc:kc}}),j($,Z,{defaults:{event:"pan",threshold:10,pointers:1,direction:Jb},getTouchAction:function(){var a=this.options.direction,b=[];return a&Hb&&b.push(dc),a&Ib&&b.push(cc),b},directionTest:function(a){var b=this.options,c=!0,d=a.distance,e=a.direction,f=a.deltaX,g=a.deltaY;return e&b.direction||(b.direction&Hb?(e=0===f?Cb:0>f?Db:Eb,c=f!=this.pX,d=Math.abs(a.deltaX)):(e=0===g?Cb:0>g?Fb:Gb,c=g!=this.pY,d=Math.abs(a.deltaY))),a.direction=e,c&&d>b.threshold&&e&b.direction},attrTest:function(a){return Z.prototype.attrTest.call(this,a)&&(this.state&fc||!(this.state&fc)&&this.directionTest(a))},emit:function(a){this.pX=a.deltaX,this.pY=a.deltaY;var b=X(a.direction);b&&this.manager.emit(this.options.event+b,a),this._super.emit.call(this,a)}}),j(_,Z,{defaults:{event:"pinch",threshold:0,pointers:2},getTouchAction:function(){return[bc]},attrTest:function(a){return this._super.attrTest.call(this,a)&&(Math.abs(a.scale-1)>this.options.threshold||this.state&fc)},emit:function(a){if(this._super.emit.call(this,a),1!==a.scale){var b=a.scale<1?"in":"out";this.manager.emit(this.options.event+b,a)}}}),j(ab,V,{defaults:{event:"press",pointers:1,time:500,threshold:5},getTouchAction:function(){return[_b]},process:function(a){var b=this.options,c=a.pointers.length===b.pointers,d=a.distance<b.threshold,f=a.deltaTime>b.time;if(this._input=a,!d||!c||a.eventType&(Ab|Bb)&&!f)this.reset();else if(a.eventType&yb)this.reset(),this._timer=e(function(){this.state=ic,this.tryEmit()},b.time,this);else if(a.eventType&Ab)return ic;return kc},reset:function(){clearTimeout(this._timer)},emit:function(a){this.state===ic&&(a&&a.eventType&Ab?this.manager.emit(this.options.event+"up",a):(this._input.timeStamp=nb(),this.manager.emit(this.options.event,this._input)))}}),j(bb,Z,{defaults:{event:"rotate",threshold:0,pointers:2},getTouchAction:function(){return[bc]},attrTest:function(a){return this._super.attrTest.call(this,a)&&(Math.abs(a.rotation)>this.options.threshold||this.state&fc)}}),j(cb,Z,{defaults:{event:"swipe",threshold:10,velocity:.65,direction:Hb|Ib,pointers:1},getTouchAction:function(){return $.prototype.getTouchAction.call(this)},attrTest:function(a){var b,c=this.options.direction;return c&(Hb|Ib)?b=a.velocity:c&Hb?b=a.velocityX:c&Ib&&(b=a.velocityY),this._super.attrTest.call(this,a)&&c&a.direction&&a.distance>this.options.threshold&&mb(b)>this.options.velocity&&a.eventType&Ab},emit:function(a){var b=X(a.direction);b&&this.manager.emit(this.options.event+b,a),this.manager.emit(this.options.event,a)}}),j(db,V,{defaults:{event:"tap",pointers:1,taps:1,interval:300,time:250,threshold:2,posThreshold:10},getTouchAction:function(){return[ac]},process:function(a){var b=this.options,c=a.pointers.length===b.pointers,d=a.distance<b.threshold,f=a.deltaTime<b.time;if(this.reset(),a.eventType&yb&&0===this.count)return this.failTimeout();if(d&&f&&c){if(a.eventType!=Ab)return this.failTimeout();var g=this.pTime?a.timeStamp-this.pTime<b.interval:!0,h=!this.pCenter||I(this.pCenter,a.center)<b.posThreshold;this.pTime=a.timeStamp,this.pCenter=a.center,h&&g?this.count+=1:this.count=1,this._input=a;var i=this.count%b.taps;if(0===i)return this.hasRequireFailures()?(this._timer=e(function(){this.state=ic,this.tryEmit()},b.interval,this),fc):ic}return kc},failTimeout:function(){return this._timer=e(function(){this.state=kc},this.options.interval,this),kc},reset:function(){clearTimeout(this._timer)},emit:function(){this.state==ic&&(this._input.tapCount=this.count,this.manager.emit(this.options.event,this._input))}}),eb.VERSION="2.0.4",eb.defaults={domEvents:!1,touchAction:$b,enable:!0,inputTarget:null,inputClass:null,preset:[[bb,{enable:!1}],[_,{enable:!1},["rotate"]],[cb,{direction:Hb}],[$,{direction:Hb},["swipe"]],[db],[db,{event:"doubletap",taps:2},["tap"]],[ab]],cssProps:{userSelect:"none",touchSelect:"none",touchCallout:"none",contentZooming:"none",userDrag:"none",tapHighlightColor:"rgba(0,0,0,0)"}};var lc=1,mc=2;fb.prototype={set:function(a){return h(this.options,a),a.touchAction&&this.touchAction.update(),a.inputTarget&&(this.input.destroy(),this.input.target=a.inputTarget,this.input.init()),this},stop:function(a){this.session.stopped=a?mc:lc},recognize:function(a){var b=this.session;if(!b.stopped){this.touchAction.preventDefaults(a);var c,d=this.recognizers,e=b.curRecognizer;(!e||e&&e.state&ic)&&(e=b.curRecognizer=null);for(var f=0;f<d.length;)c=d[f],b.stopped===mc||e&&c!=e&&!c.canRecognizeWith(e)?c.reset():c.recognize(a),!e&&c.state&(fc|gc|hc)&&(e=b.curRecognizer=c),f++}},get:function(a){if(a instanceof V)return a;for(var b=this.recognizers,c=0;c<b.length;c++)if(b[c].options.event==a)return b[c];return null},add:function(a){if(f(a,"add",this))return this;var b=this.get(a.options.event);return b&&this.remove(b),this.recognizers.push(a),a.manager=this,this.touchAction.update(),a},remove:function(a){if(f(a,"remove",this))return this;var b=this.recognizers;return a=this.get(a),b.splice(s(b,a),1),this.touchAction.update(),this},on:function(a,b){var c=this.handlers;return g(r(a),function(a){c[a]=c[a]||[],c[a].push(b)}),this},off:function(a,b){var c=this.handlers;return g(r(a),function(a){b?c[a].splice(s(c[a],b),1):delete c[a]}),this},emit:function(a,b){this.options.domEvents&&hb(a,b);var c=this.handlers[a]&&this.handlers[a].slice();if(c&&c.length){b.type=a,b.preventDefault=function(){b.srcEvent.preventDefault()};for(var d=0;d<c.length;)c[d](b),d++}},destroy:function(){this.element&&gb(this,!1),this.handlers={},this.session={},this.input.destroy(),this.element=null}},h(eb,{INPUT_START:yb,INPUT_MOVE:zb,INPUT_END:Ab,INPUT_CANCEL:Bb,STATE_POSSIBLE:ec,STATE_BEGAN:fc,STATE_CHANGED:gc,STATE_ENDED:hc,STATE_RECOGNIZED:ic,STATE_CANCELLED:jc,STATE_FAILED:kc,DIRECTION_NONE:Cb,DIRECTION_LEFT:Db,DIRECTION_RIGHT:Eb,DIRECTION_UP:Fb,DIRECTION_DOWN:Gb,DIRECTION_HORIZONTAL:Hb,DIRECTION_VERTICAL:Ib,DIRECTION_ALL:Jb,Manager:fb,Input:y,TouchAction:T,TouchInput:Q,MouseInput:M,PointerEventInput:N,TouchMouseInput:S,SingleTouchInput:O,Recognizer:V,AttrRecognizer:Z,Tap:db,Pan:$,Swipe:cb,Pinch:_,Rotate:bb,Press:ab,on:n,off:o,each:g,merge:i,extend:h,inherit:j,bindFn:k,prefixed:v}),a[c]=eb}(window,document,"HammerBlurry");
//# sourceMappingURL=hammer.min.map


;(function(factory) {
	factory(jQuery, HammerBlurry);
}(function($, Hammer) {
	function hammerify(el, options) {
		var $el = $(el);
		if(!$el.data("hammer")) {
			$el.data("hammer", new Hammer($el[0], options));
		}
	}

	$.fn.hammerBlurry = function(options) {
		return this.each(function() {
			hammerify(this, options);
		});
	};

	// extend the emit method to also trigger jQuery events
	Hammer.Manager.prototype.emit = (function(originalEmit) {
		return function(type, data) {
			originalEmit.call(this, type, data);
			$(this.element).trigger({
				type: type,
				gesture: data
			});
		};
	})(Hammer.Manager.prototype.emit);
}));


jQuery(function($){
	var opts = window.blurry_Opts;
	var width = window.innerWidth ? window.innerWidth : jQuery(window).width();
	if (!mobilecheck() || (opts && opts.test_mode === 'yes' && !jQuery('body').is('.logged-in.admin-bar')) || width > parseInt(opts.gen_width) )
	{
		return;
	}



	/**
	 * jquery.dlmenu.js v1.0.1
	 * http://www.codrops.com
	 *
	 * Licensed under the MIT license.
	 * http://www.opensource.org/licenses/mit-license.php
	 *
	 * Copyright 2013, Codrops
	 * http://www.codrops.com
	 */
	;( function( $, window, undefined ) {

		'use strict';

		// global
		var $body = $( 'body' );

		var MENU_MAX_HEIGHT = 310;
		var NAV_DEF = 'Main menu'

		var helperElem = document.createElement('div');

		var vendorPrefix = (function () {
			var styles = window.getComputedStyle(document.documentElement, ''),
				pre = (Array.prototype.slice
					.call(styles)
					.join('')
					.match(/-(moz|webkit|ms)-/) || (styles.OLink === '' && ['', 'o'])
					)[1],
				dom = ('WebKit|Moz|MS|O').match(new RegExp('(' + pre + ')', 'i'))[1];
			return {
				dom: dom,
				lowercase: pre,
				css: '-' + pre + '-',
				js: pre[0].toUpperCase() + pre.substr(1)
			};
		})();

		var supportAnimations = function () {
			var animation = false,
				animationstring = 'animation',
				keyframeprefix = '',
				domPrefixes = 'Webkit Moz O ms Khtml'.split(' '),
				pfx  = '';

			if( helperElem.style.animationName !== undefined ) { animation = true; }

			if( animation === false ) {
				for( var i = 0; i < domPrefixes.length; i++ ) {
					if( helperElem.style[ domPrefixes[i] + 'AnimationName' ] !== undefined ) {
						pfx = domPrefixes[ i ];
						animationstring = pfx + 'Animation';
						keyframeprefix = '-' + pfx.toLowerCase() + '-';
						animation = true;
						break;
					}
				}
			}
			return animation;
		}();
		var supportTransitions = function(){
			var b = document.body || document.documentElement;
			var s = b.style;
			var p = 'transition';
			if (typeof s[p] == 'string') {
				return true;
			}

			// Tests for vendor specific prop
			var v = ['Moz', 'webkit', 'Webkit', 'Khtml', 'O', 'ms'],
				p = p.charAt(0).toUpperCase() + p.substr(1);
			for (var i = 0; i < v.length; i++) {
				if (typeof s[v[i] + p] == 'string') {
					return true;
				}
			}
			return false;
		}();


		$.DLMenu = function( options, element ) {
			this.$el = $( element );
			this._init( options );
		};

		// the options
		$.DLMenu.defaults = {
			// classes for the animation effects
			animationClasses : { classin : 'dl-animate-in-1', classout : 'dl-animate-out-1' },
			// callback: click a link that has a sub menu
			// el is the link element (li); name is the level name
			onLevelClick : function( el, name ) { return false; },
			// callback: click a link that does not have a sub menu
			// el is the link element (li); ev is the event obj
			onLinkClick : function( el, ev ) {
				var hr = $(el).find('a').attr('href');
				if (!hr) return;

				ev.preventDefault();
				if (hr !== '#' || hr !== '/') $('body').addClass('blurry-body-out');
				location.href = hr;
				return false;
			}
		};

		$.DLMenu.prototype = {
			_init : function( options ) {
				// options
				this.options = $.extend( true, {}, $.DLMenu.defaults, options );
				// cache some elements and initialize some variables
				this._config();

				if (this.$menu.find('> li').length > 5) this.$shadowB.show();

				var animEndEventNames = {
						'webkitanimation' : 'webkitAnimationEnd',
						'mozanimation' : 'mozAnimationEnd',
						'oanimation' : 'oAnimationEnd',
						'msanimation' : 'MSAnimationEnd',
						'animation' : 'animationend'
					},
					transEndEventNames = {
						'webkittransition' : 'webkitTransitionEnd',
						'moztransition' : 'transitionend',
						'otransition' : 'oTransitionEnd',
						'mstransition' : 'MSTransitionEnd',
						'transition' : 'transitionend'
					};
				// animation end event name
				this.animEndEventName = animEndEventNames[ vendorPrefix.lowercase + 'animation' ] + '.dlmenu';
				// transition end event name
				this.transEndEventName = transEndEventNames[ vendorPrefix.lowercase + 'transition' ] + '.dlmenu',
					// support for css animations and css transitions
					this.supportAnimations = supportAnimations,
					this.supportTransitions = supportTransitions;

				this._initEvents();

			},
			_config : function() {
				this.open = false;
				this.reset = this._resetMenu;
				this.$blurry = this.$el.closest('#blurry-menu');
				this.$navbar = this.$blurry.find('#blurry-menu-navbar');
				this.$shadowB = this.$blurry.find('#blurry-menu-navbar-shadow-bottom');
				this.$trigger = this.$el.children( '.dl-trigger' );
				this.$menu = this.$el.children( 'ul.dl-menu' );
				this.$menuitems = this.$menu.find( 'li:not(.dl-back)' );
				this.$el.find( 'ul.dl-submenu' ).prepend( '<li class="dl-back"><a href="#">back</a></li>' );
				this.$back = this.$menu.find( 'li.dl-back' );
			},
			_initEvents : function() {

				var self = this;

				this.$trigger.on( 'click.dlmenu', function() {

					if( self.open ) {
						self._closeMenu();
					}
					else {
						self._openMenu();
					}
					return false;

				} );

				this.$menuitems.on( 'click.dlmenu', function( event ) {

					event.stopPropagation();

					var $item = $(this),
						$submenu = $item.children( 'ul.dl-submenu' );

					var _h;

					if( $submenu.length > 0 ) {

						$submenu.add($item).css('-webkit-overflow-scrolling', '');
						self.$shadowB.hide();

						var $flyin = $submenu.clone().css( 'opacity', 0 ).insertAfter( self.$menu ),
							onAnimationEndFn = function() {

								self.$menu.off( self.animEndEventName ).removeClass( self.options.animationClasses.classout ).addClass( 'dl-subview' );
								$item.addClass( 'dl-subviewopen' ).parents( '.dl-subviewopen:first' ).removeClass( 'dl-subviewopen' ).addClass( 'dl-subview' );
								$flyin.remove();
								$submenu.css( '-webkit-overflow-scrolling', 'touch');

								if (_h >= MENU_MAX_HEIGHT) {
									self.$shadowB.fadeIn(); // TODO css3
								}
							};

						_h = $flyin.outerHeight();

						self.$navbar.html('<span>back</span>' || '<span>' + $item.find('> a').text() + '</span>');

						setTimeout( function() {

							$flyin.addClass( self.options.animationClasses.classin );
							self.$menu.addClass( self.options.animationClasses.classout );

							if( self.supportAnimations && self.animEndEventName.indexOf('moz') === -1 ) {
								self.$menu.on( self.animEndEventName, onAnimationEndFn );
							}
							else {
								onAnimationEndFn.call();
							}

							self.options.onLevelClick( $item, $item.children( 'a:first' ).text() );
						} );

						return false;

					}
					else {
						self.options.onLinkClick( $item, event );
					}

				}).find('a').click(function(e){
					e.preventDefault();
				});

				this.$back.on( 'click.dlmenu', function( event ) {

					var $this = $( this ),
						$submenu = $this.parents( 'ul.dl-submenu:first' ),
						$item = $submenu.parent(),

						$flyin = $submenu.clone().insertAfter( self.$menu ).css( 'opacity', 0 );

					$this.css('display', '');

					var onAnimationEndFn = function() {

						self.$menu.off( self.animEndEventName ).removeClass( self.options.animationClasses.classin );
						$flyin.remove();
					};

					self.$shadowB.hide();

					setTimeout( function() {
						$flyin.addClass( self.options.animationClasses.classout );
						self.$menu.addClass( self.options.animationClasses.classin );
						if( self.supportAnimations && self.animEndEventName.indexOf('moz') === -1) {
							self.$menu.on( self.animEndEventName, onAnimationEndFn );
						}
						else {
							onAnimationEndFn.call();
						}

						$item.removeClass( 'dl-subviewopen' );

						var $subview = $this.parents( '.dl-subview:first' );
						if( $subview.is( 'li' ) ) {
							$subview.addClass( 'dl-subviewopen' );
						}
						$subview.removeClass( 'dl-subview' );

						if ($subview.outerHeight() >= MENU_MAX_HEIGHT) {
							self.$shadowB.fadeIn(); // TODO css3
						}

						if ($item.closest('ul').is('.dl-menu')) self.$navbar.html(NAV_DEF);
					} );

					return false;

				} );

				this.$navbar.click(function(){
					self.$menu.find('.dl-subviewopen .dl-submenu .dl-back a').click()
				});

			},
			closeMenu : function() {
				if( this.open ) {
					this._closeMenu();
				}
			},
			_closeMenu : function() {
				var self = this,
					onTransitionEndFn = function() {
						self.$menu.off( self.transEndEventName );
						self._resetMenu();
					};

				this.$menu.removeClass( 'dl-menuopen' );
				this.$menu.addClass( 'dl-menu-toggle' );
				this.$trigger.removeClass( 'dl-active' );

				if( this.supportTransitions ) {
					this.$menu.on( this.transEndEventName, onTransitionEndFn );
				}
				else {
					onTransitionEndFn.call();
				}

				this.open = false;
			},
			openMenu : function() {
				if( !this.open ) {
					this._openMenu();
				}
			},
			_openMenu : function() {
				var self = this;
				// clicking somewhere else makes the menu close
				$body.off( 'click' ).on( 'click.dlmenu', function() {
					self._closeMenu() ;
				} );
				this.$menu.addClass( 'dl-menuopen dl-menu-toggle' ).on( this.transEndEventName, function() {
					$( this ).removeClass( 'dl-menu-toggle' );
				} );
				this.$trigger.addClass( 'dl-active' );
				this.open = true;
			},
			// resets the menu to its original state (first level of options)
			_resetMenu : function() {
				this.$menu.removeClass( 'dl-subview' );
				this.$menuitems.removeClass( 'dl-subview dl-subviewopen' );
				this.$navbar.html(NAV_DEF)
			}
		};

		var logError = function( message ) {
			if ( window.console ) {
				window.console.error( message );
			}
		};

		$.fn.dlmenu = function( options ) {
			if ( typeof options === 'string' ) {
				var args = Array.prototype.slice.call( arguments, 1 );
				this.each(function() {
					var instance = $.data( this, 'dlmenu' );
					if ( !instance ) {
						logError( "cannot call methods on dlmenu prior to initialization; " +
							"attempted to call method '" + options + "'" );
						return;
					}
					if ( !$.isFunction( instance[options] ) || options.charAt(0) === "_" ) {
						logError( "no such method '" + options + "' for dlmenu instance" );
						return;
					}
					instance[ options ].apply( instance, args );
				});
			}
			else {
				this.each(function() {
					/*var instance = $.data( this, 'dlmenu' );
					 if ( instance ) {
					 instance._init();
					 }
					 else {
					 instance = $.data( this, 'dlmenu', new $.DLMenu( options, this) );
					 }*/
					var instance = new $.DLMenu( options, this);
					$.data( this, 'dlmenu', instance);
				});
			}
			return this;
		};

	} )( jQuery, window );


	window.jQuery(function($){


		if (opts.hideDefMenu === 'yes') jQuery('#blurry-marker').parent().hide();


		setTimeout(function(){

			var $defmenu = $('.blurry-menu');
			var pre = 'blurry';
			var $cont;
			var menuOpts = {
				addHomeLink: opts.addHomeLink === 'yes',
				addHomeText: opts.addHomeText || 'Home',
				subMenuSupport: opts.subMenuSupport === 'yes',
				subMenuSelector: opts.subMenuSelector,
				activeClassSelector: opts.activeClassSelector || '',
				allowedTags: 'DIV, NAV, UL, OL, LI, A, P, H1, H2, H3, H4, SPAN',
				transitionDuration: 300
			}

			// caching
			var $win = $(window);
			var $body = $('body');
			var $overlay = $('#blurry-overlay');
			var $tab = $('#blurry-tab');
			var $toggler = $('.blurry-left.blurry-icon');
			var $search = $('.blurry-right.blurry-icon');
			var $blurryMenu = $('#blurry-menu');
			var $duplicate = $('<div id="blurry-body-duplicate"></div>');
			var $bodyContents = $body.children().not('script, #blurry-overlay, #blurry-tab, #blurry-menu');
			var $dlMenu;
			var currMenuItemsNum;

			var menuVisible = false;

			var utils = {
				hasTranslate3d : function () {
					var docStyle = document.documentElement.style;

					var engine;
					if (window.opera && Object.prototype.toString.call(opera) === '[object Opera]') {
						engine = 'presto';
					} else if ('MozAppearance' in docStyle) {
						engine = 'gecko';
					} else if ('WebkitAppearance' in docStyle) {
						engine = 'webkit';
					} else if (typeof navigator.cpuClass === 'string') {
						engine = 'trident';
					}

					var vendorPrefix = {
						trident: 'ms',
						gecko: 'Moz',
						webkit: 'Webkit',
						presto: 'O'
					}[engine];

					var helperElem = document.createElement("div");
					var undef;

					var perspectiveProperty = vendorPrefix + "Perspective";
					var transformProperty = vendorPrefix + "Transform";

					if (helperElem.style[perspectiveProperty] !== undef) {
						return '3d'
					} else if (helperElem.style[transformProperty] !== undef) {
						return '2d'
					} else {
						return false
					}
				},

				supportsCssFilter : function() {
					var el, test1, test2;

					el = document.createElement('div');
					el.style.cssText = (/webkit/.test(navigator.userAgent.toLowerCase()) ? '-webkit-' : '') + 'filter: blur(2px)';

					test1 = (el.style.length != 0);
					test2 = (
						document.documentMode === undefined
							|| document.documentMode > 9
						);
					return test1 && test2;
				},

				lockScroll: function(e){
					var scrollTarget = $(e.gesture.target).closest(".blurry-scrollable");
					if(scrollTarget.length && scrollTarget.find(' > li').length > 5)
					{
						var scrollTopMax = scrollTarget[0].scrollHeight - scrollTarget.outerHeight();

						if(scrollTopMax >= 0){
							var scrollTop = scrollTarget.scrollTop();
							if(scrollTop > 0 && scrollTop < scrollTopMax){
								//		                console.log("scrolling in the middle");
							}
							else if(scrollTop <= 0 && e.gesture.deltaY < 0){
								//		                console.log("scrolling from top");
							}
							else if(scrollTop >= scrollTopMax && e.gesture.deltaY > 0){
								//		                console.log("scrolling from bottom");
							}
							else{
								e.gesture.preventDefault();
							}
						}
						else{
							e.gesture.preventDefault();
						}
					}
					else{
						e.gesture.preventDefault();
					}
				},
				checkOrientation: function(){
					var o = window.orientation;
					if (o) {
						if (o != 90 && o != -90) {
							return 'portrait';
						} else {
							return 'landscape';
						}
					} else {
						if ($win.height() > $win.width()) {
							return 'portrait';
						} else {
							return 'landscape';
						}
					}
				}
			}

			$.fn.hasClasses = function(e) {
				var classes = e.replace(/\s/g, "").split(","),
					t = this;
				for (var i in classes) {
					if ($(t).hasClass(classes[i])) return true;
				}
				return false
			}
			$.fn.addClasses = function (e) {
				var classes = e.replace(/\s/g, "").split(","),
					t = this;
				for (var i in classes) $(t).addClass(classes[i])
			}

			var Menu = {
				build: function () {
					var $newMenu;
					$newMenu = $defmenu.clone().removeAttr("id class");
					$newMenu = this.processDefMenu($newMenu);
					$newMenu.find('> div').children().unwrap();

					if (menuOpts.addHomeLink) {
						$newMenu.prepend('<li><a href="http://' + window.location.hostname + '">' + menuOpts.addHomeText + "</a></li>");
					}

					if ($newMenu.prop("tagName") === 'UL') {
						$newMenu.addClass(pre + "-menu-level-0 dl-menu dl-menuopen blurry-scrollable");
					} else {
						$newMenu.find("ul").first().addClass(pre + "-menu-level-0 dl-menu dl-menuopen blurry-scrollable").siblings("ul").addClass(pre + "-menu-level-0 dl-menu dl-menuopen");
					}

					menuOpts.subMenuSelector && menuOpts.subMenuSupport ? this.buildSubMenus($newMenu) : this.removeSubMenus($newMenu);

					$blurryMenu.prepend($newMenu);
					$newMenu.wrap('<nav class="' + pre + '-nav dl-menuwrapper" />').show();
					$cont = $("#" + pre + "-nav");
				},

				processDefMenu: function ($menu) {

					var activeClassSelector = menuOpts.activeClassSelector ? menuOpts.activeClassSelector : "";
					var classes = menuOpts.subMenuSelector ? menuOpts.subMenuSelector : "";
					var	tags = menuOpts.allowedTags ? menuOpts.allowedTags.replace(/\s/g, "").split(",") : allowedTags;

					$menu.find('.skip-link, .menu-toggle, a[title*="Skip to content"]').remove();
					$menu.find("*").each(function () {
						var $t = $(this);
						var tag = $t.prop('tagName');

						if (tags.indexOf(tag) === -1 || $.trim($t.text()) === "" || $t.is('.uber-close')) {
							return $t.remove();
						}

						if ($t.hasClasses(classes)) {
							$t.removeAttr("class id").addClasses(classes);
						} else {
							if ($t.hasClasses(activeClassSelector)) {
								$t.removeAttr("class id").addClass(pre + "-active-class");
							} else {
								$t.removeAttr("class id");
							}
						}

						$t.removeAttr("style");
					});

					$menu.find('ul.sub-menu').each(function(i, el) {
						console.log(this)
						var $t = $(this);
						var $top = $t.siblings('a').first();
						var classes = $t.find('> li').attr('class');
						if ($top.length) {
							//$t.prepend('<li class="' + classes + ' blurry-menu-item-duplicate"><a href="'+ $top.attr('href') + '">' + $top.text() + '</a></li>')
						}
					})

					return $menu;
				},

				buildSubMenus:function ($menu) {
					var children = menuOpts.subMenuSelector.replace(/\s/g, "").split(",");

					for (var i = 0, len = children.length; i < len; i++) {
						$menu.find("." + children[i]).each(function () {
							var $t = $(this);
							$t.removeAttr("id class")
								.addClass(pre + "-child-menu blurry-scrollable dl-submenu ")
								.parent()
								.addClass(pre + "-has-child-menu")
								.bind('click', function (e) {
									if (e.target.nodeName !== 'A') {
										e.preventDefault();
										e.stopPropagation()
										$(this).toggleClass(pre + "-child-menu-open");
										$t.toggle();
									}
								})
						});
					}
					if (menuOpts.activeClassSelector) {
						//this.toggleActiveClasses($menu);
					}
					this.detectLevel($menu)
				},

				detectLevel:function ($menu) {
					$menu.find("." + pre + "-child-menu").each(function () {
						var $t = $(this);
						var t = $t.parents("." + pre + "-child-menu").length + 1;
						$t.addClass(pre + "-menu-level-" + t);
					})
				},

				removeSubMenus:function ($menu) {
					if (!menuOpts.subMenuSupport) {

						return $menu.children().each(function () {
							$(this).find("ul").remove();
						});
					} else {
						var o = menuOpts.subMenuSelector.replace(/\s/g, "").split(",");
						for (var l in o) $menu.find("." + o[l]).each(function () {
							$(this).remove()
						})
					}
				},

				toggleActiveClasses: function($menu) {
					$menu.find("." + pre + "-has-child-menu").each(function() {
						var $t = $(this);
						if ($t.find("*").children("." + pre + "-active-class").length > 0) {
							$t.toggleClass(pre + "-child-menu-open");
							setTimeout(function() {
								$t.addClass(pre + "-child-menu-open");
								$t.find("." + pre + "-child-menu").first().show()
							}, menuOpts.transitionDuration);
						}
					})
				}
			};

			$body.hammerBlurry();

			if (utils.supportsCssFilter()) {

				if (opts.navbar_blur) {
					$duplicate.append($bodyContents.clone());
					$tab.prepend($duplicate);

					$body.bind('touchmove touchend', function(){
						top = $win.scrollTop();
						left = $win.scrollLeft();

						var translation = 'translate3d(' + (-left) + 'px,' + (-top) + 'px, 0)';
						$duplicate.css({
							'-webkit-transform':translation,
							'-moz-transform':translation,
							'transform':translation
						})
					});

					$win.bind('scroll', function(){
						top = $win.scrollTop();
						left = $win.scrollLeft();

						var translation = 'translate3d(' + (-left) + 'px,' + (-top) + 'px, 0)';
						$duplicate.css({
							'-webkit-transform':translation,
							'-moz-transform':translation,
							'transform':translation
						})
					});
				}
			} else {
				$body.addClass('blurry-no-css-filter-support');
			}

			$toggler.add(opts.togglers).click(function(e) {
				e.preventDefault();
				if (!menuVisible) {
					$body.on('drag swipe', utils.lockScroll).addClass('blurry-blurred');
					setupPosition();
					menuVisible = true;
				} else {
					$body.off('drag swipe', utils.lockScroll).removeClass('blurry-blurred');
					if ($dlMenu) $dlMenu.reset();
					menuVisible = false;
				}
				return false;
			});

			$search.click(function(){
				var _w = window.innerWidth ? (window.innerWidth - 16) : ($win.width() - 16);
				var opened = $body.is('.blurry-search-open');
				var $inp = $('.blurry-search-holder input:text');

				if (opened) {
					$body.removeClass('blurry-search-open');
					$inp.css('width', '0px');
				} else {
					//window.scrollTo(0,0)
					$body.addClass('blurry-search-open');

					$inp.css('width', _w + 'px')
					$inp.on('touchstart focus', function() {
						window.scrollTo(0,0)
					});

				}
			})

			$overlay.click(function(e){
				$body.off('drag swipe', utils.lockScroll).removeClass('blurry-blurred');
				if ($dlMenu) $dlMenu.reset();
				menuVisible = false;
			});

			var top, left;

			function setupPosition() {
				var wh = $win.height();
				$overlay.height(wh * 4);

				if (utils.checkOrientation() === 'portrait') {
					$blurryMenu.css({'top': '50%', 'marginTop': 25 - (( 310 + 56 ) / 2)});
				} else {
					var _h = window.innerHeight ? (window.innerHeight - 105) : ($win.height() - 55);
					$blurryMenu.find('.dl-menuwrapper').height(_h).css('top', '');
				}
			}

			$win.on( 'orientationchange', function () {
				// reset
				if (menuVisible) {
					setupPosition();
				}
			})

			Menu.build();

			$('.blurry-nav').dlmenu({
				animationClasses:{ classin:'dl-animate-in-' + opts.menu_animation, classout:'dl-animate-out-' + opts.menu_animation }
			});

			$dlMenu = $('.blurry-nav').data('dlmenu');

			$tab.add('.blurry-icon, .blurry-search-holder').show();
			$body.addClass('blurry-on');

			if (!$('body > #blurry-menu').length) {
				$body.prepend($('#blurry-tab, .blurry-icon, .blurry-search-holder, #blurry-overlay, #blurry-menu'))
			}

		}, 0);


	});

	function mobilecheck() {

		var n = navigator.userAgent;

		var match = n.match(/Android\s([0-9\.]*)/);
		var android =  match ? parseFloat(match[1]) : false;
		if (android && android < 3.6) return

		return n.match(/Android|BlackBerry|IEMobile|iPhone|iPad|iPod|Opera Mini/i)
	}
});


(function(){



}())









