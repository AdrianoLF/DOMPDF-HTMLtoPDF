<?php
require_once('vendor/autoload.php');

use Dompdf\Dompdf;
use Dompdf\Options;

// Ativando leitura de links externos
$options = new Options();
$options->setChroot(__DIR__);
// Permite pegar imagens da internet
$options->set('isRemoteEnabled', true);
$options->set('isHtml5ParserEnabled', true);
$dompdf = new Dompdf($options);

// Arquivo HTML
$content = file_get_contents('htmldoc.html');
$content .= ' 
<!-- CORPO DO DOCUMENTO -->
    <br> <br> <br> <br> <br>
    <div class="content-questions">
        <div class="header"></div>
        <h1 class="tittle-site">1 - Teste de HTML no PDF</h1>
        <p class="exercise-paragraph">Lorem ipsum dolor sit amet consectetur adipisicing elit. At distinctio
            reprehenderit ipsa quidem laborum, ut consequatur dolores molestias, aspernatur labore, quibusdam quo
            qui mollitia excepturi cum praesentium neque quae id?</p>
        <img class="img"
            src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/b7/b3/eb/caption.jpg?w=1200&h=-1&s=1"
            ; alt="">
    </div>

    <!-- RODAPÉ -->
    <div class="footer">
        <div>
            <div style="text-align: center;"><a href="#">asdoiasdjioasjdasj</a></div>
            <div class="black-line-answer" style="width: 80%; margin: 0 auto;"></div>
            <p>2</p>
        </div>
    </div>
</div>    
a';
$dompdf->loadHtml($content);

// Tamanho da página e orientação
$dompdf->setPaper('A4', 'portrait');

// Renderiza e geraPDF
function geradorpdf()
{
    global $dompdf;
    $dompdf->render();

    // Chamando CSS para o PDF
    $dompdf->setBasePath('./assets/custom.css');

    // parametros: NOME / SE VAI BAIXAR OU PRÉVIA
    $dompdf->stream("teste", array("Attachment" => 0));
}

if (isset($_GET['active']) && $_GET['active'] == true) {
    geradorpdf();
}
?>

<head>
    <title>PDF-GERADOR</title>
</head>

<body>
    <script>
        function att_page() {
            var url = new URL(window.location.href.toString());
            url.searchParams.set('active', true);
            window.location.href = url.href;
        }
    </script>

    <p>Clique no botão para baixar</p>
    <a href="http://localhost:8000/teste1.php?active=true" target="_blank" rel="noopener noreferrer">CLICAR</a>
</body>