
/**
* First we will load all of this project's JavaScript dependencies which
* include Vue and Vue Resource. This gives a great starting point for
* building robust, powerful web applications using Vue and Laravel.
*/

require('./bootstrap');

/**
* Next, we will create a fresh Vue application instance and attach it to
* the body of the page. From here, you may begin adding components to
* the application, or feel free to tweak this setup for your needs.
*/

Vue.component('grid', require('./components/grid.vue'));
Vue.component('gridrow', require('./components/gridrow.vue'));
Vue.component('gridcolumn', require('./components/gridcolumn.vue'));
Vue.component('panel', require('./components/panel.vue'));

Vue.directive('sortable', {
      inserted: function (el, binding) {
        var sortable = new Sortable(el, binding.value || {});
      }
    })
    
const app = new Vue({
  el: '#app',
});
