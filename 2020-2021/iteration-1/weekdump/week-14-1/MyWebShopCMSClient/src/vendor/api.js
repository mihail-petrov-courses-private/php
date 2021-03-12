var Api = (function() {
    
    var Api     = { get : {}, post : {} };
    
    const url   = (path) => {
        return `http://localhost:8081/MyWebShopCMSApi/index.php/${path}`
    };

    Api.get.teller = function(callback, queryParameterCollection) {
        
        var queryParameterPath = Url.objectToQueryParameter(queryParameterCollection);
        Ajax.json(url(`teller${queryParameterPath}`), callback);
    };
    
    Api.post.mark = function(queryParameter, callback) {
        Ajax.post(url('teller/mark'), queryParameter, callback);
    };
    
    
    Api.post.signup = ( queryParameter, callback) => {
        Ajax.post(url('signup'), queryParameter, callback);
    };
    
    Api.post.signin = ( queryParameter, callback) => {
        Ajax.post(url('signin'), queryParameter, callback);
    };    
    
    return Api;
    
})();




