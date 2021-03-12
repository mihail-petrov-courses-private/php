var SignupController = (function() {
    
    var PublicReference = {};
    
    var template = () => {

        return ` 
        <div class="w-px-210 m-top-25 center">
            <div id="signup-message"></div>
            <form id="signup-form" class="form" method="POST">
                <input id="signup-username" type="text" name="username" placeholder="потребителско име">
                <input id="signup-password" type="password" name="password" placeholder="парола">
                <input id="signup-password-repeat" type="password" name="repeat_password" placeholder="парола">
                <input id="signup-email" type="text" name="email" placeholder="E-mail">
                <input type="submit" value="регистрирай се">
                <input type="hidden" name="tokken" value="1">
            </form>
        </div>`;
    };
    
    
    var formReference = {
        
        init() {
            formReference.username          = document.getElementById("signup-username" );
            formReference.password          = document.getElementById("signup-password" );
            formReference.repeat_password   = document.getElementById("signup-password-repeat" );
            formReference.email             = document.getElementById("signup-email" );
        },
        
        getFormObject() {

            return {
                username        : formReference.username.value,
                password        : formReference.password.value,
                repeat_password : formReference.repeat_password.value,
                email           : formReference.email.value
            };
        },
        
        resetFormObject() {

            formReference.username.value            = '';
            formReference.password.value            = '';
            formReference.repeat_password.value     = '';
            formReference.email.value               = '';
        }
    };
    
    PublicReference.run = function(rootElement) {
        
        rootElement.innerHTML = template();
        formReference.init();
        
        document.getElementById("signup-form").addEventListener('submit', (e) => {
            
            e.preventDefault();

            Api.post.signup(formReference.getFormObject(), (data) => {
                
                document.getElementById("signup-message").innerHTML = data.message;
                formReference.resetFormObject();
            });
        });
    };
    
    return PublicReference;
})();