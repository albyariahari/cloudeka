<template>
    <header>
        <h1>{{ title }}</h1>
    </header>
</template>

<script>
    export default {
  props: ['title']
}
</script>

<style scoped>
header{
    text-align: center;
    margin-bottom: 2rem;
}
</style>