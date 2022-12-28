<?php   

    try
    {
        $db = new PDO("mysql:host=localhost;dbname=pdofirma", "root", "");
        //echo "veri tabanı bağlantısı başarılı";
    }

    catch (PDOException $e)
    {
        //echo $e->getMessage();
        die("Hata, Veri Tabanı Bağlantısı Başarısız :(");
    }

    

?>