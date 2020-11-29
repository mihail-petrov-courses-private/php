var indexController = function() {

    var contentContainer    = document.getElementById("content");
    var categoryHeaderPanel = document.getElementById("category-header-panel");

    // search action dom elements
    var searchInput     = document.getElementById("search-blogpost");
    var searchAction    = document.getElementById("search-blogpost-action");
    var clearAction     = document.getElementById("search-blogpost-clear");
    var searchCombobox  = document.getElementById("search-blogpost-combobox");
    var contentFullView = document.getElementById("content-fullview");
    var contentFullViewBlogpost = document.getElementById("content-fullview-blogpost");
    
    var fullviewCommentTextarea = document.getElementById("fullview-comment-textarea");
    var fullviewCommentAction = document.getElementById("fullview-comment-action");
    
    var fullViewCommentPlaceholder = document.getElementById("content-fullview-comment-placeholder");
    
    // currently rendered blog post
    var activePostId = null;
    


    var objectCollection    = { postCollection : [] };


    var renderFullView = function(postId) {
        
        activePostId = postId;
            
        Ajax.getJSON(`posts/index/${postId}`, function(element) {

            contentFullView.style.display       = "block"
            contentFullViewBlogpost.innerHTML   = element[0].content;
            contentContainer.style.display      = 'none';
            categoryHeaderPanel.style.display   = 'none';
                    
            Ajax.getJSON('comment/index', function(collection) {
                console.log(collection);
                var templateCollection = [];
                for(var i = 0; i < collection.length; i++) {
                    templateCollection.push(`<div class="post-comment">
                                                <span>${collection[i].author}</span>
                                                <div>${collection[i].content}</div>
                                            </div>`);
                }
                
                fullViewCommentPlaceholder.innerHTML = templateCollection.join('');
            });
        });
    };

    /**
     * 
     * @param {type} data
     * @returns {undefined}
     */
    var renderBlogPost = function(data) {

        var postCollection      = []; 
        for(var i = 0; i < data.length; i++) {

        var postElement = data[i];
        var template    = `<div class='post'>
                                <header class='post-title'>${postElement.title}</header>
                                <div class='post-timestamp'>${postElement.preview_contet}</div>
                                <div class='post-timestamp'>преди 1 час</div>
                                <button class="post-read-button""> Read </button>
                            </div>
                        `;
            
            //  <button class="post-read-button" onclick="renderFullView(${postElement.id})"> Read </button>
            
            postCollection.push(template);
        }

        var postTemplate = postCollection.join('');
        contentContainer.innerHTML = postTemplate;
        
        var postReadButtonCollection = document.getElementsByClassName('post-read-button');
        for(let i = 0; i < postReadButtonCollection.length; i++) {
            postReadButtonCollection[i].addEventListener('click', function() {
                renderFullView(data[i].id);
            });
        }
    };

    /**
     * 
     * @param {type} data
     * @returns {undefined}
     */
    var renderAllPostsRelatedToThisGroup = function(groupId) {

        Ajax.getJSON(`posts/group/${groupId}`, function(data) {
            renderBlogPost(data);
        });
    };


    searchAction.addEventListener('click', function(e) {

        var searchInputQuery    = searchInput.value;
        var searchBy            = searchCombobox.value;
        Ajax.getJSON(`posts/search/?q=${searchInputQuery}&searchBy=${searchBy}`, function(data) {
           renderBlogPost(data);
        });
    });

    clearAction.addEventListener('click', function() {

        Ajax.getJSON("posts", function(data) {
            renderBlogPost(data);
        }, function() {
            console.log("GET error")
            console.log(error);            
        });
    });

    Ajax.getJSON('groups', function(collection) {

        var templateCollection = [];
        for(var i = 0; i < collection.length; i++) {
            templateCollection.push(`<li class="category" onclick="renderAllPostsRelatedToThisGroup(${collection[i].id})">${collection[i].title}</li>`);
        }

        categoryHeaderPanel.innerHTML = templateCollection.join('');
    });
    
    fullviewCommentAction.addEventListener('click', function() {
       
       var request = {
           content  : fullviewCommentTextarea.value,
           postId   : activePostId,
           author   : 'Mihail Petrov'
       };
       
        Ajax.postJSON('comment/create',request , function(collection) {
            console.log(collection);
        });
    });
    
    


    Ajax.getJSON("posts", function(data) {
        renderBlogPost(data);
    }, function() {
        console.log("GET error")
        console.log(error);            
    });
};