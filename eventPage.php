<?php


$id = $_POST['id'];

include('./scripts/database_connection.php');

$query = 'SELECT * FROM Has NATURAL JOIN Todo WHERE EventID = ' . $id;
$eventQuery = 'SELECT * FROM Event INNER JOIN User ON Admin = FBid WHERE EventID = ' . $id;

      
$result = mysql_query($query) or die(mysql_error());

for($i = 0; $row = @mysql_fetch_assoc($result); $i++) {
  $rows[$i] = $row;
}

$result = mysql_query($eventQuery) or die(mysql_error());

$event = mysql_fetch_assoc($result);

echo '<h3>'.$event['Title'].'</h3><br>';


if(!isset($rows)) echo '<p>There are no ideas for this event yet, be the first to propose something!</p>';

echo '<div class="accordion" id="accordion2">';

foreach($rows as $todo)
{
	echo '<div class="accordion-group"> <div class="accordion-heading">';
	echo '<h4><a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">'.$todo['Title'].'</a></h4></div>';
	
	echo '<div id="collapseOne" class="accordion-body collapse in">div class="accordion-inner">';
	echo '<p>'.$todo['Description'].'</p>';
	echo '</div></div></div>';

}
echo '</div>';

echo '<br><p>Added by '.$event['Name'].'</p><br>';

echo '<a id="newIdea" class="btn btn-info"><b>Add an idea</b></a>';

?>

<div class="accordion" id="accordion2">
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
        Collapsible Group Item #1
      </a>
    </div>
    <div id="collapseOne" class="accordion-body collapse in">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div>
  <div class="accordion-group">
    <div class="accordion-heading">
      <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
        Collapsible Group Item #2
      </a>
    </div>
    <div id="collapseTwo" class="accordion-body collapse">
      <div class="accordion-inner">
        Anim pariatur cliche...
      </div>
    </div>
  </div>
</div>

