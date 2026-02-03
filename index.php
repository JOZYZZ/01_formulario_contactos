<?php
$mensaje = "Proyecto PHP funcionando correctamente";

// Valores por defecto (para que existan aunque no se envíe el form)
$nombre = "";
$email = "";
$mensaje_usuario = "";

// Errores
$errores = [];

// ¿Se envió el formulario?
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // 1) Capturamos y limpiamos (trim quita espacios al inicio/fin)
    $nombre = trim($_POST["nombre"] ?? "");
    $email = trim($_POST["email"] ?? "");
    $mensaje_usuario = trim($_POST["mensaje"] ?? "");

    // 2) Validaciones
    if ($nombre === "") {
        $errores[] = "El nombre es obligatorio.";
    }

    if ($email === "") {
        $errores[] = "El correo es obligatorio.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo no tiene un formato válido.";
    }

    if ($mensaje_usuario === "") {
        $errores[] = "El mensaje es obligatorio.";
    }

    // 3) Si no hay errores, acá en el futuro procesamos (guardar, enviar mail, etc.)
    if (count($errores) === 0) {
        // Por ahora solo confirmamos
        $mensaje_ok = "✅ Formulario válido. Listo para procesar.";
    }
}
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Proyecto 01 - Formulario de Contacto</title>
</head>
<body>

    <header>
        <h1><?php echo $mensaje; ?></h1>
        <p>Formulario de contacto básico con PHP</p>
    </header>

    <?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>

    <section>
        <h2>Datos recibidos</h2>
        <p><strong>Nombre:</strong> <?php echo $nombre; ?></p>
        <p><strong>Email:</strong> <?php echo $email; ?></p>
        <p><strong>Mensaje:</strong> <?php echo $mensaje_usuario; ?></p>
    </section>

<?php endif; ?>

<?php if ($_SERVER["REQUEST_METHOD"] === "POST") : ?>

    <?php if (!empty($errores)) : ?>
        <section>
            <h2>Errores</h2>
            <ul>
                <?php foreach ($errores as $error) : ?>
                    <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        </section>
    <?php else : ?>
        <section>
            <h2>Éxito</h2>
            <p><?php echo $mensaje_ok; ?></p>
        </section>
    <?php endif; ?>

<?php endif; ?>


    <main>
        <form method="post" action="">
            
            <div>
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
            </div>

            <br>

            <div>
                <label for="email">Correo electrónico</label><br>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">

            </div>

            <br>

            <div>
                <label for="mensaje">Mensaje</label><br>
                <textarea id="mensaje" name="mensaje"><?php echo $mensaje_usuario; ?></textarea>

            </div>

            <br>

            <button type="submit">Enviar</button>

        </form>
    </main>

    <footer>
        <p>Proyecto 01 - Aprendiendo PHP paso a paso</p>
    </footer>

</body>

</html>
