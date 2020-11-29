var opinionPlaceholder = document.getElementById("opinion_placeholder");

var moodClassMap = {
    1 : 'mood-sad',
    2 : 'mood-hater',
    3 : 'mood-liker',
    4 : 'mood-depresed',
    5 : 'mood-neutral'    
}


var getMoodClass = function(id) {
    return moodClassMap[id];
}


var buildTemplate = function(opinionCollection) {
        
    var template = [];
    for(var i = 0; i < opinionCollection.length; i++) {

        var author = opinionCollection[i].author;
        var content = opinionCollection[i].content;
        var moodClass   =  getMoodClass(opinionCollection[i].mood_id);        
        
        template.push(`<div class="opinion-entry ${moodClass}">
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


