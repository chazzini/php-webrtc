<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Websocket Test</title>
    <script type="text/javascript" defer>
        const conn = new WebSocket('ws://localhost:8080');
        conn.onopen = (e)=>{
            conn.send("I greet all")
            console.log("connection establisted")
        };

        //receive message from the server
        conn.onmessage=(e)=>{
            console.log(e.data);
        }

    </script>
</head>
<body>
    Purely php sockets
    <input type="button" value="Send Request" id="send">
<script>
    const button =  document.getElementById("send");
    button.addEventListener("click",()=>{
        conn.send("button was clicked")
    });
</script>
</body>
</html>