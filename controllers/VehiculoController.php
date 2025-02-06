<?php
require_once __DIR__ . "/../models/Vehiculo.php";
require_once __DIR__ . "/../models/Modelo.php";
require_once __DIR__ . "/../models/Propietario.php";

class VehiculoController
{
    private $vehiculoModel;
    private $modeloModel;
    private $propietarioModel;

    public function __construct()
    {
        $this->vehiculoModel = new Vehiculo();
        $this->modeloModel = new Modelo();
        $this->propietarioModel = new Propietario();
    }

    public function index()
    {
        $vehiculos = $this->vehiculoModel->getAll();
        require_once __DIR__ . "/../views/vehiculos/index.php";
    }

    public function create()
    {
        $modelos = $this->modeloModel->getAll();
        $propietarios = $this->propietarioModel->getAll();
        require_once __DIR__ . "/../views/vehiculos/create.php";
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $placa = $_POST["placa"];
            $modelo_id = $_POST["modelo_id"];
            $chasis = $_POST["chasis"];
            $cant_puertas = $_POST["cant_puertas"];
            $propietario_cedula = $_POST["propietario_cedula"];
            $estado = $_POST["estado"];

            $this->vehiculoModel->insert($placa, $modelo_id, $chasis, $cant_puertas, $propietario_cedula, $estado);
            header("Location: /gestionpatios/vehiculos");
            exit();
        }
    }

    public function edit()
    {
        $placa = $_GET["placa"] ?? null;
        if (!$placa) {
            header("Location: /gestionpatios/vehiculos");
            exit();
        }

        $vehiculo = $this->vehiculoModel->getById($placa);
        $modelos = $this->modeloModel->getAll();
        $propietarios = $this->propietarioModel->getAll();

        require_once __DIR__ . "/../views/vehiculos/edit.php";
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $placa = $_POST["placa"];
            $modelo_id = $_POST["modelo_id"];
            $chasis = $_POST["chasis"];
            $cant_puertas = $_POST["cant_puertas"];
            $propietario_cedula = $_POST["propietario_cedula"];
            $estado = $_POST["estado"];

            $this->vehiculoModel->update($placa, $modelo_id, $chasis, $cant_puertas, $propietario_cedula, $estado);
            header("Location: /gestionpatios/vehiculos");
            exit();
        }
    }

    public function delete()
    {
        $placa = $_GET["placa"] ?? null;
        if ($placa) {
            $this->vehiculoModel->delete($placa);
        }
        header("Location: /gestionpatios/vehiculos");
        exit();
    }
}
