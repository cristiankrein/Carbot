<?php
$conn = mysqli_connect("localhost", "root", "", "carbot") or die("Database Error");

$getMesg = mysqli_real_escape_string($conn, $_POST['text']);
//select que procura se tem nome no ultimo insert feito
$procura_nome = mysqli_query($conn, "select nome from respostas order by id desc limit 1");
$nome = mysqli_fetch_array($procura_nome);
$questao_atual = mysqli_query($conn, "select id,questao from respostas order by id desc limit 1");
$questao = mysqli_fetch_array($questao_atual);

//se não tem, insere o nome e eta questão para 2
if ((mysqli_num_rows($procura_nome)<1) || $questao["questao"] == 0){
    $inserir = mysqli_query($conn,"insert into respostas (nome, questao) VALUES ('$getMesg',2)")or die(mysqli_error($conn));
    if($inserir){
        $replay = 'Seu carro deve ter: <br><br> Combustível flex?';
        echo $replay;
    }else{
        $replay = 'Erro ao inserir nome';
        echo $replay;
    }
}else if($getMesg != "Não" && $getMesg != "Sim"){
    echo "A resposta deve ser  (Sim/Não).";
}else{
    $resp = 0;
    if($getMesg == "Sim"){
        $resp = 1;
    }
    if($questao["questao"] == 2 && $resp == 1){
        //Insere se é a FLEX
        $inserir = mysqli_query($conn,"update respostas set quest_1='$resp', questao=7")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Câmbio manual?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Cambio Manual';
            echo $replay;
        }
    }else if($questao["questao"] == 2 && $resp == 0){
        $inserir = mysqli_query($conn,"update respostas set quest_1='$resp', questao=3")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Apenas opção de gasolina como Combustível?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Combustível Flex';
            echo $replay;
        }
    }else if($questao["questao"] == 3 && $resp == 1){
        //Insere se é a GASOLINA
        $inserir = mysqli_query($conn,"update respostas set quest_2='$resp', questao=7")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Câmbio manual?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Cambio Manual';
            echo $replay;
        }
    }else if($questao["questao"] == 3 && $resp == 0){
        $inserir = mysqli_query($conn,"update respostas set quest_2='$resp', questao=4")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Apenas opção de gasolina como Combustível?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Combustível gasolina';
            echo $replay;
        }
    }else if($questao["questao"] == 4 && $resp == 1){
        //Insere se é a ÁLCOOL
        $inserir = mysqli_query($conn,"update respostas set quest_3='$resp', questao=7")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Câmbio manual?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Cambio Manual';
            echo $replay;
        }
    }else if($questao["questao"] == 4 && $resp == 0){
        $inserir = mysqli_query($conn,"update respostas set quest_3='$resp', questao=5")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Apenas opção de álcool como Combustível?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Combustível álcool';
            echo $replay;
        }
    }else if($questao["questao"] == 5 && $resp == 1){
        //Insere se é a DIESEL
        $inserir = mysqli_query($conn,"update respostas set quest_4='$resp', questao=7")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Câmbio manual?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Cambio Manual';
            echo $replay;
        }
    }else if($questao["questao"] == 5 && $resp == 0){
        $inserir = mysqli_query($conn,"update respostas set quest_4='$resp', questao=6")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Apenas opção de diesel como Combustível?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Combustível diesel';
            echo $replay;
        }
    }else if($questao["questao"] == 6 && $resp == 1){
        //Insere se é a eletrico
        $inserir = mysqli_query($conn,"update respostas set quest_5='$resp', questao=7")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Câmbio manual?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Cambio Manual';
            echo $replay;
        }
    }else if($questao["questao"] == 6 && $resp == 0){
        $inserir = mysqli_query($conn,"update respostas set quest_5=1, questao=7")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Dentre as opções disponível, apenas restou a opção eletrico de combustível, a qual foi marcada automaticamente por ser a única opção ainda disponível. <br><br> Câmbio manual?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Combustível eletrico';
            echo $replay;
        }
    }else if($questao["questao"] == 7 && $resp == 1){
        //Insere se é a CÂMBIO MANUAL
        $inserir = mysqli_query($conn,"update respostas set quest_6='$resp', questao=9")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Carro com 2 portas?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Câmbio Manual';
            echo $replay;
        }
    }else if($questao["questao"] == 7 && $resp == 0){
        //Insere se é a CÂMBIO AUTOMÁTICO
        $inserir = mysqli_query($conn,"update respostas set quest_7=1, questao=9")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Dentre as opções disponíveis, apenas restou carros com câmbio automático, a qual foi marcada automaticamente por ser a única opção ainda disponível. <br><br> Carro com 2 portas?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir Câmbio automático';
            echo $replay;
        }
    }else if($questao["questao"] == 9 && $resp == 1){
        //Insere se é a 2 PORTAS
        $inserir = mysqli_query($conn,"update respostas set quest_8='$resp', questao=11")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Carro com 2 lugares?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir 2 portas';
            echo $replay;
        }
    }else if($questao["questao"] == 9 && $resp == 0){
        //Insere se é a 4 PORTAS
        $inserir = mysqli_query($conn,"update respostas set quest_9=1, questao=11")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Dentre as opções disponíveis, apenas restou carros com 4 portas, a qual foi marcada automaticamente por ser a única opção ainda disponível. <br><br> Carro com 2 lugares?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir 4 portas';
            echo $replay;
        }
    }else if($questao["questao"] == 11 && $resp == 1){
        //Insere se é 2 LUGARES
        $inserir = mysqli_query($conn,"update respostas set quest_10='$resp', questao=13")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Carro com porta-malas grande?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir 2 lugares';
            echo $replay;
        }
    }else if($questao["questao"] == 11 && $resp == 0){
        //Insere se é 5 LUGARES
        $inserir = mysqli_query($conn,"update respostas set quest_11=1, questao=13")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Dentre as opções disponíveis, apenas restou carros com 5 lugares, a qual foi marcada automaticamente por ser a única opção ainda disponível. <br><br> Carros com porta-malas grande?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir 5 lugares';
            echo $replay;
        }
    }else if($questao["questao"] == 13 && $resp == 1){
        //Insere se é PORTA-MALAS GRANDE
        $inserir = mysqli_query($conn,"update respostas set quest_12='$resp', questao=15")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Carro leve?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir porta-malas grande';
            echo $replay;
        }
    }else if($questao["questao"] == 13 && $resp == 0){
        //Insere se é PORTA-MALAS PEQUENO
        $inserir = mysqli_query($conn,"update respostas set quest_13=1, questao=15")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Dentre as opções disponíveis, apenas restou carros com porta-malas pequeno, a qual foi marcada automaticamente por ser a única opção ainda disponível. <br><br> Carro leve?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir porta-malas pequeno';
            echo $replay;
        }
    }else if($questao["questao"] == 15 && $resp == 1){
        //Insere se é CARRO LEVE
        $inserir = mysqli_query($conn,"update respostas set quest_14='$resp', questao=17")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Média KM/litro acima de 10?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir carro leve';
            echo $replay;
        }
    }else if($questao["questao"] == 15 && $resp == 0){
        //Insere se é CARRO PESADO
        $inserir = mysqli_query($conn,"update respostas set quest_15=1, questao=17")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Dentre as opções disponíveis, apenas restou carros pesados, a qual foi marcada automaticamente por ser a única opção ainda disponível. <br><br> Média KM/litro acima de 10?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir carro pesado';
            echo $replay;
        }
    }else if($questao["questao"] == 17 && $resp == 1){
        //Insere se é MEDIA ACIMA DE 10
        $inserir = mysqli_query($conn,"update respostas set quest_16='$resp', questao=19")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Carro com a categoria SUV?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir media acima de 10';
            echo $replay;
        }
    }else if($questao["questao"] == 17 && $resp == 0){
        //Insere se é MEDIA ABAIXO DE 10
        $inserir = mysqli_query($conn,"update respostas set quest_17=1, questao=19")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Dentre as opções disponíveis, apenas restou carros com média por litro abaixo de 10, a qual foi marcada automaticamente por ser a única opção ainda disponível. <br><br> Carro com a categoria SUV?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir media abaixo de 10';
            echo $replay;
        }
    }else if($questao["questao"] == 19 && $resp == 1){
        //Insere se é CATEGORIA SUV
        $inserir = mysqli_query($conn,"update respostas set quest_18='$resp', questao=0")or die(mysqli_error($conn));
        if($inserir){
            $respostas_1 = mysqli_query($conn, "select * from respostas order by id desc limit 1");
            $respostas = mysqli_fetch_array($respostas_1);
            $comb_flex = $respostas["quest_1"];
            $comb_gasolina = $respostas["quest_2"];
            $comb_alcool = $respostas["quest_3"];
            $comb_diesel = $respostas["quest_4"];
            $comb_eletrico = $respostas["quest_5"];
            $cambio_manual = $respostas["quest_6"];
            $cambio_automatico = $respostas["quest_7"];
            $quant_portas_2 = $respostas["quest_8"];
            $quant_portas_4 = $respostas["quest_9"];
            $quant_lugares_2 = $respostas["quest_10"];
            $quant_lugares_5 = $respostas["quest_11"];
            $porta_malas_grande = $respostas["quest_12"];
            $porta_malas_pequeno = $respostas["quest_13"];
            $peso_leve = $respostas["quest_14"];
            $peso_pesado = $respostas["quest_15"];
            $media_litro_acima_10 = $respostas["quest_16"];
            $media_litro_abaixo_10 = $respostas["quest_17"];
            $cat_suv = $respostas["quest_18"];
            $cat_hatch = $respostas["quest_19"];
            $cat_esportivo = $respostas["quest_20"];
            $cat_seda = $respostas["quest_21"];
            $cat_picape = $respostas["quest_22"];

            $respostas_final = mysqli_query($conn, "select marca,modelo,link from caracteristicas where comb_flex='$comb_flex' and comb_gasolina='$comb_gasolina' and 
            comb_alcool='$comb_alcool' and comb_diesel='$comb_diesel' and comb_eletrico='$comb_eletrico' and cambio_manual='$cambio_manual' and cambio_automatico='$cambio_automatico' and 
            quant_portas_2='$quant_portas_2' and quant_portas_4='$quant_portas_4' and quant_lugares_2='$quant_lugares_2' and quant_lugares_5='$quant_lugares_5' and 
            porta_malas_grande='$porta_malas_grande' and porta_malas_pequeno='$porta_malas_pequeno' and peso_leve='$peso_leve' and peso_pesado='$peso_pesado' and 
            media_litro_acima_10='$media_litro_acima_10' and media_litro_abaixo_10='$media_litro_abaixo_10' and cat_suv='$cat_suv' and cat_hatch='$cat_hatch' and cat_esportivo='$cat_esportivo' and 
            cat_seda='$cat_seda' and cat_picape='$cat_picape' limit 1");
        
            $resp_final = mysqli_fetch_array($respostas_final);
            if ((mysqli_num_rows($respostas_final)>=1)){
                $replay = "".$nome["nome"].", o seu carro ideal é o modelo ".$resp_final["modelo"]." da marca ".$resp_final["marca"].". <br><br> Você pode encontrar mais detalhes do carro neste link: " .$resp_final["link"]."";
                echo $replay;
            }else{
                $replay = 'Não encontramos um carro ideal para você em nossa base de dados.';
                echo $replay;
            }
        }else{
            $replay = 'Erro ao inserir categoria SUV';
            echo $replay;
        }
    }else if($questao["questao"] == 19 && $resp == 0){
        //Insere se Não é categoria SUV
        $inserir = mysqli_query($conn,"update respostas set quest_18='$resp', questao=20")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Carro com a categoria Hatch?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir categoria SUV';
            echo $replay;
        }
    }else if($questao["questao"] == 20 && $resp == 1){
        //Insere se é CATEGORIA HATCH
        $inserir = mysqli_query($conn,"update respostas set quest_19='$resp', questao=0")or die(mysqli_error($conn));
        if($inserir){
            $respostas_1 = mysqli_query($conn, "select * from respostas order by id desc limit 1");
            $respostas = mysqli_fetch_array($respostas_1);
            $comb_flex = $respostas["quest_1"];
            $comb_gasolina = $respostas["quest_2"];
            $comb_alcool = $respostas["quest_3"];
            $comb_diesel = $respostas["quest_4"];
            $comb_eletrico = $respostas["quest_5"];
            $cambio_manual = $respostas["quest_6"];
            $cambio_automatico = $respostas["quest_7"];
            $quant_portas_2 = $respostas["quest_8"];
            $quant_portas_4 = $respostas["quest_9"];
            $quant_lugares_2 = $respostas["quest_10"];
            $quant_lugares_5 = $respostas["quest_11"];
            $porta_malas_grande = $respostas["quest_12"];
            $porta_malas_pequeno = $respostas["quest_13"];
            $peso_leve = $respostas["quest_14"];
            $peso_pesado = $respostas["quest_15"];
            $media_litro_acima_10 = $respostas["quest_16"];
            $media_litro_abaixo_10 = $respostas["quest_17"];
            $cat_suv = $respostas["quest_18"];
            $cat_hatch = $respostas["quest_19"];
            $cat_esportivo = $respostas["quest_20"];
            $cat_seda = $respostas["quest_21"];
            $cat_picape = $respostas["quest_22"];

            $respostas_final = mysqli_query($conn, "select marca,modelo,link from caracteristicas where comb_flex='$comb_flex' and comb_gasolina='$comb_gasolina' and 
            comb_alcool='$comb_alcool' and comb_diesel='$comb_diesel' and comb_eletrico='$comb_eletrico' and cambio_manual='$cambio_manual' and cambio_automatico='$cambio_automatico' and 
            quant_portas_2='$quant_portas_2' and quant_portas_4='$quant_portas_4' and quant_lugares_2='$quant_lugares_2' and quant_lugares_5='$quant_lugares_5' and 
            porta_malas_grande='$porta_malas_grande' and porta_malas_pequeno='$porta_malas_pequeno' and peso_leve='$peso_leve' and peso_pesado='$peso_pesado' and 
            media_litro_acima_10='$media_litro_acima_10' and media_litro_abaixo_10='$media_litro_abaixo_10' and cat_suv='$cat_suv' and cat_hatch='$cat_hatch' and cat_esportivo='$cat_esportivo' and 
            cat_seda='$cat_seda' and cat_picape='$cat_picape' limit 1");
        
            $resp_final = mysqli_fetch_array($respostas_final);
            if ((mysqli_num_rows($respostas_final)>=1)){
                $replay = "".$nome["nome"].", o seu carro ideal é o modelo ".$resp_final["modelo"]." da marca ".$resp_final["marca"].". <br><br> Você pode encontrar mais detalhes do carro neste link: " .$resp_final["link"]."";
                echo $replay;
            }else{
                $replay = 'Não encontramos um carro ideal para você em nossa base de dados.';
                echo $replay;
            }
        }else{
            $replay = 'Erro ao inserir categoria HATCH';
            echo $replay;
        }
    }else if($questao["questao"] == 20 && $resp == 0){
        //Insere se Não é categoria HATCH
        $inserir = mysqli_query($conn,"update respostas set quest_19='$resp', questao=21")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Carro com a categoria Esportiva?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir categoria HATCH';
            echo $replay;
        }
    }else if($questao["questao"] == 21 && $resp == 1){
        //Insere se é CATEGORIA ESPORTIVA
        $inserir = mysqli_query($conn,"update respostas set quest_20='$resp', questao=0")or die(mysqli_error($conn));
        if($inserir){
            $respostas_1 = mysqli_query($conn, "select * from respostas order by id desc limit 1");
            $respostas = mysqli_fetch_array($respostas_1);
            $comb_flex = $respostas["quest_1"];
            $comb_gasolina = $respostas["quest_2"];
            $comb_alcool = $respostas["quest_3"];
            $comb_diesel = $respostas["quest_4"];
            $comb_eletrico = $respostas["quest_5"];
            $cambio_manual = $respostas["quest_6"];
            $cambio_automatico = $respostas["quest_7"];
            $quant_portas_2 = $respostas["quest_8"];
            $quant_portas_4 = $respostas["quest_9"];
            $quant_lugares_2 = $respostas["quest_10"];
            $quant_lugares_5 = $respostas["quest_11"];
            $porta_malas_grande = $respostas["quest_12"];
            $porta_malas_pequeno = $respostas["quest_13"];
            $peso_leve = $respostas["quest_14"];
            $peso_pesado = $respostas["quest_15"];
            $media_litro_acima_10 = $respostas["quest_16"];
            $media_litro_abaixo_10 = $respostas["quest_17"];
            $cat_suv = $respostas["quest_18"];
            $cat_hatch = $respostas["quest_19"];
            $cat_esportivo = $respostas["quest_20"];
            $cat_seda = $respostas["quest_21"];
            $cat_picape = $respostas["quest_22"];

            $respostas_final = mysqli_query($conn, "select marca,modelo,link from caracteristicas where comb_flex='$comb_flex' and comb_gasolina='$comb_gasolina' and 
            comb_alcool='$comb_alcool' and comb_diesel='$comb_diesel' and comb_eletrico='$comb_eletrico' and cambio_manual='$cambio_manual' and cambio_automatico='$cambio_automatico' and 
            quant_portas_2='$quant_portas_2' and quant_portas_4='$quant_portas_4' and quant_lugares_2='$quant_lugares_2' and quant_lugares_5='$quant_lugares_5' and 
            porta_malas_grande='$porta_malas_grande' and porta_malas_pequeno='$porta_malas_pequeno' and peso_leve='$peso_leve' and peso_pesado='$peso_pesado' and 
            media_litro_acima_10='$media_litro_acima_10' and media_litro_abaixo_10='$media_litro_abaixo_10' and cat_suv='$cat_suv' and cat_hatch='$cat_hatch' and cat_esportivo='$cat_esportivo' and 
            cat_seda='$cat_seda' and cat_picape='$cat_picape' limit 1");
        
            $resp_final = mysqli_fetch_array($respostas_final);
            if ((mysqli_num_rows($respostas_final)>=1)){
                $replay = "".$nome["nome"].", o seu carro ideal é o modelo ".$resp_final["modelo"]." da marca ".$resp_final["marca"].". <br><br> Você pode encontrar mais detalhes do carro neste link: " .$resp_final["link"]."";
                echo $replay;
            }else{
                $replay = 'Não encontramos um carro ideal para você em nossa base de dados.';
                echo $replay;
            }
        }else{
            $replay = 'Erro ao inserir categoria ESPORTIVA';
            echo $replay;
        }
    }else if($questao["questao"] == 21 && $resp == 0){
        //Insere se Não é categoria ESPORTIVA
        $inserir = mysqli_query($conn,"update respostas set quest_20='$resp', questao=22")or die(mysqli_error($conn));
        if($inserir){
            $replay = 'Carro com a categoria Sedã?';
            echo $replay;
        }else{
            $replay = 'Erro ao inserir categoria ESPORTIVA';
            echo $replay;
        }
    }else if($questao["questao"] == 22 && $resp == 1){
        //Insere se é CATEGORIA SEDÃ
        $inserir = mysqli_query($conn,"update respostas set quest_21='$resp', questao=0")or die(mysqli_error($conn));
        if($inserir){
            $respostas_1 = mysqli_query($conn, "select * from respostas order by id desc limit 1");
            $respostas = mysqli_fetch_array($respostas_1);
            $comb_flex = $respostas["quest_1"];
            $comb_gasolina = $respostas["quest_2"];
            $comb_alcool = $respostas["quest_3"];
            $comb_diesel = $respostas["quest_4"];
            $comb_eletrico = $respostas["quest_5"];
            $cambio_manual = $respostas["quest_6"];
            $cambio_automatico = $respostas["quest_7"];
            $quant_portas_2 = $respostas["quest_8"];
            $quant_portas_4 = $respostas["quest_9"];
            $quant_lugares_2 = $respostas["quest_10"];
            $quant_lugares_5 = $respostas["quest_11"];
            $porta_malas_grande = $respostas["quest_12"];
            $porta_malas_pequeno = $respostas["quest_13"];
            $peso_leve = $respostas["quest_14"];
            $peso_pesado = $respostas["quest_15"];
            $media_litro_acima_10 = $respostas["quest_16"];
            $media_litro_abaixo_10 = $respostas["quest_17"];
            $cat_suv = $respostas["quest_18"];
            $cat_hatch = $respostas["quest_19"];
            $cat_esportivo = $respostas["quest_20"];
            $cat_seda = $respostas["quest_21"];
            $cat_picape = $respostas["quest_22"];

            $respostas_final = mysqli_query($conn, "select marca,modelo,link from caracteristicas where comb_flex='$comb_flex' and comb_gasolina='$comb_gasolina' and 
            comb_alcool='$comb_alcool' and comb_diesel='$comb_diesel' and comb_eletrico='$comb_eletrico' and cambio_manual='$cambio_manual' and cambio_automatico='$cambio_automatico' and 
            quant_portas_2='$quant_portas_2' and quant_portas_4='$quant_portas_4' and quant_lugares_2='$quant_lugares_2' and quant_lugares_5='$quant_lugares_5' and 
            porta_malas_grande='$porta_malas_grande' and porta_malas_pequeno='$porta_malas_pequeno' and peso_leve='$peso_leve' and peso_pesado='$peso_pesado' and 
            media_litro_acima_10='$media_litro_acima_10' and media_litro_abaixo_10='$media_litro_abaixo_10' and cat_suv='$cat_suv' and cat_hatch='$cat_hatch' and cat_esportivo='$cat_esportivo' and 
            cat_seda='$cat_seda' and cat_picape='$cat_picape' limit 1");
        
            $resp_final = mysqli_fetch_array($respostas_final);
            if ((mysqli_num_rows($respostas_final)>=1)){
                $replay = "".$nome["nome"].", o seu carro ideal é o modelo ".$resp_final["modelo"]." da marca ".$resp_final["marca"].". <br><br> Você pode encontrar mais detalhes do carro neste link: " .$resp_final["link"]."";
                echo $replay;
            }else{
                $replay = 'Não encontramos um carro ideal para você em nossa base de dados.';
                echo $replay;
            }
        }else{
            $replay = 'Erro ao inserir categoria SEDÃ';
            echo $replay;
        }
    }else if($questao["questao"] == 22 && $resp == 0){
        //Insere se Não é categoria SEDÃ
        $inserir = mysqli_query($conn,"update respostas set quest_21='$resp', questao=23")or die(mysqli_error($conn));
        if($inserir){
            $inserir = mysqli_query($conn,"update respostas set quest_22=1, questao=0")or die(mysqli_error($conn));
            $respostas_1 = mysqli_query($conn, "select * from respostas order by id desc limit 1");
            $respostas = mysqli_fetch_array($respostas_1);
            $comb_flex = $respostas["quest_1"];
            $comb_gasolina = $respostas["quest_2"];
            $comb_alcool = $respostas["quest_3"];
            $comb_diesel = $respostas["quest_4"];
            $comb_eletrico = $respostas["quest_5"];
            $cambio_manual = $respostas["quest_6"];
            $cambio_automatico = $respostas["quest_7"];
            $quant_portas_2 = $respostas["quest_8"];
            $quant_portas_4 = $respostas["quest_9"];
            $quant_lugares_2 = $respostas["quest_10"];
            $quant_lugares_5 = $respostas["quest_11"];
            $porta_malas_grande = $respostas["quest_12"];
            $porta_malas_pequeno = $respostas["quest_13"];
            $peso_leve = $respostas["quest_14"];
            $peso_pesado = $respostas["quest_15"];
            $media_litro_acima_10 = $respostas["quest_16"];
            $media_litro_abaixo_10 = $respostas["quest_17"];
            $cat_suv = $respostas["quest_18"];
            $cat_hatch = $respostas["quest_19"];
            $cat_esportivo = $respostas["quest_20"];
            $cat_seda = $respostas["quest_21"];
            $cat_picape = $respostas["quest_22"];

            $respostas_final = mysqli_query($conn, "select marca,modelo,link from caracteristicas where comb_flex='$comb_flex' and comb_gasolina='$comb_gasolina' and 
            comb_alcool='$comb_alcool' and comb_diesel='$comb_diesel' and comb_eletrico='$comb_eletrico' and cambio_manual='$cambio_manual' and cambio_automatico='$cambio_automatico' and 
            quant_portas_2='$quant_portas_2' and quant_portas_4='$quant_portas_4' and quant_lugares_2='$quant_lugares_2' and quant_lugares_5='$quant_lugares_5' and 
            porta_malas_grande='$porta_malas_grande' and porta_malas_pequeno='$porta_malas_pequeno' and peso_leve='$peso_leve' and peso_pesado='$peso_pesado' and 
            media_litro_acima_10='$media_litro_acima_10' and media_litro_abaixo_10='$media_litro_abaixo_10' and cat_suv='$cat_suv' and cat_hatch='$cat_hatch' and cat_esportivo='$cat_esportivo' and 
            cat_seda='$cat_seda' and cat_picape='$cat_picape' limit 1");
        
            $resp_final = mysqli_fetch_array($respostas_final);
            if ((mysqli_num_rows($respostas_final)>=1)){
                $replay = "Dentre as opções disponíveis, apenas restou carros com categoria picape, a qual foi marcada automaticamente por ser a única opção ainda disponível. <br><br>".$nome["nome"].", o seu carro ideal é o modelo ".$resp_final["modelo"]." da marca ".$resp_final["marca"].". <br><br> Você pode encontrar mais detalhes do carro neste link: " .$resp_final["link"]."";
                echo $replay;
            }else{
                $replay = 'Não encontramos um carro ideal para você em nossa base de dados.';
                echo $replay;
            }
        }else{
            $replay = 'Erro ao inserir categoria PICAPE';
            echo $replay;
        }
    }
}
