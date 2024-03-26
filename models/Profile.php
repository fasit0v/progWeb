<?php

class Profile
{

    private int $idProfile;
    private string $nameProfile;

    public function setIdProfile($idProfile)
    {
        $this->idProfile = $idProfile;
    }

    public function getIdProfile()
    {
        return $this->idProfile;
    }

    public function setNameProfile($nameProfile)
    {
        $this->nameProfile = $nameProfile;
    }

    public function getNameProfile()
    {
        return $this->nameProfile;
    }

}