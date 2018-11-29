<?php

namespace Portal\Models;

class ApplicationFormModel
{
    private $db;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    /**
     * Gets all the cohorts from the database.
     * 
     * @return array $result is data from cohorts fields.
     */
    public function getCohorts() {
        $query = $this->db->prepare('SELECT `id`, `date` FROM `cohorts`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }

    /**
     * Gets all the hear about options from the database.
     *
     * @return array $result is data from hearAbout fields.
     */
    public function getHearAbout() {
        $query = $this->db->prepare('SELECT `id`, `hearAbout` FROM `hearAbout`;');
        $query->execute();
        $result = $query->fetchAll();
        return $result;
    }
}
