
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.smde = require('simplemde');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('TagsDropdown', require('./components/Tags/TagsDropdown.vue'));
Vue.component('TagsViewer', require('./components/Tags/TagsViewer.vue'));
Vue.component('TagListItem', require('./components/Tags/TagListView.vue'));
const app = new Vue({

    el: '#app',
    data () {
        return {
            tags: [],
        };
    },
    methods: {
        toggleTab (tag) {
            if (tag.assigned) {
                this.tags.push(tag)
            } else {
                this.tags.splice(this.tags.indexOf(tag), 1);
            }
        }
    }
});
