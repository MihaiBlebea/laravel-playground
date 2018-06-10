<template>
    <div class="input-group">
        <input type="text" class="form-control" v-model="content">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary"
                    type="button"
                    v-on:click="$emit('content-updated', content)">Update</button>
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
