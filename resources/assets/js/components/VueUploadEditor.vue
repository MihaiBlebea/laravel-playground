<template>
    <div>
        <label class="btn btn-outline-secondary mb-0" v-if="this.selectedFile == null">
            Browse <input type="file" name="image" hidden @change="onFileChanged">
        </label>

        <div v-else class="row justify-content-between">
            <button class="col btn btn-primary mt-2" v-if="this.selectedFile !== null"
                  v-on:click="removeImage()">Clear image</button>
            <button class="col btn btn-primary mt-2" v-if="this.selectedFile !== null"
                  v-on:click="uploadImage()">Upload</button>
        </div>

        <div class="mt-3" id="image-preview"></div>
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
                console.log(result.data)
            }).catch((err)=> {
                console.log(err)
            })
        }
    }
}
</script>
