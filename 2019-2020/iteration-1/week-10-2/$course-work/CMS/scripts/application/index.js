var contentContainer    = document.getElementById("content");
var postCollection      = []; 
var objectCollection    = { postCollection : [] };

Ajax.getJSON("http://localhost/CMS/routes.php?endpoint=posts", function(data) {
    
    for(var i = 0; i < data.length; i++) {
        
        var postElement = data[i];
        var template    = `<div class='post'>
                                <header class='post-title'>${postElement.title}</header>
                                <div class='post-timestamp'>${postElement.preview_contet}</div>
                                <div class='post-timestamp'>преди 1 час</div>
                                <a href='#'> - </a>
                            </div>
                        `;
        postCollection.push(template);
    }
    
    var postTemplate = postCollection.join('');
    contentContainer.innerHTML = postTemplate;
    
    //postCollection = data;
    //objectCollection.postCollection = data;
}, function() {
    console.log("GET error")
    console.log(error);            
});

//
//Ajax.getJSON("http://localhost/CMS/routes.php?endpoint=groups", function(data) {
//    console.log("Get Request")
//    console.log(data);
//}, function() {
//    console.log("GET error")
//    console.log(error);            
//});