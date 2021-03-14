var Tokken = (function() {
    
    var PublicReference = {};
    
    PublicReference.set = (tokkent) => {
        localStorage.setItem('tokken', tokkent);
    };
    
    PublicReference.get = () => {
        return localStorage.getItem('tokken');
    };    
    
    return PublicReference;
})();