<?php include("../fxn/connection.php"); ?>
<?php //include("webconsole/webconsole.php"); ?>
<html>
<head><title>BigHMS</title></head>
<body onload="onLLoad('1');" onunload="onLLoad('0');">
<h3>BigHMS Remote Access</h3><div style="padding:10px 0 0 0">Follow steps below to create remote access forwarding url to whosoever want to access BigHMS (on your system) remotely. Please keep the url from hackers. Be warned!<br>STEPS:</div>

<ul style="margin:10px 0 0 0;">
<li>Open Command Prompt on window</li>
<li>Type <strong class="colcyan">cd\</strong> to go to root folder C:\ </li>
<li>Type <strong class="colcyan">cd wamp\www\bighms\sync\</strong> or <strong class="colcyan">cd wamp64\www\bighms\sync\</strong> to locate your bighms sycn folder. NB: Part to your wampserver/xampp may be different.</li>
<li>Type the command below to generate a forwarding Url </li>
<li class="colcyan">ngrok http -config=./ngrok.yml 80</li>
<li><strong class="colcyan">Copy the forwarding Url</strong> and send it to whoever want to access BigHMS remotely. See sample image below</li>
<li><strong class="colcyan">Leave the console/command prompt open</strong> till the person finish accessing your system remotely else operation will be terminated and you will have to start the steps again. Also note that the forwarding url is not static but dynamic url.</li>
</ul>

<img src="ngrok.png" style="margin:10px auto; width:90%; height:auto;">
<style> body{background:#000; padding:10px; font:12px/16px sans-serif, serif; letter-spacing:0.6px; color:#f9f9f9;}h3{font-size:24px; color:#00CCFF; margin:10px 0;}colcyan,.colcyan{color:#00CCFF;}
</style>

<script>StartSync = true;
function onLLoad(t){if(t == '1'){ localStorage.setItem('dosync','1');	StartSync = true; }else{localStorage.setItem('dosync','0'); StartSync = false; window.opener.location.reload(); } }</script>
</body>
</html>