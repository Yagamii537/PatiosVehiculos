<?php
require_once __DIR__ . "/../models/Patio.php";

class PatioController
{
    private $patioModel;

    public function __construct()
    {
        $this->patioModel = new Patio();
    }

    public function index()
    {
        $patios = $this->patioModel->getAll();
        require_once __DIR__ . "/../views/patios/index.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../views/patios/create.php";
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $codigo = $_POST["codigo"];
            $direccion = $_POST["direccion"];
            $capacidad = $_POST["capacidad"];

            $this->patioModel->insert($codigo, $direccion, $capacidad);
            header("Location: /gestionpatios/patios");
            exit();
        }
    }

    public function edit()
    {
        $id = $_GET["id"] ?? null;
        if (!$id) {
            header("Location: /gestionpatios/patios");
            exit();
        }

        $patio = $this->patioModel->getById($id);
        require_once __DIR__ . "/../views/patios/edit.php";
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $codigo = $_POST["codigo"];
            $direccion = $_POST["direccion"];
            $capacidad = $_POST["capacidad"];

            $this->patioModel->update($id, $codigo, $direccion, $capacidad);
            header("Location: /gestionpatios/patios");
            exit();
        }
    }

    public function delete()
    {
        $id = $_GET["id"] ?? null;
        if ($id) {
            $this->patioModel->delete($id);
        }
        header("Location: /gestionpatios/patios");
        exit();
    }
}
