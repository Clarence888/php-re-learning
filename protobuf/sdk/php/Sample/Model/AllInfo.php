<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: proto/JianYe.proto

namespace Sample\Model;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * Protobuf type <code>Sample.Model.AllInfo</code>
 */
class AllInfo extends \Google\Protobuf\Internal\Message
{
    /**
     * <code>repeated .Sample.Model.JianYe info = 1;</code>
     */
    private $info;

    public function __construct() {
        \Sample\Model\GPBMetadata\Proto\JianYe::initOnce();
        parent::__construct();
    }

    /**
     * <code>repeated .Sample.Model.JianYe info = 1;</code>
     */
    public function getInfo()
    {
        return $this->info;
    }

    /**
     * <code>repeated .Sample.Model.JianYe info = 1;</code>
     */
    public function setInfo(&$var)
    {
        $arr = GPBUtil::checkRepeatedField($var, \Google\Protobuf\Internal\GPBType::MESSAGE, \Sample\Model\JianYe::class);
        $this->info = $arr;
    }

}