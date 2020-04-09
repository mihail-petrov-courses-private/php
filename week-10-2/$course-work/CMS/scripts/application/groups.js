var adminGroupDditorForm    = document.getElementById("admin-group-editor");
var groupTitleInput         = document.getElementById("group_title");

var messageBaner            = document.getElementById("message-baner");
messageBaner.style.display  = "none";


adminGroupDditorForm.addEventListener('submit', function(e) {
    
     e.preventDefault();
    
    var groupTitleInputValue = groupTitleInput.value;
    
    if(groupTitleInputValue.length < 3) {
        alert("You must enter at least 3 characters");
        return;
    }
    
    // Ajax request
    var requestBody = {
        group_title : groupTitleInput.value
    };
    
    // Build string version of JSON OBJECT "{'key' : 'value'}"
    var JSONRequest = JSON.stringify(requestBody);
    
    
    var URLEncodedRequest = `group_title=${groupTitleInput.value}`;
    
    Ajax.post('http://localhost/CMS/routes.php?endpoint=groups&method=create', URLEncodedRequest, function(collection) {
        console.log(collection);
        
        // success message
        messageBaner.style.display  = "block";
        groupTitleInput.value       = "";

        // fade out 
        setTimeout(function() {
            messageBaner.style.display  = "none";
        }, 3000);                
    }, function() {
        console.log("Error");
    });
   
});