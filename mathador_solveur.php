<?php

// ALGORITHME DE SOLVEUR DE MATHADOR

$enigme = [14,1,11,2,3,60] ;
//$enigme = [12,8,5,6,4,80] ;
//$enigme = [7,2,8,9,10,37] ;

$cible = $enigme[5] ;

unset($enigme[5]) ;
rsort($enigme) ;

echo "ÉNIGME : ".join(',',$enigme)." CIBLE : ".$cible."<hr>" ;

$op=[
["+","-","*","/"],["-","+","*","/"],["*","+","-","/"],["+","*","-","/"],
["-","*","+","/"],["*","-","+","/"],["/","-","+","*"],["-","/","+","*"],["+","/","-","*"],["/","+","-","*"],["-","+","/","*"],["+","-","/","*"],["+","*","/","-"],["*","+","/","-"],["/","+","*","-"],["+","/","*","-"],["*","/","+","-"],["/","*","+","-"],["/","*","-","+"],["*","/","-","+"],["-","/","*","+"],["/","-","*","+"],["*","-","/","+"],["-","*","/","+"],["+","-","*","/"] ] ;   // toutes les permutations d'opérations possibles. Algo de Heap


$p1 = [[0,1],[0,2],[0,3],[0,4],[1,2],[1,3],[1,4],[2,3],[2,4],[3,4]] ;
$p2 = [[0,1],[0,2],[0,3],[1,2],[1,3],[2,3]] ;
$p3 = [[0,1],[0,2],[1,2]] ;


for($n=0;$n<count($op);$n++) {
    
    $o=$op[$n] ; // tableau des 4 opérations à faire

    for($m=0;$m<count($p1);$m++) {
        $e = $enigme ;
        $sol = array() ;

        $operation = $e[$p1[$m][0]].$o[0].$e[$p1[$m][1]] ;
        $res1 = eval('return '.$operation.";") ;
        $sol[0] = $operation."=".$res1 ;
        unset($e[$p1[$m][0]]) ;
        unset($e[$p1[$m][1]]) ;
        array_push($e,$res1) ;
        rsort($e) ;
        $e1 = $e ;

        for($l=0;$l<count($p2);$l++) {
            $e = $e1 ;
            $operation = $e[$p2[$l][0]].$o[1].$e[$p2[$l][1]] ;
            if($o[1]=="/" and $e[$p2[$l][1]]==0) { break ; }    // éviter les divisions par 0
            $res2 = eval('return '.$operation.";") ;
            $sol[1] = $operation."=".$res2 ;
            unset($e[$p2[$l][0]]) ;
            unset($e[$p2[$l][1]]) ;
            array_push($e,$res2) ;
            rsort($e) ;
            $e2= $e ;

            for($k=0;$k<count($p3);$k++) {
                $e = $e2 ;
                $operation = $e[$p3[$k][0]].$o[2].$e[$p3[$k][1]] ;
                if($o[2]=="/" and $e[$p3[$k][1]]==0) { break ; }
                $res3 = eval('return '.$operation.";") ;
                $sol[2] = $operation."=".$res3 ;
                unset($e[$p2[$l][0]]) ;
                unset($e[$p2[$l][1]]) ;
                array_push($e,$res3) ;
                rsort($e) ;
                $operation = $e[0].$o[3].$e[1] ;
                if($o[3]=="/" and $e[1]==0) { break ; }
                $res4 = eval('return '.$operation.";") ;
                $sol[3] = $operation."=".$res4 ;
                if($res4==$cible) { echo join("<br>",$sol)."<hr>" ; }
            }
        }
    }
}



?>
