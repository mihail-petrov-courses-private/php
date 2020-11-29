var menuPlaceholder     = document.getElementById("cms--menu");
var contentPlaceholder  = document.getElementById("content");

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
    
//     
//    if(e.target.dataset.controller == 'blog') {
//        BlogController.init(contentPlaceholder);
//    }
//    
//    if(e.target.dataset.controller == 'about') {
//        AboutController.init(contentPlaceholder);
//    }
//    
//    if(e.target.dataset.controller == 'contact') {
//        ContactController.init(contentPlaceholder);
//    }
//    
//    if(e.target.dataset.controller == 'signup') {
//        SignupController.init(contentPlaceholder);
//    }
//    
//    if(e.target.dataset.controller == 'signin') {
//        SigninController.init(contentPlaceholder);
//    }    
});