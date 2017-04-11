<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Waktu {
    public function formatDate($param,$lang="en"){
        $pec = explode(" ", $param);
        $pecah1 = explode("-",$pec[0]);
        $bulan ="";
        if($lang=="en"){
            if($pecah1[1]=='01'){
                $bulan = "Jan"; 
            }if($pecah1[1]=='02'){
                $bulan = "Feb"; 
            }if($pecah1[1]=='03'){
                $bulan = "Mar"; 
            }if($pecah1[1]=='04'){
                $bulan = "Apr"; 
            }if($pecah1[1]=='05'){
                $bulan = "May"; 
            }if($pecah1[1]=='06'){
                $bulan = "Jun"; 
            }if($pecah1[1]=='07'){
                $bulan = "Jul"; 
            }if($pecah1[1]=='08'){
                $bulan = "Aug"; 
            }if($pecah1[1]=='09'){
                $bulan = "Sep"; 
            }if($pecah1[1]=='10'){
                $bulan = "Oct"; 
            }if($pecah1[1]=='11'){
                $bulan = "Nov"; 
            }if($pecah1[1]=='12'){
                $bulan = "Des"; 
            }
        }
        if($lang=="id"){
            if($pecah1[1]=='01'){
                $bulan = "Januari"; 
            }if($pecah1[1]=='02'){
                $bulan = "Februari"; 
            }if($pecah1[1]=='03'){
                $bulan = "Maret"; 
            }if($pecah1[1]=='04'){
                $bulan = "April"; 
            }if($pecah1[1]=='05'){
                $bulan = "Mei"; 
            }if($pecah1[1]=='06'){
                $bulan = "Juni"; 
            }if($pecah1[1]=='07'){
                $bulan = "Juli"; 
            }if($pecah1[1]=='08'){
                $bulan = "Agustus"; 
            }if($pecah1[1]=='09'){
                $bulan = "September"; 
            }if($pecah1[1]=='10'){
                $bulan = "Oktober"; 
            }if($pecah1[1]=='11'){
                $bulan = "November"; 
            }if($pecah1[1]=='12'){
                $bulan = "Desember"; 
            }
        }
        $hasil = $pecah1[2]." ".$bulan." ".$pecah1[0];
        return $hasil;
    }
    public function formatDateUmum($param,$separator,$time=false,$sec=false){
        $pecah1 = explode(" ",$param);
        $pecah = explode("-",$pecah1[0]);
        if($time==false){
            $hasil = $pecah[2]."".$separator."".$pecah[1]."".$separator.$pecah[0];
        }else{
            if($sec==true){
                $hasil = $pecah[2]."".$separator."".$pecah[1]."".$separator.$pecah[0]." ".$pecah1[1];
            }else{
                $pecah3 = explode(":",$pecah1[1]);
                $hasil = $pecah[2]."".$separator."".$pecah[1]."".$separator.$pecah[0]." ".$pecah3[0].":".$pecah3[1];
            }
        }
        return $hasil;
    }
    public function formatDateTime($param,$lang=false){
        $pecah  = explode(" ",$param);
        $tgl    = $pecah[0];
        $jam    = $pecah[1];
        $pecah  = explode(":",$jam);
        $hari = $this->formatDate($tgl,$lang);
        $hasil = $hari." ".$pecah[0].":".$pecah[1];
        return $hasil;
    }
    function formatDatePlain($param){
        $cacah = explode(" ", $param);
        $pecah = explode("-", $cacah[0]);
        return $pecah['0']."".$pecah['1']."".$pecah['2'];
    }
    function formatDateDb($input){
        $pecah= explode("/",$input);
        $hasil = $pecah[2]."-".$pecah[0]."-".$pecah[1];
        return $hasil;
    }
    function formatDateView($input){
        $pecah= explode("-",$input);
        $hasil = $pecah[1]."/".$pecah[2]."/".$pecah[0];
        return $hasil;
    }
    function formatJam($input){
        $pecah= explode(":",$input);
        $hasil = $pecah[0].":".$pecah[1];
        return $hasil;
    }
    function dayengtoind($input){
        if($input=="Mon"){
            return "Sen";   
        }
        if($input=="Tue"){
            return "Sel";   
        }
        if($input=="Wed"){
            return "Rab";   
        }
        if($input=="Thu"){
            return "Kam";   
        }
        if($input=="Fri"){
            return "Jum";   
        }
        if($input=="Sat"){
            return "Sab";   
        }
        if($input=="Sun"){
            return "Min";   
        }
        if($input=="Monday"){
            return "Senin";   
        }
        if($input=="Tuesday"){
            return "Selasa";   
        }
        if($input=="Wednesday"){
            return "Rabu";   
        }
        if($input=="Thursday"){
            return "Kamis";   
        }
        if($input=="Friday"){
            return "Jumat";   
        }
        if($input=="Saturday"){
            return "Sabtu";   
        }
        if($input=="Sunday"){
            return "Minggu";   
        }
    }
    function angkakebulan($bulan){
        if($bulan=="01"){
            $bln = "Januari";
        }
        if($bulan=="1"){
            $bln = "Januari";
        }
        if($bulan=="02"){
            $bln = "Februari";
        }
        if($bulan=="2"){
            $bln = "Februari";
        }
        if($bulan=="03"){
            $bln = "Maret";
        }
        if($bulan=="3"){
            $bln = "Maret";
        }
        if($bulan=="04"){
            $bln = "April";
        }
        if($bulan=="4"){
            $bln = "April";
        }
        if($bulan=="05"){
            $bln = "Mei";
        }
        if($bulan=="5"){
            $bln = "Mei";
        }
        if($bulan=="06"){
            $bln = "Juni";
        }
        if($bulan=="6"){
            $bln = "Juni";
        }
        if($bulan=="07"){
            $bln = "Juli";
        }
        if($bulan=="7"){
            $bln = "Juli";
        }
        if($bulan=="08"){
            $bln = "Agusutus";
        }
        if($bulan=="8"){
            $bln = "Agusutus";
        }
        if($bulan=="09"){
            $bln = "September";
        }
        if($bulan=="9"){
            $bln = "September";
        }
        if($bulan=="10"){
            $bln = "Oktober";
        }
        if($bulan=="11"){
            $bln  = "Nopember";
        }
        if($bulan=="12"){
            $bln = "Desember";
        }
        return$bln;
    }
    function jumlahhari($bulan,$tahun){
        $jumlahhari = 0;
        if($bulan=="01"){
            $jumlahhari = "31";
        }
        if($bulan=="02"){
            if($tahun % 4 ==0){
                $jumlahhari = "29";
            }else{
                $jumlahhari = "28";
            }
        }
        if($bulan=="03"){
            $jumlahhari = "31";
        }
        if($bulan=="04"){
            $jumlahhari = "30";
        }
        if($bulan=="05"){
            $jumlahhari = "31";
        }
        if($bulan=="06"){
            $jumlahhari = "30";
        }
        if($bulan=="07"){
            $jumlahhari = "31";
        }
        if($bulan=="08"){
            $jumlahhari = "31";
        }
        if($bulan=="09"){
            $jumlahhari = "30";
        }
        if($bulan=="10"){
            $jumlahhari = "31";
        }
        if($bulan=="11"){
            $jumlahhari = "30";
        }
        if($bulan=="12"){
            $jumlahhari = "31";
        }
        return $jumlahhari;
    }
}
?>