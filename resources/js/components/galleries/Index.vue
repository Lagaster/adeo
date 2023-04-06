<template>
    <div class="col-md-12 clearfix ">

        <GalleryImageUpload @imageUploaded="imageUploadedSuccessfully"></GalleryImageUpload>


        <div class="container-galleries">
            <div class="galleries-list">
                <div class="gallery-item" v-for="(image, index) in images" :key="index">
                    <div class="gallery-item-image">
                        <img :src="image.file" :alt="image.created_at">
                    </div>

                    <div class="gallery-item-actions">
                        <a href="" @click.prevent="deleteImage(image.id)" class="delete-btn">Delete</a>
                    </div>
                </div>
            </div>

        </div>


    </div>
</template>

<script>
import GalleryImageUpload from './GalleryImageUpload.vue';
export default {
    name: 'Index',

    data() {
        return {
            images: []
        }
    },
    components: {
        GalleryImageUpload
    },
    methods: {
        fetchImages() {
            axios.get("/api/galleries")
                .then(response => {
                    this.images = response.data
                })
                .catch(error => {
                    console.log(error)
                })
        },
        deleteImage(imageId) {
            new swal({
                
                title: "Are you sure?",
                    html: "<b style='color:red'>You will not be able to recover this image!</b> <br> <b style='color:blue'>Do you want to continue?</b>",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",


            }).then((response) => {
                if (response.isConfirmed) {
                        this.deleteImageFromServer(imageId)
                        this.fetchImages()

                    } else {
                        new swal("Your image is safe!");
                    }
                });

        },
        imageUploadedSuccessfully(event) {
            this.fetchImages()
        },
        deleteImageFromServer(imageId) {
            axios.delete(`/api/galleries/${imageId}`).then(() => {
            }).catch(error =>{
               new swal("Error", "Something went wrong", "error")
            })
        }

    },
    mounted() {

        this.fetchImages()

    }
}
</script>

<style lang="scss">
.container-galleries {
    width: 100%;
    margin: 20px auto;
    padding: 5px;

    border: 1px solid #ccc;
    border-radius: 5px;

    .galleries-list {
        width: 100%;
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        grid-gap: 10px;

        .gallery-item {
            width: 100%;
            padding: 5px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 5px;
            box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.5);



            .gallery-item-image {
                width: 100%;
                height: 150px;
                overflow: hidden;

                img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                    object-position: center;
                }
            }

            .gallery-item-actions {
                width: 100%;
                margin-top: 10px;
                text-align: center;
                display: none;
                .delete-btn {
                    color: #fff;
                    background-color: #dc3545;
                    border-color: #dc3545;
                    padding: 4px 10px;
                    border-radius: 5px;
                    text-decoration: none;
                    cursor: pointer;

                    &:hover {
                        color: #fff;
                        background-color: #c82333;
                        border-color: #bd2130;
                    }
                }
            }
            &:hover {
                .gallery-item-actions {
                    display: block;
                }
                box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.8);
            }
        }
    }
}
</style>