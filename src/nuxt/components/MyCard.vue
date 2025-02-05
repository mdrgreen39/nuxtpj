<template>
    <div class="card">
        <h2>{{ title }}</h2>
        <p>{{ description }}</p>
    </div>
</template>

<script setup>
defineProps({
    title: String,
    description: String
});
</script>

<style scoped>
.card {
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
}
</style>
