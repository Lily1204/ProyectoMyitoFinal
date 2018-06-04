<?php
/*************************************************************/
/* Archivo:  error.php
 * Objetivo: manejo de errores
 * Autor: Liliana Rosas   
 *************************************************************/
include_once("../Public/views/header.html");

?>
        <section>
			<h1>Error</h1>
			<h4><?php echo((isset($_REQUEST["sError"]))? $_REQUEST["sError"]: "Otro error"); ?></h4>
			<?php
				if (isset($_SESSION["oUsu"])){
			?>
				<a href="../Public/views/login.php">Regresar al inicio</a>
			<?php
				}else{
			?>
				<a href="../Public/views/login.php">Regresar al inicio</a>
			<?php
				}
			?>
		</section>
<?php
include_once("../Public/views/foother.html");
?>