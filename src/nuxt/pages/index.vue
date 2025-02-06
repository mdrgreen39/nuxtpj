<template>
    <div>
        <h2>Welcome to the Home Page!</h2>
        <p>This is the homepage of the website.</p>

        <div>
            <NuxtLink to="/other">otherへ</NuxtLink>
        </div>
        <div>
            <NuxtLink to="/form">formへ</NuxtLink>
        </div>
        <div>
            <NuxtLink to="/login">loginへ</NuxtLink>
        </div>
        <div>
            <NuxtLink to="/profile">profileへ</NuxtLink>
        </div>
    </div>

   <div>
    <!-- データが正常に読み込まれた場合 -->
    <p v-if="data && data.value && data.value.message">{{ data.value.message }}</p>
    
    <!-- エラーが発生した場合 -->
    <p v-if="error">{{ error }}</p>
    
    <!-- データがまだ読み込まれていない場合 -->
    <p v-else>データが読み込まれませんでした。</p>
  </div>

</template>

<script setup>
definePageMeta({
  layout: 'default'  // デフォルトのレイアウトを使用
});

const { data, error } = await useFetch('http://localhost:8000/api/check').catch(err => {
    console.error('Error fetching data:', err);
});


console.log('Fetched data:', data.value);
console.log('Fetch error:', error.value);


</script>
