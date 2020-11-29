Ajax.get("http://localhost/CMS/endpoint.php?request=data", function(data) {
    console.log("Get Request")
    console.log(data);
}, function() {
    console.log("GET error")
    console.log(error);            
});