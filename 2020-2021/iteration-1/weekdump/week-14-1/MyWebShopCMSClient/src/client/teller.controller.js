var TellerController = (function() {

    var PublicReference = {};

    var template = () => {
        
        return `
            
            <div>
                <div id="panel--search">
                    <input id="input-product-search" type="text">
                    <button id="action-search">Search</button>
                </div>
        
                <div id="panel--table">
                    <div id="table--product"></div>
                    <div id="table--product-pagination"></div>
                        <button id="process--prev">Prev</button>
                        <button id="process--next">Next</button>
                </div>
            </div>
        
            
        `;
    };


    var tableRowTemplate = function(element) {
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

    var processTableTemplate = function(responseObject) {

        var templateBuilder     = [];
        for(var i = 0; i < responseObject.length; i++) {
            var responseTemplate = tableRowTemplate(responseObject[i]);
            templateBuilder.push(responseTemplate);
        }
        
        return templateBuilder.join('');

        // templatePlaceholder.innerHTML += templateBuilder.join('');
    };
    
    PublicReference.mark = function(domElement, queryParameter) {

        Api.post.mark(queryParameter, function() {
            Url.redirect('#teller');
        });
    };
    
    PublicReference.run = function(domElement) {
        
        // Search form template
        domElement.innerHTML += template();
        var actionSearch = document.getElementById("action-search");
        var panelTable   = document.getElementById("panel--table");
        var currentPage  = 1;
        
        
        
        actionSearch.addEventListener('click', () => {
            
            var inputProductSearch = document.getElementById("input-product-search");
             Api.get.teller(function(data) {
                panelTable.innerHTML = processTableTemplate(data);
            }, {
                productName: inputProductSearch.value
            });
        });
        
        document.getElementById("process--prev").addEventListener('click', () => {
            
            currentPage--;
            
            
            var inputProductSearch = document.getElementById("input-product-search");            
             Api.get.teller(function(data) {
                panelTable.innerHTML = processTableTemplate(data);
            }, {
                productName : inputProductSearch.value,
                limit       : 4,
                page        : currentPage
            });            
        });
        
        document.getElementById("process--next").addEventListener('click', () => {
            
            currentPage++;
            
            var inputProductSearch = document.getElementById("input-product-search");            
             Api.get.teller(function(data) {
                panelTable.innerHTML = processTableTemplate(data);
            }, {
                productName : inputProductSearch.value,
                limit       : 4,
                page        : currentPage
            });                        
        });        
        

        // Teller template
        Api.get.teller(function(data) {
            panelTable.innerHTML = processTableTemplate(data);
        });
    };    
    
    return PublicReference;
})();