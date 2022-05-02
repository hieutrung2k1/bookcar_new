function clickHidden(id){
    var dropdown = document.getElementById(id);
    dropdown.classList.toggle("show");
    
}
var move = null;
function displayLogin(id){
    var element = document.getElementById(id);
    var posX = 0;
    var posY = 0;
    clearInterval(move);
    move = setInterval(frame,1);
    function frame(){
        if(posX == 520){
            clearInterval(move);
        }
        else{
            posX+=52;
            posY+=2;
            element.style.top = posY + "px";
            element.style.right = posX + "px";
        }
    }
}
// section slogan
const sloganElement = document.querySelector(".section-slogan-desc");
const sloganText = sloganElement.textContent;
const sloganTextSplit = sloganText.split("");
sloganElement.textContent = "";
for(let i=0;i<sloganTextSplit.length;i++){
    sloganElement.innerHTML += "<span>" + sloganTextSplit[i] + "</span>"
}
let char = 0;
let timer = setInterval(onTick,50);
function onTick(){
    const span = sloganElement.querySelectorAll("span")[char];
    span.classList.add("fadeSlogan");
    char++;
    if(char === sloganTextSplit.length){
        complete();
        return;
    }
}
function complete(){
    clearInterval(timer);
    timer = null;
}

