<!DOCTYPE html>

<!--[if IE 8]><html class="ie8"> <![endif]-->
<!--[if IE 9]><html class="ie9 gt-ie8"> <![endif]-->
<!--[if gt IE 9]><!--><html class="gt-ie8 gt-ie9 not-ie" lang="{$system['language']['code']}" dir="{$system['language']['dir']}"><!--<![endif]-->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="generator" content="Sngine">
    <meta name="version" content="{$system['version']}">

    <!-- Title -->
    <title>{$page_title}</title>

    <!-- Meta -->
    <meta name="description" content="{$system['system_description']}">
    <meta name="keywords" content="{$system['system_keywords']}">

    <!-- OG-Meta -->
    <meta property="og:title" content="{$page_title}"/>
    <meta property="og:description" content="{$system['system_description']}"/>
    <meta property="og:url" content="{$system['system_url']}"/>
    <meta property="og:site_name" content="{$system['system_title']}"/>

    <!-- OG-Image -->
    {if $system['system_ogimage']}
        <meta property="og:image" content="{$system['system_uploads']}/{$system['system_ogimage']}"/>
    {elseif $system['system_ogimage_default']}
        <meta property="og:image" content="{$system['system_url']}/content/themes/{$system['theme']}/images/og-image.jpg"/>
    {/if}

    <!-- Favicon -->
    {if $system['system_favicon_default']}
        <link rel="shortcut icon" href="{$system['system_url']}/content/themes/{$system['theme']}/images/favicon.png" />
    {elseif $system['system_favicon']}
        <link rel="shortcut icon" href="{$system['system_uploads']}/{$system['system_favicon']}" />
    {/if}

    <!-- Dependencies CSS [Roboto|Font-Awesome|Twemoji-Awesome|Flag-Icon|Bootstrap] -->
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300ita‌​lic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css' onload="if(media!='all')media='all'">
    <link rel="stylesheet" href="{$system['system_url']}/includes/assets/css/font-awesome/css/font-awesome.min.css" onload="if(media!='all')media='all'">
    <style type="text/css">{include file="../../../../includes/assets/css/bootstrap/css/bootstrap+social.css" caching}</style>
    

    <!-- CSS -->
    {if $system['language']['dir'] == "RTL"}
    <link rel="stylesheet" type='text/css' href="{$system['system_url']}/includes/assets/css/bootstrap/css/bootstrap-rtl.min.css">
    <style type="text/css">{include file="../css/style.rtl.css" caching}</style>
    {else}
    <style type="text/css">{include file="../css/style.css" caching}</style>
    {/if}

    <!-- CSS Customized -->
    {include file='_head.css.tpl'}
    <!-- CSS Customized -->

</head>