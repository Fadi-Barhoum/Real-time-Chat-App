<?php
    while ($row = mysqli_fetch_assoc($usersInformation)){
        $incoming_id = $row['unique_id'];
        $lastMsgQuery = "SELECT * FROM messages
                            WHERE (incoming_msg_id = {$incoming_id} AND outgoing_msg_id = {$outgoing_id})
                            OR (incoming_msg_id = {$outgoing_id} AND outgoing_msg_id = {$incoming_id}) 
                            ORDER BY msg_id DESC LIMIT 1";
        $lastMsg = mysqli_query($conn, $lastMsgQuery);
        $message = mysqli_fetch_assoc($lastMsg);
        if (mysqli_num_rows($lastMsg)){
            $result = $message['msg'];
        }else{
            $result = "No message available";
        }

        (strlen($result) > 28) ? $msg = substr($result, 0, 25).'...' : $msg = $result;
        ($outgoing_id == $message['outgoing_msg_id']) ? $you = "You: " : $you = "";
        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        $output .= '
                    <a href="chat.php?user_id='.$row['unique_id'].'">
                        <div class="content">
                            <img src="php/images/'.$row['img'].'">
                            <div class="details">
                                <span>'.$row['fname']." ".$row['lname'].'</span>
                                <p>'.$you . $msg.'</p>
                            </div>
                        </div>
                        <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>
                ';
    }
?>