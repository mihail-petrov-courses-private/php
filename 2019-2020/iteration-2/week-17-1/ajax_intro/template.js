// var template = function(userName) {
//     return '<h1>' + userName + '</h1>';
// };


var Template = {

    buildUsername : function(userFname, userLname) {
        return '<h1>' + userFname  + ' ' + userLname + '</h1>';    
    },

    buildEmail : function(userEmail) {
        return '<span>' + userEmail + '</span>';
    },    

    buildAvatar : function(userAvatar) {
        return '<img src="' + userAvatar + '"/>';    
    },

    transform : function(userObject) {
        
        var templateCollection = [];
        templateCollection.push(Template.buildUsername(userObject.first_name, userObject.last_name));
        templateCollection.push(Template.buildEmail(userObject.email));
        templateCollection.push(Template.buildAvatar(userObject.avatar));

        return templateCollection.join(' ');
    },

    transformCollection : function(userObjectCollection) {

        var templateCollection = [];
        for(var i = 0; i < userObjectCollection.length; i++) {
            templateCollection.push(Template.transform(userObjectCollection[i]));
        }

        return templateCollection.join(' ');
    }
}
