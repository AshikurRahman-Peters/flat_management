<?php $this->load->view('app/inc/header'); ?>
<?php
  if(isset($content)){
    $this->load->view('app/'.$content,true);
  } 
?>
<?php $this->load->view('app/inc/footer'); ?>