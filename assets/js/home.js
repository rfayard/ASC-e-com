console.log("salut ma yecou");


window.addEventListener("DOMContentLoaded", function() {
    let mybutton = document.getElementById("myBtn");
    mybutton.addEventListener("click", function(){
            


        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    
    })
  });



  window.addEventListener("DOMContentLoaded", function() {
    let frenchButton = document.getElementById("frenchButton");
    let isFrench = true;
    let englishButton = document.getElementById("englishButton");
    let isEnglish = false;
    englishButton.addEventListener("click", function(){
            
        if(isEnglish == false){
            isEnglish = true;
            isFrench = false;
            console.log("isEnglish = " + isEnglish);
            console.log("isFrench = " + isFrench);
        }else{
            alert("This website is already in english");
        }
    
    })


    frenchButton.addEventListener("click", function(){
    
        if(isFrench == false){
            isEnglish = false;
            isFrench = true;
            console.log("isFrench = " + isFrench);
            console.log("isEnglish = " + isEnglish);
        }else{
            alert("Le site est déjà en français");
        }
    })
  });



let hauteurVue = window.innerHeight;
let largeurVue = window.innerWidth;
let ratioHorizontal = largeurVue / hauteurVue;
let intervalleCheckViewport = window.setInterval(checkConstant, 500); 

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
    menuSidebar[0].classList.remove("containerLeftSidePad");
    menuSidebar[0].classList.remove("containerLeftSidePhone");
    menuSidebar[0].classList.add("containerLeftSideComputer");
    document.getElementById("myBurgerBtn").style.display = "none";
}

function responsivePad(){
    console.log("on passe en carré");
    for (let i = 0; i < listeCategories.length; i++) {
        listeCategories[i].classList.remove("previewPhone");
        listeCategories[i].classList.remove("previewComputer");
        listeCategories[i].classList.add("previewPad");
    }   
    menuSidebar[0].classList.remove("containerLeftSideComputer");
    menuSidebar[0].classList.remove("containerLeftSidePhone");
    menuSidebar[0].classList.add("containerLeftSidePad");
    document.getElementById("myBurgerBtn").style.display = "none";
}

function responsivePhone(){
    console.log("on passe en vertical");
    for (let i = 0; i < listeCategories.length; i++) {
        listeCategories[i].classList.remove("previewPad");
        listeCategories[i].classList.remove("previewComputer");
        listeCategories[i].classList.add("previewPhone");
    }
    menuSidebar[0].classList.remove("containerLeftSidePad");
    menuSidebar[0].classList.remove("containerLeftSideComputer");
    menuSidebar[0].classList.add("containerLeftSidePhone");
    document.getElementById("myBurgerBtn").style.display = "flex";
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


    window.addEventListener("DOMContentLoaded", function() {
        let mybutton = document.getElementById("myBurgerBtn");
        mybutton.addEventListener("click", function(){
            if(affichageSidebar == false){
                menuSidebar[0].classList.remove("containerLeftSidePhone");
                menuSidebar[0].classList.add("containerLeftSidePhoneEnabled");
            affichageSidebar = true;
            console.log(affichageSidebar);
        }else if(affichageSidebar == true){
            menuSidebar[0].classList.remove("containerLeftSidePhoneEnabled");
            menuSidebar[0].classList.add("containerLeftSidePhone");
            affichageSidebar = false;
            console.log(affichageSidebar);
        }
        })
      });


    function checkConstant() {
        ratioViewport();

    }


    checkConstant();
