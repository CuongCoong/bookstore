(function(r){r.fn.hoverIntent=function(v,i,I){var t={interval:100,sensitivity:7,timeout:0};typeof v=="object"?t=r.extend(t,v):r.isFunction(i)?t=r.extend(t,{over:v,out:i,selector:I}):t=r.extend(t,{over:v,out:v,selector:i});var u,s,a,f,c=function(o){u=o.pageX,s=o.pageY},h=function(o,e){if(e.hoverIntent_t=clearTimeout(e.hoverIntent_t),Math.abs(a-u)+Math.abs(f-s)<t.sensitivity)return r(e).off("mousemove.hoverIntent",c),e.hoverIntent_s=1,t.over.apply(e,[o]);a=u,f=s,e.hoverIntent_t=setTimeout(function(){h(o,e)},t.interval)},_=function(o,e){return e.hoverIntent_t=clearTimeout(e.hoverIntent_t),e.hoverIntent_s=0,t.out.apply(e,[o])},m=function(o){var e=jQuery.extend({},o),n=this;n.hoverIntent_t&&(n.hoverIntent_t=clearTimeout(n.hoverIntent_t)),o.type=="mouseenter"?(a=e.pageX,f=e.pageY,r(n).on("mousemove.hoverIntent",c),n.hoverIntent_s!=1&&(n.hoverIntent_t=setTimeout(function(){h(e,n)},t.interval))):(r(n).off("mousemove.hoverIntent",c),n.hoverIntent_s==1&&(n.hoverIntent_t=setTimeout(function(){_(e,n)},t.timeout)))};return this.on({"mouseenter.hoverIntent":m,"mouseleave.hoverIntent":m},t.selector)}})(jQuery);
//# sourceMappingURL=/s/files/1/0507/2673/t/2/assets/hoverIntent.js.map?v=84919160550285729141400587507
