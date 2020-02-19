<?php

$getMSG = $_REQUEST["msg"];

if ($getMSG == "0"){
    echo "GGC address is: <br/>1000 University Center Lane | Lawrenceville, GA 30043";

} else if ($getMSG == "1") {
    echo "GGC telephone number is: <br/>678.407.5000";

} else if ($getMSG === "2") {
    echo
    "GGC ITEC program is: <br/>Information technology (ITEC) is the multidisciplinary study,
     design, development, implementation, support or management of computer-based
     information systems, particularly software applications and system networks.
     At GGC, ITEC majors may focus on one of four areas: digital media, enterprise systems,
     software development or systems security.";

} else if ($getMSG == "3") {
    echo "
    About PHP programming: <br/>PHP is a server scripting language, and a powerful tool for
    making dynamic and interactive Web pages. PHP is a widely-used, free, and
    efficient backend web development language.";


} else if ($getMSG == "q") {
    // ----  quit the chat  -----
    echo "@@@quit now @@@";

}
else {
    echo "Welcome to GGC customer service. 
    Please choose the following menu: <br/> <br/>
    <ul>
    <li>0: GGC address</li>
    <li>1: GGC telphone number</li>
    <li>2: About ITEC program</li>
    <li>3: About PHP programming</li>
    <li>q: Quit chatting</li>
</ul>";

}

?>