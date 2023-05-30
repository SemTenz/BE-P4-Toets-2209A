<?php

class ExamenModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getExamen()
    {
        $sql = "SELECT Id
                      ,StudentId
                      ,Rijschool
                      ,Stad
                      ,Rijbewijscategorie
                      ,Datum
                      ,Uitslag
                      ,IsActief
                      ,DatumAangemaakt
                      ,DatumGewijzigd
                      ,Opmerkingen
                FROM  Examen
                ORDER BY StudentId DESC";

        $this->db->query($sql);
        return $this->db->resultSet();
    }

    public function getExamenById($Id)
    {
        $sql = "SELECT Id
        ,StudentId
        ,Rijschool
        ,Stad
        ,Rijbewijscategorie
        ,Datum
        ,Uitslag
        ,IsActief
        ,DatumAangemaakt
        ,DatumGewijzigd
        ,Opmerkingen
        FROM  Examen
                WHERE Id = $Id";

        $this->db->query($sql);

        return $this->db->single();
    }
}