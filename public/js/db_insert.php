<?php
    // global $wpdb;
    
    // $table_name = 'wdm_sub_me';
    // if (isset($_POST['sub_email'])) {
    //   $wpdb->insert(
    //     $table_name,
    //     array(
    //       'subscriber' => $_POST['sub_email']
    //     )
    //   );
    // }
    $email = $_POST['sub_email'];
    
    $conn = mysqli_connect( "http://plugin-assg.local/", "root", "root", "local" );

    $sql = "INSERT INTO wdm_sub_me('subscriber') VALUES($email)";

    mysqli_query($conn, $sql);

    function send_subscription_mail($to)
	{
		$subject = 'Latest Post Summary';
		$summary = get_daily_post_summary();
		$message = "Latest Posts: ";
		$message .= "\n";
		foreach ($summary as $post_data) {
			$message .= 'Title: ' . $post_data['title'] . "\n";
			$message .= 'URL: ' . $post_data['url'] . "\n";
			$message .= "\n";
		}

		$headers = array(
			'From: wisdm@shilavilla.com',
			'Content-Type: text/html; charset=UTF-8'
		);

		wp_mail($to, $subject, $message, $headers);
	}

	function get_daily_post_summary()	{
		$args = array(
			'post_type' => 'post',
			'posts_per_page' => get_option('no_of_posts'),
			'post_status' => 'publish'
		);

		$query = new WP_Query($args);
		$posts = $query->posts;
		$mail_list = array();

		foreach ($posts as $post) {
			$post_data = array(
				'title' => $post->post_title,
				'url' => get_permalink($post->ID),
			);
			array_push($mail_list, $post_data);
		}
		return $mail_list;
	}

    
?>