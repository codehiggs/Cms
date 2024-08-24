<?php

if (!function_exists("generate_cms_permissions")) {

    /**
     * Permite registrar los permisos asociados al modulo, tecnicamente su
     * ejecucion regenera los permisos asignables definidos por el modulo DISA
     */
    function generate_cms_permissions(): void
    {
        $permissions = array(
            "cms-access",
        );
        generate_permissions($permissions, "cms");
    }

}

if (!function_exists("get_cms_sidebar")) {
    function get_cms_sidebar($active_url = false): string
    {
        $bootstrap = service("bootstrap");
        $lpk = safe_strtolower(pk());
        $options = array(
            "home" => array("text" => lang("App.Home"), "href" => "/cms/", "svg" => "home.svg"),
            "settings" => array("text" => lang("App.Settings"), "href" => "/cms/settings/home/" . lpk(), "icon" => ICON_TOOLS, "permission" => "cms-access"),
        );
        $o = get_application_custom_sidebar($options, $active_url);
        $return = $bootstrap->get_NavPills($o, $active_url);
        return ($return);
    }
}

?>
