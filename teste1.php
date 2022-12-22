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
