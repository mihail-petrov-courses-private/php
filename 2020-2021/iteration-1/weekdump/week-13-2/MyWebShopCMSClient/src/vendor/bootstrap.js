var rootElement = document.getElementById("template-placeholder");
var processUrl = function() {
    
    var hashCode                = window.location.hash;
    var hashReferenceBuilder    = hashCode.split('?');
    var hash                    = hashReferenceBuilder[0];
    var queryParameter          = {};
    
    if(hashReferenceBuilder.length > 1) {
        queryParameter = Url.queryParameterToObject(hashReferenceBuilder[1]);
    }
    
    if(hash == ''       ) return HomeController.run     (rootElement);
    if(hash == '#home'  ) return HomeController.run     (rootElement);
    if(hash == '#teller') return TellerController.run   (rootElement);
    if(hash == '#mark'  ) return TellerController.mark  (rootElement, queryParameter);
    return PageNotFoundController.run(rootElement);    
};


window.onhashchange = processUrl;
processUrl();