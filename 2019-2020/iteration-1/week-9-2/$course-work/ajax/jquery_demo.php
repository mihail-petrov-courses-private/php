<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <button id="request-get">Request Get</button>
    <button id="request-post">Request Post</button>
    
    <!-- placeholder -->
    <div id="collection"></div>
    
    <script src="jquery.js"/>
    <script>
        
        var element         = document.getElementById("collection");
        element.style.background = "#ff0000";
        
        var jQueryElement   = $("collection");
        jQueryElement.style({
            "background" : "#ff0000"
        })
        
        
    </script>
</body>
</html>