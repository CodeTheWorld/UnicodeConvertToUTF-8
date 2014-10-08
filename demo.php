<?php
require_once('Converter.class.php');
/**
 * Created by deshengkong.
 * Date: 14-10-8
 * Time: 下午4:29
 */

$unicode = 0x6C49;
$char = Converter::convert($unicode);
echo $char;
