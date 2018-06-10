<template>
    <div>
        <vue-markdown-editor v-on:content-changed="onContentChange($event)"></vue-markdown-editor>
        <vue-markdown-preview :markdown-content="markdownContent"></vue-markdown-preview>
    </div>
</template>

<script>
export default {
    props: [],
    data: function() {
        return {
            displayEditor: true,
            markdownContent: null
        }
    },
    methods: {
        onContentChange: function(event)
        {
            this.markdownContent = event
        }
    }
}
</script>
