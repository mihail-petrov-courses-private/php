(function() {
    
    var $dom = {};
    
    var _templateBootstrap = (htmlPlaceholder) => {
    
        Template.load('signin/template.html', function(result) {
            htmlPlaceholder.innerHTML = result;
            _contructor();            
        });
    };
    
    var _contructor = () => {
        
        //  form input
        $dom.signupUserEmailInput       = $("#signup--user-email");
        $dom.signupUserPasswordInput    = $("#signup--user-password");
        
        // form action
        $dom.signupSubmitAction         = $("#signup--submit");        
        
        // addEventListener
        $dom.signupSubmitAction.on('click', function() {
           
           if($dom.signupUserEmailInput.val().length == 0) {
              $dom.signupUserEmailInput.after("<p>This field is required</p>");
              return;
           }
           
           if($dom.signupUserPasswordInput.val().length == 0) {
              $dom.signupUserPasswordInput.after("<p>This field is required</p>");
              return;
           }
           
           var request = {
               email    : $dom.signupUserEmailInput.val(),
               password : $dom.signupUserPasswordInput.val()
           };
           
            Api.http.user.signin(request, (result) => {
               console.log(result);
           });
        });
    };

    SigninController = {
        init : _templateBootstrap
    };
    
})();