var dossierCollection; // undefined
var actionCallFunction                  = document.getElementById("action_call_external_url");
var actionGetPrevListOfUsers            = document.getElementById("action_prev"); 
var actionGetNextListOfUsers            = document.getElementById("action_next"); 
var actionFindMoreInfoAboutThisUser     = document.getElementById("action_find_more_info");
var actionSendPostAjaxCall              = document.getElementById("action_send_post_ajax_call");

var componentUserDossier                = document.getElementById("component_user_dossier");
var componentUserDropdown               = document.getElementById("component_user_dropdown");

var inputName                           = document.getElementById("input_name");
var inputJob                            = document.getElementById("input_job");

var fetchUserListCollection     = function(pageId) {

    // Ajax(("https://reqres.in/api/users?page=" + pageId), function(ajaxRequest) {
    // Ajax(("http://localhost/ajax/api/users.php?page=" + pageId), function(ajaxRequest) {        
    Ajax(API.ENDPOINT.users(), function(ajaxRequest) {                
        
        dossierCollection               = JSON.parse(ajaxRequest.responseText);
        componentUserDossier.innerHTML  = Template.transformCollection(dossierCollection.data);
        componentUserDropdown.innerHTML = Template.transformToUserDropdown(dossierCollection.data);
    });
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

actionFindMoreInfoAboutThisUser.addEventListener('click', function() {

    var userId = componentUserDropdown ? componentUserDropdown.value : '';
    // Ajax(("https://reqres.in/api/users/" + userId), function(ajaxRequest) {
    // Ajax(("http://localhost/ajax/api/users.php?user_id=" + userId), function(ajaxRequest) {
    Ajax(API.ENDPOINT.users(userId), function(ajaxRequest) {

        dossierCollection               = JSON.parse(ajaxRequest.responseText);

        // NB !!! pre transform - do not implement inside the API call 
        // dossierTransformCollection      = [dossierCollection.data];
        // componentUserDossier.innerHTML  = Template.transformCollection(dossierTransformCollection);

        componentUserDossier.innerHTML  = Template.transformCollection(dossierCollection.data);
    });
});


actionSendPostAjaxCall.addEventListener('click', function(e) {

    // Ajax.post(API.ENDPOINT.users(), function(ajaxRequest) {
    // });
    // ====

    var RequestBody = {
        "name"  : inputName.value,
        "job"   : inputJob.value
    };

    var JsonRequest = JSON.stringify(RequestBody);

    var ajaxRequest = new XMLHttpRequest();
    ajaxRequest.open("POST", "https://reqres.in/api/users");
    ajaxRequest.setRequestHeader("Content-Type", "application/json");
    ajaxRequest.send(JsonRequest);

    ajaxRequest.onreadystatechange = function() {

        if(ajaxRequest.readyState == 4) {
            console.log(ajaxRequest.responseText);
        }
    };

    e.preventDefault();
});