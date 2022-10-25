<template>
  <div>
    <div class="relative flex">
      <div class="xl:flex justify-center z-30">
        <div class="xl:w-1/2">
          <img src="/images/267238163_org.jpg" />
        </div>
        <div class="xl:w-1/2">
          <img src="/images/IMG_1477.JPG" />
        </div>
      </div>
      <div class="absolute z-40 items-center w-full h-full flex flex-wrap">
        <div
          class="items-center text-center text-xs xl:text-xl w-4/5 xl:w-3/5 py-4 mx-auto text-white bg-gray-600 bg-opacity-75  font-semibold  rounded-lg"
        >
          <p class="text-sm font-bold  xl:text-4xl  px-1 py-2">
            ここはサーキット走行会の情報ジャンクション
          </p>
          <p class="w-4/5 xl:w-full mx-auto xl:mx-auto">
            主催者様ごとにwebサイトをいくつも渡り歩いて日程や内容を確認する、そんな手間を省きます
          </p>
          <p class="w-4/5 xl:w-full mx-auto xl:mx-auto">
            あなたの走行会の情報チェックを容易に、そしてまだ見ぬ新しい走行会と出会えることでしょう
          </p>
        </div>
        <div class="flex flex-wrap w-full items-center justify-center text-center">
          <div
            class="w-4/5 xl:flex-1 xl:text-xl px-1 py-3 m-2 xl:my-3 text-white bg-gray-600 bg-opacity-75 font-semibold rounded-lg "
          >
            走行会の情報を、まとめてチェック！
          </div>
          <div
            class="w-4/5 xl:flex-1 xl:text-xl px-3 py-3  m-2 xl:my-3 text-white bg-gray-600 bg-opacity-75 font-semibold rounded-lg "
          >
            日程・コース・キーワードから探せる！
          </div>
          <div
            class="w-4/5 xl:flex-1 text-xs xl:text-lg px-3 py-3 m-2 xl:my-3 text-white bg-gray-600 bg-opacity-75 font-semibold  rounded-lg "
          >
            マイリスト機能で、お気に入りの走行会を管理！
          </div>
        </div>
      </div>
    </div>
    <p class="m-5 text-base xl:text-3xl flex justify-center">現在公開中のイベント [最新5件]</p>
    <EventLists :events="events" />
    <div class="flex justify-center">・</div>
    <div class="flex justify-center">・</div>
    <div class="flex justify-center">・</div>
    <div class="flex justify-center">
      <a
        href="/events"
        class="text-2xl px-4 py-1 text-white bg-blue-500 rounded-lg hover:bg-blue-700"
        >もっと見る</a
      >
    </div>
    <div class="flex justify-center my-6">
      <p class="text-xl xl:text-lg mt-2 mx-4">ご意見ご要望・イベント掲載のご依頼はDMまで！</p>
      <a
        class="text-lg p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-700"
        href="https://twitter.com/kyyo223"
        target="_blank"
        rel="noopener"
        >開発者Twiiter
        <v-icon color="white" aria-hidden="false">
          mdi-twitter
        </v-icon></a
      >
    </div>
  </div>
</template>

<script>
import EventLists from '../component/EventLists.vue';
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
        .get('api/event/latest')
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

<style scoped>


</style>
