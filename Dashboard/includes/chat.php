<?php 
    include 'dbh.inc.php';
    $query = "SELECT * FROM chatroom ORDER BY message_id DESC";
    $run = $conn->query($query); //can be used for nodes
    while($row = $run->fetch_array()):
?>
    <div id="chat_data">
        <span style="color:#009be4;"><?= $row['name']; ?>:</span>
        <span style="color:black;"><?= $row['message']; ?></span>
        <span style="float:right;margin-right:10px; font-size: 10px;"><?= $row['time_sent']; ?></span>
    </div>
<?php endwhile;?>