<?php
require_once "BaseController.php";
require_once __DIR__ . "/../models/Marca.php";

class MarcaController extends BaseController
{
    public function index()
    {
        $marcaModel = new Marca();
        $marcas = $marcaModel->getAll();
        $this->view("marcas/index", ["marcas" => $marcas]);
    }

    public function create()
    {
        $this->view("marcas/create");
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $nombre = $_POST["nombre"];

            $marcaModel = new Marca();
            $marcaModel->insert($nombre);

            header("Location: /gestionpatios/marcas");
            exit();
        }
    }

    public function edit()
    {
        if (!isset($_GET["id"])) {
            echo "Error: No se proporcionó un ID válido.";
            return;
        }

        $id = $_GET["id"];
        $marcaModel = new Marca();
        $marca = $marcaModel->getById($id);

        if (!$marca) {
            echo "Error: Marca no encontrada.";
            return;
        }

        $this->view("marcas/edit", ["marca" => $marca]);
    }

    public function update()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $id = $_POST["id"];
            $nombre = $_POST["nombre"];

            $marcaModel = new Marca();
            $marcaModel->update($id, $nombre);

            header("Location: /gestionpatios/marcas");
            exit();
        }
    }

    public function delete()
    {
        if (!isset($_GET["id"])) {
            echo "Error: No se proporcionó un ID válido.";
            return;
        }

        $id = $_GET["id"];
        $marcaModel = new Marca();
        $marcaModel->delete($id);

        header("Location: /gestionpatios/marcas");
        exit();
    }
}
