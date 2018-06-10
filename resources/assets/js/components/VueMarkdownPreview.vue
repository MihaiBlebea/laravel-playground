<template>
    <div>
        <div v-html="generateHtml"></div>
    </div>
</template>

<script>
// import { markdown } from 'markdown';
import marked from 'marked';
import highlight from 'highlight.js';

export default {
    props: ['markdown-content'],
    data: function() {
        return {
            //
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
                    highlight: function(code) {
                        return highlight.highlightAuto(code).value;
                    },
                })
                let renderer = new marked.Renderer();
                renderer.code = function(code, language)
                {
                    console.log(code, language)
                    return '<pre><code class="hljs ' + language + '">' +
                           highlight.highlight(language, code).value +
                           '</code></pre>';
                };

                return marked(this.markdownContent, {renderer: renderer})
            }
        }
    },
    mounted() {
        console.log('VueMarkdownPreview mounted.')
    }
}
</script>
