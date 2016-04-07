<?php
require('config.php');
try {
    print '<form action="concertins.php" method="POST">';
    print '<input type="text" name="concertname" value="concertname">';
    $sth = $conn->prepare('SELECT vname FROM location');
    $sth->execute();
    $result = $sth->fetchAll();

  if ( count($result) ) { 
    print '<select name="lname" id="your_list">';
    foreach ($result as $row) {
    print '<option value="'.$row['vname'].'">'.$row['vname'].'</option>';
    }
	print '</select>';
	print '<input type="submit" value="Submit">';   
	} 
	else {
    echo "No rows returned.";
  }
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}
    print '</form>';
?>