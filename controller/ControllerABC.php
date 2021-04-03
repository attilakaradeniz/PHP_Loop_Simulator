<?php


class ControllerABC
{
    private $alphabetData;
    private $dataABC;
    private $alphabetString;
    private $alphabetArray;
    private $loopType;
    private $error;
    private $loopResult = [];
    private $view;

    public function __construct()
    {
        $this->view = new View();
        $this->dataABC = new GetDatas();
        $this->alphabetData = new Alphabet();
        $this->alphabetString = $this->alphabetData->getAlphabetString();
        $this->alphabetArray = $this->dataABC->getAlphabetArray($this->alphabetString);
    }

    public function route()
    {
        if (isset($_GET['loopType'])) {
            //echo " TEST: you are in if isset     "; // TEST
            $this->loopType = strtoupper($_GET['loopType']);
        } else {
            echo 'try again';
            // (new View)->output($this->error);
        }
    }

    public function loops()
    {
        switch ($this->loopType) {
            case "REVERSE" :
                foreach ($this->alphabetArray as $letter) {
                    array_unshift($this->loopResult, $letter);
                }
                //echo json_encode($this->loopResult); // TEST
                break;
            case "EVEN" :
                for ($i = 0; $i < count($this->alphabetArray); $i++) {
                    if (($i + 1) % 2 == 0) {
                        array_push($this->loopResult, $this->alphabetArray[$i]);
                    }
                }
                //echo json_encode($this->loopResult); // TEST
                break;
            case "UNTIL" :
                $counter = 0;
                $until = strtoupper($_GET['until']);
                while (end($this->loopResult) != $until){
                    array_push($this->loopResult, $this->alphabetString[$counter]);
                    $counter++;
                }

        }
    }

// this block needs one more (or couples) if check(s) for all user-enter possibilities
    public function sendResult()
    {
        if(isset($_GET['loopType'])) {
            $send = new stdClass();
            $send->loopType = $this->loopType;
            $send->result = $this->loopResult;
            $this->view->output($send);
        } else {
            echo ' :( ';
        }
    }

//    also this block needs if checks
//    public function sendResult()
//    {
//        if(!isset($_GET['loopType'])){
//            echo ' :( ';
//        } else {
//            $send = new stdClass();
//            $send->loopType = $this->loopType;
//            $send->result = $this->loopResult;
//            $this->view->output($send);
//        }
//    }

    /**
     * @return mixed
     */
    public function getError()
    {
        return $this->error;
    }


}

