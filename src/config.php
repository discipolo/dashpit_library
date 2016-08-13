<?php
/**
 * Created by PhpStorm.
 * User: buddy
 * Date: 11/06/16
 * Time: 00:01
 */

namespace dashpit;

// http://symfony.com/doc/current/components/yaml/introduction.html#reading-yaml-files
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;

class config
{
    var $source;

    public function getConfig($source) {
        $values = '';
        try {
            $values = Yaml::parse(file_get_contents($source));
        } catch (ParseException $e) {
            printf("Unable to parse the YAML string: %s", $e->getMessage());
        }
        return $values;
    }
}