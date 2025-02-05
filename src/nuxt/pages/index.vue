<template>
    <div>
        <h2>Welcome to the Home Page!</h2>
        <p>This is the homepage of the website.</p>

        <div class="container">
            <p v-if="$auth.loggedIn">Name：{{ $auth.user.name }}</p>
        </div>
        <NuxtLink to="/other">otherへ</NuxtLink>
        <NuxtLink to="/form">formへ</NuxtLink>
    </div>

</template>

<script setup>
definePageMeta({
  layout: 'default'  // デフォルトのレイアウトを使用
});






</script>
