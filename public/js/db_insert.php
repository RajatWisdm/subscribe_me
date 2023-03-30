<?php
    global $wpdb;

    $table_name = 'wdm_scheduled_data';
    $charset_collate = $wpdb->get_charset_collate();

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name){
      $sql = "CREATE TABLE IF NOT EXISTS $table_name (
        id mediumint(9) AUTO_INCREMENT,
        date date NOT NULL,
        occasion varchar(255) NOT NULL,
        post_title varchar(255) NOT NULL,
        author int(11) NOT NULL,
        reviewer varchar(255) NOT NULL,
        PRIMARY KEY  (id)
      ) $charset_collate;";
  
      require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
      dbDelta( $sql );
    }


    if (isset($_POST['date']) && isset($_POST['occasion']) && isset($_POST['post_title']) && isset($_POST['author']) && isset($_POST['reviewer'])) {
      $table_name = 'wdm_scheduled_data';
      $date = sanitize_text_field($_POST['date']);
      $occasion = sanitize_text_field($_POST['occasion']);
      $post_title = sanitize_text_field($_POST['post_title']);
      $author = sanitize_text_field($_POST['author']);
      $reviewer = sanitize_text_field($_POST['reviewer']);
      $wpdb->insert(
        $table_name,
        array(
          'date' => $date,
          'occasion' => $occasion,
          'post_title' => $post_title,
          'author' => $author,
          'reviewer' => $reviewer
        )
      );
    }
?>