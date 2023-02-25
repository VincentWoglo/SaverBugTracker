const CreateProjectPopUpWrapper = document.getElementById(
  "CreateProjectPopUpWrapper"
);
const CreateNewProject = document.getElementById("CreateNewProject");

const ToggleModel = () => {
  CreateProjectPopUpWrapper.classList.toggle("Toggle");
  //alert('dfdf')
};
CreateNewProject.addEventListener("click", ToggleModel);

const ProjectTitle = document.getElementById("ProjectTitle");
const CreateProjectButton = document.getElementById("CreateProjectButton");

const CheckInputLength = (ProjectTitleInput) => {
  let ProjectTitleInputs = ProjectTitleInput;
  let MinimumAllowedInput = 4;
  let RedInputBorder = "2px red solid";
  let BlueInputBorder = "2px blue solid";
  let Zero = 0;
  let FinalResult;

  if (ProjectTitleInputs.value.length === Zero) {
    ProjectTitleInputs.style.border = RedInputBorder;
    console.log("Please enter in a name");
    FinalResult = false;
  } else if (ProjectTitleInputs.value.length < MinimumAllowedInput) {
    console.log("Input less than expected (8)");
    ProjectTitleInputs.style.border = RedInputBorder;
    FinalResult = false;
  } else {
    ProjectTitleInputs.style.border = BlueInputBorder; //Also return data as in true or false}
    FinalResult = true;
  }
  return FinalResult;
};

let result = '';
const SendDataToServer = (ProjectTitleInputs) => {
  let Data = new FormData();
  Data.append("ProjectTitleInput", ProjectTitleInputs.value);

  let Xhr = new XMLHttpRequest();
  let ServerUrl = "http://localhost/SaverBugTracker/Controller/CreateProject.php"; //Add path to the php file

  Xhr.open("POST", ServerUrl, true);
  Xhr.responseType = 'json';
  Xhr.onload = () => {
    if (Xhr.readyState == 4 && Xhr.status == 200) {
      let ReturnedData = Xhr.response;
      window.location.href = "http://localhost/SaverBugTracker/home/trackbugs/421848e78fee6aee2b4d71c0d3aa238e";
      console.log(Xhr)
    }
  };
  Xhr.send(Data);
};

const Validation = () => {
  let CheckedPRojectTItleInput = CheckInputLength(ProjectTitle);
  console.log(CheckedPRojectTItleInput)
  if (CheckedPRojectTItleInput == true) {
    //console.log("The user can create a project");
    SendDataToServer(ProjectTitle);
    //window.locationm.href = "http://localhost/SaverBugTracker/home/trackbugs/"+JSON.parse(Xhr.response).ProjectId
  }
  else{
    console.log('There was a problem creating your project. Please try again')
  }
  //Going to the else because the script is already running and doesn't update upon new submit
};
//Display confetti animation when message goes through
//Display message to let user know things went through
//Send Ajax request to the back end
CreateProjectButton.addEventListener("click", Validation);
