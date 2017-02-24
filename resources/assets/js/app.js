
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('add-record',require('./components/AddRecord.vue'));
Vue.component('edit-news',require('./components/EditNews.vue'));
Vue.component('image-gallery',require('./components/ImageGallery.vue'));
Vue.component('exam-form',require('./components/ExamForm.vue'));
Vue.component('video-and-audio',require('./components/VideoAndAudio.vue'));
// import Example from './components/Example.vue';
// import AddRecord from './components/AddRecord.vue';
// import EditNews from './components/EditNews.vue';

import ElementUi from 'element-ui';
import 'element-ui/lib/theme-default/index.css';
Vue.use(ElementUi);


const app = new Vue({
    el: '#app'
});
