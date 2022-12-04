function dropDownMenu(){
       var x = document.getElementById("dropDownClick");
           if(x.className === "topnav"){
               x.className+= " responsive";
           }
           else{
               x.className ="topnav";
           }
       }
window.addEventListener("scroll", function(){
    var header= document.querySelector("header");
    header.classList.toggle("sticky",window.scrollY > 0);
})
