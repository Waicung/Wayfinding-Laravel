<!--
    Action Bar
-->
<template lang="html">
    <div class="btn-group btn-group-justified" >
        <a class="btn btn-danger" :href="home" v-if="current<=pages">CANCEL</a></button>
        <div class="btn-group">
            <button type="button" @click="previous" class="btn btn-default" v-if="backable&&current<=pages">BACK</button>
        </div>
        <div class="btn-group">
            <button type="button" @click="discard" class="btn btn-link" v-if="!required&&current<=pages">SKIP</button>
        </div>
        <div class="btn-group">
            <button :type="nextType" @click="next" class="btn btn-success">{{ nextText }}</button>
        </div>
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
        },
        markers: {
            type: Array
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
        nextType: function () {
            return this.current > this.pages? 'submit' : 'button';
        },
        nextText: function () {
            if(this.current === this.pages) return "SUBMIT";
            else if (this.current > this.pages)  return "SUBMITTING";
            else return "NEXT";
        }
    },
    methods: {
        discard: function () {
            this.markers = [];
            this.next();
        },
        next: function () {

                this.current++;

        },
        previous: function () {
            this.current--;
        }
    },
}
</script>

<!--Based on Bootstrap-->
<style lang="css">
</style>
