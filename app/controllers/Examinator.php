<?php

class Examinator extends BaseController
{
    private $examinatorModel;

    public function __construct()
    {
        $this->examinatorModel = $this->model('ExaminatorModel');
    }

    public function overzichtExaminator()
    {
        $result = $this->examinatorModel->getExaminator();

        $rows = "";
        foreach ($result as $examinator) {
            $date = date_create($examinator->DatumInDienst);
            $formatted_date = date_format($date, 'd-m-Y');

            $rows .= "<tr>
                        <td>$examinator->Voornaam</td>
                        <td>$examinator->Tussenvoegsel</td>
                        <td>$examinator->Achternaam</td>
                        <td>$examinator->Mobiel</td>
                        <td>$formatted_date</td>            
                        <td>$examinator->AantalSterren</td>            
                        <td>
                            <a href='" . URLROOT . "/examinator/overzichtexamen/$examinator->Id'>
                                <i class='bi bi-car-front'></i>
                            </a>
                        </td>            
                      </tr>";
        }
        
        $data = [
            'title' => 'Overzicht afgenomen examens examinatoren',
            'rows' => $rows
        ];

        $this->view('Examinator/overzichtexaminator', $data);
    }

    public function overzichtExamen($Id)
    {
        $examinatorInfo = $this->examinatorModel->getExaminatorById($Id);
        $naam = $examinatorInfo->Voornaam . " " . $examinatorInfo->Tussenvoegsel . " " . $examinatorInfo->Achternaam;
        $datumInDienst = $examinatorInfo->DatumInDienst;
        $aantalSterren = $examinatorInfo->AantalSterren;

        $result = $this->examinatorModel->getToegewezenExamen($Id);

        $tableRows = "";
        if (empty($result)) {
            $tableRows = "<tr>
                            <td colspan='6'>No assigned vehicles</td>
                          </tr>";
        } else {
            foreach ($result as $examen) {
                $date_formatted = date_format(date_create($examen->Bouwjaar), 'd-m-Y');

                $tableRows .= "<tr>
                                    <td>$examen->TypeVoertuig</td>
                                    <td>$examen->Type</td>
                                    <td>$examen->Kenteken</td>
                                    <td>$date_formatted</td>
                                    <td>$examen->Brandstof</td>
                                    <td>$examen->RijbewijsCategorie</td>            
                            </tr>";
            }
        }
        
        $data = [
            'title' => '',
            'tableRows' => $tableRows,
            'naam' => $naam,
            'datumInDienst' => $datumInDienst,
            'aantalSterren' => $aantalSterren
        ];

        $this->view('Examinator/overzichtExamens', $data);
    }
}