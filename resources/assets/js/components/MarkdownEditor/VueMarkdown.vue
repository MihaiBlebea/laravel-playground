<template>
    <div>
        <div class="mb-3">
            <vue-markdown-menu :editor-menu="menu"
                               v-on:state-changed="onStateChange($event)"
                               v-on:property-changed="onPropertyChanged($event)"></vue-markdown-menu>
        </div>

        <div v-show="menu.editor == true">
            <vue-markdown-editor :text-property="property"
                                 v-on:content-changed="onContentChange($event)"></vue-markdown-editor>
        </div>
        <div v-show="menu.editor == false">
            <vue-markdown-preview :markdown-content="markdownContent"></vue-markdown-preview>
        </div>
    </div>
</template>

<script>
export default {
    props: [],
    data: function() {
        return {
            menu: {
                editor: true,
            },
            markdownContent: null,
            property: null
        }
    },
    methods: {
        onContentChange: function(event)
        {
            this.markdownContent = event
        },
        onStateChange: function(event)
        {
            this.menu = event
        },
        onPropertyChanged: function(event)
        {
            this.property = event
        }
    }
}
</script>
