<?php

namespace Nemundo\Document;

class PdfDocument
{


    private function load() {

        require(__DIR__.'/../lib/fpdf/fpdf.php');

        /*$filename = (new \Nemundo\Project\Path\TmpPath())
            ->addPath('report.pdf')
            ->getFullFilename();*/

        $fontFilename = (new \Nemundo\Project\Path\TmpPath())
            ->addPath('Villa.php')
            ->getFullFilename();

        $filename = (new \Nemundo\Project\Path\TmpPath())
            ->addPath('report.pdf')
            ->getFullFilename();

        $imgFilename = (new \Nemundo\Project\Path\TmpPath())
            ->addPath('report.jpg')
            ->getFullFilename();


        $pdf = new FPDF();
        $pdf->AddPage('L',[200,100]);

        $pdf->AddFont('Villa','',$fontFilename);

        $logoFilename =  (new \Nemundo\Project\Path\TmpPath())
            ->addPath('logo.png')
            ->getFullFilename();

//$pdf->Image($logoFilename,0,0);

        $pdf->SetFillColor(132, 158, 219);
        $pdf->Rect(10,0, 100,150,'F');
        $pdf->SetTitle('Referendum',true);

        $pdf->SetFont('Arial','',12);
        $pdf->Write(0,'Referendum');
        $pdf->Text(0,50,'Hello');

        $pdf->Ln();





        /*
        $pdf->SetFont('Arial','B',12);
        //$pdf->Cell(40,10,'Hello World!');

        $pdf->Write(20,'Die unterzeichnenden stimmberechtigten Schweizer Bürgerinnen und Bürger verlangen, gestützt auf Art. 141 der Bundesverfassung und nach dem Bundesgesetz vom 17. Dezember 1976 über die politischen Rechte, Art. 59a-66, dass
        die Änderung vom 16. Dezember 2022 des Bundesgesetzes über die gesetzlichen Grundlagen für Verordnungen des Bundesrates zur Bewältigung der Covid 19-Epidemie (Covid-19 Gesetz) der Volksabstimmung unterbreitet werde.');

        $pdf->Ln();

        $pdf->Cell(40,10,'Kanton',1);
        $pdf->Cell(40,10,'PLZ',1);
        $pdf->Cell(40,10,'Politische Gemeinde',1);


        $pdf->Ln(10);

        $pdf->Cell(40,10,'Name',1);
        $pdf->Cell(40,10,'Vorname',1);
        $pdf->Cell(40,10,'Strasse',1);
        $pdf->Cell(40,10,'Geburtsdatum',1);
        $pdf->Cell(40,10,'Unterschrift',1);

        $pdf->Ln();

        $loop = new \Nemundo\Core\Structure\ForLoop();
        $loop->minNumber=1;
        $loop->minNumber=5;
        foreach ($loop->getData() as $number) {

            $pdf->Cell(40,10,'',1);
            $pdf->Cell(40,10,'',1);
            $pdf->Cell(40,10,'',1);
            $pdf->Cell(40,10,'',1);
            $pdf->Cell(30,10,'',1);

        }

        */




        /*
        Auf dieser Liste können nur Stimmberechtigte unterzeichnen, die in der genannten politischen Gemeinde in eidgenössischen Angelegenheiten
        stimmberechtigt sind. Bürgerinnen und Bürger, die das Begehren unterstützen, mögen es handschriftlich unterzeichnen.
        Wer bei einer Unterschriftensammlung besticht oder sich bestechen lässt oder wer das Ergebnis einer Unterschriftensammlung für ein Referendum
        fälscht, macht sich strafbar nach Art. 281 beziehungsweise nach Art. 282 des Strafgesetzbuches.*/




        $pdf->Output('F', $filename);



    }




}