<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>CMS</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style/style.css">
        <link rel="stylesheet" href="style/public.css">
    </head>
    <body>
        
        <div id="application-header" class="web-header">
            <h1 class="logo">CMS</h1>
        </div>
            
        <div id="blog">
            
            <form style="margin-bottom: 16px">
                <div class="mt-3">
                    <div class="container">
                      <div class="row">
                        <div class="col-sm">
                          <input id="search-blogpost" type="text" placeholder="Search for blog post">
                        </div>
                        <div class="col-sm">
                            <select id="search-blogpost-combobox">
                                <option value="title">Search by Title</option>
                                <option value="content">Search by Content</option>
                            </select>
                        </div>
                        <div class="col-sm">
                            <button class="btn-primary" id="search-blogpost-action">search</button>
                        </div>                                  
                        <div class="col-sm">
                            <button class="button" id="search-blogpost-clear">clear</button>
                        </div>                                                            
                      </div>
                    </div>        
                </div>
            </form>
            
            <div id="content-fullview">
                <div id="content-fullview-blogpost"></div>
                <div id="content-fullview-comment">
                    <form>
                        <textarea name="fullview-comment"></textarea>
                        <button id="fullview-comment-action">Send comment</button>
                    </form>
                </div>
            </div>
            
            
            <div id="category-header" class="component">
                <ul class="category-list" id="category-header-panel">
                </ul>
            </div>
                        
            <div id="content" class="component"></div>
        </div>
        
        <script src="scripts/client/netitquery.js"></script>
        <script src="scripts/vendor/jquery.js"></script>
        <script src="scripts/application/public/index.js"></script>
    </body>
</html>
