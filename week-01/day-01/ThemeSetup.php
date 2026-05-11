<?php 
namespace MyPlugin\Core;

class ThemeSetup{
    private string $version;

    public function __construct( string $version ){
        $this->version = $version;
    }

    public function init(): void{
        add_action('init', array($this, 'registerPostType'));
        add_action('init', array($this, 'enqueueStyle'));
    }

    private function registerPostType(): void{
        register_post_type('event',array('label'=>'Event','public'=>true));
    }

    private function enqueueStyle(): void{
        wp_enqueue_style('cpt-style', plugin_dir().'/assets/plugin.css',array(), $this->version);
    }


}