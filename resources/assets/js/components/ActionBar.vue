<!--
    Action Bar
-->
<template lang="html">
    <div class="btn-group btn-group-justified">
        <a :href="home" class="btn btn-danger">CANCEL</a>
        <a href="#" @click="previous" class="btn btn-default" v-if="backable">BACK</a>
        <a href="#" @click="discard" class="btn btn-link" v-if="!required">SKIP</a>
        <a :href="nextDirect" @click="next" class="btn btn-success">{{ nextText }}</a>
    </div>
</template>

<script>
export default {
    props: {
        pages: {
            type: Number,
            default: 1
        },
        fields: {
            type: Array,
            default: function () {
                return [{
                    required: true,
                    inputs: ['text','option']
                }];
            }
        },
        home: {
            type: String,
            default: '/'
        },
        current: {
            type: Number,
            default: 1
        }
    },
    data: function () {
        return {
            nextText: 'NEXT',
            nextDirect: '#',
        };
    },
    computed: {
        field: function () {
            return this.fields[this.current-1].inputs;
        },
        required: function () {
            return this.fields[this.current-1].required;
        },
        backable: function () {
            return this.current>1;
        },
        nextDirect: function () {
            return this.current > this.pages? this.home : "#";
        },
        nextText: function () {
            return this.current === this.pages? "DONE" : "NEXT";
        }
    },
    methods: {
        discard: function () {
            var tmp = this;
            this.field.forEach(function(input) {
                tmp.$store.commit('reset'+input);
            });
            this.next();
        },
        next: function () {
            this.$store.commit('increment');
        },
        previous: function () {
            this.$store.commit('decrement');
        }
    },
}
</script>

<!--Based on Bootstrap-->
<style lang="css">
</style>
