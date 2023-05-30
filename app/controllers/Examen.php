<?php

class Examen extends BaseController
{
    private $examenModel;

    public function __construct()
    {
        $this->examenModel = $this->model('ExamenModel');
    }

    public function overzichtExamen()
    {
        $result = $this->examenModel->getExamen();

        $rows = "";
        foreach ($result as $examen) {
            $date = date_create($examen->DatumInDienst);
            $formatted_date = date_format($date, 'd-m-Y');

            $rows .= "<tr>
                        <td>$examen->Voornaam</td>
                        <td>$examen->Tussenvoegsel</td>
                        <td>$examen->Achternaam</td>
                        <td>$examen->Mobiel</td>
                        <td>$formatted_date</td>            
                        <td>$examen->AantalSterren</td>            
                        <td>
                            <a href='" . URLROOT . "/Examen/overzichtExamen/$examen->Id'>
                                <i class='bi bi-car-front'></i>
                            </a>
                        </td>            
                      </tr>";
        }
        
        $data = [
            'title' => 'Overzicht afgenomen examens examinatoren',
            'rows' => $rows
        ];

        $this->view('Examen/overzichtExamen', $data);
    }

    public function overzichtExaminator($Id)
    {
        $examenInfo = $this->examenModel->getExamenById($Id);
        $naam = $examenInfo->Voornaam . " " . $examenInfo->Datum . " " . $examenInfo->RijbewijsCategorie;
        $datumInDienst = $examenInfo->DatumInDienst;
        $aantalSterren = $examenInfo->AantalSterren;

        $result = $this->examenModel->getToegewezenExaminator($Id);

        $tableRows = "";
        if (empty($result)) {
            $tableRows = "<tr>
                            <td colspan='6'>No assigned examinator</td>
                          </tr>";
        } else {
            foreach ($result as $examen) {
                $date_formatted = date_format(date_create($examen->Datum), 'd-m-Y');

                $tableRows .= "<tr>
                                    <td>$examen->Voornaam</td>
                                    <td>$examen->Datum</td>
                                    <td>$examen->RijbewijsCategorie</td>
                                    <td>$date_formatted</td>
                                    <td>$examen->Rijschool</td>
                                    <td>$examen->Stad</td>            
                                    <td>$examen->Uitslag</td>
                            </tr>";
            }
        }
        
        $data = [
            'title' => 'Examen',
            'tableRows' => $tableRows,
            'naam' => $naam,
            'datumInDienst' => $datumInDienst,
            'aantalSterren' => $aantalSterren
        ];

        $this->view('Examen/overzichtExamen', $data);
    }
}