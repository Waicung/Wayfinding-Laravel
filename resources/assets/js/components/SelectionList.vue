<template lang="html">
    <v-select :value.sync="selected" :options="options"></v-select>
</template>

<script>
import vSelect from "vue-select"

export default {
    props:['selected', 'options'],
    components:{
        vSelect
    }
}
</script>

<style lang="css">
</style>
