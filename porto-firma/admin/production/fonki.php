<?php 

    ob_start();
    session_start();

    function fonki($f)
    {
        $tr = array('ş','Ş','ı','I','İ','ğ','Ğ','ü','Ü','ö','Ö','ç','Ç','(',')','/',' ',',','?');
        $eng = array('s','s','i','i','i','g','g','u','u','o','o','c','c','','','-','-','','');
        $f = str_replace($tr,$eng,$f);
        $f = strtolower($f);
        $f = preg_replace('/&amp;amp;amp;amp;amp;amp;amp;amp;amp;.+?;/', '', $f);
        $f = preg_replace('/\s+/', '-', $f);
        $f = preg_replace('|-+|', '-', $f);
        $f = preg_replace('/#/', '', $f);
        $f = str_replace('.', '', $f);
        $f = trim($f, '-');
        return $f;
    }

    function tcevir($tarih)
    {
        $tr = explode("-",$tarih);
        $tarih1 = $tr[2]."-".$tr[1]."-".$tr[0];
        return $tarih1;
    }

?>