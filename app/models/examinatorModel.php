<?php

class examinatorModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getexaminator()
    {
        $sql = "SELECT
                      Voornaam
                      ,Datum
                      ,Rijbewijscategorie
                      ,Rijschool
                      ,Stad
                      ,UitslagExamen
                FROM  examinator, overzicht";

        $this->db->query($sql);
        return $this->db->resultSet();
    }
}