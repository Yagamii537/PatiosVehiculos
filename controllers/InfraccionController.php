<?php
require_once __DIR__ . "/../models/Infraccion.php";

class InfraccionController
{
    private $infraccionModel;

    public function __construct()
    {
        $this->infraccionModel = new Infraccion();
    }

    public function index()
    {
        $infracciones = $this->infraccionModel->getAll();
        require_once __DIR__ . "/../views/infracciones/index.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../views/infracciones/create.php";
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $descripcion = $_POST["descripcion"];
            $multa = $_POST["multa"];

            $this->infraccionModel->insert($descripcion, $multa);
            header("Location: /gestionpatios/infracciones");
            exit();
        }
    }

    public function edit()
    {
        $id = $_GET["id"] ?? null;
        if (!$id) {
            header("Location: /gestionpatios/infracciones");
            exit();
        }

        $infraccion = $this->infraccionModel->getById($id);
        require_once __DIR__ . "/../views/infracciones/edit.php";
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $descripcion = $_POST["descripcion"];
            $multa = $_POST["multa"];

            $this->infraccionModel->update($id, $descripcion, $multa);
            header("Location: /gestionpatios/infracciones");
            exit();
        }
    }

    public function delete()
    {
        $id = $_GET["id"] ?? null;
        if ($id) {
            $this->infraccionModel->delete($id);
        }
        header("Location: /gestionpatios/infracciones");
        exit();
    }
}
