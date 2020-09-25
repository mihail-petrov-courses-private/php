var ENV             = "DEV"; // DEV || PROD
var DEV_API_URL     = 'http://localhost/ajax/api/';
var PROD_API_URL    = 'https://reqres.in/api/';


var users = function(userId) {

    if(ENV == 'DEV') {

        if(userId) return DEV_API_URL + 'users.php?user_id=' + userId;
        return DEV_API_URL + 'users.php';
    }

    if(ENV == 'PROD') {

        userId = userId || '';
        return PROD_API_URL + 'users/' + userId;
    }
};


var API = {
    ENDPOINT : {
        users : users
    }
}