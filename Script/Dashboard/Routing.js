const ActivePage = window.location.pathname;
//console.log(ActivePage)
const NavigationLink = document.querySelectorAll(".MenuItem");
NavigationLink.forEach(element => {
    if(ActivePage.includes(element.innerText.toLowerCase().replace(/ +/g, ""))){
        element.classList.add("Active");
    }
    // else{
    //     console.log("Doesn't includes")
    // }
});