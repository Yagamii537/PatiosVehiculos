<?php
require_once __DIR__ . "/../models/Propietario.php";

class PropietarioController
{
    private $propietarioModel;

    public function __construct()
    {
        $this->propietarioModel = new Propietario();
    }

    public function index()
    {
        $propietarios = $this->propietarioModel->getAll();
        require_once __DIR__ . "/../views/propietarios/index.php";
    }

    public function create()
    {
        require_once __DIR__ . "/../views/propietarios/create.php";
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $cedula = $_POST["cedula"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $this->propietarioModel->insert($cedula, $nombre, $apellido, $telefono, $email);
            header("Location: /gestionpatios/propietarios");
            exit();
        }
    }

    public function edit()
    {
        $cedula = $_GET["cedula"] ?? null;
        if (!$cedula) {
            header("Location: /gestionpatios/propietarios");
            exit();
        }

        $propietario = $this->propietarioModel->getById($cedula);
        require_once __DIR__ . "/../views/propietarios/edit.php";
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $cedula = $_POST["cedula"];
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $telefono = $_POST["telefono"];
            $email = $_POST["email"];

            $this->propietarioModel->update($cedula, $nombre, $apellido, $telefono, $email);
            header("Location: /gestionpatios/propietarios");
            exit();
        }
    }

    public function delete()
    {
        $cedula = $_GET["cedula"] ?? null;
        if ($cedula) {
            $this->propietarioModel->delete($cedula);
        }
        header("Location: /gestionpatios/propietarios");
        exit();
    }
}
