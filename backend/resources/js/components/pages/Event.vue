<template>
  <div>
    <p class="p-6 xl:text-2xl flex justify-center">現在公開中の全てのイベント</p>
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
    getEvent: function() {
      axios
        .get('api/event')
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
