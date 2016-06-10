<?php
/**
 * Created by PhpStorm.
 * User: buddy
 * Date: 10/06/16
 * Time: 19:18
 */
namespace dashpit;
use dashpit\Link;


// http://symfony.com/doc/current/components/yaml/introduction.html#reading-yaml-files
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class LinkList
{
    var $source;
    function __construct($source) {
        $this->source = $source;
    }
    public function getLinkList() {
        $values = '';
        try {
            $values = Yaml::parse(file_get_contents($this->source));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
        return $values;
    }
}