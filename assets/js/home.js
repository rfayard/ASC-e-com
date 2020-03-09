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


  