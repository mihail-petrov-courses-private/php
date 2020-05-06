var contentContainer    = document.getElementById("content");
var categoryHeaderPanel = document.getElementById("category-header-panel");


var objectCollection    = { postCollection : [] };


var renderBlogPost = function(data) {

    var postCollection      = []; 
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
};


var renderAllPostsRelatedToThisGroup = function(groupId) {

    Ajax.getJSON(`posts/group/${groupId}`, function(data) {
        renderBlogPost(data);
    });
};

Ajax.getJSON('groups', function(collection) {
    
    var templateCollection = [];
    for(var i = 0; i < collection.length; i++) {
        templateCollection.push(`<li class="category" onclick="renderAllPostsRelatedToThisGroup(${collection[i].id})">${collection[i].title}</li>`);
    }
    
    categoryHeaderPanel.innerHTML = templateCollection.join('');
});



Ajax.getJSON("posts", function(data) {
    renderBlogPost(data);
}, function() {
    console.log("GET error")
    console.log(error);            
});