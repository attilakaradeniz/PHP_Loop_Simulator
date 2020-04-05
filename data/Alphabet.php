<?php


class Alphabet
{
    //private $alphabetString = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    private $alphabetString;

    public function __construct()
    {

        $this->alphabetString = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    }

    /**
     * @return string
     */
    public function getAlphabetString()
    {
        return $this->alphabetString;
    }


}