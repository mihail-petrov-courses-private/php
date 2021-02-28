var Url = (function() {
    
    var PublicReference = {};
    
    var globalURL       =  `http://localhost:8081/MyWebShopCMSClient/`;
    
    PublicReference.redirect = (hash) => {
        window.location = `${globalURL}${hash}`;
    };
    
    PublicReference.queryParameterToObject = (queryParameter) => {
        
        var queryParameterCollection    = {};
        var queryStringCollection       = queryParameter.split('&');
        
        for(var i = 0; i < queryStringCollection.length; i++) {
            var queryKeyValuePair = queryStringCollection[i].split('=');
            queryParameterCollection[queryKeyValuePair[0]] = queryKeyValuePair[1];
        }
        
        return queryParameterCollection;
    };

    PublicReference.objectToQueryParameter = (queryParameterObject) => {

        var queryParameterCollection = [];
        for(var key in queryParameterObject) {
            var queryPair = `${key}=${queryParameterObject[key]}`;
            queryParameterCollection.push(queryPair);
        }
        
        return `?${queryParameterCollection.join('&')}`;
    };
    
    PublicReference.objectToFormData = (queryParameterObject) => {

        var queryParameterCollection = [];
        for(var key in queryParameterObject) {
            var queryPair = `${key}=${queryParameterObject[key]}`;
            queryParameterCollection.push(queryPair);
        }
        
        return `${queryParameterCollection.join('&')}`;
    };    
    
    PublicReference.join = (url, queryParameterObject) => {
        return `${url}${PublicReference.objectToQueryParameter(queryParameterObject)}`;
    };
    
    return PublicReference;
    
})();

