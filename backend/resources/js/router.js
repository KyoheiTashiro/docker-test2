import Vue from 'vue';
import VueRouter from 'vue-router';


Vue.use(VueRouter);


import Home from './components/pages/Home.vue';

import Mylist from './components/pages/Mylist.vue';

import Event from './components/pages/Event.vue';
import SearchEventComponent from './components/pages/SearchEventComponent.vue';
import CourseEventComponent from './components/component/CourseEventComponent.vue';
import MonthEventComponent from './components/component/MonthEventComponent.vue';

const routes = [
  {
    path: '/events/course/:course_name',
    name: 'CourseEventComponent',
    component: CourseEventComponent,
  },
  {
    path: '/events/month/:month',
    name: 'MonthEventComponent',
    component: MonthEventComponent,
  },
  {
    path: '/events/search',
    name: 'SearchEventComponent',
    component: SearchEventComponent,
  },
  {
    path: '/',
    name: 'home',
    component: Home,
  },
  {
    path: '/mylist',
    name: 'mylist',
    component: Mylist,
  },

  {
    path: '/events',
    name: 'event',
    component: Event,
  },
 
];

export default new VueRouter({
  mode: 'history',
  routes,
});
