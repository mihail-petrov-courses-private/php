var adminGroupDditorForm            = document.getElementById("admin-group-editor");
var adminGroupDditorFormSubmit      = document.getElementById("admin-group-editor-submit");
var adminGroupDditorFormEditCancel  = document.getElementById("admin-group-editor-edit-cancel");

var groupTitleInput                 = document.getElementById("group_title");
var messageBaner                    = document.getElementById("message-baner");
var groupContainer                  = document.getElementById("group-container");

// State style
messageBaner.style.display                      = "none";
adminGroupDditorFormEditCancel.style.display    = "none";

var groupId                  = null;
var groupCollectionReference = [];

var renderGroup = function() {
    
    Ajax.getJSON('groups', function(collection) {

        groupCollectionReference = collection;
        renderGroupContainer(groupCollectionReference);
    });    
};

var renderGroupContainer = function(collection) {

    var templateCollection = [];
    for(var $index = 0; $index < collection.length; $index++) {
        
        var element = collection[$index];
        var template = `<div class="mt-3">
        
                            <div class="container">
                              <div class="row">
                                <div class="col-sm">
                                  <span>${element.title}</span> 
                                </div>
                                <div class="col-sm">
                                    <button class="btn btn-primary" onclick="editGroup(${$index})">Edit</button>
                                    <button class="btn btn-danger"  onclick="deleteGroup(${$index})">Delete</button>
                                </div>
                              </div>
                            </div>        
                        </div>`;
        templateCollection.push(template);
    }
    
    groupContainer.innerHTML = templateCollection.join('');
    
};

var editGroup = function(index) {
    
    groupTitleInput.value                           = groupCollectionReference[index].title;
    groupId                                         =  groupCollectionReference[index].id;
    adminGroupDditorFormSubmit.value                = "EDIT";
    adminGroupDditorFormEditCancel.style.display    = "inline-block";
};

var deleteGroup = function(index) {
    
    var URLEncodedRequest = {
        group_id    : groupCollectionReference[index].id
    };
    
    Ajax.post('groups/delete', URLEncodedRequest, function() {
        renderGroup();
   }, function() {
       console.log("Error");
   });  
};



renderGroup();

adminGroupDditorFormEditCancel.addEventListener('click', function() {
    
    adminGroupDditorFormSubmit.value                = "submit";
    adminGroupDditorFormEditCancel.style.display    = "none";
    groupId                                         = null;
});

adminGroupDditorForm.addEventListener('submit', function(e) {
    
     e.preventDefault();
    
    var groupTitleInputValue = groupTitleInput.value;
    
    if(groupTitleInputValue.length < 3) {
        alert("You must enter at least 3 characters");
        return;
    }
    
    var URLEncodedRequest = {
        group_id    : groupId,
        group_title : groupTitleInputValue
    };
    
    if(groupId) {

            Ajax.post('groups/update', URLEncodedRequest, function(collection) {

                // success message
                messageBaner.style.display  = "block";
                groupTitleInput.value       = "";

                // render group collection data
                groupCollectionReference.push(collection[0]);
                renderGroupContainer(groupCollectionReference);

                // fade out 
                setTimeout(function() {
                    messageBaner.style.display  = "none";
                }, 3000);                
            }, function() {
                console.log("Error");
            });
    }
    else {
        
         Ajax.postJSON('groups/create', URLEncodedRequest, function(collection) {

            // success message
            messageBaner.style.display  = "block";
            groupTitleInput.value       = "";

            // render group collection data
            groupCollectionReference.push(collection[0]);
            renderGroupContainer(groupCollectionReference);

            // fade out 
            setTimeout(function() {
                messageBaner.style.display  = "none";
            }, 3000);                
        }, function() {
            console.log("Error");
        });   
    }
});