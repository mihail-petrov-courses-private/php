var HttpApi = {};

var url = (endpoint, queryParameterCollection) => {    
    
    var URL         = `http://localhost/CMS_AJAX_SERVER`;
    var urlEndpoint = `${URL}/${endpoint}`;
    
    if(queryParameterCollection) {
        
        var query = "";
        for(var index in queryParameterCollection) {
            query += `${index}=${queryParameterCollection[index]}&`;
        }
        query = query.substring(0, query.length-1);
        return `${urlEndpoint}?${query}`;
    }
    
    return urlEndpoint;
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
    Ajax.getJSON(url(`blog_post/${postId}`), (ajaxObject, res) => { callback(res.data); });
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


HttpApi.office = {};
/**
 * @author Mihail Petrov
 * @param {type} callback
 * @example http://CMS_AJAX_SERVER/office/
 * @description Get all of the available blog post entity collection
 * @scope private 
 */
HttpApi.office.getAll = (callback) => {
    Ajax.getJSON(url('office'), (ajaxObject, res) => { callback(res); });
};



HttpApi.user = {};

/**
 * @author Mihail Petrov
 * @param {type} body
 * @param {type} callback
 * @returns {undefined}
 */
HttpApi.user.signin = (body, callback) => {
    Ajax.postJSON(url('user/signin'), body, (ajaxObject, res) => { callback(res); });
};