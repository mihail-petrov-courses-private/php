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
        
        if(userObjectCollection.length == undefined) {
            userObjectCollection = [userObjectCollection];
        }

        var templateCollection = [];
        for(var i = 0; i < userObjectCollection.length; i++) {
            templateCollection.push(Template.transform(userObjectCollection[i]));
        }

        return templateCollection.join(' ');
    },

    transformToUserDropdown : function(userObjectCollection) {
        
        var templateCollection = [];
        for(var i =0; i < userObjectCollection.length; i++) {
            
            var userId      = userObjectCollection[i].id;
            var userName    = userObjectCollection[i].first_name + ' ' +  userObjectCollection[i].last_name;
            var template = '<option value="' + userId + '">' + userName + '</option>';
            templateCollection.push(template);
        }
        
        return templateCollection.join(' ');
    }
}
