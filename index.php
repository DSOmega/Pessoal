<?php if(isset($_GET['submitForm'])) {
    $handle = fopen("/storage/emulated/0/download/codes.txt", "a");
    $len = count( file( '/storage/emulated/0/download/codes.txt' ) );
    $code = $_GET['code'];
    $name = $_GET['name'];
    fwrite($handle, $code);
    fwrite($handle, "   ");
    fwrite($handle, $name);
    fwrite($handle, "\r\n");
    fclose($handle);
} 
else if(isset($_GET['lista'])) {
    $handle = fopen("/storage/emulated/0/download/codes.txt", "r");
    while (!feof ($handle)) {
        $nome = fgets($handle, 4096);
        echo $nome."<br>";
    }
    fclose($handle);
} 
else if (isset($_GET['envia'])) {
    $arquivo = strtolower               (file_get_contents('base.sql'));
    $textoBuscar = strtolower($_GET['code']);
      if(isset($_GET)) {
        if(strpos($arquivo, $textoBuscar) !== FALSE) {
          echo '<h1>Existe  ' . $_GET['code'] . ' no sistema</h1>';
        } else {
          echo '<h1>Não encontrado ' . $_GET['code'] . ' no sistema</h1>';
        }
      }
}
?>

<form action="" method="get">
 <input type="hidden" name="code" value="<?php echo $_GET['code']; ?>" />
 <p>Produto: <input type="text" name="name" style="font-family: Tahoma; font-size: 150px" /></p>
 <p>Codigo: <input type="text" name="code" style="font-family: Tahoma; font-size: 100px" /></p>
 
 <p><input type="submit" name="envia" value="consultar" style="font-family: Tahoma; font-size: 100px" /></p>
 <p><input type="submit" name="submitForm" value="cadastrar" style="font-family: Tahoma; font-size: 200px" /></p>

 <p><input type="submit" name="lista" value="lista" style="font-family: Tahoma; font-size: 80px" /></p>
</form>
<?php echo "Produtos A Exportar: $len";?>