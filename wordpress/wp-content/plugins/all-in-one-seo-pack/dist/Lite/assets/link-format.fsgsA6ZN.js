import{v as e,o as m,c as p,C as a,a as k,E as r,b as f,Y as _}from"./js/runtime-dom.esm-bundler.CWn9hmRK.js";import{l as h}from"./js/index.B287AVaz.js";import{l as L}from"./js/index.vo0_cz49.js";import{l as S}from"./js/index.3BJ3ZnWB.js";import{g,b as w,u as A,l as y}from"./js/links.w575jfOL.js";import{e as v}from"./js/elemLoaded.COgXIo-H.js";import{a as C}from"./js/addons.CJ8lJt9v.js";import{u as F}from"./js/url.D6v_2uYU.js";import{S as E}from"./js/Information.DOYCSlH5.js";import{S as x}from"./js/Caret.B8YmKvEY.js";import{_ as V}from"./js/_plugin-vue_export-helper.BN1snXvA.js";import"./js/default-i18n.DXRQgkn2.js";import"./js/constants.Ct0G2N2t.js";import"./js/helpers.CXsRrhc8.js";import"./js/upperFirst.yVnsg4QL.js";import"./js/_stringToArray.DnK4tKcY.js";import"./js/toString.zLSwYOtv.js";const P={setup(){return{licenseStore:g(),postEditorStore:w(),rootStore:A()}},components:{SvgCircleInformation:E,SvgClose:x},data(){return{linkFormatValue:{},disabled:!1,url:null,strings:{upsell:this.$t.sprintf(this.$t.__("Did you know you can automatically add internal links using Link Assistant? %1$s",this.$td),this.$links.getPlainLink(this.$constants.GLOBAL_STRINGS.learnMore,this.rootStore.aioseo.urls.aio.linkAssistant,!0))}}},computed:{canShowUpsell(){const t=C.getAddon("aioseo-link-assistant"),{options:o}=this.postEditorStore.currentPost,i=o.linkFormat.internalLinkCount,n=o.linkFormat.linkAssistantDismissed;return(this.licenseStore.isUnlicensed||!t||!t.isActive||t.requiresUpgrade)&&2<i&&!n&&!this.disabled&&this.linkFormatValue.url&&this.isInternalLink(this.linkFormatValue.url)}},methods:{async linkAdded(t){var s;await this.$nextTick();const{options:o}=this.postEditorStore.currentPost,i=o.linkFormat.internalLinkCount,n=o.linkFormat.linkAssistantDismissed;2<i||n||this.isInternalLink(t.url||((s=t.suggestion)==null?void 0:s.url)||null)&&this.postEditorStore.incrementInternalLinkCount()},async setLinkFormatValue(){await this.$nextTick();const t=document.querySelector("#aioseo-link-assistant-education input");!this.linkFormatValue.url&&(t!=null&&t.value)&&(this.linkFormatValue=JSON.parse(t.value))},isInternalLink(t){const o=F.parse(t,!1,!0);return t.indexOf("//")===-1&&t.indexOf("/")===0?!0:t.indexOf("#")===0?!1:o.host?o.host===this.rootStore.aioseo.urls.domain:!0}},created(){this.setLinkFormatValue();const{addAction:t,hasAction:o}=window.wp.hooks;o("aioseo-link-format-link-added","aioseo")||t("aioseo-link-format-link-added","aioseo",this.linkAdded)}},D={key:0,class:"aioseo-link-assistant-did-you-know"},I=["innerHTML"];function b(t,o,i,n,s,u){const c=e("svg-circle-information"),d=e("svg-close");return u.canShowUpsell?(m(),p("div",D,[a(c),k("span",{onClick:o[0]||(o[0]=r(U=>s.disabled=!0,["stop"])),innerHTML:s.strings.upsell},null,8,I),a(d,{onClick:r(n.postEditorStore.disableLinkAssistantEducation,["stop"])},null,8,["onClick"])])):f("",!0)}const N=V(P,[["render",b]]),l=()=>{let t=_({...N,name:"Standalone/LinkFormat"});t=h(t),t=L(t),t=S(t),y(t),t.mount("#aioseo-link-assistant-education-mount")};window.aioseo&&window.aioseo.currentPost&&window.aioseo.currentPost.context==="post"&&(document.getElementById("aioseo-link-assistant-education")?l():(v("#aioseo-link-assistant-education","aioseoLaDidYouKnow"),document.addEventListener("animationstart",function(o){o.animationName==="aioseoLaDidYouKnow"&&l()},{passive:!0})));
