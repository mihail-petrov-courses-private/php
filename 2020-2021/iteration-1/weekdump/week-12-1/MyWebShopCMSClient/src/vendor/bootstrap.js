var rootElement = document.getElementById("template-placeholder");
var processUrl = function() {
    
    var hashCode = window.location.hash;

    if(hashCode == ''  ) return HomeController.run(rootElement);
    if(hashCode == '#home'  ) return HomeController.run(rootElement);
    if(hashCode == '#teller') return TellerController.run(rootElement);
    return PageNotFoundController.run(rootElement);    
};


window.onhashchange = processUrl;
processUrl();