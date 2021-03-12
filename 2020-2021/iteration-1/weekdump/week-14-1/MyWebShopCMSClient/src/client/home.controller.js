var HomeController = (function() {
    
    var PublicReference = {};
    
    // short hand Arrow function functionality
    var template = () => `<h1> дОБРЕ ДОШЛИ В МОЯ МАГАЗИН</h1>`;

    PublicReference.run = function(domElement) {
        domElement.innerHTML = template();
    };
    
    return PublicReference;
})();

