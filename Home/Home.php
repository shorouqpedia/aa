 <html>
    <head>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <title>DSheldon</title>
        <link rel="shortcut icon" href="img/DS.png">
        <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
     
    <body  style="background-color: #18222B;background-size: cover;height: 625px;">

        <ul class="ul">
            <li class="li" >
              <a href="D:\Graduation Project\Project\Sign up\Sign up.html">Sign up</a>
            </li>
          
            <li class="li" >
                <a href="D:\Graduation Project\Project\Log in\Log in.html">Log in</a>
            </li>

            <li class="qu">
                <a href="#questions">Questions</a>
            </li>
        </ul>

        <div>
            <font style="
                         position:absolute;
                         left:35.5%;
                         top:35%;">
                <a 
                   href="" 
                   style="
                          text-decoration:none;
                          font-size:35pt;
                          color:#FFB900;
                          font-family:Eurostile Extended Black;">
                    
                    <font style="color: #C91143;">D</font>SHELDØN
                </a>
            </font>
            
            <div style="position:absolute;left:33%;top:50%;">
                
                
                <form class="Searching" action="results/index.php" method="get">
                    <input 
                           name="q" 
                           type="text" 
                           placeholder="Search" 
                           value="" 
                           id="ip1" />
                    <button 
                        style="
                               color: #919191;
                               position:absolute;
                               left:93%;top:8%;" 
                        type="submit">
                    
                        <i class="fa fa-search"></i>
                        
                    </button>
                </form>
                
                
            </div>
    
            <div>
                <font 
                      style="
                             color: #FFB900;
                             font-size:11pt ;
                             position:absolute;
                             left:88%;top:93%;
                             font-family:small arial,sans-serif; "> Totally ripped off TØP
                    <br/>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Google
                
                </font>
            </div>
	
        </div>
     </body>
</html>


<?php
            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["q"]))
            {
                $q=$_GET["q"]; 
                echo $q;
                
            }
?>
