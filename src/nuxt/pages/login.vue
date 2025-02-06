<script setup lang="ts">
import { ref } from 'vue'

// 型定義を追加
interface LoginResponse {
  token: string;
}

const email = ref('')
const password = ref('')
const token = useCookie('auth_token') // トークンをCookieに保存

// エラーメッセージを保存するための変数
const errors = ref<{ email?: string[], password?: string[] }>({})

// エラーオブジェクトの型定義
interface FetchError {
  response?: {
    data: {
      errors: {
        email?: string[];
        password?: string[];
      };
    };
  };
}

const login = async () => {
  try {
    const response = await $fetch<LoginResponse>('http://localhost:8000/api/login', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'  // JSON形式で送信するためのヘッダーを追加
      },
      body: JSON.stringify({ email: email.value, password: password.value })  // JSON.stringifyを使ってデータを送る
    })

    if (response && response.token) {
      token.value = response.token // トークンを保存
      navigateTo('/') // ログイン後にトップページへ
    } else {
      alert('トークンが取得できませんでした')
    }
  } catch (error: unknown) {
    // 型ガードを使ってエラーの型をチェック
    if (isFetchError(error)) {
      // バリデーションエラーの場合
      if (error.response?.data?.errors) {
        errors.value = error.response.data.errors
      }
    } else {
      // その他のエラー
      alert('ログイン失敗')
      console.error(error)
    }
  }
}

// FetchErrorの型ガード関数
function isFetchError(error: unknown): error is FetchError {
  return (error as FetchError).response !== undefined
}
</script>



<template>
  <div>
    <h2>ログイン</h2>

    <!-- Emailフィールド -->
    <input v-model="email" placeholder="Email" />
    <!-- Emailエラーがあれば表示 -->
    <div v-if="errors.email" class="error">
      <span v-for="(msg, index) in errors.email" :key="index">{{ msg }}</span>
    </div>

    <!-- Passwordフィールド -->
    <input v-model="password" type="password" placeholder="Password" />
    <!-- Passwordエラーがあれば表示 -->
    <div v-if="errors.password" class="error">
      <span v-for="(msg, index) in errors.password" :key="index">{{ msg }}</span>
    </div>

    <!-- ログインボタン -->
    <button @click="login">ログイン</button>

    <!-- Indexページへのリンク -->
    <div>
      <NuxtLink to="/">indexへ</NuxtLink>
    </div>
  </div>
</template>

<style scoped>
  .error {
    color: red;
    font-size: 12px;
  }
</style>

