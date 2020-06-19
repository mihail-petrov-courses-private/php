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


