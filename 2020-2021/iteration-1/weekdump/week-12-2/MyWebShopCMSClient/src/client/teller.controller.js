var TellerController = (function() {

    var PublicReference = {};

    var template = function(element) {
        return `
            <div class="product--element">
                <div class="w-px-210 display-inline-block">${element.title}</div>
                <div class="w-px-210 display-inline-block">${element.price}</div>
                <div class="w-px-210 display-inline-block">${element.quantity}</div>
                <div class="w-px-210 display-inline-block">
                    <a href="#mark?id=${element.id}">Добави в количка</a>
                </div>
            </div>`;
    };    

    var processTemplate = function(templatePlaceholder, responseObject) {

        var templateBuilder     = [];
        for(var i = 0; i < responseObject.length; i++) {
            var responseTemplate = template(responseObject[i]);
            templateBuilder.push(responseTemplate);
        }

        templatePlaceholder.innerHTML = templateBuilder.join('');
    };
    
    PublicReference.mark = function(domElement, queryParameter) {

        Api.post.mark(queryParameter, function() {
            Url.redirect('#teller');
        });
    };    
    
    
    PublicReference.run = function(domElement) {

        Api.get.teller(function(data) {
            processTemplate(domElement, data);
        });
    };    
    
    return PublicReference;
})();