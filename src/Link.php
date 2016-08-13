<?php
/**
 * Created by PhpStorm.
 * User: buddy
 * Date: 10/06/16
 * Time: 18:17
 */

namespace dashpit;


class Link
{
    /* Link variables */
    var $url;
    var $title;

    /* Link functions */
    function setUrl($url){
        $this->url = $url;
    }

    function getUrl(){
        echo $this->url;
    }

    function setTitle($title){
        $this->title = $title;
    }

    function getTitle(){
        echo $this->title ;
    }
}