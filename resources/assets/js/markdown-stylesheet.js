export const stylesheet = {

    italic: function(content)
    {
        return ` _${content}_ `
    },
    bold: function(content)
    {
        return ` __${content}__ `
    },
    strike: function(content)
    {
        return ` ~~${content}~~ `
    },
    h1: function(content)
    {
        return `\n # ${content} \n`
    },
    h2: function(content)
    {
        return `\n ## ${content} \n`
    },
    h3: function(content)
    {
        return `\n ### ${content} \n`
    },
    h4: function(content)
    {
        return `\n #### ${content} \n`
    },
    h5: function(content)
    {
        return `\n ##### ${content} \n`
    },
    h6: function(content)
    {
        return `\n ###### ${content} \n`
    },
    link: function(content)
    {
        return ` [${content}](https://www.google.com) `;
    },
    script: function(content)
    {
        return '\n ```javascript \n ' + content + '\n ```';
    },
    image: function(content)
    {
        return `\n ![alt text](${content}) \n`;
    },
    unList: function(content)
    {
        return `\n + item 1 \n + item 2 \n + item 3 \n`;
    },
    list: function(content)
    {
        return `\n 1. item 1 \n 2. item 2 \n 3. item 3 \n`;
    }
    
}
