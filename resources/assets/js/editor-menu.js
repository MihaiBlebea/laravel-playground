export const list = [

    {
        label: 'Style',
        type: 'submenu',
        submenu: [
            {
                method: 'bold',
                label: 'Bold'
            },
            {
                method: 'italic',
                label: 'Italic'
            },
            {
                method: 'strike',
                label: 'Strike'
            },
        ]
    },
    {
        label: 'Title',
        type: 'submenu',
        submenu: [
            {
                method: 'h1',
                type: 'button',
                label: 'H1'
            },
            {
                method: 'h2',
                type: 'button',
                label: 'H2'
            },
            {
                method: 'h3',
                type: 'button',
                label: 'H3'
            },
            {
                method: 'h4',
                type: 'button',
                label: 'H4'
            },
            {
                method: 'h5',
                type: 'button',
                label: 'H5'
            },
            {
                method: 'h6',
                type: 'button',
                label: 'H6'
            },
        ]
    },
    {
        method: 'link',
        type: 'button',
        label: 'Link'
    },
    {
        method: 'script',
        type: 'button',
        label: 'Script'
    },
    {
        method: 'image',
        type: 'button',
        label: 'Image'
    },
    {
        label: 'List',
        type: 'submenu',
        submenu: [
            {
                method: 'unList',
                label: 'Unordered list'
            },
            {
                method: 'list',
                label: 'List'
            }
        ]
    }
]
