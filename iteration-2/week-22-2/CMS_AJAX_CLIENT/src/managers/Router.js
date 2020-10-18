var menuPlaceholder     = document.getElementById("cms--menu");
var contentPlaceholder  = document.getElementById("content");

var redirect = (controllerId) => {
    
    var controllerIdFirstLetter = controllerId[0].toUpperCase();
    var controllerIdRest        = controllerId.slice(1);
    controllerId                = `${controllerIdFirstLetter}${controllerIdRest}`;
    var controllerExecutor      = `${controllerId}Controller.init(contentPlaceholder)`;
    eval(controllerExecutor);    
};


// MVC
// #Designe Patterns 
// * Model
// * View
// * Controller
menuPlaceholder.addEventListener('click', function(e) {
    
    var controllerId            = e.target.dataset.controller;
    var controllerIdFirstLetter = controllerId[0].toUpperCase();
    var controllerIdRest        = controllerId.slice(1);
    controllerId                = `${controllerIdFirstLetter}${controllerIdRest}`;
    var controllerExecutor      = `${controllerId}Controller.init(contentPlaceholder)`;
    eval(controllerExecutor);
});


