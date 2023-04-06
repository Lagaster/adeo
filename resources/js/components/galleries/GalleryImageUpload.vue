<template>
    <div class="col-md-12">

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-sm btn-block" data-toggle="modal" data-target="#modelUploadId">
            Upload images
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modelUploadId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Upload Images</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="gallery-upload-form" class="dropzone" method="post"></form>

                    </div>
                    <!-- <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" id="uploadImagesBtn" @click.prevent="uploadImages" class="btn btn-primary">Upload Images</button>
                        </div> -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Dropzone from "dropzone"
import "dropzone/dist/dropzone.css"
import axios from "axios"
export default {

    data() {
        return {

        }
    },
    mounted() {
        this.initDropzone()
    },
    methods: {
        initDropzone() {
            let vm = this;
            let myDropzone = new Dropzone("#gallery-upload-form", {
                url: "/api/galleries",
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
                autoProcessQueue: true,
                init: function () {
                    this.on("success", function (file, response) {

                        vm.$emit('imageUploaded')
                        // remove file from dropzone
                        this.removeFile(file)

                        if (myDropzone.getQueuedFiles().length === 0 && myDropzone.getUploadingFiles().length === 0) {
                            // close modal
                            $('#modelUploadId').modal('hide')
                            new swal({
                                title: "Success",
                                text: "Images uploaded successfully",
                                icon: "success",
                                button: "Ok",
                            })
                        }



                    }),
                        this.on("removedfile", function (file) {
                            console.log("File Removed")

                        }),
                        this.on("error", function (file, response) {
                            new swal({
                                title: "Error",
                                text: response.message,
                                icon: "error",
                                button: "Ok",
                            })
                        })

                }
            })

        },
        uploadImages() {
            $('#uploadImagesBtn').attr('disabled', true).text('Uploading...')
            let myDropzone = Dropzone.forElement("#gallery-upload-form");
            myDropzone.processQueue();

            // check if all images are uploaded
            if (myDropzone.getQueuedFiles().length === 0 && myDropzone.getUploadingFiles().length === 0) {
                // close modal
                $('#modelUploadId').modal('hide')
            }

            $('#uploadImagesBtn').attr('disabled', false).text('Upload Images')

        }



    },

}
</script>

<style lang="scss">
button.close {
    font-size: 2.5rem;
    color: red;
    padding: 0px;

}

.modal-body {
    padding: 0.5rem;
}
</style>