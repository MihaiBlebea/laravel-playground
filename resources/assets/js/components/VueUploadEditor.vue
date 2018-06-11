<template>
    <div>
        <div class="mt-3" id="image-preview"></div>
        <p class="mt-2" v-if="this.selectedFile !== null"
           v-on:click="removeImage($event)">Clear image</p>
    </div>

    <!-- <div class="input-group">
        <input type="text" class="form-control" v-model="content">
        <div class="input-group-append">
            <button class="btn btn-outline-secondary"
                    type="button"
                    v-on:click="$emit('content-updated', content)">Update</button>
        </div>
    </div> -->
</template>

<script>
export default {
    props: ['default-content'],
    data: function()
    {
        return {
            selectedFile: null
        }
    },
    methods: {
        onFileChanged: function(event)
        {
            this.selectedFile = event.target.files[0]
            var reader = new FileReader();
            reader.onload = function (e) {
                var container = document.getElementById('image-preview');
                var img = document.createElement('img');
                img.src = e.target.result;
                img.alt = 'image';
                img.className = 'thumb';
                img.style.width = '200px';
                container.appendChild(img);
            };

            reader.readAsDataURL(this.selectedFile)
        },
        removeImage: function(event)
        {
            event.preventDefault()
            this.selectedFile = null;
            document.getElementById('image-preview').innerHTML = '';
        }
    }
    // watch: {
    //     content: function()
    //     {
    //         this.$emit('content-changed', this.content);
    //     }
    // },
    // created() {
    //     this.content = this.defaultContent
    // }
}
</script>
