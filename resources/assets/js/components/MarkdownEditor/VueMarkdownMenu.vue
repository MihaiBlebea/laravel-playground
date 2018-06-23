<template>
    <div>
        <div class="card">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <ul class="navbar-nav mr-auto">
                    <li>
                        <button class="btn btn-primary pointer mr-3 p-1 pl-3 pr-3"
                                v-on:click="changeState()">{{ editorText }}</button>
                    </li>
                    <template v-for="item in list" v-if="menu.editor">

                        <li v-if="item.type === 'button'" class="nav-item active">
                            <button class="pointer btn btn-outline-secondary mr-2 p-1 pl-3 pr-3"
                               v-on:click="changeStyle(item.method)">{{ item.label }}</button>
                        </li>

                        <li v-else class="nav-item dropdown">
                            <button class="btn btn-outline-secondary dropdown-toggle mr-2 p-1 pl-3 pr-3"
                                    href="#"
                                    role="button"
                                    data-toggle="dropdown"
                                    aria-haspopup="true"
                                    aria-expanded="false">{{ item.label }}</button>
                            <div class="dropdown-menu"
                                 aria-labelledby="navbarDropdown">
                                <a v-for="subitem in item.submenu"
                                   class="dropdown-item pointer"
                                   v-on:click="changeStyle(subitem.method)">{{ subitem.label }}</a>
                            </div>
                        </li>

                    </template>
                </ul>
            </nav>
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
