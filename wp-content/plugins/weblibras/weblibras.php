<?php 
    /*
    Plugin Name: WebLibras para Wordpress
    Plugin URI: http://www.weblibras.com.br
    Description: WebLibras é o tradutor de sites da ProDeaf. Com o ele, seu site estará acessível em Libras aos milhões de surdos brasileiros! Um personagem 3D faz interpretação, que pode ser totalmente automática, ou passar por otimização manual.
    Author: WebLibras
    Version: 1.6
    Author URI: http://www.weblibras.com.br
    */
	
	function weblibras_admin() {
		include "config_page.php";
	}
	function load_weblibras_actions() {
		add_options_page("Configuração do WebLibras", "WebLibras - Configuração", 1, "weblibras_config", "weblibras_admin");
	}
	function get_weblibras_header(){
		include "weblibras_header.php";
	}
	
	 
	add_action('admin_menu', 'load_weblibras_actions');
	add_action( 'get_footer', 'get_weblibras_header' );
?>