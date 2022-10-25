<template>
  <div v-if="$store.state.util.login" class="flex justify-center">
    <div class="text-center xl:px-3 xl:py-3 pb-2 text-lg">
      <p class="xl:hidden text-sm inline">マイリスト：</p>
      <input
        type="checkbox"
        :id="event_id"
        v-model="mylistStatus"
        @change="addOrDeleteMylist"
        class="hidden"
      />
      <label
        class="text-blue-500 border-2 border-solid border-blue-500 rounded-md px-3 py-1 cursor-pointer text-sm xl:text-lg"
        :for="event_id"
        v-if="mylistStatus == false"
        @change="addOrDeleteMylist"
      >
        追加
      </label>
      <label
        class="text-white bg-blue-500 border rounded-md px-3 py-1 cursor-pointer text-sm xl:text-lg"
        :for="event_id"
        v-else-if="mylistStatus"
        @change="addOrDeleteMylist"
        >削除</label
      >
      {{ mylistCountConvert }}
    </div>
  </div>
</template>

<script>
export default {
  props: {
    event_id: Number,
    mylist_count: Number,
  },
  data() {
    return {
      mylistStatus: [],
    };
  },
  computed: {
    mylistCountConvert: function() {
      if (this.mylist_count == 1) {
        this.mylistStatus = true;
      } else if (this.mylist_count == 0) {
        this.mylistStatus = false;
      }
    },
  },
  methods: {
    addOrDeleteMylist: function() {
      if (this.mylistStatus) {
        axios.post('/api/event/post-mylist', { event: this.event_id }).then(res => {
          console.log(res);
          console.log('mylistsテーブルに追加');
        });
      } else {
        axios.post('/api/event/delete-mylist', { event: this.event_id }).then(res => {
          console.log(res);
          console.log('mylistsテーブルから削除');
        });
      }
    },
  },
};
</script>
