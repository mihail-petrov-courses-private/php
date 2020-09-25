// var Ajax = function(url, callback) {

//     var ajaxRequest = new XMLHttpRequest();
//     ajaxRequest.open("GET", url);
//     ajaxRequest.send();


//     ajaxRequest.onreadystatechange = function() {

//         if(ajaxRequest.readyState == 4) {
//             callback(ajaxRequest);
//         }
//     };
// };

var HttpMethod = {
    GET : 'GET',
    POST : 'POST'
};

var HttpRequestType  = {
    JSON : 'JSON',
    FORM : 'FORM'
};


var Ajax = {};


// var _request = function(method, url, body, callback) {
var _request = function(requestParameters) {

    var method          = requestParameters.method;
    var url             = requestParameters.url;
    var body            = requestParameters.body;
    var requestType     = requestParameters.requestType;
    var callback        = requestParameters.callback; 
    var requestBody     = null;
    var ajaxResponse    = null;

    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open(method, url);

    if(requestType == HttpRequestType.JSON) {
        ajaxRequest.setRequestHeader('Content-Type', 'application/json')    
        requestBody = JSON.stringify(body);
    }

    if(requestType == HttpRequestType.FORM) {
        ajaxRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        requestBody = "name=Mihail&job=Developer";
    }

    ajaxRequest.send(requestBody);

    ajaxRequest.onreadystatechange = function() {

        if(ajaxRequest.readyState == 4) {

            if(requestType == HttpRequestType.JSON) {
                ajaxResponse = JSON.parse(ajaxRequest.responseText);
            }

            if(requestType == HttpRequestType.FORM) {
                ajaxResponse = ajaxRequest.responseText;
            }            

            callback(ajaxRequest, ajaxResponse);


            
        }
    };
};


// Ajax.get
Ajax.get = function(url, callback) {
    _request({
        method      : HttpMethod.GET        ,
        url         : url                   ,
        callback    : callback
    });
};

// Ajax.post
Ajax.post = function(url, body, callback) {
    _request({
        method      : HttpMethod.POST           ,
        url         : url                       ,
        body        : body                      ,
        requestType : HttpRequestType.FORM      ,
        callback    : callback
    });
};