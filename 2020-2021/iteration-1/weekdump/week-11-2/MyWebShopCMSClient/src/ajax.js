var Ajax = {};

Ajax.get = function(url, callback) {
  
    var ajaxRequest = new XMLHttpRequest();
    
    ajaxRequest.onreadystatechange = function() {
        
        if(ajaxRequest.readyState == 4) {
            callback(ajaxRequest.responseText);
        }
    };
    
    ajaxRequest.open("GET", url);
    ajaxRequest.send();
};

Ajax.json = function(url, callback) {
  
    var ajaxRequest = new XMLHttpRequest();
    
    ajaxRequest.onreadystatechange = function() {
        
        if(ajaxRequest.readyState == 4) {
            callback(JSON.parse(ajaxRequest.responseText));
        }
    };
    
    ajaxRequest.open("GET", url);
    ajaxRequest.send();    
};