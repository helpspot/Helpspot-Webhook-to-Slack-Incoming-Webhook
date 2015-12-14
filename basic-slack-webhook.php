
<?php 
//Written by Matt Stenson (matt@userscape.com)
//Based on a gist by Stefan Zweifel (https://github.com/stefanzweifel) - https://gist.github.com/stefanzweifel/04be27486517cd7d3422
        //Options
        $helpspotUrl = "https://helpspot.baseurl.com"; //The base URL to your helpspot install
        $hookurl  = 'https://hooks.slack.com/services/yourwebookurl'; //Your slack inbound webhook url
        $channel  = '#helpspot'; //The slack channel you want this notification to post on
        $bot_name = 'HelpSpot Escalation'; //The name that will appear in the slack post
        $icon     = ':exclamation:'; //The icon to associate with these notificaitons (use slack emoji codes)
        $message  = 'New Escalated Request!'; //Initial Message
        $attachments = array([
            'fallback' => 'A new request has been excalated <'.$helpspotUrl.'/admin.php?pg=request&fb=5&reqid='.($_POST["xRequest"]).'|View Request>', //Fallback for mobile
            'pretext'  => '', //Any text you want to appear. Not used in this example
            'color'    => '#ff6600', //The color of the bar next to the message
            'fields'   => array( //this is an array of fields that you want to send to slack
                [
                    'title' => 'Subject',
                    'value' => ($_POST["sTitle"]),
                    'short' => false
                ],
                [
                    'title' => 'Link',
                    'value' => '<'.$helpspotUrl.'/admin.php?pg=request&fb=5&reqid='.($_POST["xRequest"]).'|View Request>',
                    'short' => false
                ]
            )
        ]);
        $data = array(
            'channel'     => $channel,
            'username'    => $bot_name,
            'text'        => $message,
            'icon_emoji'  => $icon,
            'attachments' => $attachments
        );
        $data_string = json_encode($data);
        $ch = curl_init($hookurl);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data_string))
            );
        //Execute CURL
        $result = curl_exec($ch);
        return $result;        
 ?>
