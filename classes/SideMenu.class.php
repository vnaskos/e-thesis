<?php
/**
 * @author Vasilis Naskos (vnaskos[at]gmail[dot]com)
 */
class SideMenu {
	
	protected $menu;
	
	protected function __construct() {
		$this->menu = array(
				new MenuItem(0, 'index.php', 'glyphicon-home', 'Dashboard'),
				new MenuItem(1, 'projects.php', 'glyphicon-list', 'Projects'),
				new MenuItem(2, 'applications.php', 'glyphicon-record', 'Applications', MenuItem::ACCESS_LOGGED_IN),
				new MenuItem(3, '#', 'glyphicon-pencil', 'Managment', MenuItem::ACCESS_PROF),
				new MenuItem(4, 'edit_project.php', '', 'New Project', MenuItem::ACCESS_PROF, 3),
				new MenuItem(5, 'notifications.php', 'glyphicon-tasks', 'Notifications', MenuItem::ACCESS_LOGGED_IN)
		);
		
		//Append children to their parents
		foreach($this->menu as $key => $item) {
			if($item->getParent() != -1) {
				$this->menu[$item->getParent()]->addChild($item);
				unset($this->menu[$item->getId()]);
			}
		}
	}
	
	public static function getSidebarMenu($current, $role) {
		$side_menu = new SideMenu();
		
		$html_menu = '<ul class="nav">'; 
		foreach($side_menu->menu as $item) {
			if($role >= $item->getAccessLevel()) {
				$html_menu .= $item->buildMenuItem($current);
			}
		}
		
		$html_menu .= '</ul>';
		
		return $html_menu;
	}
	
}
