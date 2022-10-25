<template>
  <div>
    <p class="p-6 xl:text-2xl flex justify-center">
      {{ moment(this.$route.params.month, 'YYYY年M月') }} 開催のイベント一覧
    </p>
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
        .get('/api/event/month/' + this.$route.params.month)
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
