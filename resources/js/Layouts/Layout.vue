<script setup lang="ts">
import Sidebar from '@/Components/Sidebar.vue';
</script>

<template>
    <main>
        <Sidebar />
        <div class="main-content">
            <slot />
        </div>
    </main>
</template>
