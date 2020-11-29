var opinionPlaceholder = document.getElementById("opinion_placeholder");

var buildTemplate = function(opinionCollection) {
        
    var template = [];
    for(var i = 0; i < opinionCollection.length; i++) {

        var author = opinionCollection[i].author;
        var content = opinionCollection[i].content;
        template.push(`<div class="opinion-entry">
                        <h3>${author}</h3>
                        <div>${content}</div>
                        </div>`);
    }

    opinionPlaceholder.innerHTML = template.join('');    
}


var ajaxGet = new XMLHttpRequest();

ajaxGet.open('GET', 'http://localhost/public_board/opinion_get.php');
ajaxGet.send(null);

ajaxGet.onreadystatechange = function() {
    
    if(ajaxGet.readyState == 4) {
        
        var opinionCollection = JSON.parse(ajaxGet.responseText);
        buildTemplate(opinionCollection);
    }
};

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