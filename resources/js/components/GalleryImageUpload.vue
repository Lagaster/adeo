<template>
    <div class="col-md-12" >
        <form :action="url" id="gallery-upload-form" class="dropzone" method="post"></form>
    </div>
</template>

<script>
import Dropzone from "dropzone"
import "dropzone/dist/dropzone.css"
import axios from "axios"
export default {
    props: {
        url: {
            type: String,
            required: true
        }
    },
    data() {
        return {
            
        }
    },
    mounted() {
        this.initDropzone()
    },
    methods: {
        initDropzone() {
            let myDropzone = new Dropzone("#gallery-upload-form", {
                url: this.url,
                headers: {
                    'X-CSRF-TOKEN': document.head.querySelector('meta[name="csrf-token"]').content
                },
                maxFilesize: 4,
                maxFiles: 50,
                acceptedFiles: 'image/*',
                addRemoveLinks: true,
                dictRemoveFile: 'Remove',
                dictFileTooBig: 'Image is larger than 4MB',
                dictMaxFilesExceeded: 'You can only upload 50 images',
                dictInvalidFileType: 'You can only upload images',
                init: function() {
                    this.on("success", function(file, response) {
                        console.log(response)
                    }),
                    this.on("removedfile", function(file) {
                        console.log("File Removed")
                        
                    }),
                    this.on("error", function(file, response) {
                        console.log(response)
                    })

                }
            })
        },

        

    },
    
}
</script>

<style lang="scss">


</style>