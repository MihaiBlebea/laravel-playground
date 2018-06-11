<template>
    <div>
        <p class="text-primary pointer"
           v-on:click="changeState()"
           data-toggle="modal"
           :data-target="'#modal_' + contentId">✎</p>

        <div class="modal" tabindex="-1" role="dialog" :id="'modal_' + contentId" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered " role="document">
                <div class="modal-content">
                    <div class="modal-body">

                        <div v-if="components.includes(editor)">
                            <component v-bind:is="editor"
                                       :default-content="content"
                                       v-on:content-changed="onContentChanged($event)"
                                       v-on:content-updated="onContentUpdate($event)">
                            </component>
                        </div>

                    </div>
                </div>
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
            components: ['vue-input-editor', 'vue-textarea-editor', 'vue-upload-editor']
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
