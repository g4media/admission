<center>
<?php

$host="localhost";
$dbusername="root";
$dbpassword="";
$dbname="election";
$conn=new mysqli ($host , $dbusername , $dbpassword , $dbname);
$lsql="SELECT DISTINCT lac FROM `candidatelist` ORDER BY `candidatelist`.`lac` ASC";
$lresult = $conn->query($lsql);
$slac=" ";
$polc=0;


while($lrow=$lresult->fetch_assoc()){



  $lac=$lrow["lac"];
  $tsql="SELECT COUNT(candidate) FROM `ballot` WHERE lac='$lac' ";
  $tresult=$conn->query($tsql);
  $trow=$tresult->fetch_assoc();
  $vsql="SELECT COUNT(voterid) FROM `voterslist` WHERE lac='$lac' ";
  $vresult=$conn->query($vsql);
  $vrow=$vresult->fetch_assoc();
  $perc= ($trow["COUNT(candidate)"]/$vrow["COUNT(voterid)"])*100;


  $csql="SELECT * FROM candidatelist WHERE lac='$lac'";
  $cresult = $conn->query($csql);
  $rnm=1;

  while($crow=$cresult->fetch_assoc()){


    $cid=$crow["cid"];
    $cosql="SELECT COUNT(cid) FROM `ballot` WHERE lac='$lac' and cid='$cid'";
    $coresult = $conn->query($cosql);
    $corow=$coresult->fetch_assoc();
    $lc=$corow["COUNT(cid)"];



    if($polc<$lc){$plc=$crow["candidatename"];}

    echo "<table border='2'>
      <tr>
        <th>Position</th>
        <th>Name Of The Candidate</th>
        <th>Total Votes Got</th>

      </tr>";
if($slac!=$crow["lac"]){echo "<b>lac : ".$lac."&nbsp &nbsp &nbsp &nbsp Total Votes Polled : ".$trow["COUNT(candidate)"]."&nbsp &nbsp &nbsp &nbsp Polling Percentage : ".$perc."&nbsp &nbsp &nbsp &nbsp Leading Candidate : <font color='green'>".$plc."</font>";}
    echo "<tr>
            <td>".$rnm."</td>
            <td>".$crow["candidatename"]."</td>
            <td>".$corow["COUNT(cid)"]."</td> ";
            $slac= $crow["lac"];
            $polc=$corow["COUNT(cid)"];




            $rnm=$rnm+1;


}

}

 ?>
</center>
