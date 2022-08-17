<?php
include('conexaobd.php');
$conexão = conectarbd();
$query = mysqli_query($stringBusca);
$result_count = mysqli_num_rows($query);

echo '<div class="right"><b><u>'.number_format($result_count).'</u></b> results found</div>';
echo 'Your search for <i>"'.$display_words.'"</i><hr />';

?>