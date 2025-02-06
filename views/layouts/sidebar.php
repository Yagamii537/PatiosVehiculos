<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$usuario = $_SESSION["usuario"] ?? null; // Si no hay sesión, la variable será null
?>

<div class="d-flex flex-column flex-shrink-0 p-3 bg-white shadow" style="width: 250px; height: 100vh; position: fixed;">
    <h5 class="text-center">
        <i class="fas fa-user"></i> <?php echo htmlspecialchars($usuario["nombre"]); ?>
    </h5>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/gestionpatios/dashboard" class="nav-link active">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
        </li>
        <li>
            <a href="/gestionpatios/vehiculos" class="nav-link text-dark">
                <i class="fas fa-car"></i> Vehículos
            </a>
        </li>
        <li>
            <a href="/gestionpatios/infracciones" class="nav-link text-dark">
                <i class="fas fa-exclamation-triangle"></i> Infracciones
            </a>
        </li>
        <li>
            <a href="/gestionpatios/registros" class="nav-link text-dark">
                <i class="fas fa-clipboard-list"></i> Registros
            </a>
        </li>
        <li>
            <a href="/gestionpatios/marcas" class="nav-link text-dark">
                <i class="fas fa-tags"></i> Marcas
            </a>
        </li>
        <li>
            <a href="/gestionpatios/modelos" class="nav-link text-dark">
                <i class="fas fa-car-side"></i> Modelos
            </a>
        </li>
        <li>
            <a href="/gestionpatios/propietarios" class="nav-link text-dark">
                <i class="fas fa-users"></i> Propietarios
            </a>
        </li>
        <li>
            <a href="/gestionpatios/patios" class="nav-link text-dark">
                <i class="fas fa-warehouse"></i> Patios
            </a>
        </li>
    </ul>
</div>