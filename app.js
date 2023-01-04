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

const la=document.querySelectorAll(".active-links");
const div=document.querySelectorAll("divition");
function activeMenu(){
  let len=div.length;
  while(--len && window.scrollY + 97 < div[len].offsetTop){}
    la.forEach(ltx => ltx.classList.remove("active"));
    la[len].classList.add("active");

}
activeMenu();
window.addEventListener("scroll",activeMenu);
