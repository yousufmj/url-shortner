<?php 
include 'controller/redirect.php';
?>

<html>
<head>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script>
    <script type="text/javascript" src="lib/main.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.0/css/foundation.min.css">
</head>
<body>
    <div class="row align-center">
        <div class="column large-7">   
            <h1>URL Shortener</h1>
            <div id="generator">       
                <input type="text" name="url" id="url">  
                <input type="button" class="button primary" value="Shorten" onclick="generate( $('#url').val() );"></input>   
               
                <div id="Message"></div>
            </div>
        </div>
    </div>

    
</body>
</html>
