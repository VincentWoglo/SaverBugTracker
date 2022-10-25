const ThreeDotsWrapper = document.getElementsByClassName("ThreeDotsWrapper");
const ThreeDotsWrapperArray = Array.from(ThreeDotsWrapper).entries();
const DisplayMenuList = document.getElementsByClassName("DisplayMenuList");

for(let [index, trigger] of ThreeDotsWrapperArray){
    const toggle = ()=>{
        console.log("error");
        DisplayMenuList[index].classList.toggle("Toggle");
    }
    trigger.addEventListener("click", toggle);
}