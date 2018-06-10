<template>
    <div>
        <div class="form-group">
            <textarea class="form-control editor"
                      ref="editor"
                      :rows="rows"
                      v-model="content"
                      v-on:select="onSelect($event)"></textarea>
        </div>
    </div>
</template>

<script>
import autosize from 'autosize'

export default {
    data: function() {
        return {
            content: null,
            rows: 3
        }
    },
    watch: {
        content: function()
        {
            autosize(this.$refs['editor'])
            this.$emit('content-changed', this.content)
        }
    },
    methods: {
        onSelect: function(event)
        {
            console.log(window.getSelection().toString())
        }
    },
    mounted() {
        console.log('VueMarkdownEditor mounted.')
    }
}
</script>

<style scoped>
.editor {
    resize: none;
    overflow: hidden;
}
</style>
