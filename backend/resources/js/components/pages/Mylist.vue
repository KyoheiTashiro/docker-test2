<template>
  <div>
    <p v-if="events[0]" class="p-6 xl:text-2xl flex justify-center">あなたのマイリスト イベント一覧</p>
    <EventLists :events="events" />
    
  </div>
</template>

<script>
import EventLists from '../component/EventLists.vue';
import moment from 'moment';
export default {
  components: { EventLists },
  data() {
    return {
      events: [], 
    };
  },
  created() {
    
    this.getEvent();
  },
  methods: {
    checkLogin: function() {
      if (!this.$store.state.util.login) {
        
        window.location.href = '/login';
        return
      }
    },
    getEvent: function() {
      this.checkLogin();
      axios
        .get('/api/event/get-mylist')
        .then(res => {
          console.log(res);
          this.events = res.data.events; 
        })
        .catch(err => {
          console.log(err);
        });
    },
    moment(date, format) {
      return moment(date).format(format);
    },
  },
};
</script>

<style scoped></style>
