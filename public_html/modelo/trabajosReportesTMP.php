<?php
require "conexion.php";

$tablaTemporal = '
create TEMPORARY table tmp
SELECT substring(p.id_ponencia,8,3) as num,
    p.id_ponencia,
    p.titulo_ponencia,
    concat(u.nombres_usuario," ",u.apellidos_usuario) as Ponente,
    u.email_usuario, 
    r.descripcion_revision,
    MAX(r.fecha_revision) as fecha,
    r.estatus_revision,
    ur.id_usuario_evalua
FROM ponencia p,
    usuario_revision_ponencia ur,
    revision r,
    usuario u
WHERE p.id_ponencia=ur.id_ponencia 
    AND ur.id_revision_ponencia=r.id_revision
    AND p.id_congreso="16"
    AND p.id_tipo_ponencia=2
    AND p.id_usuario_registra = u.id_usuario
group by p.id_ponencia
';

mysqli_query($conexion, $tablaTemporal);

?>