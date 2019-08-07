<?php

require_once 'ControllerAutori.php';

$action = isset($_REQUEST['action'])? $_REQUEST['action'] : "";

switch ($_SERVER['REQUEST_METHOD'])
{
    case 'GET':
        switch ($action)
        {
            case "listAllAuthors":
                $ca = new ControllerAutori();
                $ca->listAllAuthors();
                break;

            case "goAddAuthor":
                header("Location: ../autori/addNewAuthor.php");
                break;
        }
        break;

    case 'POST':
        switch ($action)
        {
            case "Sacuvaj autora":
                $ca = new ControllerAutori();
                $ca->unesiAutora();
                break;
        }
        break;
}
?>