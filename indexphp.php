<?php
?>

<!DOCTYPE HTML>
<!--Wow, you're looking at the source code. You must be quite the hacker.-->
<html lang="en">
    <head>
        <title>Doge-Web</title>
        <meta charset="utf-8">
        <meta name="Description" CONTENT="Wow">
        <meta name="robots" content="noodp" />
        <link rel="icon" type="image/png" href="doge-head.png">

        <audio autoplay="autoplay" loop>
            <source src="audio/PORNOGROOVE.mp3" type="audio/mpeg" />
            <source src="audio/PORNOGROOVE.wav" type="audio/wav" />
            <source src="audio/PORNOGROOVE.ogg" type="audio/ogg" />
            <embed height="50" width="100" src="/audio/PORNOGROOVE.mp3">
        </audio>

        <style type="text/css">
            /* Containers */
            
            body, html {
                font-family : "Comic Sans MS", "Comic Sans";
                overflow: hidden;
            }
        
            #doge {
                display: block;
                margin-left: auto;
                margin-right: auto;
                height: 100%;
                width: auto;
                z-index: 100;
        
                animation:rot 4s infinite 6s linear;
                -webkit-animation:rot 3s infinite 6s linear;
            }
        
            #dogeBreathing {
                display: block;
                margin-left: auto;
                margin-right: auto;
                height: 100%;
                width: auto;

                animation:breathe 3s infinite 10s ease-in-out;
                -webkit-animation:breathe 5s infinite 10s ease-in-out;
            }
        
            #dogeFadein {
                display: block;
                margin-left: auto;
                margin-right: auto;
                height: 100%;
                width: auto;
                opacity:0;
        
                animation:fadein 5s 1 4s ease-out;
                animation-fill-mode:forwards;
                -webkit-animation:fadein 5s 1 4s ease-out;
                -webkit-animation-fill-mode:forwards;
            }
        
            #wowtext {
                position: fixed;
                left: 0px;
                top: 0px;
                z-index: -100;
            }
        
            /* KEYFRAMES */
        
            @keyframes fadein {
                0% { visibility:none; }
                100% { visibility:visible; }
            }
        
            @-webkit-keyframes fadein {
                0% { opacity:0; }
                100% { opacity:1; }
            }
        
            @keyframes rot {
                0% { transform:rotate(0deg); }
                100% { transform:rotate(359deg); }
            }
        
            @-webkit-keyframes rot {
                0% { -webkit-transform:rotate(0deg); }
                100% { -webkit-transform:rotate(359deg); }
            }
        
            @keyframes breathe {
                0% { transform:scale(1); }
                50% { transform:scale(0.5); }
                100% {transform:scale(1); }
            }
        
            @-webkit-keyframes breathe {
                0% { -webkit-transform:scale(1); }
                50% { -webkit-transform:scale(0.5); }
                100% { -webkit-transform:scale(1); }
            }
        </style>

        <script type="text/javascript">
            /* Rainbow Text */
        
            function toSpans(span) {
                var str = span.firstChild.data;
                var a = str.length;
                span.removeChild(span.firstChild);
                for ( var i = 0; i < a; i++) {
                    var theSpan = document.createElement("SPAN");
                    theSpan.appendChild(document.createTextNode(str.charAt(i)));
                    span.appendChild(theSpan);
                }
            }
        
            function RainbowSpan(span, hue, deg, brt, spd, hspd) {
                this.deg = (deg == null ? 360 : Math.abs(deg));
                this.hue = (hue == null ? 0 : Math.abs(hue) % 360);
                this.hspd = (hspd == null ? 3 : Math.abs(hspd) % 360);
                this.length = span.firstChild.data.length;
                this.span = span;
                this.speed = (spd == null ? 50 : Math.abs(spd));
                this.hInc = this.deg / this.length;
                this.brt = (brt == null ? 255 : Math.abs(brt) % 256);
                this.timer = null;
                toSpans(span);
                this.moveRainbow();
            }
        
            RainbowSpan.prototype.moveRainbow = function() {
                if (this.hue > 359)
                    this.hue -= 360;
                var color;
                var b = this.brt;
                var a = this.length;
                var h = this.hue;
        
                for ( var i = 0; i < a; i++) {
                    
                    if (h > 359)
                        h -= 360;
                    
                    if (h < 60) {
                        color = Math.floor(((h) / 60) * b);
                        red = b;
                        grn = color;
                        blu = 0;
                    } else if (h < 120) {
                        color = Math.floor(((h - 60) / 60) * b);
                        red = b - color;
                        grn = b;
                        blu = 0;
                    } else if (h < 180) {
                        color = Math.floor(((h - 120) / 60) * b);
                        red = 0;
                        grn = b;
                        blu = color;
                    } else if (h < 240) {
                        color = Math.floor(((h - 180) / 60) * b);
                        red = 0;
                        grn = b - color;
                        blu = b;
                    } else if (h < 300) {
                        color = Math.floor(((h - 240) / 60) * b);
                        red = color;
                        grn = 0;
                        blu = b;
                    } else {
                        color = Math.floor(((h - 300) / 60) * b);
                        red = b;
                        grn = 0;
                        blu = b - color;
                    }
        
                    h += this.hInc;
                    
                    this.span.childNodes[i].style.color = "rgb(" + red + ", " + grn + ", " + blu + ")";
                }
                this.hue += this.hspd;
            }
        </script>

        <script type="text/javascript">
            /* Randomly Placed Doge Heads
        
            $(document).ready(function() {
            
                var canvas = $("#screen1");
                var context = canvas.get(0).getContext("2d");
            
                //Button Logic
                var playAnim = true;
                var startButton = $("#startAnim");
                var stopButton = $("#stopAnim");
                var clearButton = $("#clearAll");
        
                startButton.hide();
                startButton.click(function() {
                    $(this).hide();
                    stopButton.show();
                    playAnim = true;
                    animate();							
                });
        
                stopButton.click(function() {
                    $(this).hide();
                    startButton.show();
                    playAnim = false;
                });
        
                clearButton.click(function() {
                    context.clearRect(0, 0, canvas.width(), canvas.height());
                });
        
                var x = 0;
                var y = 0;
                var r = 0;
                var g = 0;
                var b = 0;
                var sizeXY = 0;
        
                context.shadowBlur = 20;
                context.shadowColor = "rgba(0, 0, 0, 0.5)";
        
                animate();
        
                function animate() {
                    x = Math.floor(Math.random()*canvas.width()) - 50;
                    y = Math.floor(Math.random()*canvas.height()) - 50;					
                    r = Math.floor(Math.random()*255);
                    g = Math.floor(Math.random()*255);
                    b = Math.floor(Math.random()*255);
                    sizeXY = Math.floor(Math.random()*100);
                    context.fillStyle = "rgba(" + r + "," + g + "," + b + ", 0.5)";
                    context.fillRect(x, y, sizeXY, sizeXY);
                    if(x > canvas.width()) {
                        x = 0;
                    };
                    setTimeout(animate, 20);
                };
            }); */
        </script>
    </head>

    <body>

        <div id="dogeBreathing">
            <div id="dogeFadein">
                <img id="doge" src="wowintensifies.gif" alt="
