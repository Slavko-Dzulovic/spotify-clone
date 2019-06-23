<?php
require_once '../numere/DAONumere.php';

    class controllerNumere
    {
        function gotoDash()
        {
            $dao = new DAONumere();
            $numere = $dao->getAllNumere();

            include '../numere/viewDashboard.php';
        }
    }

?>