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
    props: ['text-property'],
    data: function() {
        return {
            content: null,
            style: null,
            rows: 3,
            selected: {
                startPos: null,
                endPos: null,
                content: null
            }
        }
    },
    watch: {
        textProperty: function()
        {
            console.log('Text property changed')
            this.style = this.textProperty;
            console.log('Style ' + this.style)
        },
        style: function()
        {
            if(this.style !== null && this.content !== null)
            {
                if(this.style == 'bold')
                {
                    if(this.selected.content == null)
                    {
                        this.injectContent(this.cursorPos, this.cursorPos + 3, ' ____ ');
                    } else {
                        this.replaceContent(this.selected.startPos, this.selected.endPos, ` __${this.selected.content}__ `);
                    }
                }

                if(this.style == 'italic')
                {
                    if(this.selected.content == null)
                    {
                        let cursorPos = this.$refs['editor'].selectionStart;
                        this.injectContent(this.cursorPos, this.cursorPos + 2, ' __ ');
                    } else {
                        this.replaceContent(this.selected.startPos, this.selected.endPos, ` _${this.selected.content}_ `);
                    }
                }
            }
        },
        content: function()
        {
            // console.log(this.$refs['editor'].selectionStart, this.$refs['editor'].selectionEnd)
            autosize(this.$refs['editor'])
            this.$emit('content-changed', this.content)
        }
    },
    computed: {
        cursorPos: function()
        {
            return this.$refs['editor'].selectionStart
        }
    },
    methods: {
        injectContent: function(startPos, cursorPos, inject)
        {
            this.content = [ this.content.slice(0, startPos), inject, this.content.slice(startPos) ].join('');
            this.moveCursor(cursorPos)
            this.removeStyle();
        },
        replaceContent: function(startPos, endPos, content)
        {
            if(this.selected.content !== null)
            {
                this.content = [ this.content.slice(0, startPos), content, this.content.slice(endPos) ].join('');
                this.$refs['editor'].focus();
            }
            this.removeStyle();
        },
        moveCursor: function(position)
        {
            setTimeout(()=> {
                this.$refs['editor'].focus();
                this.$refs['editor'].setSelectionRange(position, position)
            }, 100)
        },
        removeStyle: function()
        {
            this.style = null;
        },
        onSelect: function(event)
        {
            this.selected = {
                startPos: this.$refs['editor'].selectionStart,
                endPos: this.$refs['editor'].selectionEnd,
                content: this.content.slice(this.$refs['editor'].selectionStart, this.$refs['editor'].selectionEnd).trim()
            }
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
