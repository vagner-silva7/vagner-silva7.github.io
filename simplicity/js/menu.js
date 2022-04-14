const botao = document.querySelector("nav h2");
const linksmenu = document.querySelector(".links-menu");
const icone = document.querySelector(".icone");

botao.addEventListener("click", function(event){
    event.preventDefault();
    linksmenu.classList.toggle("aberto");

    if (linksmenu.classList.contains("aberto")) {
        icone.innerHTML = "Fechar &times;";
    } else {
        icone.innerHTML = "Menu &equiv;"
    }

});
