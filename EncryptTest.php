<?php
require("../src/Messages.php");
var_dump($_SERVER);
var_dump(__DIR__);
echo "---------------------------------------------<br />";
#echo basename(__FILE__);
#echo basename($_SERVER["PHP_SELF"]);
#var_dump(hash_algos());


#phpinfo();
   var_dump(Messages::getMessages());

   var_dump($_REQUEST);
   ?>