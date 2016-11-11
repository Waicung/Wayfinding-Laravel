<template lang="html">
    <div class="progress">
        <div class="progress-bar progress-bar-success progress-bar-striped active"
        role="progressbar" aria-valuemin="0" aria-valuemax="100"
        :aria-valuenow="progress"
        :style="{width: progress + '%'}">

        </div>
        <div class="progress-bar progress-bar-info progress-bar-striped active"
        role="progressbar" aria-valuemin="0" aria-valuemax="100"
        :aria-valuenow="stage"
        :style="{width: stage + '%'}" >

        </div>
    </div>
</template>

<script>
export default {
    props: ['progress','stage']
}
</script>

<style lang="css">
</style>
