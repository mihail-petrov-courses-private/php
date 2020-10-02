(function() {
    
    var $dom = {};
    
    var _templateBootstrap = (htmlPlaceholder) => {
    
        Template.load('singup/template.html', function(result) {
            htmlPlaceholder.innerHTML = result;
            _contructor();            
        });
    };
    
    var _contructor = () => {
        
    };

    SignupController = {
        init : _templateBootstrap
    };
    
})();