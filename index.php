<?php
include "model/pdo.php";
include "model/danhmuc.php";
include "model/sanpham.php";
include "views/header.php";
include "global.php";

$spnew=loadall_sanpham_home();
$dsdm=loadall();
$dstop10=loadall_sanpham_top10();

if((isset($_GET['act']))&&($_GET['act']!="")){
    $act=$_GET['act'];
    switch($act){
        case 'sanpham':
            if(isset($_POST['kyw'])&&($_POST['kyw']!="")){
                $kyw=$_POST['kyw'];
            }else{
                $kyw = "";
            }
            if(isset($_GET['iddm'])&&($_GET['iddm']>0)){
                $iddm=$_GET['iddm'];                
            }else{
                $iddm = 0;
            }
            
            $dssp = loadall_sanpham($kyw,$iddm);
            $tendm= load_ten_dm($iddm);
            include "views/sanpham.php";
            break;
        case 'sanphamct':
            
            if(isset($_GET['idsp'])&&($_GET['idsp']>0)){
                $id=$_GET['idsp'];                
                $onesp=loadone_sanpham($id);
                extract($onesp);

                $sp_cung_loai = load_sanpham_cungloai($id,$iddm);

                include "views/sanphamct.php";
            }else{
                include "views/home.php";
            }
            
            break;
        case 'gioithieu':
            include "views/gioithieu.php";
            break;
        case 'lienhe':
            include "views/lienhe.php";
            break;
        default:
        include "views/home.php";
            break;
    }
}else{
include "views/home.php";
}
include "views/footer.php";
?>