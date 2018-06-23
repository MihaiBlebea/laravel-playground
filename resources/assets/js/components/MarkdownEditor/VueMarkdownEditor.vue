<template>
    <div>
        <div class="form-group">
            {{ cursorPos }}
            <textarea class="form-control editor"
                      ref="editor"
                      rows="3"
                      v-model="content"
                      v-on:click="onTextareaClick($event)"
                      v-on:select="onSelect($event)"></textarea>
        </div>
    </div>
</template>

<script>
import autosize from 'autosize'
import { EventBus } from './../../EventBus.js'

export default {
    props: [],
    data: function() {
        return {
            content: null,
            style: null,
            selected: null,
            cursorPos: null
        }
    },
    watch: {
        content: function()
        {
            autosize(this.$refs['editor'])
            this.setCursorPosition(this.$refs['editor'].selectionStart)
            this.$emit('content-changed', this.content)
        }
    },
    computed: {
        //
    },
    methods: {
        italic: function()
        {
            if(this.selected == null)
            {
                this.injectContent(this.cursorPos, this.cursorPos + 2, ' __ ');
            } else {
                this.replaceContent(this.selected.startPos, this.selected.endPos, ` _${this.selected.content}_ `);
            }
        },
        bold: function()
        {
            if(this.selected == null)
            {
                this.injectContent(this.cursorPos, this.cursorPos + 3, ' ____ ');
            } else {
                this.replaceContent(this.selected.startPos, this.selected.endPos, ` __${this.selected.content}__ `);
            }
        },

        injectContent: function(startPos, cursorPos, inject)
        {
            this.content = [ this.content.slice(0, startPos), inject, this.content.slice(startPos) ].join('');
            this.moveCursor(cursorPos)
        },
        replaceContent: function(startPos, endPos, content)
        {
            if(this.selected !== null)
            {
                this.content = [ this.content.slice(0, startPos), content, this.content.slice(endPos) ].join('');
                this.$refs['editor'].focus();
                this.selected = null
            }
        },
        moveCursor: function(position)
        {
            setTimeout(()=> {
                this.$refs['editor'].focus();
                this.$refs['editor'].setSelectionRange(position, position)
                this.setCursorPosition(position)
            }, 100)
        },
        onSelect: function(event)
        {
            this.selected = {
                startPos: this.$refs['editor'].selectionStart,
                endPos: this.$refs['editor'].selectionEnd,
                content: this.content.slice(this.$refs['editor'].selectionStart, this.$refs['editor'].selectionEnd).trim()
            }
        },
        onTextareaClick: function(event)
        {
            this.setCursorPosition(this.$refs['editor'].selectionStart)
        },
        setCursorPosition: function(position)
        {
            this.cursorPos = position;
        }
    },
    mounted() {
        console.log('VueMarkdownEditor mounted.')
        EventBus.$on('property-changed', (payload) => {
            console.log(payload)
            this[payload]()
        });
    }
}
</script>

<style scoped>
.editor {
    resize: none;
    overflow: hidden;
}
</style>
