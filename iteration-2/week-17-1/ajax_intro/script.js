var dossierCollection; // undefined
var actionCallFunction          = document.getElementById("action_call_external_url");
var actionGetPrevListOfUsers    = document.getElementById("action_prev"); 
var actionGetNextListOfUsers    = document.getElementById("action_next"); 
var placeholderComponent        = document.getElementById("placeholder");

var fetchUserListCollection     = function(pageId) {

    // call URL https://reqres.in/api/users?page=2
    var ajaxRequest = new XMLHttpRequest();

    // Prepate to send HTTP request to the URL
    ajaxRequest.open("GET", "https://reqres.in/api/users?page=" + pageId );

    // Execute HTTP request
    ajaxRequest.send();

    ajaxRequest.onreadystatechange = function(responseData) {

        if(ajaxRequest.readyState == 4) {

            dossierCollection   = JSON.parse(ajaxRequest.responseText);
            placeholderComponent.innerHTML = Template.transformCollection(dossierCollection.data);
        }
    };
};

actionCallFunction.addEventListener('click', function() {
    fetchUserListCollection(1);
});

actionGetPrevListOfUsers.addEventListener('click', function() {
    fetchUserListCollection(1);
});

actionGetNextListOfUsers.addEventListener('click', function() {
    fetchUserListCollection(2);
});
