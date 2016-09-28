<template lang="html">
    <h3 class="text-center">{{ title }}</h3>
    <ul>
        <li v-for="(key, val) in list">
            <h3>{{ key }}</h3>
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
