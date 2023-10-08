<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
      ol, ul { 
      list-style-type: none;
      }
    </style>
    <title>Formulario</title>
</head>
<body>
    <h1>Datos Personales</h1>

    <form id="miFormulario" onsubmit="validarFormulario(event)" method="post">
        <fieldset>
            <legend>Actualiza los datos personales de esta persona:</legend>
            <ul>
                <li><label>Nombre:</label> <input type="text" name="nombre" value="<?= isset($_POST['nombre']) ? $_POST['nombre'] : (isset($_GET['nombre']) ? $_GET['nombre'] : '') ?>"></li>
                <li><label>Edad:</label> <input type="text" name="edad" value="<?= isset($_POST['edad']) ? $_POST['edad'] : (isset($_GET['edad']) ? $_GET['edad'] : '') ?>"></li>
            </ul>
        </fieldset>
        <p>
            <input type="submit" value="ENVIAR">
        </p>
    </form>

    <script>
        function validarFormulario(event) {
            var nombre = document.getElementById("miFormulario").elements["nombre"].value;
            var edad = document.getElementById("miFormulario").elements["edad"].value;

            if (nombre === "" || edad === "") {
                alert("Por favor, complete todos los campos.");
                event.preventDefault();
            }
        }
    </script>
</body>
</html>
