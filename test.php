<?php
$arr=array();
function random(){
    return(rand(237,240));
}

$count=0;
$n=2;
include('dbcon.php');
$query1 = "Select COUNT(*) from book;";
               $stmt = $pdo->query($query1);
                $stmt->execute();
                $arr=$stmt->fetch();
               // echo  $arr[0];
                if((11-$arr[0])<$n)
                { 
                    echo("no seat available");}
                else
        {   
             for($x=1;$x<=$n;$x++) 
            {
              l1:
                $count=0;
                $ab=random();
                
                $query1 = "Select seat from book where pid=87 AND tid=1;";
                $stmt = $pdo->query($query1);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_OBJ);
                //echo $ab;
                foreach($result as $ro)
                {  
                 if($ab==$ro->seat) 
                 $count=1;
                }
                if ($count==1)
                {
                //echo("this is already assigned."); 
                goto l1;
                }
                if($count==0)
                {
                    echo $x.("Book ticket\n"); echo ("seatno.").$ab;
                }
            }
        }
?>