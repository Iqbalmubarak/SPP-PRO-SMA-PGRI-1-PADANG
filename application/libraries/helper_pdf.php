<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

    function pdf_create($html, $filename='', $stream=TRUE, $paper = 'A4', $orientation = 'portrait')
    {
        require_once("libraries/dompdf/autoload.inc.php");
        $dompdf = new Dompdf();
        $dompdf->load_html($html);
        $dompdf->set_paper($paper, $orientation);

        $dompdf->render();
        if ($stream) {
            $dompdf->stream($filename.'.pdf', array("Attachment" => 0));
        } else {
            return $dompdf->output();
        }
    }