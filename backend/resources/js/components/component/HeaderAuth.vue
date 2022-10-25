<template>
  <div class="xl:flex px-4 xl:py-3 items-center text-center">
    <div @click.stop="showSchedule" class="w-full xl:w-32 mx-auto text-lg text-center z-50">
      <p
        class="text-center mx-auto hover:text-blue-500 cursor-pointer border-b-2 border-black xl:border-white"
      >
        日程から探す
      </p>
      <div v-if="isOpenSchedule" class="xl:w-36  w-44 absolute bg-blue-200  border rounded-md z-50">
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/month/' + ThisMonth)"
        >
          今月のイベント
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/month/' + NextMonth)"
        >
          来月のイベント
        </p>
        <p class="py-2 hover:bg-blue-400 cursor-pointer" @click="$router.push('/events')">
          すべてのイベント
        </p>
      </div>
    </div>
    <div @click.stop="showCourse" class="w-full xl:w-36 mx-auto xl:mx-1 text-lg text-center  z-50">
      <p class="hover:text-blue-500 cursor-pointer border-b-2 border-black xl:border-white">
        コースから探す
      </p>
      <div
        v-if="isOpenCourse"
        class="xl:w-36  w-44 mx-0 absolute bg-blue-200 border rounded-md z-50 text-center"
      >
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/fsw')"
        >
          富士
        </p>
        <p
          class="py-2 hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/tsukuba')"
        >
          筑波
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/motegi')"
        >
          もてぎ
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/mihama')"
        >
          美浜
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/sodegaura')"
        >
          袖ヶ浦
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/nikko')"
        >
          日光
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/suzuka')"
        >
          鈴鹿 フル
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/suzuka_south')"
        >
          鈴鹿 南
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/okayama')"
        >
          岡山
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/takata')"
        >
          タカタ
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/autopolis')"
        >
          オートポリス
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer border-b-2 border-gray-400 xl:border-blue-200"
          @click="$router.push('/events/course/sugo')"
        >
          SUGO
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer xl:border-blue-200"
          @click="$router.push('/events/course/houdaigi')"
        >
          宝台樹スキー場
        </p>
        <p
          class="py-2  hover:bg-blue-400 cursor-pointer"
          @click="$router.push('/events/course/mobara')"
        >
          茂原
        </p>
      </div>
    </div>
    <div class=" xl:px-4 border-b-2 border-black xl:border-white">
      <input
        class="w-full text-lg xl:w-48 my-2 xl:pl-2 border-solid border-2 border-black rounded-lg"
        placeholder="キーワードで調べよう！"
        type="text"
        v-model="search_keyword"
      />
      <button
        class="block mx-auto w-2/5 xl:w-auto xl:inline text-lg xl:mx-2 mb-2 xl:px-4 font-semibold border-solid border-2 hover:text-white hover:bg-blue-400  border-black rounded-lg"
        @click="$router.push({ path: '/events/search', query: { keyword: search_keyword } })"
      >
        検索
      </button>
    </div>
    <div
      v-if="$store.state.util.login"
      class="mx-auto xl:px-4 text-lg hover:text-blue-500 border-b-2 border-black xl:border-white cursor-pointer inset-x-0 right-0"
    >
      <p @click="$router.push('/mylist')">マイリスト</p>
    </div>
  </div>
</template>

<script>
import moment from 'moment';
export default {
  data: function() {
    return {
      ThisMonth: moment().format('YYYY-MM'),
      NextMonth: moment()
        .add(1, 'month')
        .format('YYYY-MM'),
      isOpenSchedule: false,
      isOpenCourse: false,
      search_keyword: '',
    };
  },
  mounted() {
    this.initClickEvent();
  },
  methods: {
    showSchedule: function() {
      this.isOpenSchedule = !this.isOpenSchedule;
      if (this.isOpenCourse) {
        this.isOpenCourse = false;
      }
    },
    showCourse: function() {
      this.isOpenCourse = !this.isOpenCourse;
      if (this.isOpenSchedule) {
        this.isOpenSchedule = false;
      }
    },
    //bodyをクリックしたら関数を動かしますという定義
    initClickEvent: function() {
      // console.log('a');
      document.querySelector('body').addEventListener('click', this.bodyClickCloseEvent);
    },
    //②bodyをクリックしたら動く関数⇨日程メニュー：コースメニュー
    bodyClickCloseEvent() {
      this.closeSchedule();
      this.closeCourse();
    },
    //日程メニューが閉じるイベント
    closeSchedule() {
      if (this.isOpenSchedule) {
        this.isOpenSchedule = false;
      }
    },
    //コースメニューが閉じるイベント
    closeCourse() {
      if (this.isOpenCourse) {
        this.isOpenCourse = false;
      }
    },
  },
};
</script>

<style scoped></style>
