(function() {
    
    var $dom = {};
    
    var dynamicCategoryMenuTemplate = (templateItem) => {

        var title   = templateItem.title;
        var id      = templateItem.id;
        return `<li class="category-placeholder--category" data-id="${id}">
                    ${title}
                </li>`;
    };

    var blogPostTemplate = (templateItem) => {

        var title   = templateItem.title;
        var content = templateItem.content;
        var id      = templateItem.id;

        return `<div    class   ="post" 
                        data-id ="${id}">

                <span class="post-title"> ${title}</span>
                <div class="post-content">
                    <p>${content}</p>
                </div>                    
            </div>`;
    };

    var populateBlogPostCollection = (responseCollection) => {

        $dom.blogPostPlaceholder.innerHTML  = Template.collection.build(blogPostTemplate, responseCollection);          

        $dom.blogPostPlaceholder.addEventListener('click', function(e) {

           if(!e.target.dataset.id) return;

           var postId = e.target.dataset.id;
           Api.http.blogPost.get(postId, function(entity) {
               $dom.blogPostPlaceholder.innerHTML = blogPostTemplate(entity);
           });
        });
    };
    
    var _templateBootstrap = (htmlPlaceholder) => {
    
//        Api.tmpl.blog(function(result) {
//            htmlPlaceholder.innerHTML = result;
//            _contructor();
//        });

        Template.load('blog/template.html', function(result) {
            htmlPlaceholder.innerHTML = result;
            _contructor();            
        });
    };
    
    var _contructor = () => {
        
        $dom.blogPostPlaceholder = document.getElementById("blog-post--content");        
        $dom.categoryPlaceholder = document.getElementById("category-placeholder");
        
       Api.http.category.getAll(function(responseCollection) {

           $dom.categoryPlaceholder.innerHTML = Template.collection.build(dynamicCategoryMenuTemplate, responseCollection);

           $dom.categoryPlaceholder.addEventListener('click', function(e) {
                Api.http.blogPost.byCategory(e.target.dataset.id, populateBlogPostCollection);
           });

          Api.http.blogPost.getAll(populateBlogPostCollection);
       });
    };

    BlogController = {
        init : _templateBootstrap
    };
    
})();