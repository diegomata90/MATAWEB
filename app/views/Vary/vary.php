<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? 		require 'app/views/vary/new.php' : '' ;
!empty($show_edit_form) ? 	require 'app/views/vary/edit.php' : '';
!empty($show_list) ? 		require 'app/views/vary/list.php' : '';

require 'app/views/Main/footer.php';


?>
