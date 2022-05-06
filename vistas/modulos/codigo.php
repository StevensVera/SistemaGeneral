<?php
$html = '';
$conexion = new mysqli('localhost', 'root', 'itai12345', 'sistemaitaiinformes');

$id_category = $_POST['id'];

$result = $conexion->query(
    "SELECT id, codigo FROM usuarios 
     WHERE id = ".$id_category.""
);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {                
        $html .= '<option value="'.$row['codigo'].'" >'.$row['codigo'].'</option>';
    }
}
echo $html;
?>