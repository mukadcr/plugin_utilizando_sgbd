<?php

/*
* Plugin Name: Trabalhando com SGBD
* Plugin URI: https://sp.senac.br
* Description: Trabalhando com SGBD 	
* Version: 0.0.1
* Author: Murilo Casanova
* Author URI:
* License: CC BY 
*/

register_activation_hook(__FILE__, 'criar_tabela');

function criar_tabela(){

	global $wpdb;

	$wpdb->query("CREATE TABLE {$wpdb->prefix}agenda
				 (id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
				  nome VARCHAR(255) NOT NULL,
				  whatsapp BIGINT UNSIGNED NOT NULL)");

}

add_action('admin_menu', 'gera_item_no_menu');

function gera_item_no_menu(){
	
	add_menu_page('Configurações do Plugin Menu',
					 'Grave novos contatos',
		 			 'administrator',
	    			 'Config Plugin-sgbd',
	     			 'abre_config_plugin_menu');
}

function abre_config_plugin_menu(){
	
	global $wpdb;



	if (isset ($_POST['nome']) && isset($_POST['whatsapp'])) {
		$wpdb->query("INSERT INTO {$wpdb->prefix}agenda
								(nome, whatsapp)
								VALUES
								('{$_POST['nome']}', {$_POST['whatsapp']})");
	}

	$contatos = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}agenda");

	require 'crud_contato_tpl.php';
}

register_deactivation_hook(__FILE__, 'destruir_tabela');

function destruir_tabela(){

	global $wpdb;

	$wpdb->query("DROP TABLE {$wpdb->prefix}agenda");
}

?>