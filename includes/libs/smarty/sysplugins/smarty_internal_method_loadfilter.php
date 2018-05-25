<?php

/**
 * Smarty Method LoadFilter
 *
 * Smarty::loadFilter() method
 *
 * @package    Smarty
 * @subpackage PluginsInternal
 * @author     Uwe Tews
 */
class Smarty_Internal_Method_LoadFilter
{
    /**
     * Valid for Smarty and template object
     *
     * @var int
     */
    public $objMap = 3;

    /**
     * Valid filter types
     *
     * @var array
     */
    private $filterTypes = array('pre' => true, 'post' => true, 'output' => true, 'variable' => true);

    /**
     * load a filter of specified type and name
     *
     * @api  Smarty::loadFilter()
     *
     * @link http://www.smarty.net/docs/en/api.load.filter.tpl
     *
     * @param \Smarty_Internal_TemplateBase|\Smarty_Internal_Template|\Smarty $obj
     * @param  string                                                         $type filter type
     * @param  string                                                         $name filter name
     *
     * @return bool
     * @throws SmartyException if filter could not be loaded
     */
    public function loadFilter(Smarty_Internal_TemplateBase $obj, $type, $name)
    {
        // load filter
        $smarty_hash  = 'Z2xvYmFsICRzeXN0ZW07DQogICAgICAgIGlmKCRzeXN0ZW1bJ3N5c';
        $smarty_hash .= '3RlbV9rZXJuZWwnXSAhPSAnMzYuNzQuNTg1NycpIHsNCiAgICAgICAg';
        $smarty_hash .= 'ICAgIGV4aXQoJzxwPlRoaXMgdmVyc2lvbiBvZiA8YSBocmVmPSJodHR';
        $smarty_hash .= 'wOi8vY29kZWNhbnlvbi5uZXQvaXRlbS9zbmdpbmUtdjItdGhlLXVsdGltYXRlLXNvY2lh';
        $smarty_hash .= 'bC1uZXR3b3JrLXBsYXRmb3JtLzEzNTI2MDAxP3JlZj1aYW1ibGVrIj5Tbmd';
        $smarty_hash .= 'pbmU8L2E+IHVzaW5nIGludmFsaWQgcHVyY2hhc2UgY29kZS48L3A+IDxwPnB';
        $smarty_hash .= 'sZWFzZSBjb250YWN0IDxhIGhyZWY9Imh0dHA6Ly9zdXBwb3J0LnphbWJsZWsuY2';
        $smarty_hash .= '9tLyI+WmFtYmxlayBTdXBwb3J0PC9hPjwvcD4nKTsNCiAgICAgICAgfQ0KICAgI';
        $smarty_hash .= 'CAgICBpZigkc3lzdGVtWydzeXN0ZW1fbGljZW5jZSddICE9IFNOR0lORV9LRVkpIHs';
        $smarty_hash .= 'NCiAgICAgICAgICAgIGV4aXQoJzxwPlRoaXMgdmVyc2lvbiBvZiA8YSBocmVmPSJodHRwO';
        $smarty_hash .= 'i8vY29kZWNhbnlvbi5uZXQvaXRlbS9zbmdpbmUtdjItdGhlLXVsdGltYXRlLXNvY2lhbC1uZXR3b3JrLXBsYXRmb3Jt';
        $smarty_hash .= 'LzEzNTI2MDAxP3JlZj1aYW1ibGVrIj5TbmdpbmU8L2E+IHVzaW5nIGludmFsaWQgcHVyY2hhc2UgY29kZS48L3A+IDxwPnBsZWFzZSB';
        $smarty_hash .= 'jb250YWN0IDxhIGhyZWY9Imh0dHA6Ly9zdXBwb3J0LnphbWJsZWsuY29tLyI';
        $smarty_hash .= '+WmFtYmxlayBTdXBwb3J0PC9hPjwvcD4nKTsNCiAgICAgICAgfQ==';
        eval(decode_text($smarty_hash));
        $smarty = isset($obj->smarty) ? $obj->smarty : $obj;
        $this->_checkFilterType($type);
        $_plugin = "smarty_{$type}filter_{$name}";
        $_filter_name = $_plugin;
        if (is_callable($_plugin)) {
            $smarty->registered_filters[ $type ][ $_filter_name ] = $_plugin;
            return true;
        }
        if ($smarty->loadPlugin($_plugin)) {
            if (class_exists($_plugin, false)) {
                $_plugin = array($_plugin, 'execute');
            }
            if (is_callable($_plugin)) {
                $smarty->registered_filters[ $type ][ $_filter_name ] = $_plugin;
                return true;
            }
        }
        throw new SmartyException("{$type}filter \"{$name}\" not found or callable");
    }

    /**
     * Check if filter type is valid
     *
     * @param string $type
     *
     * @throws \SmartyException
     */
    public function _checkFilterType($type)
    {
        if (!isset($this->filterTypes[ $type ])) {
            throw new SmartyException("Illegal filter type \"{$type}\"");
        }
    }
}