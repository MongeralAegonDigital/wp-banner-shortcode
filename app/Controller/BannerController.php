<?php

namespace MAD\Controller;

use MAD\Model\Banner;

class BannerController
{
    public function __construct()
    {
        add_action('admin_menu', array($this, 'menu'));
        add_action('wp_ajax_delete_banner', array($this, 'delete'));
        add_shortcode('banner_sc', array($this, 'shortCode'));
    }

    public function menu()
    {
        add_menu_page('Banner ShortCode', 'Banner ShortCode', 'manage_options', 'bs_lista', array($this, 'index'));
        add_submenu_page('bs_lista', 'Listar', 'Listar', 'manage_options', 'bs_lista');
        add_submenu_page('bs_lista', 'Cadastrar/Editar', 'Cadastrar/Editar', 'manage_options', 'bs_createOrUpdate', array($this, 'createOrEdit'));
    }

    public function index()
    {
        $allBanners = Banner::all();
        require_once WBSDIR.'/app/View/index.php';
    }

    public function createOrEdit()
    {
        if ($_POST) {
            $this->saveOrUpdate($_POST);
        } elseif (isset($_GET['id'])) {
            $banner = Banner::find($_GET['id']);
        }
        require WBSDIR.'/app/View/create.php';
    }

    public function saveOrUpdate($request)
    {
        if (array_key_exists('id', $request)) {
            $banner = Banner::find($_GET['id']);
            foreach ($request as $key => $value) {
                $banner->{$key} = $value;
            }
            $banner->save();
        } else {
            $banner = new Banner($request);
            $banner->save();
        }

        header('Location:'.admin_url('admin.php?page=bs_lista'));
    }

    public function delete()
    {
        $bannerDelete = Banner::find($_POST['id']);
        wp_send_json_success($bannerDelete->delete());
    }

    public function shortCode($atts)
    {
        $banner = Banner::where('slug', $atts['slug'])->first();
        if ($banner) {
            return $banner->html;
        }
    }
}
