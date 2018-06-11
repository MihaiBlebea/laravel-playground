<template>
    <div>
        <div class="form-group">
            <input type="text" class="form-control" v-model="content">
        </div>

        <div class="form-group">
            <button class="btn btn-outline-secondary"
                    type="button"
                    v-on:click="$emit('content-updated', content)">Update</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
</template>

<script>
export default {
    props: ['default-content'],
    data: function()
    {
        return {
            content: null
        }
    },
    watch: {
        content: function()
        {
            this.$emit('content-changed', this.content);
        }
    },
    created() {
        this.content = this.defaultContent
    }
}
</script>
