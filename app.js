function dropDownMenu(){
       var x = document.getElementById("dropDownClick");
           if(x.className === "topnav"){
               x.className+= " responsive";
           }
           else{
               x.className ="topnav";
           }
       }

function closeDropDownMenu(){
  var x = document.getElementById("dropDownClick");
    x.className="topnav";

}
window.addEventListener("scroll", function(){
    var header= document.querySelector("header");
    header.classList.toggle("sticky",window.scrollY > 0);
})

const menuBtn = document.querySelector('.menu-btn');
let menuOpen = false;
menuBtn.addEventListener('click', () => {
  if(!menuOpen) {
    menuBtn.classList.add('open');
    menuOpen = true;
  } else {
    menuBtn.classList.remove('open');
    menuOpen = false;
  }
});
