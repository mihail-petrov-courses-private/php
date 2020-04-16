var contentContainer    = document.getElementById("content");
var postCollection      = []; 
var objectCollection    = { postCollection : [] };

Ajax.getJSON("posts", function(data) {
    
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

}, function() {
    console.log("GET error")
    console.log(error);            
});