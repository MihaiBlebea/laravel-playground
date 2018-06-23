require('./bootstrap');

window.Vue = require('vue');

Vue.component('vue-markdown', require('./components/MarkdownEditor/VueMarkdown.vue'));
    Vue.component('vue-markdown-menu', require('./components/MarkdownEditor/VueMarkdownMenu.vue'));
    Vue.component('vue-markdown-editor', require('./components/MarkdownEditor/VueMarkdownEditor.vue'));
    Vue.component('vue-markdown-preview', require('./components/MarkdownEditor/VueMarkdownPreview.vue'));

// Global variables
Vue.prototype.api = '/api/v1/';

const app = new Vue({
    el: '#app'
});
