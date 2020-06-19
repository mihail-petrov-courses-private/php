var indexScript = function() {

    var contentContainer    = document.getElementById("content");
    var categoryHeaderPanel = document.getElementById("category-header-panel");

    // search action dom elements
    var searchInput     = document.getElementById("search-blogpost");
    var searchAction    = document.getElementById("search-blogpost-action");
    var clearAction     = document.getElementById("search-blogpost-clear");
    var searchCombobox  = document.getElementById("search-blogpost-combobox");
    var contentFullView = document.getElementById("content-fullview");
    var contentFullViewBlogpost = document.getElementById("content-fullview-blogpost");


    var objectCollection    = { postCollection : [] };


    var renderFullView = function(postId) {

        Ajax.getJSON(`posts/index/${postId}`, function(element) {

            contentFullView.style.display       = "block"
            contentFullViewBlogpost.innerHTML   = element[0].content;
            contentContainer.style.display      = 'none';
            categoryHeaderPanel.style.display   = 'none';
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
                                <button onclick="renderFullView(${postElement.id})"> Read </button>
                            </div>
                        `;
            postCollection.push(template);
        }

        var postTemplate = postCollection.join('');
        contentContainer.innerHTML = postTemplate;
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


    Ajax.getJSON("posts", function(data) {
        renderBlogPost(data);
    }, function() {
        console.log("GET error")
        console.log(error);            
    });
};