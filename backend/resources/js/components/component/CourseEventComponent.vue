<template>
  <div>
    <p v-if="events[0]" class="p-6 xl:text-2xl flex justify-center">
      {{ events[0].course.name }} 開催イベント一覧
    </p>
    <p v-else-if="events == 0" class="p-6 xl:text-2xl flex justify-center">
      {{ courseNameConvert }}
      {{ courseName }} 開催イベント一覧
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
      courseName: '',
    };
  },
  created() {
    this.getEvent();
  },
  methods: {
    getEvent: function() {
      axios
        .get('/api/event/course/' + this.$route.params.course_name)
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
  computed: {
    courseNameConvert: function() {
      switch (this.$route.params.course_name) {
        case 'fsw':
          this.courseName = '富士スピードウェイ';
          break;
        case 'tukuba':
          this.courseName = '筑波サーキット';
          break;
        case 'motegi':
          this.courseName = 'モビリティリゾートもてぎ';
          break;
        case 'mihama':
          this.courseName = '美浜サーキット';
          break;
        case 'sodegaura':
          this.courseName = '袖ヶ浦フォレストレースウェイ';
          break;
        case 'nikko':
          this.courseName = '日光サーキット';
          break;
        case 'suzuka':
          this.courseName = '鈴鹿サーキット フルコース';
          break;
        case 'suzuka_south':
          this.courseName = '鈴鹿サーキット 南コース';
          break;
        case 'okayama':
          this.courseName = '岡山国際サーキット';
          break;
        case 'takata':
          this.courseName = 'TSタカタサーキット';
          break;
        case 'autopolis':
          this.courseName = 'オートポリス';
          break;
        case 'sugo':
          this.courseName = 'スポーツランドSUGO';
          break;
        case 'houdaigi':
          this.courseName = '宝台樹スキー場 駐車場';
          break;
      }
    },
  },
};
</script>

<style scoped></style>
