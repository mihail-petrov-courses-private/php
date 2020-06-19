var pageSerachCollection = window.location.search.split('?');
var loadPage             = pageSerachCollection[1] ? 
                           pageSerachCollection[1] : 
                           'index';

var pageTemplateContainer = document.getElementById('page-template');
var webLogoPlaceholder    = document.getElementById('web-logo-placeholder');
var publicMenu            = document.getElementById('public-placeholder');
var adminMenu             = document.getElementById('admin-placeholder');

// Referense table script and template based over loaded page
var ScriptReference = {

    admin :  {
        script      : adminScript,
        isPublic    : false,
        title       : 'CMS : Admin'
    },    
    
    index : {
        script      : indexScript,
        isPublic    : true,
        title       : 'CMS : Home'
    },

    registration : {
        script      : registrationScript,
        isPublic    : true,
        title       : 'CMS : Sign up'
    },
    
    login : {
        script      : loginScript,
        isPublic    : true,
        title       : 'CMS : Sign in'
    }    
};


// cat send request to the server
var xmlHttpRequest  = new XMLHttpRequest();
var requestMethod   = "GET";
//var isJSONRequest   = isJSONRequest || false;

var url             = `http://localhost/CMS/scripts/application/${loadPage}/template.html`;

xmlHttpRequest.open(requestMethod, url);
// xmlHttpRequest.setRequestHeader('Content-Type', 'ápplication/json');  
// xmlHttpRequest.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xmlHttpRequest.send(null);

xmlHttpRequest.onreadystatechange = function() {


   var statusGroup                  = ((this.status).toString())[0];

   var HTTPStatus = {
       SUCCESS  : (statusGroup == 2),
       FAIL     : (statusGroup == 4 || statusGroup == 5)
   };

   var isHTTPRequestProccesed       = (this.readyState == xmlHttpRequest.DONE);
   var isHTTPRequestSuccessful      = isHTTPRequestProccesed && HTTPStatus.SUCCESS;
   var isHTTPRequestFailed          = isHTTPRequestProccesed && HTTPStatus.FAIL;
   
   if(isHTTPRequestSuccessful) {
       
       var pageReference = ScriptReference[loadPage];
        pageTemplateContainer.innerHTML = this.responseText;
        pageReference.script();
    
        adminMenu.style.display = pageReference.isPublic ? 
                                                    'none' : 
                                                    'block';
                                                      
        publicMenu.style.display = pageReference.isPublic ? 
                                                    'block' : 
                                                    'none';                                                      
                                                      
        webLogoPlaceholder.innerHTML = pageReference.title;                                                         
   }
   
   if(isHTTPRequestFailed && this.status == 404) {
       pageTemplateContainer.innerHTML = "Sorry Page Not found :("; 
   }
};
