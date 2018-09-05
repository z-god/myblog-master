import Vue from 'vue'
import Router from 'vue-router'
import homepage from '@/components/HomePage'
import indexview from '@/components/index.vue'
import login from '@/components/login.vue'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path:'/',
      name:'login',
      component:login
    },
    {
      path: '/',
      name: 'homepage',
      component: homepage,
      children:[{
        path: '/datadisplay',
        component: resolve => require(['../components/DataDisplay.vue'], resolve)
    },{
          path: '/articlelist',
          component: resolve => require(['../components/ArticleList.vue'], resolve)
      },{
        path: '/commentslist',
        component: resolve => require(['../components/CommentList.vue'], resolve)
    },{
      path: '/linklist',
      component: resolve => require(['../components/LinkList.vue'], resolve)
  },{
    path: '/imageslist',
    component: resolve => require(['../components/ImgList.vue'], resolve)
},{
  path: '/userlist',
  component: resolve => require(['../components/UserList.vue'], resolve)
},{
  path: '/datacenter',
  component: resolve => require(['../components/DataCenter.vue'], resolve)
},{
  path: '/editor',
  component: resolve => require(['../components/ArticleEdit.vue'], resolve)
},{
  path: '/flash',
  component: resolve => require(['../components/flash.vue'], resolve)
},{
  path: '/commentflash',
  component: resolve => require(['../components/CommentFlash.vue'], resolve)
}]
    },
    {
      path: '/index',
      name: 'indexview',
      component: indexview
    }
  ]
})
