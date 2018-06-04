<?php
$sOpe = ""
//require_once("../../src/front-controller/user-front.php");
?>

 <meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="../../assets/css/styleregister.css">
<script type="text/javascript" src="../../assets/js/valid.js"></script>
<body id="fondo" >
    <section>  
    <div id="div1">
        <div id="imagen"></div>
        <br>
        <h2>Tú puedes aprender cualquier cosa</h2>
        <br>
        <br>
        <h4>Es gratis. Para todo el mundo. Para siempre</h4>
    </div>
</section>
  <section>
  <form id="frm" method="post" action="../../modelo/resABC.php">
    <div id="div2">
            <input id="name1" name="nombre" placeholder="Nombre" >
            <input id="name3" name="correo"  placeholder="Correo">
            <p> Edad: <input type="number" name="edad" placeholder="18" step="1" min="18" max="25">
            <br>
            <br>
           
            <input id= "name" type="submit" onClick="resABC.php" value="Iniciar"  >
    </div>
</form>
</section>
</body>