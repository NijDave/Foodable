const image_input = document.querySelector('#image-input');
var uploadedPhoto="";

image_input.addEventListener("change",function()
{
    const reader = new FileReader();
    reader.addEventListener("load",()=>
    {
        uploadedPhoto = reader.result;
        document.querySelector("#displayimage").style.backgroundImage= 'url(${uploadedPhoto})';
    });
    reader.readAsDataURL(this.files[0]);
}
)