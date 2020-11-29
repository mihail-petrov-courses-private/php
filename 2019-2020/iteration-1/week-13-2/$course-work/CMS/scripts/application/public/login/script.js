var loginController = function() {
    
    var userEmail        = document.getElementById("login-email");
    var userPassword     = document.getElementById("login-password");
    var userLoginSubmit  = document.getElementById("login-submit-action");
        
     userLoginSubmit.addEventListener('click', function() {
        
        var request = {
            email      : userEmail.value,
            password   : userPassword.value
        };

        Ajax.postJSON('auth/login', request, function(collection) {
            console.log(collection);
            
            if(collection.role == 0) {
                window.location.href = "http://localhost/CMS/index.html?post";
            }
            
        });
     });
};