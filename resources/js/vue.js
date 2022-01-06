import CommentForm from './components/comments/CommentForm.vue'
import CommentList from './components/comments/CommentList.vue'
import FixedHeader from 'vue-fixed-header'
import Vue from 'vue/dist/vue'
import { ZiggyVue } from 'ziggy';

Vue.config.productionTip = false
Vue.use(ZiggyVue)

window.Event = new Vue()

new Vue({
  el: '#app',

  components: {
    CommentForm,
    CommentList,
    FixedHeader
    // Like
  },
  mounted () {
    // document.querySelector('[data-confirm]').addEventListener('click', () => {
    //   return confirm(this.data('confirm'))
    // })
  }

})
