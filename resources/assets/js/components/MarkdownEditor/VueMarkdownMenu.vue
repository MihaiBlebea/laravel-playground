<template>
    <div>
        <div class="card bg-light p-3">
            <div class="row">
                <div class="col mb-md-0 mb-2">
                    <button class="btn btn-primary pointer p-0 pl-3 pr-3 float-left"
                            v-on:click="changeState()">{{ editorText }}</button>
                </div>

                <div v-for="item in list" v-if="menu.editor" class="col">
                    <button class="pointer btn btn-outline-secondary p-0 pl-3 pr-3 float-left"
                            v-if="item.type === 'button'"
                            v-on:click="changeStyle(item.method)">{{ item.label }}</button>

                    <div v-else class="dropdown">
                        <button class="btn btn-outline-secondary dropdown-toggle p-0 pl-3 pr-3 float-left"
                                data-toggle="dropdown"
                                aria-haspopup="true"
                                aria-expanded="false">{{ item.label }}</button>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a v-for="subitem in item.submenu"
                               class="dropdown-item pointer"
                               v-on:click="changeStyle(subitem.method)">{{ subitem.label }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { EventBus } from './../../EventBus.js'
import { list } from './../../editor-menu.js'

export default {
    props: ['editor-menu'],
    data: function() {
        return {
            menu: this.editorMenu,
            list: list
        }
    },
    computed: {
        editorText: function()
        {
            return (this.menu.editor == true) ? 'Preview' : 'Editor';
        }
    },
    methods: {
        changeState: function()
        {
            this.menu.editor = !this.menu.editor
            this.$emit('state-changed', this.menu);
        },
        changeStyle: function(style)
        {
            EventBus.$emit('style-changed', style);
        }
    },
    mounted() {
        //
    }
}
</script>

<style scoped>
.pointer {
    cursor: pointer;
}
</style>
