var UserService = {
  
    // httpResourcePermitionCollection : [],
    
    setHttpResourcePermition : function(permitionCollection) {
        
        window.localStorage.clear();
        var httpResourcePermitionCollection = [];
        
        for(var i = 0; i < permitionCollection.length; i++) {
            
            var element = permitionCollection[i].resource;
            httpResourcePermitionCollection.push(element);
        }
        
        // 
        window.localStorage.setItem("httpResourseCollection", httpResourcePermitionCollection);
    },
    
    hasPermitionToAcsessThisResource : function(resource) {
           
        var httpResourcePermitionCollection = (window.localStorage.getItem("httpResourseCollection")).split(',');
        
        for(var i = 0; i < httpResourcePermitionCollection.length; i++) {
            if(httpResourcePermitionCollection[i] == resource) {
                return true;  
            }
        }
        
        return false;
    }
};