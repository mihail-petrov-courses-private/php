var Ajax = function(url, callback) {

    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open("GET", url);
    ajaxRequest.send();


    ajaxRequest.onreadystatechange = function() {

        if(ajaxRequest.readyState == 4) {
            callback(ajaxRequest);
        }
    };
};

// Ajax.get
// Ajax.post