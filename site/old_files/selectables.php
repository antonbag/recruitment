<?php
function getGenderList()
{
    $db =& JFactory::getDBO();

    $query = "SELECT g.id AS value, g.description AS text"
        . " FROM `#__recruitment_genders` AS g"
        . " ORDER BY g.order";
    $db->setQuery($query);
    $genderslist[] = JHTML::_('select.option', '', JText::_('- Select Gender -'), 'value', 'text');
    $genderslist = array_merge($genderslist, $db->loadObjectList());
    return $genderslist;
}

function getCountryList()
{
    $db =& JFactory::getDBO();

    $query = "SELECT g.id AS value, g.printable_name AS text"
        . " FROM `#__recruitment_countries` AS g"
        . " ORDER BY g.printable_name";
    $db->setQuery($query);
    $countrieslist[] = JHTML::_('select.option', '', JText::_('- Select Country -'), 'value', 'text');
    $countrieslist = array_merge($countrieslist, $db->loadObjectList());
    return $countrieslist;
}

function getWherediduList()
{
    $db =& JFactory::getDBO();

    $query = "SELECT g.id AS value, g.description AS text"
        . " FROM `#__recruitment_wheredidus` AS g"
        . " ORDER BY g.order";
    $db->setQuery($query);
    $wheredidulist[] = JHTML::_('select.option', '', JText::_('- Select Option -'), 'value', 'text');
    $wheredidulist = array_merge($wheredidulist, $db->loadObjectList());
    return $wheredidulist;
}

?>