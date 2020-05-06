var postIndexController = function() {
    
    var contentContainer        = document.getElementById("content");

    var postCollectionReference = [];
    var objectCollection        = { postCollection : [] };

    var render = function() {

        Ajax.getJSON("posts", function(data) {

            var postCollection          = []; 
            postCollectionReference = data;
            for(var $index = 0; $index < data.length; $index++) {

                var postElement = data[$index];
                var template    = `<div class='post'>
                                        <header class='post-title'>${postElement.title}</header>
                                        <div class='post-timestamp'>${postElement.preview_contet}</div>
                                        <div class='post-timestamp'>преди 1 час</div>
                                        <div>
                                            <button class="btn btn-primary" onclick="editPost(${$index})">Edit</button>
                                            <button class="btn btn-danger"  onclick="deletePost(${$index})">Delete</button>
                                        </div>
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
    }

    var editPost = function(index) {

    };

    var deletePost = function(index) {

        var URLEncodedRequest = {
            post_id    : postCollectionReference[index].id
        };

        Ajax.post('posts/delete', URLEncodedRequest, function() {
            render();
        });
    };


    render();

};