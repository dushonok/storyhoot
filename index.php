<?php
	$username = "tanya_liberman";

	$curl = curl_init();
	curl_setopt_array($curl, [

		CURLOPT_URL => "https://www.instagram.com/".$username."/?__a=1",

		CURLOPT_RETURNTRANSFER => 1,
		CURLINFO_HEADER_OUT => 1,
		CURLOPT_FOLLOWLOCATION => 1,
		CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/83.0.4103.116 Safari/537.36",
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 0,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "GET",
		CURLOPT_HTTPHEADER => array(
			"accept-encoding: gzip, deflate, br; user-agent: PostmanRuntime/7.26.1; postman-token: 87036781-567d-4074-956e-b56e54ab3074"
		),

		//CURLOPT_COOKIE => "sessionid="
	]);

	$output = curl_exec($curl);

	$res = curl_getinfo($curl, CURLINFO_HTTP_CODE);
	print_r("\nRequest status:\n");
	print_r($res);

	$res = curl_getinfo($curl, CURLINFO_HEADER_OUT);
	print_r("\nHeaders:\n");
	print_r($res);


	curl_close ($curl);

	print_r("\nServer output:\n");
	print_r($output);

	$output = json_decode($output,NULL);

	print_r("\nDecoded output:\n");
	print_r($output);

	if(isset($output->items)) {
		print_r("\nI'm inside IF!\n");
		// $last_story_array = array_reverse($output->items);
		
		// if(count($last_story_array) > 0) {
		//   $last_story = $last_story_array[0];

		//   $purchasedToday = time() - $last_story->taken_at ;
		//   $last_story_at = $purchasedToday/3600;
		// }
	}

?>