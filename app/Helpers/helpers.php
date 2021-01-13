<?php

function active(string $url, string $res = 'active', $group = null): String
{
	$active = $group ? request()->is($url) || request()->is($url.'/*') : request()->is($url);

	return $active ? $res : '';
}

function localDate(string $date): String
{
	return date('d M Y', strtotime($date));
}

function setting(string $key)
{
	return cache('setting')->$key;
}

function badge(array $replace)
{
	$badge = '<span class="badge badge-color">text</span>';
	$attr = ['color', 'text'];
	
	return str_replace($attr, $replace, $badge);
}

function image(string $img = 'default.jpg'): String
{
	return asset('storage/img/'.$img);
}