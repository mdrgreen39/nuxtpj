<script setup lang="ts">
import { ref } from 'vue';
import { useRouter } from 'vue-router'; // Vue Router をインポート
import { useCookie } from '#imports';

const router = useRouter(); // Vue Router のインスタンスを取得
const token = useCookie('auth_token'); // Cookie からトークンを取得


const logout = async () => {
  const response = await fetch('http://localhost:8000/api/auth/logout', {
    method: 'POST',
    credentials: 'include', // Cookie を送信するために include を設定
    headers: {
      'Content-Type': 'application/json',
    },
    mode: 'cors',
  });

  if (!response.ok) {
    console.error('Logout failed:', response.statusText);
    return;
  }

  const data = await response.json();
  console.log(data.message); // "Logged out successfully"
  
  // トークンを削除
  token.value = null;

  // ログアウト後にログインページ（/login）にリダイレクト
  router.push('/login'); // ログインページへリダイレクト
};

</script>

<template>
  <div>
    <h2>プロフィールページ</h2>
    <p>ログインしています！</p>
    <p>Token: {{ token }}</p>

    <div>
      <NuxtLink to="/">indexへ</NuxtLink>
    </div>

    <div>
      <!-- ログイン中の場合にログアウトボタンを表示 -->
      <button v-if="token" @click="logout">ログアウト</button>
    </div>
  </div>
</template>
