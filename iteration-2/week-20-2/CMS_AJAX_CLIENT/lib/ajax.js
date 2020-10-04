var HttpMethod = {
    GET : 'GET',
    POST : 'POST'
};

var HttpRequestType  = {
    JSON : 'JSON',
    FORM : 'FORM',
    OTHER: 'OTHER'
};

var Ajax = {};

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

            ajaxResponse = ajaxRequest.responseText;

            if(requestType == HttpRequestType.JSON) {
                ajaxResponse = JSON.parse(ajaxRequest.responseText);
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

// Ajax.get
Ajax.getJSON = function(url, callback) {
    _request({
        method      : HttpMethod.GET        ,
        requestType : HttpRequestType.JSON  ,
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
        callback    : callback
    });
};

// Ajax.post
Ajax.postJSON = function(url, body, callback) {
    _request({
        method      : HttpMethod.POST           ,
        url         : url                       ,
        body        : body                      ,
        requestType : HttpRequestType.JSON      ,
        callback    : callback
    });
};