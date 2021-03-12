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

Ajax.post = function(url, body, callback) {
  
    var ajaxRequest = new XMLHttpRequest();
    
    ajaxRequest.onreadystatechange = function() {
        
        if(ajaxRequest.readyState == 4) {
            callback(JSON.parse(ajaxRequest.responseText));
        }
    };
    
    ajaxRequest.open("POST", url);
    ajaxRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajaxRequest.send(Url.objectToFormData(body));
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