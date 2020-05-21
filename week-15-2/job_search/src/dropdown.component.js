var dropdownSearchDom       = document.getElementById("dropdown--search");
var dropdownPlaceholderDom  = document.getElementById("dropdown--placeholder");
var dropdownBackDom         = document.getElementById("dropdown--back");

// var listOfAvailableJobCollection  =  ['remote', 'onsite'];
// state manager
var isDropdownVisible   = false;

 var listOfAvailableJobSitesCollection  =  [
     { 
         title : 'remote', subMenu : []
     },
     { 
         title : 'onsite', subMenu : [
             { title : 'Bulgaria', subMenu : [ 
                     { title : 'Plovdiv'},
                     { title : 'Sofia'  },
                     { title : 'Varna'  },
                     { title : 'Burgas' }
                 ]},
             { title : 'Romania'},
             { title : 'Surbia'}
         ]
     }     
 ];

var selectedSubMenu     = [
     { 
         title : 'remote', subMenu : []
     },
     { 
         title : 'onsite', subMenu : [
             { title : 'Bulgaria', subMenu : [ 
                     { title : 'Plovdiv', subMenu : []},
                     { title : 'Sofia'  , subMenu : []},
                     { title : 'Varna'  , subMenu : []},
                     { title : 'Burgas' , subMenu : []}
                 ]},
             { title : 'Romania', subMenu : []},
             { title : 'Surbia' , subMenu : []}
         ]
     }     
 ];
 
 var selectedSubMenuLevel   = 0;
 
 var visitedMenuCategories  = [];
 
 

var templateDropDownPlaceholder = function() {
    
    var template = [];
    for(var i = 0; i < selectedSubMenu.length; i++) {
        
        var jobSiteTitle    = selectedSubMenu[i].title;
        template.push(`<div class="dropdown--element">${jobSiteTitle}</div>`);
    }
    
    return template.join('');
};


var addEventListenerToDropdownElement = function() {
    
    var dropdownElementDomCollection = document.getElementsByClassName("dropdown--element");

    for(var i = 0; i < dropdownElementDomCollection.length; i++) {

        dropdownElementDomCollection[i].addEventListener('click', function(e) {
            
            var localMenu = [];
            var dropdownElementTitle = e.target.innerText;
            for(var i = 0; i < selectedSubMenu.length; i++) {
                
                if(selectedSubMenu[i].title == dropdownElementTitle) {
                    
                    if(selectedSubMenu[i].subMenu.length == 0) {
                        localMenu = [];
                    }
                    else {
                        selectedSubMenu = selectedSubMenu[i].subMenu;     
                        localMenu       = selectedSubMenu[i].subMenu;     
                        selectedSubMenuLevel++;
                        visitedMenuCategories.push(dropdownElementTitle);
                    }
                    break;
                }
            }
            
            if(localMenu.length == 0) {
                
                // render title as placeholder
                dropdownSearchDom.innerHTML         = dropdownElementTitle;
                dropdownPlaceholderDom.innerHTML    = '';
                isDropdownVisible                   = false;
                dropdownPlaceholderDom.classList.remove('dropdown--wrap-border');
            }
            else {
                // rerender with new selectedSubMenu
                dropdownPlaceholderDom.innerHTML = templateDropDownPlaceholder();
                addEventListenerToDropdownElement();
            }
            
            // check back button state
            if(selectedSubMenuLevel > 0) {
                dropdownBackDom.classList.remove('visibility-hidden');
            }
        });
    }    
};

dropdownSearchDom.addEventListener('click', function(e) {
    
    if(!isDropdownVisible) {
        
        dropdownPlaceholderDom.innerHTML = templateDropDownPlaceholder();
        dropdownPlaceholderDom.classList.add('dropdown--wrap-border');
        addEventListenerToDropdownElement();    
        isDropdownVisible = true;
        return;
    }
    
    dropdownPlaceholderDom.innerHTML = '';
    isDropdownVisible = false;
    dropdownPlaceholderDom.classList.remove('dropdown--wrap-border');
});


dropdownBackDom.addEventListener('click', function() {
    
    selectedSubMenuLevel--;
    
    console.log(visitedMenuCategories);
    
    var subMenuIndex = (visitedMenuCategories.length - 2);
    visitedMenuCategories.pop();
    
    var copyOfListOfAvailableJobSitesCollection  = JSON.parse(JSON.stringify(listOfAvailableJobSitesCollection));
    
    if(subMenuIndex < 0) {
        selectedSubMenu = copyOfListOfAvailableJobSitesCollection;
    }
    else {
        
        var subMenuTitle = visitedMenuCategories[subMenuIndex];
        for(var i = 0; i < visitedMenuCategories.length; i++) {
            for(var j = 0; j < listOfAvailableJobSitesCollection.length; j++) {
                
                if(listOfAvailableJobSitesCollection[j].title == visitedMenuCategories[i]) {
                    copyOfListOfAvailableJobSitesCollection = listOfAvailableJobSitesCollection[j].subMenu;
                }
            }
        }
    }
    
    selectedSubMenu = copyOfListOfAvailableJobSitesCollection;
    dropdownPlaceholderDom.innerHTML = templateDropDownPlaceholder();
    dropdownPlaceholderDom.classList.add('dropdown--wrap-border');
    addEventListenerToDropdownElement();    
    isDropdownVisible = true;    
    
    // check back button state
    if(selectedSubMenuLevel == 0) {
        dropdownBackDom.classList.add('visibility-hidden');
    }    
});