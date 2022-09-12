UserProfileImage = document.getElementById('UserProfileImage');
UserProfileDropDown = document.getElementById('UserProfileDropDown');

const CloseModel = ()=>{
    UserProfileDropDown.classList.toggle("Hide");
}

UserProfileImage.addEventListener('click', CloseModel);