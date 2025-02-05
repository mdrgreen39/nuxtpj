<template>
    <div>
        <h2>{{ message }}</h2>
    </div>
</template>

<script setup>
defineProps({
    message: String
});
</script>
