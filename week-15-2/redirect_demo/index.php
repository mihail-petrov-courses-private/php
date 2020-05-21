<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>You have registerd successfuly</h1>
        
        <script>
                
            var userRegistartionRole =  "employer";
            redirectPage = (userRegistartionRole == "employer") ? "employer-page.php" 
                                                                : "employ-page.php";
            
            setTimeout(function() {
                window.location.href = redirectPage;
            }, 4000);
        
        </script>
        
    </body>
</html>
