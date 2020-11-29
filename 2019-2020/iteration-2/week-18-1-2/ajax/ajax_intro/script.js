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

    Ajax.get(API.ENDPOINT.users(), function(ajaxRequest) {                
        
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

    Ajax.get(API.ENDPOINT.users(userId), function(ajaxRequest) {

        dossierCollection               = JSON.parse(ajaxRequest.responseText);
        componentUserDossier.innerHTML  = Template.transformCollection(dossierCollection.data);
    });
});


actionSendPostAjaxCall.addEventListener('click', function(e) {

    var RequestBody = {
        "name"  : inputName.value,
        "job"   : inputJob.value
    };

    Ajax.post(API.ENDPOINT.users(), RequestBody, function(ajaxRequest, ajaxResponse) {
        
        console.log(ajaxRequest.responseText);
        console.log(ajaxResponse);
    });
    
    e.preventDefault();
});