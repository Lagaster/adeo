import axios from "axios";

const fetchImages = ()=> {
    axios.get("/api/galleries")
    .then(response => {
        return  response.data
    })
    .catch(error => {
        console.log(error)
    })
}

const deleteImage = ( imageId)=>{
    axios.delete(`/api/galleries/${imageId}`).then(()=>{
        alert("Image Deleted")
    }).catch(error=>console.log(error))
}

export default {
    fetchImages, deleteImage
}