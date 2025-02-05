<!-- pages/error.vue -->
<template>
  <div class="error-page">
    <h1>エラーが発生しました</h1>
    <p>予期しないエラーが発生しました。しばらくしてから再度お試しください。</p>
    <button @click="goHome">ホームに戻る</button>
  </div>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

// ホームに戻るボタンの処理
const goHome = () => {
  router.push('/')  // トップページに戻る
}
</script>

<style scoped>
.error-page {
  text-align: center;
  padding: 50px;
  color: #d9534f;
}

button {
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
  margin-top: 20px;
}
</style>