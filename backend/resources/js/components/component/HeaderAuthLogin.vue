<template>
<!-- ★現在不使用 -->
  <div class="header flex">
    <div class="left">
      <p class="title">Circuit Junction</p>
      <div class="search-category flex">
        <p @click="$router.push('/home')">HOME</p>
        <p @click="$router.push('/schedule')">日程から探す</p>
        <p @click="$router.push('/course')">コースから探す</p>
        <input placeholder="キーワード" type="text" />
        <button @click="$router.push('/search-results')">検索</button>
      </div>
    </div>
    <div class="right">
      <p @click="$router.push('/mylist')">マイリスト</p>
    </div>
  </div>
</template>

<style scoped>
.right {
  align-items: center;
}
.right p {
  margin-right: 20px;
  cursor: pointer;
}
.left {
  display: flex;
}
.title {
  font-size: 30px;
  font-weight: bold;
}
.search-category {
  align-items: center;
}
.search-category p {
  margin-left: 30px;
  cursor: pointer;
}
.search-category input {
  margin-left: 30px;
  width: 130px;
}
.search-category button {
  cursor: pointer;
  margin-left: 3px;
  padding-right: 15px;
  padding-left: 15px;
}
.header {
  margin: 20px;
}
.flex {
  display: flex;
  justify-content: space-between;
}
</style>