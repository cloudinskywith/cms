<template>
    <div class="btn btn-default little-padding">
        <a :href="location">{{ indicate }}</a>
    </div>
</template>

<script>
    export default{
        props:['indicate','location'],
    }
</script>

<style>
    .little-padding{
        margin-bottom: 20px;
    }
</style>
