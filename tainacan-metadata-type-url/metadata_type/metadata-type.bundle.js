!function(e){var t={};function n(i){if(t[i])return t[i].exports;var a=t[i]={i:i,l:!1,exports:{}};return e[i].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,i){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:i})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var i=Object.create(null);if(n.r(i),Object.defineProperty(i,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(i,a,function(t){return e[t]}.bind(null,a));return i},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=0)}([function(e,t,n){"use strict";n.r(t);var i=function(){var e=this,t=e.$createElement,n=e._self._c||t;return e.itemMetadatum?n("div",[n("b-input",{attrs:{disabled:e.disabled,id:"tainacan-item-metadatum_id-"+e.itemMetadatum.metadatum.id+(e.itemMetadatum.parent_meta_id?"_parent_meta_id-"+e.itemMetadatum.parent_meta_id:""),value:e.value,placeholder:e.URL,type:"url"},on:{input:function(t){return e.onInput(t)},blur:e.onBlur}}),e._v(" "),e.itemMetadatum.item.id?n("div",{staticClass:"add-new-term"},[n("a",{staticClass:"add-link",on:{click:e.previewHtml}},[e._m(0),e._v(" "),n("span",{staticStyle:{"font-size":"0.75em"}},[e._v(" Preview")])])]):e._e(),e._v(" "),n("transition",{attrs:{name:"filter-item"}},[e.isPreviewingHtml?n("div",{domProps:{innerHTML:e._s(e.singleHTMLPreview)}}):e._e()])],1):e._e()};i._withStripped=!0;var a=function(e,t,n,i,a,r,s,o){var l,u="function"==typeof e?e.options:e;if(t&&(u.render=t,u.staticRenderFns=n,u._compiled=!0),i&&(u.functional=!0),r&&(u._scopeId="data-v-"+r),s?(l=function(e){(e=e||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(e=__VUE_SSR_CONTEXT__),a&&a.call(this,e),e&&e._registeredComponents&&e._registeredComponents.add(s)},u._ssrRegister=l):a&&(l=o?function(){a.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:a),l)if(u.functional){u._injectStyles=l;var d=u.render;u.render=function(e,t){return l.call(t),d(e,t)}}else{var c=u.beforeCreate;u.beforeCreate=c?[].concat(c,l):[l]}return{exports:e,options:u}}({name:"TainacanMetadataTypeURL",props:{itemMetadatum:Object,value:[String,Number,Array],disabled:!1},data:()=>({isPreviewingHtml:!1,singleHTMLPreview:""}),methods:{onInput(e){this.isPreviewingHtml=!1,this.singleHTMLPreview="",this.$emit("input",e)},onBlur(){this.$emit("blur")},createElementFromHTML(e){let t=document.createElement("div");return t.innerHTML=e.trim(),t},previewHtml(){if(!this.isPreviewingHtml)if("yes"==this.itemMetadatum.metadatum.multiple){const e=this.createElementFromHTML(this.itemMetadatum.value_as_html),t=Object.values(e.children).filter(e=>'<span class="multivalue-separator"> | </span>'!=e.outerHTML),n=this.itemMetadatum.value.findIndex(e=>e==this.value);n>=0&&(this.singleHTMLPreview=t[n].outerHTML)}else this.singleHTMLPreview=this.itemMetadatum.value_as_html;this.isPreviewingHtml=!this.isPreviewingHtml}}},i,[function(){var e=this.$createElement,t=this._self._c||e;return t("span",{staticClass:"icon"},[t("i",{staticClass:"tainacan-icon has-text-secondary tainacan-icon-see"})])}],!1,null,null,null);a.options.__file="metadata-type.vue";var r=a.exports;window.tainacan_extra_components=void 0!==window.tainacan_extra_components?window.tainacan_extra_components:{},window.tainacan_extra_components["tainacan-metadata-type-url"]=r}]);