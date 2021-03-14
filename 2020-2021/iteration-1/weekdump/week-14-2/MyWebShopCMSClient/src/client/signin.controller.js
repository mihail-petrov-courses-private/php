var SigninController = (function() {
    
    var PublicReference = {};
    
    var template = () => {

        return ` 
        <div class="w-px-210 m-top-25 center">
            <div id="signin-message"></div>
            <form id="signin-form" class="form" method="POST">
                <input id="signin-username" type="text" name="username" placeholder="потребителско име">
                <input id="signin-password" type="password" name="password" placeholder="парола">
                <input type="submit" value="влез">
                <input type="hidden" name="tokken" value="1">
            </form>
        </div>`;
    };
    
    var formReference = {
        
        init() {
            formReference.username          = document.getElementById("signin-username" );
            formReference.password          = document.getElementById("signin-password" );
        },
        
        getFormObject() {

            return {
                username        : formReference.username.value,
                password        : formReference.password.value
            };
        },
        
        resetFormObject() {

            formReference.username.value            = '';
            formReference.password.value            = '';
        }
    };
    
    PublicReference.run = function(rootElement) {
        
        rootElement.innerHTML = template();
        formReference.init();
        
        document.getElementById("signin-form").addEventListener('submit', (e) => {
            
            e.preventDefault();

            Api.post.signin(formReference.getFormObject(), (response) => {
                
                document.getElementById("signin-message").innerHTML = response.message;
                formReference.resetFormObject();
                
                // save access tokken
                if(response.messageCode == 'USER_LOGED_IN') {
                    localStorage.setItem('tokken', response.data.access_tokken);
                }
            });
        });
    };
    
    return PublicReference;
})();