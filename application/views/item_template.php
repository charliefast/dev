<?php
//$query = $this->db->query("SELECT * FROM blog");

$data = array(
              'blog_title'   => 'My Blog Title',
              'blog_heading' => 'My Blog Heading',
               'blog_entries' => array(
                                      array('title' => 'Title 1', 'body' => 'Body 1'),
                                      array('title' => 'Title 2', 'body' => 'Body 2'),
                                      array('title' => 'Title 3', 'body' => 'Body 3'),
                                      array('title' => 'Title 4', 'body' => 'Body 4'),
                                      array('title' => 'Title 5', 'body' => 'Body 5')
                                      )
            );

$this->parser->parse('item_template', $data);