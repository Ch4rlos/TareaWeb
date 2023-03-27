<?php

if ($_SESSION['tipo'] == 'SE') {
?>
    <div class="container">
        <div class="row">
            <div class="mx-auto col-10 col-md-8 col-lg-6">
                <br>
                <h1>Estatus de asignaturas</h1>
                <br>
                <form action="javascript:void(0)">
                    <label for="matricula">Matricula:</label>
                    <input type="text" id="matricula" name="matricula" required>
                    <br>
                    <br>
                    <input type="button" class="btn btn-info" value="Consultar" onclick="consultarInscripcion()">
                </form>
                <br>
            </div>
        </div>
        <br>
        <br>
        <div id="resultado"></div>

        <script>
            function consultarInscripcion() {
                var objXMLHttpRequest = new XMLHttpRequest();
                objXMLHttpRequest.onreadystatechange = function() {
                    if (objXMLHttpRequest.readyState === 4) {
                        if (objXMLHttpRequest.status != 200) {
                            alert('Error Code: ' + objXMLHttpRequest.status);
                            alert('Error Message: ' + objXMLHttpRequest.statusText);
                        }
                    }
                }
                objXMLHttpRequest.onload = function() {
                    document.getElementById('resultado').innerHTML = objXMLHttpRequest.responseText;
                }
                objXMLHttpRequest.open('GET', 'consulta_inscripcion/inscripcion.php?matricula=' + document.getElementById('matricula').value, true);
                objXMLHttpRequest.send();
            }
        </script>
    <?php
} else if ($_SESSION['tipo'] == 'AL') {
    echo '<div class="container">';
    echo '<br>';
    include 'inscripcion.php';
    echo '<br>';
    echo '</div>';
} ?>

    </div>