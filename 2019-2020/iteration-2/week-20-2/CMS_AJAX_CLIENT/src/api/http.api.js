var HttpApi = {};

var url = (endpoint, queryParameterCollection) => {    
    
    var URL = `http://localhost/CMS_AJAX_SERVER/api`;
    
    if(queryParameterCollection) {
        
        var query = "";
        for(var index in queryParameterCollection) {
            query += `${index}=${queryParameterCollection[index]}&`;
        }
        query = query.substring(0, query.length-1);
        return `${URL}/${endpoint}.php?${query}`;
    }
    
    return `${URL}/${endpoint}.php`;
};

HttpApi.blogPost = {};

/**
 * @author Mihail Petrov
 * @param {type} callback
 * @example http://CMS_AJAX_SERVER/blog_post/
 * @description Get all of the available blog post entity collection
 */
HttpApi.blogPost.getAll = (callback) => {
    Ajax.getJSON(url('blog_post'), (ajaxObject, res) => { callback(res); });
};

/**
 * @author Mihail Petrov
 * @param {type} callback
 * @example http://CMS_AJAX_SERVER/blog_post?id=1
 * @description Get all of the available blog post entity collection
 */
HttpApi.blogPost.get = (postId, callback) => {
    
    var queryParameterCollection = {
        id : postId
    };
    
    Ajax.getJSON(url('blog_post', queryParameterCollection), (ajaxObject, res) => { callback(res); });
};

/**
 * @author Mihail Petrov
 * @param {type} callback
 * @example http://CMS_AJAX_SERVER/blog_post?category=10
 * @description Get all of the available blog post entity collection
 */
HttpApi.blogPost.byCategory = (categoryId, callback) => {
    
    var queryParameterCollection = {
        category : categoryId
    };
    
    Ajax.getJSON(url('blog_post', queryParameterCollection), (ajaxObject, res) => { callback(res); });
}

HttpApi.category = {};

/**
 * @author Mihail Petrov
 * @param {type} callback
 * @example http://CMS_AJAX_SERVER/category/
 * @description Get all of the available blog post entity collection
 */
HttpApi.category.getAll = (callback) => {
    Ajax.getJSON(url('category'), (ajaxObject, res) => { callback(res); });
};


HttpApi.user = {};

/**
 * @author Mihail Petrov
 * @param {type} body
 * @param {type} callback
 * @returns {undefined}
 */
HttpApi.user.signin = (body, callback) => {
    Ajax.postJSON(url('user'), body, (ajaxObject, res) => { callback(res); });
};