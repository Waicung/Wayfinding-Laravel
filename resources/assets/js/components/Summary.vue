<!--
A component for
displaying the short summary of an experiment
-->

<template lang="html">
    <h3 class="text-center">{{ title }}</h3>
    <ul>
        <li v-for="(key, val) in list">
            <h4>{{ key }}</h4>
            <span>{{ val }}</span>
        </li>
    </ul>
</template>

<script>
export default {
  data () {
    return {
        title: "Info Summary"
    }
  },
  props: [
      'list'
  ],
  computed: {},
  ready () {
      console.log("Summary.vue is ready");
  },
  attached () {},
  methods: {},
  components: {}
}
</script>

<style lang="css">
</style>
