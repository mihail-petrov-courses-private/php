var SigninController = (function() {
    
    var PublicReference = {};
    
    var template = () => {

        return ` 
        <div class="w-px-210 m-top-25 center">
            <form class="form" method="POST">
                <input type="text" name="username" placeholder="потребителско име">
                <input type="text" name="password" placeholder="парола">
                <input type="submit" value="влез">
                <input type="hidden" name="tokken" value="1">
            </form>
        </div>`;
    };
    
    PublicReference.run = function(rootElement) {
        rootElement.innerHTML = template();
    };
    
    return PublicReference;    
})();