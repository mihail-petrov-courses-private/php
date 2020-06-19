<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        
        .element {
            backgroud       : #dedede 1px;
            border          : solid #ff0000 1px;
            margin-bottom   : 5px;
            padding         : 5px;
        }
        
    </style>
</head>
<body>
    
    <button id="request-get">Request Get</button>
    <button id="request-post">Request Post</button>
    
    <!-- placeholder -->
    <div id="collection"></div>
    
    <script>
        
        var ajaxHelper = function(url, requestObject, callbackSuccess, callbackError ) {
      
            // cat send request to the server
            var xmlHttpRequest  = new XMLHttpRequest();
            var requestMethod   =  (requestObject) ? "POST" : "GET";

            xmlHttpRequest.open(requestMethod, url);
            xmlHttpRequest.setRequestHeader('Content-Type', 'ápplication/json');        
            xmlHttpRequest.send(requestObject);
            
            xmlHttpRequest.onreadystatechange = function() {
               
               
               var statusGroup                  = this.status[0];
               
               var HTTPStatus = {
                   SUCCESS  : (statusGroup == 2),
                   FAIL     : (statusGroup == 4 || statusGroup == 5)
               };
               
               var isHTTPRequestProccesed       = (this.readyState == xmlHttpRequest.DONE);
               var isHTTPRequestSuccessful      = isHTTPRequestProccesed && HTTPStatus.SUCCESS;
               var isHTTPRequestFailed          = isHTTPRequestProccesed && HTTPStatus.FAIL;
               
               if(isHTTPRequestProccesed) {
                   var jsonResponseObject           = JSON.parse(this.responseText);
               }
               
               if(isHTTPRequestSuccessful)   {
                  return callbackSuccess(jsonResponseObject);
               }
              
               if(isHTTPRequestFailed)       {
                  return callbackError(jsonResponseObject);
               }
            };
        };
        
        // Facade
        function get(url, successCallback, errorCallback) {
            return ajaxHelper(url, null, successCallback, errorCallback);
        }
                
        function post(url, body, successCallback, errorCallback) {
            return ajaxHelper(url, body, successCallback, errorCallback);
        }
        
        var Ajax = {
            get : function(url, successCallback, errorCallback) {
                return ajaxHelper(url, null, successCallback, errorCallback)
            },
            
            post : function(url, body, successCallback, errorCallback) {
                return ajaxHelper(url, body, successCallback, errorCallback)
            }            
        };
        
        document.getElementById("request-get").addEventListener('click', function() {
            
            Ajax.get("https://jsonplaceholder.typicode.com/todos/", function(data) {
                console.log("Get Request")
                console.log(data);
            }, function() {
                console.log("GET error")
                console.log(error);                
            });
        });
        
        document.getElementById("request-post").addEventListener('click', function() {
            
            var requestObject = {
                "userId": 1000,
                "id": 1000,
                "title": "Sample post",
                "body": "Sample body"
              };
            
            Ajax.post("https://jsonplaceholder.typicode.com/todos/", requestObject, function() {
                console.log("Post Request")
                console.log(data)                
            }, function(error) {
                console.log("Post error")
                console.log(error);
            });
        });        
        
    </script>
</body>
</html>