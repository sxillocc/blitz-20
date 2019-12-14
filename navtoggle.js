
resizeNav();
window.addEventListener('resize', resizeNav)
document.getElementById('nav-toggle').addEventListener('click', toggleNav)
document.querySelectorAll(".nav-link").forEach(el => {
    el.addEventListener('click', toggleNav)
})
    
function toggleNav () {
    document.getElementById('nav-overlay').classList.toggle("open")
    document.getElementById('nav-fullscreen').classList.toggle("open")
    document.getElementById('nav-toggle').classList.toggle("open")
}
    
function resizeNav () {
    let fscreen = document.getElementById('nav-fullscreen')
    let overlay = document.getElementById('nav-overlay')
    fscreen.style.height = "" + window.innerHeight + "px"
    const radius = Math.sqrt(Math.pow(window.innerHeight, 2) + Math.pow(window.innerWidth, 2));
    const diameter = radius * 2;
    overlay.style.width = "" + diameter + "px"
    overlay.style.height = "" + diameter + "px"
    overlay.style.marginTop = "" + -radius + "px"
    overlay.style.marginLeft = "" + -radius + "px"
}
document.addEventListener('keyup', (e) => {
    if(e.keyCode === 27) {
        document.getElementById('nav-overlay').classList.remove("open")
        document.getElementById('nav-fullscreen').classList.remove("open")
        document.getElementById('nav-toggle').classList.remove("open")
    }
})
