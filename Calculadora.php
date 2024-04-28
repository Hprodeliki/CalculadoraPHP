<!DOCTYPE html>
<html>
<head>
    <title>Calculadora</title>
    <style>
        body, html {
            width: 100%;
            height: 100%;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .calculadora {
            width: 70%;
            text-align: center;
            gap: 30px;
            font-size: 20px;
        }
        .calculadora form select{
          width: 5%;
          height: 40px;
          font-size: 20px;
        }
        .calculadora form input[type="text"]
        {
            width: 30%;
            height: 30px;
            font-size: 20px;
        }
        .calcula{
          margin-top: 20px;
          width:10%;
          height: 30px;
          font-size: 20px;
          
        }

    </style>
</head>
<body>
    <div class="calculadora">
        <h1>Calculadora</h1>
        <form method="post" action="">
            <input type="text" name="num1" placeholder="Primeiro número" required>
            <select name="operacao">
                <option value="soma">+</option>
                <option value="subtracao">-</option>
                <option value="multiplicacao">*</option>
                <option value="divisao">/</option>
                <option value="potencia">x²</option>
                <option value="fatorial">n!</option>
            </select>
            <input type="text" name="num2" placeholder="Segundo número" required>
            <br>
            <input class="calcula" type="submit" value="Calcular">
            
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $num1 = $_POST["num1"];
            $num2 = $_POST["num2"];
            $operacao = $_POST["operacao"];
            $resultado = '';
            echo "<br>";
            switch ($operacao) {
                case "soma":
                    $resultado = $num1 + $num2;
                    echo "<h3>$num1 + $num2 = $resultado</h3>";
                    break;
                case "subtracao":
                    $resultado = $num1 - $num2;
                    echo "<h3>$num1 - $num2 = $resultado</h3>";
                    break;
                case "multiplicacao":
                    $resultado = $num1 * $num2;
                    echo "<h3>$num1 * $num2 = $resultado</h3>";
                    break;
                case "divisao":
                    if ($num2 != 0) {
                        $resultado = $num1 / $num2;
                        echo "<h3>$num1 / $num2 = $resultado</h3>";
                    } else {
                        echo "Não posso dividir por 0";
                        exit();
                    }
                    break;
                case "potencia":
                    $resultado = pow($num1,$num2);
                    echo "<h3>$num1 elevado à $num2 = $resultado</h3>";
                      break;
               case "fatorial":
                    $resultado = 1;
                    for ($i = $num1; $i > 0; $i--) {
                      echo "$i";
                      if ($i != 1) {
                        echo " * ";
                      }
                    $resultado *= $i;
                    }
                    echo " = $resultado";
                      break;
                    
                default:
                    echo "Operação inválida.";
                    exit();
            }

        }
        ?>
    
