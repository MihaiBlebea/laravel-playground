<template>
    <div>
        <div v-html="generateHtml" v-highlight></div>
    </div>
</template>

<script>
import marked from 'marked';
import highlight from 'highlight.js';

export default {
    props: ['markdown-content'],
    data: function() {
        return {
            //
        }
    },
    directives: {
        highlight: {
            deep: true,
            componentUpdated: function(el, binding)
            {
                console.log(el)
                let targets = el.querySelectorAll('code')
                targets.forEach((target)=> {
                    highlight.highlightBlock(target)
                });
            }
        }
    },
    computed: {
        generateHtml: function()
        {
            if(this.markdownContent !== null)
            {
                marked.setOptions({
                    baseUrl: 'http://slabeste',
                    gfm	: true,
                    breaks: true,
                })

                return marked(this.markdownContent)
            }
        }
    },
    mounted() {
        console.log('VueMarkdownPreview mounted.')
    }
}
</script>
