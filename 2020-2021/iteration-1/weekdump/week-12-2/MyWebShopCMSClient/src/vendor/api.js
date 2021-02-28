var Api = (function() {
    
    var Api     = { get : {}, post : {} };
    
    const url   = (path) => {
        return `http://localhost:8081/MyWebShopCMSApi/index.php/${path}`
    };

    Api.get.teller = function(callback) {
        Ajax.json(url('teller'), callback);
    };
    
    Api.post.mark = function(queryParameter, callback) {
        Ajax.post(url('teller/mark'), queryParameter, callback);
    };
    
    return Api;
    
})();




