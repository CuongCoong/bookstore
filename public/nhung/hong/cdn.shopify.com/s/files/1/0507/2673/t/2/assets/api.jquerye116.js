typeof Shopify=="undefined"&&(Shopify={}),Shopify.money_format="$ {{amount}}",Shopify.onError=function(XMLHttpRequest,textStatus){var data=eval("("+XMLHttpRequest.responseText+")");alert(data.message+"("+data.status+"): "+data.description)},Shopify.onCartUpdate=function(t){alert("There are now "+t.item_count+" items in the cart.")},Shopify.onItemAdded=function(t){alert(t.title+" was added to your shopping cart.")},Shopify.onProduct=function(t){alert("Received everything we ever wanted to know about "+t.title)},Shopify.formatMoney=function(t,o){var e="",r=/\{\{\s*(\w+)\s*\}\}/,n=o||this.money_format;switch(n.match(r)[1]){case"amount":e=floatToString(t/100,2).replace(/(\d+)(\d{3}[\.,]?)/,"$1 $2");break;case"amount_no_decimals":e=floatToString(t/100,0).replace(/(\d+)(\d{3}[\.,]?)/,"$1 $2");break;case"amount_with_comma_separator":e=floatToString(t/100,2).replace(/\./,",").replace(/(\d+)(\d{3}[\.,]?)/,"$1.$2");break}return n.replace(r,e)},Shopify.resizeImage=function(t,o){try{if(o=="original")return t;var e=t.match(/(.*\/[\w\-\_\.]+)\.(\w{2,4})/);return e[1]+"_"+o+"."+e[2]}catch(r){return t}},Shopify.addItem=function(t,o,e){o=o||1;var r={type:"POST",url:"/cart/add.js",data:"quantity="+o+"&id="+t,dataType:"json",success:function(n){typeof e=="function"?e(n):Shopify.onItemAdded(n)},error:function(n,a){Shopify.onError(n,a)}};jQuery.ajax(r)},Shopify.addItemFromForm=function(t,o){var e={type:"POST",url:"/cart/add.js",data:jQuery(t).serialize(),dataType:"json",success:function(r){typeof o=="function"?o(r,t):Shopify.onItemAdded(r,t)},error:function(r,n){Shopify.onError(r,n)}};jQuery.ajax(e)},Shopify.getCart=function(t){jQuery.getJSON("/cart.js",function(o,e){typeof t=="function"?t(o):Shopify.onCartUpdate(o)})},Shopify.getProduct=function(t,o){jQuery.getJSON("/products/"+t+".js",function(e,r){typeof o=="function"?o(e):Shopify.onProduct(e)})},Shopify.changeItem=function(t,o,e){var r={type:"POST",url:"/cart/change.js",data:"quantity="+o+"&id="+t,dataType:"json",success:function(n){typeof e=="function"?e(n):Shopify.onCartUpdate(n)},error:function(n,a){Shopify.onError(n,a)}};jQuery.ajax(r)},Shopify.removeItem=function(t,o){var e={type:"POST",url:"/cart/change.js",data:"quantity=0&id="+t,dataType:"json",success:function(r){typeof o=="function"?o(r):Shopify.onCartUpdate(r)},error:function(r,n){Shopify.onError(r,n)}};jQuery.ajax(e)},Shopify.clear=function(t){var o={type:"POST",url:"/cart/clear.js",data:"",dataType:"json",success:function(e){typeof t=="function"?t(e):Shopify.onCartUpdate(e)},error:function(e,r){Shopify.onError(e,r)}};jQuery.ajax(o)},Shopify.updateCartFromForm=function(t,o){var e={type:"POST",url:"/cart/update.js",data:jQuery(t).serialize(),dataType:"json",success:function(r){typeof o=="function"?o(r,t):Shopify.onCartUpdate(r,t)},error:function(r,n){Shopify.onError(r,n)}};jQuery.ajax(e)},Shopify.updateCartAttributes=function(t,o){var e="";jQuery.isArray(t)?jQuery.each(t,function(n,a){var i=attributeToString(a.key);i!==""&&(e+="attributes["+i+"]="+attributeToString(a.value)+"&")}):typeof t=="object"&&t!==null&&jQuery.each(t,function(n,a){e+="attributes["+attributeToString(n)+"]="+attributeToString(a)+"&"});var r={type:"POST",url:"/cart/update.js",data:e,dataType:"json",success:function(n){typeof o=="function"?o(n):Shopify.onCartUpdate(n)},error:function(n,a){Shopify.onError(n,a)}};jQuery.ajax(r)},Shopify.updateCartNote=function(t,o){var e={type:"POST",url:"/cart/update.js",data:"note="+attributeToString(t),dataType:"json",success:function(r){typeof o=="function"?o(r):Shopify.onCartUpdate(r)},error:function(r,n){Shopify.onError(r,n)}};jQuery.ajax(e)};function floatToString(t,o){var e=t.toFixed(o).toString();return e.match(/^\.\d+/)?"0"+e:e}function attributeToString(t){return typeof t!="string"&&(t+="",t==="undefined"&&(t="")),jQuery.trim(t)}
//# sourceMappingURL=/s/files/1/0507/2673/t/2/assets/api.jquery.js.map?v=117108174632146741091400587501
