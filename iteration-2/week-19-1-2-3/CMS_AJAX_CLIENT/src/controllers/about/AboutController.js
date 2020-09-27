(function() {
    
    var $dom = {};
    
    var _templateBootstrap = (htmlPlaceholder) => {
    
        Template.load('about/template.html', function(result) {
            htmlPlaceholder.innerHTML = result;
            _contructor();            
        });
    };
    
    var _contructor = () => {
        
    };

    AboutController = {
        init : _templateBootstrap
    };
    
})();