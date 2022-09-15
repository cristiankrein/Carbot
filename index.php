<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carbot</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">Carbot</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon" style="background-color: white;">
                    <!--<i class="fas fa-user"></i>-->
                    <img src="imgs/robot.png" alt="robot">
                </div>
                <div class="msg-header">
                    <p>Olá, meu nome é Carbot, estarei fazendo algumas perguntas sobre o seu carro ideal, responda com (Sim/Não).</p><br>
                    <p>Mas antes de iniciarmos, me fale qual é seu nome?</p><br>
                </div>
            </div>
        </div>
        <div class="typing-field">
            <div class="input-data">
                <input id="data" type="text" placeholder="Digite algo aqui.." required>
                <button id="send-btn">Enviar</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#send-btn").on("click", function(){
                $value = $("#data").val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value +'</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');
                
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        $replay = '<div class="bot-inbox inbox"><div class="icon" style="background-color: white;"><img src="imgs/robot.png" alt="robot"></div><div class="msg-header"><p>'+ result +'</p></div></div>';
                        $(".form").append($replay);
                        $(".form").scrollTop($(".form")[0].scrollHeight);
                    }
                });
            });
        });
    </script>
    
</body>
</html>