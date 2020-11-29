(function() {
    
    var $dom = {};
    
    var _templateBootstrap = (htmlPlaceholder) => {
    
        Template.load('contact/template.html', function(result) {
            htmlPlaceholder.innerHTML = result;
            _contructor();            
        });
    };
    
    var _contructor = () => {
        
    };

    ContactController = {
        init : _templateBootstrap
    };
    
})();