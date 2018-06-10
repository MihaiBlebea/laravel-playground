<template>
    <div>
        <div class="form-group">
            <textarea class="form-control editor"
                      ref="editor"
                      :rows="rows"
                      v-model="content"></textarea>
            <div class="btn btn-outline-secondary btn-block"
                 v-on:click="$emit('content-updated', content)">Update</div>
        </div>
    </div>
</template>

<script>
import autosize from 'autosize'

export default {
    props: ['default-content'],
    data: function()
    {
        return {
            rows: 3,
            content: null
        }
    },
    watch: {
        content: function()
        {
            autosize(this.$refs['editor'])
            this.$emit('content-changed', this.content)
        }
    },
    created() {
        this.content = this.defaultContent
    }
}
</script>

<style scoped>
.editor {
    resize: none;
    overflow: hidden;
}
</style>
