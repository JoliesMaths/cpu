
<?php

function heap($k,$t) { // $k, entier ; $t, tableau

    if($k==1) {
        echo $t[0].",".$t[1].",".$t[2].",".$t[3]."<br>" ;
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

heap(4,$tbl) ;

?>

