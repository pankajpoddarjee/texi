<?php
$image = get_settings_value('logo');
if (!empty($image)) {
	$sys_img = base_url('assets/uploads/system_images/' . $image);
} else {
	$sys_img = base_url('assets/admin/dist/media/logos/logo-default.png');
} 

$module_name = $this->router->fetch_module();
$controller_name = $this->router->fetch_class();
$function_name = $this->router->fetch_method();
$sections = ['Main','Account','Setup','Business Management'];
$user_role_id = $this->session->userdata('user_role_ids');

$get_parent_left_menus = get_left_menus1($user_role_id,'0');
$active_menu = active_menu($module_name,$controller_name,$function_name);
?> 


