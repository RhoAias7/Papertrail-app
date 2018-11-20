<?php 
    include '../dbh.inc.php';
    $query = "SELECT * FROM chatroom ORDER BY message_id ASC";
    $run = $conn->query($query); //can be used for nodes
    while($row = $run->fetch_array()):
?>
    <div id="chat_data">
        <span style="color:green;"><?= $row['name']; ?>:</span>
        <span style="color:brown;"><?= $row['message']; ?></span>
        <span style="float:right; font-size: 10px;"><?= $row['time_sent']; ?></span>
    </div>
<?php endwhile;?>