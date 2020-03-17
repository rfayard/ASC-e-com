console.log("salut ma yecou");


window.addEventListener("DOMContentLoaded", function() {
    let mybutton = document.getElementById("myBtn");
    mybutton.addEventListener("click", function(){
            


        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    
    })
  });


  
let hauteurVue = window.innerHeight;
let largeurVue = window.innerWidth;
let ratioHorizontal = largeurVue / hauteurVue;
let intervalleCheckViewport = window.setInterval(checkConstant, 500); 

let boutonEspaceClient =  document.getElementsByClassName("boutonEspaceClient");
let boutonPanier =  document.getElementsByClassName("boutonPanier");
let listeCategories = document.getElementsByClassName("preview");
let menuSidebar = document.getElementsByClassName("containerLeftSide");
let affichageSidebar = false;


function responsiveComputer(){
    console.log("on passe en horizontal");
    for (let i = 0; i < listeCategories.length; i++) {
        listeCategories[i].classList.remove("previewPad");
        listeCategories[i].classList.remove("previewPhone");
        listeCategories[i].classList.add("previewComputer");
    }
    boutonPanier[0].classList.remove("boutonPanierPad");
    boutonPanier[0].classList.remove("boutonPanierPhone");
    boutonPanier[0].classList.add("boutonPanierComputer");
    boutonEspaceClient[0].classList.remove("boutonEspaceClientPad");
    boutonEspaceClient[0].classList.remove("boutonEspaceClientPhone");
    boutonEspaceClient[0].classList.add("boutonEspaceClientComputer");
}

function responsivePad(){
    console.log("on passe en carré");
    for (let i = 0; i < listeCategories.length; i++) {
        listeCategories[i].classList.remove("previewPhone");
        listeCategories[i].classList.remove("previewComputer");
        listeCategories[i].classList.add("previewPad");
    }   
    affichageSidebar = false;
    boutonPanier[0].classList.remove("boutonPanierComputer");
    boutonPanier[0].classList.remove("boutonPanierPhone");
    boutonPanier[0].classList.add("boutonPanierPad");
    boutonEspaceClient[0].classList.remove("boutonEspaceClientComputer");
    boutonEspaceClient[0].classList.remove("boutonEspaceClientPhone");
    boutonEspaceClient[0].classList.add("boutonEspaceClientPad");
}


function responsivePhone(){
    console.log("on passe en vertical");
    for (let i = 0; i < listeCategories.length; i++) {
        listeCategories[i].classList.remove("previewPad");
        listeCategories[i].classList.remove("previewComputer");
        listeCategories[i].classList.add("previewPhone");
    }
    boutonPanier[0].classList.remove("boutonPanierPad");
    boutonPanier[0].classList.remove("boutonPanierComputer");
    boutonPanier[0].classList.add("boutonPanierPhone");
    boutonEspaceClient[0].classList.remove("boutonEspaceClientPad");
    boutonEspaceClient[0].classList.remove("boutonEspaceClientComputer");
    boutonEspaceClient[0].classList.add("boutonEspaceClientPhone");
}

function ratioViewport() {
    hauteurVue = window.innerHeight;
    largeurVue = window.innerWidth;
    ratioHorizontal = largeurVue / hauteurVue;
    
        if ((largeurVue / hauteurVue) > (12/9)) {
            ratioHorizontal == (largeurVue / hauteurVue); 
           // console.log("computerSize " + ratioHorizontal);
            responsiveComputer();
        } else if (((largeurVue / hauteurVue) <= (12/9)) && ((largeurVue / hauteurVue) > (0.97))) {
            ratioHorizontal == (largeurVue / hauteurVue); 
           // console.log("padSize " + ratioHorizontal);
            responsivePad();
        }else if((largeurVue / hauteurVue) <= (0.97)) {
            ratioHorizontal == (largeurVue / hauteurVue); 
            //console.log("phoneSize " + ratioHorizontal);
            responsivePhone();
        }
    }




let isConnexionInterfaceActive = false;
let connexionButton = document.getElementById("connexionButton");



window.addEventListener("DOMContentLoaded", function() {
    let boutonEspaceClient = document.getElementById("boutonEspaceClient");
    let connexionContainer = document.getElementById("connexionContainer");
    boutonEspaceClient.addEventListener("click", function(){
        connexionContainer.style.display = "flex";
        isConnexionInterfaceActive = true;
    })
});

window.addEventListener("DOMContentLoaded", function() {
    let connexionContainer = document.getElementById("connexionContainer");
    let connexionButton = document.getElementById("connexionButton");
    connexionButton.addEventListener("click", function(){
        connexionContainer.style.display = "none";
        isConnexionInterfaceActive = false;
    })
});



    function checkConstant() {
        ratioViewport();
    }


    checkConstant();