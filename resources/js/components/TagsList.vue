<template>
    <a class="tag is-link" href="/tag/1" title="">{{ nom }}</a>
</template>

<script>
    export default {
        props: ['nom','id'],
        mounted() {

            console.log('component mounted.')
        }
    }
</script>
