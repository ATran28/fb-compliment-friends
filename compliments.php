<?php
$compliments = array(
    "your prom date still thinks about you all the time.",
    "all your friends worry they aren't as funny as you.",
    "your boss loved that thing you did at work today.",
    "your blog is the best blog.",
    "people at trivia night are terrified of you.",
    "those shoes were a great call. ",
    "hey, did you lose weight? (not that you needed to!)",
    "you are the most charming person in a 50 mile vicinity.",
    "everyone was super jealous of your SAT score.",
    "you chuckle at the New York Times Sunday crossword (sorry Will Shortz).",
    "mensa would be so lucky.",
    "all the 6th graders agreed, your baking soda volcano was the best at the science fair.",
    "I would totally trust you to dog-sit for a long weekend.",
    "9/10 dentists agree, you are the BEST.",
    "your voice sounds like a thousand cats purring. Also, I'm on acid.",
    "today's outfit = Thumbs up.",
    "every other country is super jealous you're a citizen in this country.",
    "your hair looks great today. It also looked really good two days ago.",
    "I want to kiss you. I hope that's not too forward of me.",
    "that song was definitely written for you.",
    "you're not crazy, they are 100% into you.",
    "your parents are more proud of you than you'll ever know.",
    "rumor is Disney is basing its next cartoon on you.",
    "you actually looked super graceful that time you tripped in front of everyone.",
    "your sneezes sound like a chorus of angels giggling.",
    "you don't get drunk, you get superhuman.",
    "you could be an astronaut if you wanted. NASA told me so.",
    "I'm not telling you what to do, but you could pull off orange corduroy.",
    "your hair smells like freshly cut grass.",
    "your pet loves you too much to ever run away.",
    "no one has ever thought your feet look gross.",
    "they've never told you this, but your boss is really impressed by you.",
    "your cousins refer to you as 'the cool cousin'.",
    "the kid you passed on the street today wants to grow up to be like you.",
    "your dental hygiene is impeccable.  ",
    "you're as sweet as a can of artificially flavored diet soda.",
    "everyone was cool with that time you peed in the shower.",
    "you pick the best radio stations when you're riding shotgun.",
    "you think of the funniest names for wi-fi connections.",
    "keep walking around naked. Your neighbors are into it.",
    "you have the power to start and WIN a dance-off.",
    "you've never had morning breath. I swear.",
    "your senior portrait was the best.",
    "8 out of 10 co-workers agree, your desk is the cleanest. ",
    "you'd be the last one standing in a horror movie.",
    "you're a benevolent tipper.",
    "you're the best at making cereal.",
    "your parents aren't worried about you.",
    "you're funny. Like, LOL style."
);

// Load other compliments
function loadCompliments() {
	global $compliments;
	return array_merge($compliments, getDailyOddCompliments());
}

function getComplimentsList() {
	return loadCompliments();
}

function getCompliment(){
	global $compliments;
	
	$numCompliments = count($compliments);
	$index = rand(0, $numCompliments - 1);
	return $compliments[$index];
}

?>