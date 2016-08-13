<?php
/**
 * Created by PhpStorm.
 * User: buddy
 * Date: 10/06/16
 * Time: 18:17
 */

namespace dashpit;
// http://symfony.com/doc/current/components/yaml/introduction.html#reading-yaml-files
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;


class LinkList
{
    /* LinkList variables */
    var $name;
    var $source;
    var $envelope;
    var $template;

    function __construct($source_config)
    {
        $this->source = $_SERVER['DOCUMENT_ROOT'] . $source_config['source'];
        $this->template = $source_config['template'];
    }

    function isJson(){
        json_decode($this->source);
        return (json_last_error() == JSON_ERROR_NONE);
    }
    function getSourceType(){
        try {
            $values = $this->isJson($this->source);
        } catch (ParseException $e) {
            printf("Unable to parse the json string: %s", $e->getMessage());
        }
    }

    function getParsedList(){
        $values = '';

        try {
            $values = json_decode(file_get_contents($this->source), true);
            //print_r($values);
        } catch (ParseException $e) {
            printf("Unable to parse the json string: %s", $e->getMessage());
        }
        return $values;
    }

    function setSource(){
        $this->source = $this->source;
    }

    function getSource(){
        echo $this->source ;
    }
    public function init($loader) {
        \Twig_Autoloader::register();
        $this->twig = new \Twig_Environment($loader, array(
            // 'cache' => 'compilation_cache',
        ));
    }
    function render($parsed_linklist, $listsource ){


        echo $this->twig->render($this->template . '_linklist.html', array(
            'sitename' => 'dashpit',
            'linklist' => $parsed_linklist,
            'listsource' => $listsource,
        ));
    }
}