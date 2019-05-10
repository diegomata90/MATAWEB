<?php 

require 'app/views/Main/header.php';

!empty($show_form) ? 		require 'app/views/user/new.php' : '' ;
!empty($show_edit_form) ? 	require 'app/views/user/edit.php' : '';
!empty($show_edit_pass) ? 	require 'app/views/user/edit_pass.php' : '';
!empty($show_list) ? 		require 'app/views/user/list.php' : '';

require 'app/views/Main/footer.php';


?>
