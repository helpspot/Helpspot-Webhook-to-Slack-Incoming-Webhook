# Helpspot-Webhook-to-Slack-Incoming-Webhook
This integration script provides a sample connection between HelpSpot webhooks and the Slack incoming webhook API. You can find documentation on Slack's incoming webhooks here: https://api.slack.com/incoming-webhooks. You can find documenation on Helpspot's webhooks here.

## Setup Instructions
1. Login to your slack team and navigate to Integrations > Incoming Webhooks
2. Add a new incoming webhook and note the webhook url
3. Clone or copy basic-slack-webhook.php to the custom_code directory on your webserver 
4. Open basic-slack-webhook.php in your favorite editor and edit the default variables to match your environment. You can also edit the messages and fields that are displayed in the message. By default this script is setup to display an request escalation as an example and the message in slack includes the message subject and a link to the request in helpspot. The script can be modified to serve a variety of purposes.
5. In your Helpspot instance set up a an Automation, Trigger or Mail Rule with the appropriate filter and then add the "POST a webhook to this URL:" action. 
6. In the URL field enter the full path to your webhook in the custom code folder. For example: http://helpspot-current.local/custom_code/basic-slack-webhook.php
