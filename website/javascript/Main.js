function Dropdown(){
    document.getElementById("ACC").classList.toggle("show");
}

var typed = new Typed(".auto-type",{
    strings:["Foodables", "charity","helpers","restaurants"],
    typeSpeed:150,
    backSpeed:150,
    loop:true
})
// window.onclick = function(event){
//     if(!event.target.matches('dropDown'))
//     {
//         var dropdowns = document.getElementsByClassName("Dropdown-content");
//         var i;
//         for(i=0; i<dropdowns.length; i++)
//         {
//             var opendropdown = dropdowns[i];
//             if (opendropdown.classList.contains("show"))
//             {
//                 opendropdown.classList.remove("show");
//             }
//         }
//     }
// }