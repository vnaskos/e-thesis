<?php
/**
 * @author Vasilis Naskos (vnaskos[at]gmail[dot]com)
 */
class MenuItem {
	
	const ACCESS_PUBLIC		= 0;
	const ACCESS_LOGGED_IN	= 1;
	const ACCESS_STUDENT	= 2;
	const ACCESS_PROF		= 3;
	
	protected $id = 0;
	protected $link = '';
	protected $icon = '';
	protected $text = '';
	protected $access = 0;
	protected $parent = -1;
	protected $children;
	
	public function __construct($id, $link, $icon, $text, $access = MenuItem::ACCESS_PUBLIC, $parent = -1) {
		$this->id = $id;
		$this->link = $link;
		$this->icon = $icon;
		$this->text = $text;
		$this->access = $access;
		$this->parent = $parent;
		$this->children = array();
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function getAccessLevel() {
		return $this->access;
	}
	
	public function getParent() {
		return $this->parent;
	}
	
	public function setParent($parent) {
		$this->parent = $parent;
	}
	
	public function addChild($child_menu_item) {
		$child_menu_item->setParent($this->id);
		$this->children[] = $child_menu_item;
	}
	
	public function buildMenuItem($current) {
		$item_classes = $this->getItemCssClasses($current);
		$has_children = !empty($this->children);
		
		$item = sprintf('<li%s><a href="%s"><i class="glyphicon %s"></i> %s',
				$item_classes, $this->link, $this->icon, $this->text);
		
		if(!empty($this->children)) {
			$item .= '<span class="caret pull-right"></span></a><ul>';
			foreach($this->children as $child) {
				$item .= $child->buildMenuItem($current);
			}
			$item .= '</ul>';
		} else {
			$item .= '</a></li>';
		}
		
		return $item;
	}
		
	protected function getItemCssClasses($current) {
		$item_classes = array();
		
		if($current == $this->id) {
			$item_classes[] = 'current';
		}
		
		if(!empty($this->children)) {
			$item_classes[] = 'submenu';
		}
		
		return !empty($item_classes)
				? sprintf(' class="%s"', implode(',', $item_classes))
				: '';
	}
}
