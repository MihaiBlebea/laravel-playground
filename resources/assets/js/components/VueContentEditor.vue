<template>
    <div>
        <p class="text-primary pointer" v-on:click="changeState()">{{ editButton }}</p>
        <div v-if="editState" class="mb-3">
            <div v-if="components.includes(editor)">
                <component v-bind:is="editor"
                           :default-content="content"
                           v-on:content-changed="onContentChanged($event)"
                           v-on:content-updated="onContentUpdate($event)"></component>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['editor', 'content-id', 'default-content'],
    data: function()
    {
        return {
            content: null,
            editState: false,

            components: ['vue-input-editor', 'vue-textarea-editor', 'vue-upload-editor']
        }
    },
    computed: {
        editButton: function()
        {
            return (this.editState == false) ? 'Edit content' : 'Close editor';
        }
    },
    methods: {
        changeState: function()
        {
            this.editState = !this.editState;
            if(this.defaultContent !== this.content)
            {
                this.updateContent();
            }
        },
        onContentChanged: function(event)
        {
            this.content = event
        },
        onContentUpdate: function(event)
        {
            this.content = event
            this.updateContent()
        },
        updateContent: function()
        {
            axios.post(this.api + 'store/content/' + this.contentId, {content: this.content}).then((result)=> {
                if(result.status == 200) { location.reload() }
            }).catch((err)=> {
                console.log(err)
            });
        }
    },
    created() {
        this.content = this.defaultContent
    }
}
</script>

<style scoped>
.pointer {
    cursor: pointer;
}
</style>
