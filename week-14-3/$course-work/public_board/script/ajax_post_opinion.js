var opinionForm     = document.getElementById("form_opinion");
var opinionContent  = document.getElementById("form_opinion__content");
var opinionAuthor   = document.getElementById("form_opinion__author");

opinionForm.addEventListener('submit', function(e) {
    
//    var sendData = {
//        opinion_content : opinionContent.value,
//        opinion_author  : opinionAuthor.value
//    };
    
    var FormData = `opinion_content=${opinionContent.value}&opinion_author=${opinionAuthor.value}`;
    
    var ajaxPost = new XMLHttpRequest();
    // create new connection 
    ajaxPost.open('POST', 'http://localhost/public_board/opinion_post.php');
    ajaxPost.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    ajaxPost.send(FormData);    
    
    ajaxPost.onreadystatechange = function() {
        
        if(ajaxPost.readyState == 4) {
                    
            var opinionCollection = JSON.parse(ajaxPost.responseText);
            buildTemplate(opinionCollection);
        }
    };
    
    e.preventDefault();
});