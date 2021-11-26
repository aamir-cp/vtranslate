<?php
function checkedspcial($array,$string){
   if(in_array($string, $array))
   {
    return 'checked';
   }
   else
   {
    return '';
   }
}

function checkedsoft($array,$string)
{
   if(in_array($string, $array))
   {
    return 'checked';
   }
   else
   {
    return '';
   }

}

?>