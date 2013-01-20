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
if ( ! function_exists('confirmation_popup_box'))
{
    function confirmation_popup_box($url, $message)
    {
      $html = '<div>
      				<p>'.$message.'</p>
      				<form action="'.$url.'"" method="post">
      				<button type="submit" value="cancel" name="submit">Avbryt</button>
      				<button type="submit" value="confirm" name="submit">Ja</button>
      				</form>
      				</div>';
      return $html;
    }   
}
/* End of file my_output_helper.php */
/* Location: ./application/helpers/my_output_helper.php */