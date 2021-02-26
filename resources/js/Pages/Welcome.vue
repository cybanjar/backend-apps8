<template>
    <div>
         Laravel v{{ laravelVersion }} (PHP v{{ phpVersion }})
    </div>
</template>

<style scoped>
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
