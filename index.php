<?php
// Esto es PHP y se ejecuta en el servidor
$mensaje = "Proyecto PHP funcionando correctamente";
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

    <main>
        <form method="post" action="">
            
            <div>
                <label for="nombre">Nombre</label><br>
                <input type="text" id="nombre" name="nombre">
            </div>

            <br>

            <div>
                <label for="email">Correo electrónico</label><br>
                <input type="email" id="email" name="email">
            </div>

            <br>

            <div>
                <label for="mensaje">Mensaje</label><br>
                <textarea id="mensaje" name="mensaje"></textarea>
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
