<?php


class GetDatas
{

    private $alphabetArray;
    private $alphabetString;

    public function __construct()
    {
        $this->alphabetString = (new Alphabet)->getAlphabetString();
    }

    /**
     * @return mixed
     */
    public function getAlphabetArray($string)
    {
        return $this->alphabetArray = str_split($string);

    }





}