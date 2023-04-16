import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

$(function () {
    $("#delete-user").on("click", function (event) {
        event.preventDefault();
        var url = $(this).attr("data-action");
        var id = $(this).attr("data-id");
        new swal({
            title: "Are you sure?",
            html: "<b style='color:red'>You will not be able to recover this user!</b> <br> <b style='color:blue'>Do you want to continue?</b>",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel!",
        }).then((response) => {
            // console.log(response);
            if (response.isConfirmed) {
                // ajax setup
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                            "content"
                        ),
                    },
                });
                $.ajax({
                    url: url,
                    type: "DELETE",
                    data: {
                        id: id,
                    },
                    success: function (response) {
                        if (response.status == true) {
                            new swal(response.message, {
                                icon: "success",
                            }).then(function () {
                                location.href = "{{ route('users.index') }}";
                            });
                        } else {
                            new swal("Something went wrong");
                        }
                    },
                });
            } else {
                new swal("User is safe!");
            }
        });
    });
    updateUserProfileInit();
});
function updateUserProfileInit() {
    let form = $("#my-awesome-dropzone-form");
    let url = form.attr("action");
    let method = form.attr("method");
    // initialize dropzone
    let dropzone = new Dropzone("#my-awesome-dropzone-form", {
        url: url,
        method: method,
        paramName: "image",
        maxFiles: 1,
        maxFilesize: 4,
        acceptedFiles: "image/*",
        addRemoveLinks: true,
        dictDefaultMessage: "",
        dictRemoveFile: "Remove",
        dictFileTooBig: "Image is larger than 4MB",
        dictInvalidFileType: "Only images are allowed",
        dictMaxFilesExceeded: "Only one image is allowed",
        parallelUploads: 1,
        uploadMultiple: false,
        createImageThumbnails: true,
        maxThumbnailFilesize: 50,
        thumbnailWidth: 250,
        thumbnailHeight: 250,
        autoProcessQueue: false,
        clickable: "#select-image-btn",
        headers: {
            "X-CSRF-TOKEN": document.head.querySelector(
                'meta[name="csrf-token"]'
            ).content,
        },
        init: function () {
            this.on("success", function (file, response) {
                if (response.status == true) {
                    new swal(response.message, {
                        icon: "success",
                    }).then(function () {
                        location.reload();
                    });
                } else {
                    new swal("Something went wrong");
                }
            });
            // if myDropzone.getQueuedFiles().length === 1 disable  select file button
            this.on("addedfile", function (file) {
                if (this.getQueuedFiles().length >= 0) {
                    $("#select-image-btn").text("Change Image").removeClass("btn-primary").addClass("btn-warning");
                    $("#upload-image-btn").removeClass("d-none");
                    $('#my-awesome-dropzone-form').removeClass('d-none');
                    // remove current file if user select another file
                    if(this.getQueuedFiles().length > 0){
                        this.removeFile(this.files[0]);
                    }
                }
            });
        },
    });

    // upload image
    $("#upload-image-btn").on("click", function (event) {
        event.preventDefault();
        dropzone.processQueue();
    });
}
