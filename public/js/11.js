(self.webpackChunk=self.webpackChunk||[]).push([[11],{1011:(e,t,r)=>{"use strict";r.r(t),r.d(t,{default:()=>a});var n=r(5166),o=(0,n.createVNode)("input",{type:"submit",value:"Send"},null,-1);function i(e,t){var r=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),r.push.apply(r,n)}return r}function u(e,t,r){return t in e?Object.defineProperty(e,t,{value:r,enumerable:!0,configurable:!0,writable:!0}):e[t]=r,e}const c={data:function(){return{form:this.$inertia.form({email:""})}},methods:{submit:function(){var e=this;this.form.transform((function(e){return function(e){for(var t=1;t<arguments.length;t++){var r=null!=arguments[t]?arguments[t]:{};t%2?i(Object(r),!0).forEach((function(t){u(e,t,r[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(r)):i(Object(r)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(r,t))}))}return e}({},e)})).post(this.route("auth.resend_account_activation"),{onFinish:function(){return e.form.reset("email")}})}},render:function(e,t,r,i,u,c){return(0,n.openBlock)(),(0,n.createBlock)("form",{onSubmit:t[2]||(t[2]=(0,n.withModifiers)((function(){return c.submit&&c.submit.apply(c,arguments)}),["prevent"]))},[(0,n.withDirectives)((0,n.createVNode)("input",{type:"text",name:"email","onUpdate:modelValue":t[1]||(t[1]=function(e){return u.form.email=e})},null,512),[[n.vModelText,u.form.email]]),o],32)}},a=c}}]);