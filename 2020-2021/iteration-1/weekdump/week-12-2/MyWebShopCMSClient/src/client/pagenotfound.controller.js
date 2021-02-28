var PageNotFoundController = (function() {
    
    var PublicReference = {};
    
    var template = () => `<h1> Sorry пия само бело вино пич</h1>`;

    PublicReference.run = function(domElement) {
        domElement.innerHTML = template();
    };
    
    return PublicReference;
})();

