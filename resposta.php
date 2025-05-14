<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Resultado</title>
</head>
<body>
    <div class="content-wrapper">
        <main>
            <h1><i class="fas fa-check-circle"></i> Resultado</h1>
            <div class="resultado">
                <?php
                if(isset($_GET['num'])) {
                    $numero = filter_input(INPUT_GET, 'num', FILTER_VALIDATE_INT);
                    
                    if($numero !== false) {
                        $antecessor = $numero - 1;
                        $sucessor = $numero + 1;
                        
                        echo "<p><i class='fas fa-number'></i> Número informado: <span class='destaque'>$numero</span></p>";
                        echo "<p><i class='fas fa-arrow-down'></i> Antecessor: <span class='destaque'>$antecessor</span></p>";
                        echo "<p><i class='fas fa-arrow-up'></i> Sucessor: <span class='destaque'>$sucessor</span></p>";
                        
                        // Verifica operações adicionais selecionadas
                        if(isset($_GET['operacoes'])) {
                            echo "<div class='operacoes-adicionais'>";
                            echo "<h3><i class='fas fa-plus-circle'></i> Operações Adicionais</h3>";
                            
                            $operacoes = $_GET['operacoes'];
                            foreach($operacoes as $operacao) {
                                switch($operacao) {
                                    case 'dobro':
                                        $resultado = $numero * 2;
                                        echo "<p><i class='fas fa-times'></i> Dobro: <span class='destaque'>$resultado</span></p>";
                                        break;
                                    case 'triplo':
                                        $resultado = $numero * 3;
                                        echo "<p><i class='fas fa-times'></i> Triplo: <span class='destaque'>$resultado</span></p>";
                                        break;
                                    case 'quadrado':
                                        $resultado = $numero * $numero;
                                        echo "<p><i class='fas fa-superscript'></i> Quadrado: <span class='destaque'>$resultado</span></p>";
                                        break;
                                }
                            }
                            echo "</div>";
                        }
                    } else {
                        echo "<p class='erro'><i class='fas fa-exclamation-triangle'></i> Por favor, digite um número válido!</p>";
                    }
                } else {
                    echo "<p class='erro'><i class='fas fa-exclamation-triangle'></i> Nenhum número foi recebido!</p>";
                }
                ?>
            </div>
            <div class="botoes">
                <button class="botao" onclick="window.print()"><i class="fas fa-print"></i> Imprimir</button>
               <a href="http://localhost/Antecessor_projeto/formulario.html" class="botao">
    <i class="fas fa-home"></i> Voltar
</a>
            </div>
        </main>
    </div>

    <footer>
        <div class="footer-content">
            <p>&copy; 2025 - Todos os direitos reservados</p>
            <p>Desenvolvido por Tatiana Kami</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>
    <script>
        // Mostra confetti 
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof confetti === 'function') {
                confetti({
                    particleCount: 100,
                    spread: 70,
                    origin: { y: 0.6 }
                });
            }
        });
    </script>
</body>
</html>