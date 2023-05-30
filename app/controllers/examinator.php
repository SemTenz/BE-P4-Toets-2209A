<?php

class examinator extends BaseController
{
    private $examinatorModel;

    public function __construct()
    {
        $this->examinatorModel = $this->model('examinatorModel');
    }

    public function overzichtexaminator()
    {
        $result = $this->examinatorModel->getexaminator();

        //  var_dump($result);
        $rows = "";
        foreach ($result as $examinator) {
            $rows .= "<tr>
                        <td>$examinator->Voornaam</td>
                        <td>$examinator->Datum</td>
                        <td>$examinator->Rijbewijscategorie</td>
                        <td>$examinator->Rijschool</td>  
                        <td>$examinator->Stad</td>
                        <td>$examinator->UitslagExamen</td>       
                      </tr>";
        }
        
        $data = [
            'title' => 'Overzicht examinator',
            'rows' => $rows
        ];

        $this->view('examinator/overzichtexaminator', $data);
    }
}