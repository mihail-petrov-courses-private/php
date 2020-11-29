var adminPostEditorCategory = document.getElementById("admin-post-editor-category");
var adminPostTitle          = document.getElementById("post_title");
var adminPostPreview        = document.getElementById("post_preview");
var adminPostContent        = document.getElementById("post_content");
var adminPostCategory       = document.getElementById("admin-post-editor-category");

Ajax.getJSON('groups', function(collection) {

    var templateCollection = [];
    for(var i = 0; i < collection.length; i++) {
        templateCollection.push(`<option name = "post_category"  value="${collection[i].id}">${collection[i].title}</option>`);
    }
    
    adminPostEditorCategory.innerHTML = templateCollection.join('');
});    


var submitForm = function () {
    
    var request = {
        post_title      : adminPostTitle.value,
        post_preview    : adminPostPreview.value,
        post_content    : adminPostContent.value,
        post_group      : adminPostCategory.value
    };
    
    Ajax.post('posts/create', request, function(collection) {
        console.log(collection);
    });    
}



1. // Validate if form match input requirments
2. // Submit form afetr validation 
