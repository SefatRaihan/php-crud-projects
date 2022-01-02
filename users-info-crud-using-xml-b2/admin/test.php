<?php
libxml_use_internal_errors(true);
$myXMLData =
    "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<users>
    <user>
        <name>ABC</name>
        <email>abc@gmail.com</email>
    </user>
    <user>
        <name>XYZ</name>
        <email>xyz@gmail.com</email>
    </user>
</users>";

$xml = simplexml_load_string($myXMLData);
if ($xml === false) {
    echo "Failed loading XML: ";
    foreach(libxml_get_errors() as $error) {
        echo "<br>", $error->message;
    }
} else {
    //print_r($xml);
    foreach ($xml->user as $user){
        echo $user->name;
        echo ", ";
        echo $user->email;
        echo "</br>";
    }
}