<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Helper functions for output
 */
if ( ! function_exists('create_json'))
{
    function create_json($json)
    {
      $json = json_encode($json);
      return $json;
    }   
}
/* End of file my_output_helper.php */
/* Location: ./application/helpers/my_output_helper.php */