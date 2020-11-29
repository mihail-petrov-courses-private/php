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
    
    <button id="request-button-collection">Request Collection</button>
    <button id="request-button-item">Request Item</button>
    <button id="request-button-error">Request Error</button>
    
    <!-- placeholder -->
    <div id="collection"></div>
    
    <script>
        
        var ajax = function(url, callbackSuccess, callbackError ) {
      
            // cat send request to the server
            var xmlHttpRequest = new XMLHttpRequest();

            xmlHttpRequest.open("GET", url);
            xmlHttpRequest.send();

            xmlHttpRequest.onreadystatechange = function() {

              if(this.readyState == 4 && this.status == 200) {
                  
                  var jsonResponseObject = JSON.parse(this.responseText);
                  callbackSuccess(jsonResponseObject);
              }
              
               if(this.readyState == 4 && this.status != 200) {
                  
                  var jsonResponseObject = JSON.parse(this.responseText);
                  callbackError(jsonResponseObject);
              }
            };
        };
        
        var isCompleted = function(isCompleted) {
            return (isCompleted ? "YES" : "NO");
        };
       
       
        document.getElementById("request-button-collection").addEventListener('click', function() {
            
            ajax("https://jsonplaceholder.typicode.com/todos/", function(responseJavaScriptObjectCollection) {
                
                  var placeholderCollectionReference        = document.getElementById("collection");
                  var length                                = responseJavaScriptObjectCollection.length;
                  var template                              = "";
                  var templateCollection                    = [];
                  for(var i = 0; i < length; i++) {
                      
                      var objectElement = responseJavaScriptObjectCollection[i];
                      
                      template = `<div class='element'>
                                    <span> ${objectElement.title} </span>
                                    <div> is task completed ${isCompleted(objectElement.completed)} </div>
                                  </div>`;
                                        
                      templateCollection.push(template);
                  }
                  
                  placeholderCollectionReference.innerHTML = templateCollection.join('');
            });
        });


        document.getElementById("request-button-item").addEventListener('click', function() {
            
            ajax("https://jsonplaceholder.typicode.com/todos/1", function(responseJavaScriptObject) {
                
                  var placeholderCollectionReference        = document.getElementById("collection");
                  
                  var template  = `<div class='element'>
                                    <span> ${responseJavaScriptObject.title} </span>
                                    <div> is task completed ${isCompleted(responseJavaScriptObject.completed)} </div>
                                  </div>`;

                  placeholderCollectionReference.innerHTML = template;
            });
        });        


        document.getElementById("request-button-error").addEventListener('click', function() {
            
            ajax("https://jsonplaceholder.typicode.com/tssodos/1", function(responseJavaScriptObject) {
                
                  var placeholderCollectionReference        = document.getElementById("collection");
                  
                  var template  = `<div class='element'>
                                    <span> ${responseJavaScriptObject.title} </span>
                                    <div> is task completed ${isCompleted(responseJavaScriptObject.completed)} </div>
                                  </div>`;

                  placeholderCollectionReference.innerHTML = template;
            }, function(errorResponse) {
                console.log(errorResponse);
            });
        });        
        
        
        
    </script>
</body>
</html>