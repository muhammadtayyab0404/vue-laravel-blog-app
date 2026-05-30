import { createRouter, createWebHistory } from 'vue-router'

import Home from '../pages/Home.vue'
import AddPost from '../pages/addpost.vue'
import showPost from '../pages/showPost.vue'
import editPost from '../pages/editPost.vue'
import deletePost from '../pages/deletePost.vue'
import login from '../pages/login.vue'
import register from '../pages/register.vue'

const routes = [
  {
    path: '/home',
    component: Home
  },
  {
    path: '/',
    component: login
  },
  {
    path: '/register',
    component: register
  },
  {
    path: '/addpost',
    component: AddPost,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/showpost/:id',
    component: showPost,
    name: 'showpost'
  },
  {
  path: '/editpost/:id',
    component: editPost
  },
  {
    path: '/deletepost/:id',
    component: deletePost
  },

]

const router = createRouter({
  history: createWebHistory(),
  routes
})


router.beforeEach((to, from) => {
      const token = localStorage.getItem('token');

    if (to.meta.requiresAuth && !token) {
    return {
   path: '/'
    }
  } 
  return true;
})


export default router