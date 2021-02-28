var Api = { get : {} };

Api.get.teller = function(callback) {
    Ajax.json('http://localhost/MyWebShopCMSApi/index.php/teller', callback);
}