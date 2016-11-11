<!--
    A List Rendering Component
-->
<template lang="html">
    <div class="panel panel-default">
        <!--Panel Heading-->
        <div class="panel-heading" v-if="heading">
            <a href="#wf-items" data-toggle="collapse">
                <!--TODO: Inject heading hTML in to this slot-->
                <slot name="heading"></slot>
            </a>
        </div>

        <!--The List-->
        <div class="panel-collapse in" id="wf-items">
            <ul class="list-group">
                <li class="list-group-item" v-for="item in items">
                    <!--Remove item from the list-->
                    <a v-if="remove" @click="remove(item)">
                        <span class="glyphicon glyphicon-remove"></span>
                    </a>
                    {{ item.message }}
                    <a :href="item.detail" v-if="detail">
                        <span class="glyphicon glyphicon-menu-right pull-right"></span>
                    </a>
                </li>
            </ul>
        </div>

        <!--Footer-->
        <div class="panel-footer" v-if="footer">
            <slot name="footer"></slot>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        items: {
            type: Array,
            default: function () {
                return [{
                    message: 'identity',
                    detail: 'url',
                }]
            }
        },
        heading: {
            type: Boolean,
            default: false
        },
        footer: {
            type: Boolean,
            default: false
        },
        detail: {
            type: Boolean,
            default: false
        },
    },
    methods: {
        /*Based on Vuex, delete the selected item from the list*/
        remove: function (item) {
            this.$store.commit('setRoutes',
                this.items.filter(function (x) {
                    return x.message!==item.message;
                })
            );
        }
    }
}
</script>

<!--Based On Bootstrap-->
<style lang="css">
</style>
