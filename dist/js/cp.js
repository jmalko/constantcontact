!function(e){var t={};function n(r){if(t[r])return t[r].exports;var o=t[r]={i:r,l:!1,exports:{}};return e[r].call(o.exports,o,o.exports,n),o.l=!0,o.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var o in e)n.d(r,o,function(t){return e[t]}.bind(null,o));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="/",n(n.s=0)}([function(e,t,n){e.exports=n(1)},function(e,t,n){"use strict";n.r(t);var r=function(e,t,n,r,o,i,a,s){var u,l="function"==typeof e?e.options:e;if(t&&(l.render=t,l.staticRenderFns=n,l._compiled=!0),r&&(l.functional=!0),i&&(l._scopeId="data-v-"+i),a?(u=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),o&&o.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(a)},l._ssrRegister=u):o&&(u=s?function(){o.call(this,(l.functional?this.parent:this).$root.$options.shadowRoot)}:o),u)if(l.functional){l._injectStyles=u;var c=l.render;l.render=function(e,t){return u.call(t),c(e,t)}}else{var f=l.beforeCreate;l.beforeCreate=f?[].concat(f,u):[u]}return{exports:e,options:l}}({mixins:[Fieldtype,{methods:{normalizeInputOptions:function(e){return _.map(e,(function(t,n){return{value:Array.isArray(e)?t:n,label:t||n}}))}}}],data:function(){return{values:this.value||[]}},computed:{options:function(){return this.normalizeInputOptions(this.config.options)},replicatorPreview:function(){var e=this;return this.values.map((function(t){var n=_.findWhere(e.options,{value:t});return n?n.label:t})).join(", ")}},watch:{values:function(e,t){e=this.sortValues(e),JSON.stringify(e)!==JSON.stringify(t)&&this.update(e)},value:function(e){this.values=this.sortValues(e)}},methods:{focus:function(){this.$refs.checkbox[0].focus()},sortValues:function(e){return e?this.options.filter((function(t){return e.includes(t.value)})).map((function(e){return e.value})):[]}}},(function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",{staticClass:"checkboxes-fieldtype-wrapper",class:{"inline-mode":e.config.inline}},e._l(e.options,(function(t,r){return n("div",{key:r,staticClass:"option"},[n("label",[n("input",{directives:[{name:"model",rawName:"v-model",value:e.values,expression:"values"}],ref:"checkbox",refInFor:!0,attrs:{type:"checkbox",name:e.name+"[]",disabled:e.isReadOnly},domProps:{value:t.value,checked:Array.isArray(e.values)?e._i(e.values,t.value)>-1:e.values},on:{change:function(n){var r=e.values,o=n.target,i=!!o.checked;if(Array.isArray(r)){var a=t.value,s=e._i(r,a);o.checked?s<0&&(e.values=r.concat([a])):s>-1&&(e.values=r.slice(0,s).concat(r.slice(s+1)))}else e.values=i}}}),e._v("\n            "+e._s(t.label||t.value)+"\n        ")])])})),0)}),[],!1,null,null,null).exports;Statamic.booting((function(){Statamic.$components.register("constant_contact-fieldtype",r)}))}]);