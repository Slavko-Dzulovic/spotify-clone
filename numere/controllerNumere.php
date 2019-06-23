<?php
require_once '../numere/DAONumere.php';

    class controllerNumere
    {
        function gotoDash()
        {
            $dao = new DAONumere();
            $numera = $dao->getNumeraById(1);

            include '../numere/viewDashboard.php';
        }
    }

?>