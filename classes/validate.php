<?php   
    function sanitize($evilstring){
    $safestring = htmlentities($evilstring);
    return $safestring;
}
?>