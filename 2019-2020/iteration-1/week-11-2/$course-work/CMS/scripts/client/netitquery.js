(function() {

    var requestTransform =function(requestBody) {

        var transformCollection = [];
        for(var index in requestBody) {
            transformCollection.push(`${index}=${requestBody[index]}`);
        }

        return transformCollection.join('&');
    };
    
    var baseUrlTransform = function(url) {
        
        var urlElementCollection = url.split("/");
        var endpoint    = urlElementCollection[0];
        var method      = urlElementCollection[1] || 'index';
        
        return `http://localhost/CMS/_routes.php?endpoint=${endpoint}&method=${method}`;
    }
    
    var ajaxHelper = function(url, requestObject, isJSONRequest, callbackSuccess, callbackError ) {

        // cat send request to the server
        var xmlHttpRequest  = new XMLHttpRequest();
        var requestMethod   = (requestObject) ? "POST" : "GET";
        var isJSONRequest   = isJSONRequest || false;
        
        var url             = baseUrlTransform(url);
        var requestObject   = requestTransform(requestObject);
        
        xmlHttpRequest.open(requestMethod, url);
        //xmlHttpRequest.setRequestHeader('Content-Type', 'ápplication/json');  
        xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        
        xmlHttpRequest.send(requestObject);

        xmlHttpRequest.onreadystatechange = function() {


           var statusGroup                  = ((this.status).toString())[0];

           var HTTPStatus = {
               SUCCESS  : (statusGroup == 2),
               FAIL     : (statusGroup == 4 || statusGroup == 5)
           };

           var isHTTPRequestProccesed       = (this.readyState == xmlHttpRequest.DONE);
           var isHTTPRequestSuccessful      = isHTTPRequestProccesed && HTTPStatus.SUCCESS;
           var isHTTPRequestFailed          = isHTTPRequestProccesed && HTTPStatus.FAIL;

           if(isHTTPRequestProccesed) {
               var responseObject           = isJSONRequest ? JSON.parse(this.responseText) : this.responseText;
           }

           if(isHTTPRequestSuccessful)   {
              return callbackSuccess(responseObject);
           }

           if(isHTTPRequestFailed)       {
              return callbackError(responseObject);
           }
        };
    };

    window.Ajax = {
        get : function(url, successCallback, errorCallback) {
            return ajaxHelper(url, null, false, successCallback, errorCallback)
        },
        
        getJSON : function(url, successCallback, errorCallback) {
            return ajaxHelper(url, null, true, successCallback, errorCallback)
        },        

        post : function(url, body, successCallback, errorCallback) {
            return ajaxHelper(url, body, false, successCallback, errorCallback)
        },      
        
        postJSON : function(url, body, successCallback, errorCallback) {
            return ajaxHelper(url, body, true, successCallback, errorCallback)
        }              
    };
})();
