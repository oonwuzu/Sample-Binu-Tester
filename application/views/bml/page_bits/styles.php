<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');


$icon_text = intval($this->binu->font_size * 1.3);

// hack, HD displays result in icons that are
// too large to be drawn
if ( $icon_text > 60 ) {
  $icon_text = 60;
}

echo <<<EOT
<styles>
  <style name="body_text">
    <color value="#FF000000"/>
    <font face="Arial Unicode MS" size="{$this->binu->font_size}"/>
  </style>
  <style name="body_link">
    <color value="#0000FF"/>
    <font face="Arial Unicode MS" size="{$this->binu->font_size}"/>
  </style>
  <style name="title_text">
    <color value="#FF000000"/>
    <font face="Arial Unicode MS" size="{$this->binu->font_size}"/>
  </style>
  <style name="icon_text">
    <color value="#FF000000"/>
    <font face="Symbola" size="$icon_text"/>
  </style>
  <style name="icon_link">
    <color value="#0000FF"/>
    <font face="Symbola" size="$icon_text"/>
  </style>
  <style name="footer_text">
    <color value="#FF000000"/>
  </style>
  <style name="grey_line">
    <color value="#FF9E9FA2"/>
  </style>
  <style name="footer_bg">
    <color value="{$this->config->item('top_bar_color')}"/>
  </style>
  <style name="header_bg">
    <color value="{$this->config->item('top_bar_color')}"/>
  </style>
</styles>
EOT;
