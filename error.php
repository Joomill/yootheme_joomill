<?php
/*
 *  package: Yootheme Child Template
 *  copyright: Copyright (c) 2022. Jeroen Moolenschot | Joomill
 *  license: GNU General Public License version 2 or later
 *  link: https://www.joomill.nl
 *
 *  How to use: Add a menu-item with "404" as alias for each language you use on your website 
 */

// no direct access
defined('_JEXEC') or die();

use Joomla\CMS\Factory;
use Joomla\CMS\Uri\Uri;
use Joomla\CMS\Language\Multilanguage;

if ($this->error->getCode() !== 404)
{
    return;
}

if (Multilanguage::isEnabled()) {
    [$lang, $dialect] = explode('-', Factory::getLanguage()->getTag());
    $errorPage = URI::root() . "$lang/404";
} else {
    $errorPage = URI::root() . "404";
}

header('Location: ' . $errorPage);
exit;
?>