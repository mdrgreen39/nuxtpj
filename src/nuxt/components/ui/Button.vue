<template>
    <button class="btn">{{ text }}</button>
</template>

<script setup>
defineProps({
    text: String
})
</script>

<style>
.btn {
    padding: 10px 20px;
    background-color: blue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
</style>
