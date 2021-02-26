<template>
    <div class="bg-dark h-screen">
        <p class="text-gray-400">Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})</p> 
    </div>
</template>

<style scoped>
    .bg-dark {
        background-color: #000000;
    }
</style>

<script>
    export default {
        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
