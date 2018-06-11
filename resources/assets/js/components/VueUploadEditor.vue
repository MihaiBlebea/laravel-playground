<template>
    <div>

        <div class="mb-3" id="image-preview"></div>

        <div class="form-group">
            <label class="btn btn-outline-secondary mb-0" v-if="this.selectedFile == null">
                Browse <input type="file" name="image" hidden @change="onFileChanged">
            </label>

            <button class="btn btn-primary" v-if="this.selectedFile !== null"
                  v-on:click="removeImage()">Clear image</button>

            <button class="btn btn-primary" v-if="this.selectedFile !== null"
                  v-on:click="uploadImage()">Upload</button>

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
    </div>
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
        removeImage: function()
        {
            this.selectedFile = null;
            document.getElementById('image-preview').innerHTML = '';
        },
        uploadImage: function()
        {
            const formData = new FormData()
            formData.append('image-upload', this.selectedFile, this.selectedFile.name)
            axios.post(this.api + 'store/image', formData).then((result)=> {
                this.$emit('content-updated', result.data)
            }).catch((err)=> {
                console.log(err)
            })
        }
    }
}
</script>
