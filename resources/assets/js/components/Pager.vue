<template lang="html">
    <slot name="page-1" v-if="page===1"></slot>
    <slot name="page-2" v-if="page===2"></slot>
    <slot name="page-3" v-if="page===3"></slot>
</template>

<script>
export default {
    props: [
        'page'
    ]
}
</script>

<style lang="css">
</style>
