<?php
require 'facebook-php-sdk/src/facebook.php';
require 'testdata.php';

// Initialize facebook object
$fb = new Facebook(array(
	'appId' => '148922615261239',
	'secret' => '7d0d4b7a278ddd00d61e57343400d90b',
));

// Authenticate users
$user = $fb->getUser();
if (!$user) {
	$params = array(
		'scope' => 'publish_stream',
		'redirect_uri' => 'https://apps.facebook.com/compliment_friends',
	);
	$login_url = $fb->getLoginUrl($params);
	print '<script>top.location.href = "' . $login_url . '"</script>';
	exit();
}

// Get data from fb
//$friends = $testfriends;
$data = $fb->api('/me?fields=friends.fields(name,id,picture.type(large))');
$friends = $data['friends']['data'];

// Reduce attributes of friends array
function filterFriendData($friends) {

	$filteredFriends = array();

	foreach ($friends as $friend) {
		$newItem = array (
			'picture' => $friend['picture']['data']['url'],
			'name' => $friend['name'],
			'id' => $friend['id'],
		);
		
		array_push($filteredFriends, $newItem);
	}
	
	return $filteredFriends;
}

function getFriends() {
	global $friends;
	
	$filteredFriends = filterFriendData($friends);

	return $filteredFriends;
}

function formatDOCompliment($compliment) {
	$pattern = '~http://[^\s]*~i';
	
	// Remove tinyurl link
	$formattedString = preg_replace($pattern, '', $compliment);
	
	// Remove surrounding quotes
	$formattedString = str_replace('"', "", $formattedString);
	
	// Remove quotation encoding error
	$formattedString = str_replace('’', "'", $formattedString);
	
	return $formattedString;
}

function getDailyOddCompliments() {
	global $fb;
	
	$data = $fb->api('/DailyOddCompliment/?fields=posts.fields(message)');
	$messages = $data['posts']['data'];
	
	$compliments = array();
	if (!(array_key_exists('error', $data))) {
		for ($i = 0; $i < count($messages); $i++) {
			if (array_key_exists('message', $messages[$i])) {
				$compliment = $messages[$i]['message'];
				array_push($compliments, formatDOCompliment($compliment));
			}
		}
	} else {
		echo "ERROR";
	}

	return $compliments;
}

?>