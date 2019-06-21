<?php
header('Access-Control-Allow-Origin: *');
require_once './DAONumere.php';

    class controllerNumere
    {
        function gotoDash()
        {
            $dao = new DAONumere();
            $numera = $dao->getNumeraById(1);
            include './viewDashboard.php';
        }
    }

?>