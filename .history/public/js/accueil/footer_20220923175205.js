let footer = document.getElementById("footer");
let url = window.location.pathname;

if ("/projets" === url){
    footer.classList.remove("absolute");
    footer.classList.add("relative");
}else{
    footer.classList.remove("relative");
    footer.classList.add("absolute");
    console.log(footer);

}