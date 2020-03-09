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

function ratioViewport() {
    hauteurVue = window.innerHeight;
    largeurVue = window.innerWidth;
    ratioHorizontal = largeurVue / hauteurVue;
    
        if ((largeurVue / hauteurVue) > (11/9)) {
            ratioHorizontal == (largeurVue / hauteurVue); 
            console.log(ratioHorizontal);
        } else if (((largeurVue / hauteurVue) <= (11/9)) && ((largeurVue / hauteurVue) > (0.9))) {
            ratioHorizontal == (largeurVue / hauteurVue); 
            console.log(ratioHorizontal);
        }else if((largeurVue / hauteurVue) <= (0.9)) {
            ratioHorizontal == (largeurVue / hauteurVue); 
            console.log(ratioHorizontal);
        }
    }

    function checkConstant() {
        ratioViewport();

        //adaptation css()
    }


    checkConstant();
