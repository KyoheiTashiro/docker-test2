<template>
  <div class="flex justify-center">
    <p v-if="events == 0" class="px-4 text-lg  xl:block hidden">
      該当するイベントは見つかりませんでした
    </p>

    <table v-else class="table-auto block">
      <thead class="py-3 text-lg w-full xl:inline-table hidden border-b-2 border-blue-700">
        <tr class="w-full">
          <th class="text-center w-1/12">開催日</th>
          <!--  イベント名はv-ifでログイン判定してwidth変更。 -->
          <!-- 82行目のtdが、ログイン前でもxl:inlineblockで表示されデザイン崩れる為 -->
          <th v-if="$store.state.util.login" class="text-center w-4/12">イベント名</th>
          <th v-else class="text-center w-6/12">イベント名</th>
          <th class="text-center w-1/12">開催地</th>
          <th class="text-center w-2/12">主催</th>
          <th class="text-center w-1/12">備考</th>
          <th class="text-center w-1/12">共有</th>
          <th v-if="$store.state.util.login" class="text-center px-2 w-2/12">マイリスト</th>
        </tr>
      </thead>
      <tbody class="xl:border-white border-t-2 border-blue-700">
        <tr
          v-for="event in events"
          :key="event.id"
          class="border-b-2 border-blue-700 xl:border-white mx-2 py-2"
        >
          <!-- スマホサイズのみ表示 -->
          <td class="mx-4 text-sm text-center pt-2 xl:hidden block">
            <a :href="event.source_url" class="block" target="_blank" rel="noopener">{{
              event.name
            }}</a>
          </td>
          <!-- スマホサイズのみ表示 -->
          <td class="block text-center xl:hidden">
            開催日：{{ moment(event.date, 'YYYY年M月D日') }}
          </td>

          <td class="text-center xl:text-sm xl:px-3 xl:py-3 xl:w-1/12 xl:inline-block hidden">
            <span class="inline xl:hidden">開催日：</span>
            {{ moment(event.date, 'YYYY年') }}
            <br />{{ moment(event.date, 'M月D日') }}
          </td>

          <!--  イベント名はv-ifでログイン判定してwidth変更。 -->
          <!-- 82行目のtdが、ログイン前でもxl:inlineblockで表示されデザイン崩れる為 -->
          <td
            v-if="$store.state.util.login"
            class="text-center px-3 py-3 text-sm xl:inline-block xl:w-4/12 hidden"
          >
            {{ event.name }}
          </td>
          <td v-else class="text-center px-3 py-3 text-sm xl:inline-block xl:w-6/12 hidden">
            {{ event.name }}
          </td>

          <td class="text-center px-3 py-3 text-sm xl:inline-block xl:w-1/12 hidden">
            {{ event.course.location }}
          </td>
          <td class="text-center xl:px-3 xl:py-3 xl:text-sm block xl:w-2/12 xl:inline-block">
            <span class="inline xl:hidden">主催者：</span>{{ event.organizer }}
          </td>
          <td class="text-center px-3 py-3 text-sm xl:inline-block xl:w-1/12 hidden">
            <a :href="event.source_url" target="_blank" rel="noopener">公式サイト</a>
          </td>
          <span></span>
          <td class="text-center xl:px-3 xl:py-3 py-2 text-lg xl:w-1/12 block xl:inline-block">
            <ShareNetwork
              network="Twitter"
              url="https://circuit-jct.jp"
              :title="
                '走行会情報 [' +
                  moment(event.date, 'YYYY年M月D日') +
                  ' ' +
                  event.name +
                  ' 主催:' +
                  event.organizer +
                  '] Circuit Junctionでサーキット走行会・イベントを探そう!'
              "
              description="This week, I’d like to introduce you to 'Vite', which means 'Fast'. It’s a brand new development setup created by Evan You."
              quote="The hot reload is so fast it\'s near instant. - Evan You"
              hashtags="CircuitJunction,サーキットジャンクション,走行会"
            >
              <v-icon color="blue" aria-hidden="false">
                mdi-twitter
              </v-icon>
            </ShareNetwork>
          </td>
          <td class="text-center xl:px-3 xl:py-3 py-2 text-lg xl:w-2/12 block xl:inline-block">
            <MylistCheckboxComponent :event_id="event.id" :mylist_count="event.mylists_count" />
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import MylistCheckboxComponent from '../elements/MylistCheckboxComponent.vue';

import moment from 'moment';
export default {
  components: {
    MylistCheckboxComponent,
  },
  props: {
    events: Array,
  },
  data: function() {
    return {};
  },
  methods: {
    moment(date, format) {
      return moment(date).format(format);
    },
  },
};
</script>

<style scoped></style>
