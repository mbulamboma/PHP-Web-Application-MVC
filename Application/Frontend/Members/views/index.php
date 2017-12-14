List OF MEMBERS
<pre>
   <b> Names</b>
 <?php
   foreach ($this->iTotal as $key => $Array) {
      echo ($Array->firstname).'<br>';
   }
   if($this->bFree) echo 'Name is free</br>';
   else echo ' The Name is Not Free</br>';
   
   if($this->bAuth) echo "Authentification Ok";
   else       echo 'Authentification Aborted';
   
   ?>
</pre>   