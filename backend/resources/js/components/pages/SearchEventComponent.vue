<template>
  <div>
    <p class="p-6 xl:text-2xl flex justify-center">イベント キーワード検索結果 一覧</p>
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
      const query = window.location.search;
      console.log(query);
      axios
       
        .get('/api/event/search' + query) //ヘッダーinputタグの検索キーワード(クエリ)をパラメータにしてAPIを叩く
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
