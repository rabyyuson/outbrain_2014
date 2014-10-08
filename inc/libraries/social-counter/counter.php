<?php

	ob_start();

	$url = (isset($_GET['url']) ? $_GET['url'] : FALSE);
	if(!$url) die();

	$urlseo = parse_url($url);
	if(!isset($urlseo['path'])) {
		$url .= '/';
		$urlseo = parse_url($url);
	}

	$api = NULL;
	$counter = 0;
	$expires = time() + 300;
	$urlseo = "{$urlseo['host']}{$urlseo['path']}";
	$breakdown = array();

	$endpoints = array(


		// Facebook
		array(
			'name'     => 'facebook',
			'method'   => 'GET',
			'url'      => 'https://graph.facebook.com/fql?q=' . urlencode("SELECT like_count, total_count, share_count, click_count, comment_count FROM link_stat WHERE url = \"{$url}\""),
			"callback" => function($resp) {
				if(isset($resp->data[0]->total_count)) {
					return (int)$resp->data[0]->total_count;
				} else {
					return 0;
				}
			}),

		// Pinterest
		array(
			'name'     => 'pinterest',
			'method'   => 'GET',
			'url'      => "http://api.pinterest.com/v1/urls/count.json?callback=&url={$url}",
			"callback" => function($resp) {
				$resp = json_decode(substr($resp, 1, -1));
				if(isset($resp->count)) {
					return (int)$resp->count;
				} else {
					return 0;
				}
			}),

		// Twitter
		array(
			'name'     => 'twitter',
			'method'   => 'GET',
			'url'      => "http://cdn.api.twitter.com/1/urls/count.json?url={$url}",
			"callback" => function($resp) {
				if($resp && isset($resp->count)) {
					return (int)$resp->count;
				} else {
					return 0;
				}
			}),

		// LinkedIn
		array(
			'name'     => 'linkedin',
			'method'   => 'GET',
			'url'      => "http://www.linkedin.com/countserv/count/share?url={$url}&format=json",
			"callback" => function($resp) {
				if($resp && isset($resp->count)) {
					return (int)$resp->count;
				} else {
					return 0;
				}
			}),

		// StumbleUpon
		array(
			'name'     => 'stumbleupon',
			'method'   => 'GET',
			'url'      => "http://www.stumbleupon.com/services/1.01/badge.getinfo?url={$url}",
			"callback" => function($resp) {
				if($resp && isset($resp->result) && isset($resp->result->views)) {
					return (int)$resp->result->views;
				} else {
					return 0;
				}
			}),

		// reddit
		array(
			'name'     => 'reddit',
			'method'   => 'GET',
			'url'      => "http://www.reddit.com/api/info.json?url={$url}",
			"callback" => function($resp) {
				if($resp && isset($resp->data->children)) {
					$c = 0;
					foreach($resp->data->children as $story) {
						if(isset($story->data) && isset($story->data->ups)) {
							$c = $c + (int)$story->data->ups;
						}
					}
					return $c;
				} else {
					return 0;
				}
			}),


		// Google +1s
		array(
			'name'     => 'googleplus',
			'method'   => 'POST',
			'headers'  => array('Content-type: application/json'),
			'url'      => 'https://clients6.google.com/rpc',
			'payload'  => json_encode(array(
				'method' => 'pos.plusones.get',
				'id'     => 'p',
				'params' => array(
					"nolog"   => true,
					"id"      => $url,
					"source"  => "widget",
					"userId"  => "@viewer",
					"groupId" => "@self"
				),
				"jsonrpc"    => "2.0",
				"key"        => "p",
				"apiVersion" => "v1"
				)),
			"callback" => function($resp) {
				if(isset($resp->result->metadata->globalCounts->count)) {
					return (int)$resp->result->metadata->globalCounts->count;
				} else {
					return 0;
				}
			}),
	);

	function apiCall($method, $url, $params = array()) {

		global $api;

		if (!$api)
			$api = curl_init();

		if ($api) {

			curl_setopt($api, CURLOPT_POST, false);
			curl_setopt($api, CURLOPT_POSTFIELDS, NULL);
			if(isset($params['headers'])) curl_setopt($api, CURLOPT_HTTPHEADER, $params['headers']);

			if ($method == 'GET') {
				curl_setopt($api, CURLOPT_HTTPGET, true);

			} elseif ($method == 'POST') {
				curl_setopt($api, CURLOPT_POST, true);
				if(isset($params['payload'])) curl_setopt($api, CURLOPT_POSTFIELDS, $params['payload']);

			} elseif ($method == 'PUT') {
				curl_setopt($api, CURLOPT_CUSTOMREQUEST, 'PUT');

			} elseif ($method == 'DELETE') {
				curl_setopt($api, CURLOPT_CUSTOMREQUEST, 'DELETE');

			}

			if ($method != 'POST' && count($params)) {
				foreach($params as $p => $v) {
					$url .= $p . '=' . urlencode($v) . '&';
				}
			}

			curl_setopt($api, CURLOPT_URL, rtrim($url, '?&'));
			curl_setopt($api, CURLOPT_TIMEOUT, 5);
			curl_setopt($api, CURLOPT_HEADER, false);
			curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
			curl_setopt($api, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($api, CURLOPT_FOLLOWLOCATION, true);

			if ($raw = curl_exec($api)) {
				if ($resp = json_decode($raw)) {
					return $resp;
				} else {
					return $raw;
				}
			}

			return false;
		}

	}

	foreach($endpoints as $endpoint) {
		$params = array();
		if(isset($endpoint['headers'])) $params['headers'] = $endpoint['headers'];
		if(isset($endpoint['payload'])) $params['payload'] = $endpoint['payload'];

		$actions = $endpoint["callback"](apiCall($endpoint['method'], $endpoint["url"], $params));
		$breakdown[$endpoint['name']] = $actions;
		$counter = $counter + $actions;
	}

	ob_get_clean();

	header("Content-Type: application/json");
	echo json_encode(array(
		'count'    => $counter,
		'services' => $breakdown
	));
	exit;

?>