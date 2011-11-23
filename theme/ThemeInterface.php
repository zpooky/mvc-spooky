<?php
interface ThemeInterface {
	public function setView($view);
	public function assembly();
	/**
	 * Assembly html
	 */
	public function getMenu();
	public function getPromoted();
	public function getSidebarLeft();
	public function getBody();
	public function getSidebarRight();
	public function getBottomLeft();
	public function getBottomMiddle();
	public function getBottomRight();
	public function getFooterColumn1();
	public function getFooterColumn2();
	public function getFooterColumn3();
	public function getFooterColumn4();
}

?>