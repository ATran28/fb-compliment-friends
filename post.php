<?php
require 'fb-manager.php';

$friendId = $_GET["friend_id"];
$compliment = $_GET["compliment"];

$user = $fb->getUser();
if ($user == 0) {

} else {
	$token = $fb->getAccessToken();
	try {
		$post = $fb->api('/me/feed', 'POST',array(
				'access_token' => $token,
				'name' => 'Compliment Your Friends',
				'message' => $compliment,
				'description' => $compliment,
				'picture' => 'http://i.imgur.com/zkK5I.png',
				'to' => array(
								'id' => $friendId,
								'name' => 'Compliment Your Friends'
							),
				));
		header( 'Location: /');
	} catch (FacebookApiException $e) {
				$result = $e->getResult();
				print_r($result);
	}
}
?>