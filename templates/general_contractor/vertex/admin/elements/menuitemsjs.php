<?php 
defined('_JEXEC') or die('Restricted access');
jimport('legacy.html.menu');
class JFormFieldMenuitemsjs extends JFormField {
  protected $type = 'Menuitemsjs';
  function getInput() {
    $db = JFactory::getDBO();
    $version = new JVersion();
    $odering = ", m.ordering";
    if($version->RELEASE >= '3.0') {
      $odering = "";
    }
    $query = 'SELECT m.id, m.parent_id, m.title, m.menutype' . ' FROM #__menu AS m' . ' WHERE m.published = 1' . ' ORDER BY m.menutype, m.parent_id ' . $odering;
    $db->setQuery($query);
    $mitems = $db->loadObjectList();
    $mitems_temp = $mitems;
    $children = array();
    foreach($mitems as $v) {
      $id = $v->id;
      $pt = $v->parent_id;
      $list = @$children[$pt] ? $children[$pt] : array();
      array_push($list, $v);
      $children[$pt] = $list;
    }
    $list = JHTMLMenu::TreeRecurse(intval($mitems[0]->parent_id), '', array(), $children, 9999, 0, 0);
    $mitems_spacer = $mitems_temp[0]->menutype;
    $mitems = array();
    if(@$all | @$unassigned) {
      $mitems[] = (object)array("value" => "", "label" => JText::_('Menus'));
      if($all) {
        $mitems[] = (object)array("value" => "", "label" => JText::_('All'));
      }
      if($unassigned) {
        $mitems[] = (object)array("value" => "", "label" => JText::_('Unassigned'));
      }
    }
    $lastMenuType = null;
    //$tmpMenuType = null;
    foreach($list as $list_a) {
      if($list_a->menutype != $lastMenuType) {
        //if($tmpMenuType) {
          //$mitems[] = JHTML::_('select.option', '');
				//}
        $mitems[] = JHTML::_('select.option', 'vg', $list_a->title);
        $lastMenuType = $list_a->menutype;
        //$tmpMenuType = $list_a->menutype;
      }
      $mitems[] = JHTML::_('select.option', $list_a->id, $list_a->treename);
    }
    if($lastMenuType !== null) {
      //$mitems[] = JHTML::_('select.option', ',');
    }
    //$result = JHTML::_('select.genericlist', $mitems, $this->name . '[]', 'class="inputbox" size="15" multiple="multiple"', 'value', 'text', $this->value);
    $result = array();
    //var_dump($mitems);
    foreach($mitems as $item) {
    	//var_dump($item);
    	$result[] = (object)array("value" => $item->value, "label" => $item->text);//"{value:\"".$item->value."\",label:\"".$item->text."\"},";
    }
		//$result .= implode("", (array)(object)$mitems);
    //$result .= "]";
    array_shift($result);
		return $result;
  }
}