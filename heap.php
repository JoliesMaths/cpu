
<?php

function heap($k,$t) { // $k, entier ; $t, tableau

    if($k==1) {
        echo implode(",", $t)."<br />" ;
        return $t ;
    } else {
        $t=heap($k-1,$t) ;
        
        for($i=0;$i<($k-1);$i++)
            {
                if($k%2==0) {
                    $m = $t[$i] ;       // échange si pair
                    $t[$i] = $t[$k-1] ;
                    $t[$k-1] = $m ;
                } else {
                    $m = $t[0] ;       // échange si impair
                    $t[0] = $t[$k-1] ;
                    $t[$k-1] = $m ;
                }

                $t=heap($k-1,$t) ;
            }

        return $t ;

    }
}

$a = 0 ;
$tbl =  ["A","B","C","D"] ;

heap(count($tbl),$tbl) ;

?>

