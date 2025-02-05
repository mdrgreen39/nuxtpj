<template>
    <div>
    <h1>ユーザー専用ページ</h1>
    <h2>About Us</h2>
    <p>This is the about page of the website.</p>
    <NuxtLink to="/">indexへ</NuxtLink>
    </div>
</template>

<script setup>
definePageMeta({
  layout: 'user'  // ユーザー用レイアウトを使用
});
</script>