░░░░░░░░░▄░░░░░░░░░░░░░░▄░░░░
░░░░░░░░▌▒█░░░░░░░░░░░▄▀▒▌░░░
░░░░░░░░▌▒▒█░░░░░░░░▄▀▒▒▒▐░░░
░░░░░░░▐▄▀▒▒▀▀▀▀▄▄▄▀▒▒▒▒▒▐░░░
░░░░░▄▄▀▒░▒▒▒▒▒▒▒▒▒█▒▒▄█▒▐░░░
░░░▄▀▒▒▒░░░▒▒▒░░░▒▒▒▀██▀▒▌░░░ 
░░▐▒▒▒▄▄▒▒▒▒░░░▒▒▒▒▒▒▒▀▄▒▒▌░░
░░▌░░▌█▀▒▒▒▒▒▄▀█▄▒▒▒▒▒▒▒█▒▐░░
░▐░░░▒▒▒▒▒▒▒▒▌██▀▒▒░░░▒▒▒▀▄▌░
░▌░▒▄██▄▒▒▒▒▒▒▒▒▒░░░░░░▒▒▒▒▌░
▀▒▀▐▄█▄█▌▄░▀▒▒░░░░░░░░░░▒▒▒▐░
▐▒▒▐▀▐▀▒░▄▄▒▄▒▒▒▒▒▒░▒░▒░▒▒▒▒▌
▐▒▒▒▀▀▄▄▒▒▒▄▒▒▒▒▒▒▒▒░▒░▒░▒▒▐░
░▌▒▒▒▒▒▒▀▀▀▒▒▒▒▒▒░▒░▒░▒░▒▒▒▌░
░▐▒▒▒▒▒▒▒▒▒▒▒▒▒▒░▒░▒░▒▒▄▒▒▐░░
░░▀▄▒▒▒▒▒▒▒▒▒▒▒░▒░▒░▒▄▒▒▒▒▌░░
░░░░▀▄▒▒▒▒▒▒▒▒▒▒▄▄▄▀▒▒▒▒▄▀░░░
░░░░░░▀▄▄▄▄▄▄▀▀▀▒▒▒▒▒▄▄▀░░░░░
░░░░░░░░░▒▒▒▒▒▒▒▒▒▒▀▀░░░░░░░░">
            </div>
        </div>

        <?php
            if(isset($_GET['msg'])) {
                $msg = $_GET['msg'];
                $msg = htmlentities($msg);
                echo "<p id=\"wowtext\">$msg</p>";
            }
        ?>
        <script type="text/javascript">
            var wowtext = document.getElementById("wowtext");
            var myRainbowSpan2 = new RainbowSpan(wowtext, 0, 360, 255, 50, 348);
            myRainbowSpan2.timer = window.setInterval("myRainbowSpan2.moveRainbow()", myRainbowSpan2.speed);
        </script>

        <script>
            /* Background Fading Effect */
        
            var fade_effect = 2
        
            var gradient_effect = "horizontal"
        
            var speed = 1
        
            var browserinfos = navigator.userAgent
            var ie4 = document.all && !document.getElementById
            var ie5 = document.all && document.getElementById
            && !browserinfos.match(/Opera/)
            var ns4 = document.layers
            var ns6 = document.getElementById && !document.all
            var opera = browserinfos.match(/Opera/)
            var browserok = ie4 || ie5 || ns4 || ns6 || opera
        
            if (fade_effect == 1) {
                var darkmax = 1
                var lightmax = 127
                }
            if (fade_effect == 2) {
                var darkmax = 127
                var lightmax = 254
                }
            if (fade_effect == 3) {
                var darkmax = 1
                var lightmax = 254
                }
            if (fade_effect == 4) {
                var darkmax = 190
                var lightmax = 254
                }
            if (fade_effect == 5) {
                var darkmax = 1
                var lightmax = 80
                }
            var hexc = new Array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'A', 'B', 'C', 'D', 'E', 'F')
        
            var newred
            var newgreen
            var newblue
            var oldred
            var oldgreen
            var oldblue
            
            var redcol_1
            var redcol_2
            var greencol_1
            var greencol_2
            var bluecol_1
            var bluecol_2
            var oldcolor
            var newcolor
            var firsttime = true
            
            var stepred = 1
            var stepgreen = 1
            var stepblue = 1
            
            function setrandomcolor() {
                var range = (lightmax - darkmax)
                if (firsttime) {
                    newred = Math.ceil(range * Math.random()) + darkmax
                    newgreen = Math.ceil(range * Math.random()) + darkmax
                    newblue = Math.ceil(range * Math.random()) + darkmax
                        firsttime = false
                }
                
                oldred = Math.ceil(range * Math.random()) + darkmax
                oldgreen = Math.ceil(range * Math.random()) + darkmax
                oldblue = Math.ceil(range * Math.random()) + darkmax
                
                stepred = newred - oldred
                if (oldred > newred) {
                    stepred = 1
                } else if (oldred < newred) {
                    stepred = -1
                } else {
                    stepred = 0
                }
                
                stepgreen = newgreen - oldgreen
                if (oldgreen > newgreen) {
                    stepgreen = 1
                } else if (oldgreen < newgreen) {
                    stepgreen = -1
                } else {
                    stepgreen = 0
                }
                
                stepblue = newblue - oldblue
                if (oldblue > newblue) {
                    stepblue = 1
                } else if (oldblue < newblue) {
                    stepblue = -1
                } else {
                    stepblue = 0
                }
                fadebg()
            }
            
            function fadebg() {
                if (newred == oldred) {
                    stepred = 0
                }
                if (newgreen == oldgreen) {
                    stepgreen = 0
                }
                if (newblue == oldblue) {
                    stepblue = 0
                }
                newred += stepred
                newgreen += stepgreen
                newblue += stepblue
        
                if (stepred != 0 || stepgreen != 0 || stepblue != 0) {
                    redcol_1 = hexc[Math.floor(newred / 16)];
                    redcol_2 = hexc[newred % 16];
                    greencol_1 = hexc[Math.floor(newgreen / 16)];
                    greencol_2 = hexc[newgreen % 16];
                    bluecol_1 = hexc[Math.floor(newblue / 16)];
                    bluecol_2 = hexc[newblue % 16];
                    newcolor = "#" + redcol_1 + redcol_2 + greencol_1 + greencol_2 + bluecol_1 + bluecol_2
                    if (ie5 && gradient_effect != "none") {
                        if (gradient_effect == "horizontal") {
                            gradient_effect = 1
                        }
                        if (gradient_effect == "vertical") {
                            gradient_effect = 0
                        }
                        greencol_1 = hexc[Math.floor(newred / 16)];
                        greencol_2 = hexc[newred % 16];
                        bluecol_1 = hexc[Math.floor(newgreen / 16)];
                        bluecol_2 = hexc[newgreen % 16];
                        redcol_1 = hexc[Math.floor(newblue / 16)];
                        redcol_2 = hexc[newblue % 16];
                        var newcolorCompl = "#" + redcol_1 + redcol_2 + greencol_1
                        + greencol_2 + bluecol_1 + bluecol_2
                        document.body.style.filter = "progid:DXImageTransform.Microsoft.Gradient(startColorstr="
                        + newcolorCompl
                        + ", endColorstr="
                        + newcolor
                        + " GradientType=" + gradient_effect + ")"
                    } else {
                        document.bgColor = newcolor
                    }
                    var timer = setTimeout("fadebg()", speed);
                } else {
                    clearTimeout(timer)
                    newred = oldred
                    newgreen = oldgreen
                    newblue = oldblue
                    oldcolor = newcolor
                    setrandomcolor()
                }
            }
            
            function start() {
                if (browserok) {
                    setrandomcolor();
                    }
            }
            
            window.onload = start;
        </script>
    </body>
</html>
