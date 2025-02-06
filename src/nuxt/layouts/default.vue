<template>
    <div>
        <header>
            <h1>My Website</h1>
        </header>

        <main>
            <!-- ここにページ固有のコンテンツが表示されます -->
            <slot></slot>
        </main>

        <footer>
            <p>&copy; 2025 My Website</p>
        </footer>
    </div>
</template>

<script setup>
// 特に追加のロジックはなし
</script>

<style scoped>
header {
    background-color: #333;
    color: white;
    padding: 1rem;
    text-align: center;
}

footer {
    background-color: #333;
    color: white;
    padding: 1rem;
    text-align: center;
}
</style>
