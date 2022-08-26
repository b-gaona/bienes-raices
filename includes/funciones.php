<?php

function autenticado()
{
  if (!isset($_SESSION)) {
    session_start();
  }
  if (!isset($_SESSION["login"]) || !$_SESSION["login"]) {
    header("Location: /public/login");
  }
}

//Escapar el HTML y sanitizarlo, esto es para que no ponga codigo malicioso en el html
function sanitizar($html){
  return htmlspecialchars($html);
}
