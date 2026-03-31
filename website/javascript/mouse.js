let followMouse = document.getElementById('mouse');
// detect touch devie
function isTouchDevice() {
    try
    {
        // we try to create touch event
        document.createEvent("TouchEvent");
        return true;
    } catch (e)
    {
        return false;
    }
    
}

const move = (e) => 
{
    // try catch to avoid any error 
    try
    {
        //pagex and pageY return
        var x = !isTouchDevice() ?e.pageX : e.Touches[0].pageX;
        var y = !isTouchDevice() ?e.pageY : e.Touches[0].pageY;
    }
    catch(e)
    {
        followMouse.style.left = x + "px";
        followMouse.style.top= y + "px";
    };
document.addEventListener("mousemove",(e) =>{
    move(e);
})

}    