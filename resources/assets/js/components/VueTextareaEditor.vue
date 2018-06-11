<template>
    <div>
        <div class="form-group">
            <textarea class="form-control editor"
                      ref="editor"
                      :rows="rows"
                      v-model="content">
            </textarea>
        </div>

        <div class="form-group">
            <button class="btn btn-outline-secondary"
                    v-on:click="$emit('content-updated', content)">Update</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
