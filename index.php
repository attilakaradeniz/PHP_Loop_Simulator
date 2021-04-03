<?php

include "config/config.php";

        $ControllerABC = new ControllerABC();
        $ControllerABC->route();
        $ControllerABC->loops();
        $ControllerABC->sendResult();
// END