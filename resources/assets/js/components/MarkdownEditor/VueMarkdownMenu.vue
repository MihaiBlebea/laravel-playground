<template>
    <div class="card">
        <nav class="nav nav-pills nav-justified bg-light p-2">
            <a class="nav-link pointer" v-on:click="changeState()">{{ editorText }}</a>
            <a class="nav-link pointer" v-on:click="changeStyle('bold')">Bold</a>
            <a class="nav-link pointer" v-on:click="changeStyle('italic')">Italic</a>
        </nav>
    </div>
</template>

<script>
export default {
    props: ['editor-menu'],
    data: function() {
        return {
            menu: this.editorMenu
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
            this.$emit('property-changed', style);
        }
    },
    created() {

    }
}
</script>

<style scoped>
.pointer {
    cursor: pointer;
}
</style>
