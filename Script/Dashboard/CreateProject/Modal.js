const CreatedProject = document.getElementsByClassName("CreatedProject");
const CreatedProjectArray = Array.from(CreatedProject).entries()
const MenuIcon = document.getElementsByClassName("DisplayMenuList");

for(let [index, trigger] of CreatedProjectArray){
    const toggle = ()=>{
        MenuIcon[index].classList.toggle("Toggle")
    }
    trigger.addEventListener("click", toggle)
}