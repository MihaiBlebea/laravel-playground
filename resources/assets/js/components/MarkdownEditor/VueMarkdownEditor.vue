<template>
    <div>
        <div class="form-group">
            {{ lastSave }}
            <textarea class="w-100 editor"
                      ref="editor"
                      rows="10"
                      v-model="content"
                      v-on:select="onSelect($event)"></textarea>
        </div>
    </div>
</template>

<script>
import autosize from 'autosize'
import { EventBus } from './../../EventBus.js'
import { stylesheet } from './../../markdown-stylesheet.js'

export default {
    props: [],
    data: function() {
        return {
            content: null,
            selected: null,
            lastSave: null
        }
    },
    watch: {
        content: function()
        {
            autosize(this.$refs['editor'])
            this.$emit('content-changed', this.content)
        }
    },
    computed: {
        //
    },
    methods: {
        replaceContent: function(startPos, endPos, content)
        {
            if(this.content !== null)
            {
                this.content = [ this.content.slice(0, startPos), content, this.content.slice(endPos) ].join('');
            } else {
                this.content = content;
            }
            this.$refs['editor'].focus();
            this.selected = null
        },
        autosave: function()
        {
            localStorage.setItem('autosave', JSON.stringify({content: this.content}));
        },
        onSelect: function(event)
        {
            this.selected = {
                startPos: this.$refs['editor'].selectionStart,
                endPos: this.$refs['editor'].selectionEnd,
                content: this.content.slice(this.$refs['editor'].selectionStart, this.$refs['editor'].selectionEnd).trim()
            }
        },
        getCursorPosition: function()
        {
            return this.$refs['editor'].selectionStart;
        }
    },
    mounted() {
        console.log('VueMarkdownEditor mounted.')
        EventBus.$on('style-changed', (payload) => {

            let cursorStart = this.getCursorPosition();
            let cursorEnd = this.getCursorPosition();
            let content = payload;
            if(this.selected !== null)
            {
                cursorStart = this.selected.startPos;
                cursorEnd = this.selected.endPos;
                content = this.selected.content
            }
            this.replaceContent(cursorStart, cursorEnd, stylesheet[payload](content) );
        });

        setInterval(()=> {
            let saved = localStorage.getItem('autosave')
            if(JSON.parse(saved).content !== this.content)
            {
                this.autosave();
                let date = new Date();
                this.lastSave = `${date.getHours()}:${date.getMinutes()}:${date.getSeconds()}`
            }
        }, 4000);
    }
}
</script>

<style scoped>
.editor {
    resize: none;
    overflow: hidden;
    border: none;
    outline: none;
}

.editor:focus {
    border: none;
    outline:none;
}
</style>
