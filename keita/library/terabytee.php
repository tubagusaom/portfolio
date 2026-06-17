<?php
  function get_self(){
    $self = $_SERVER["PHP_SELF"];
    return ($self);
  }

  function base64_encode_image ($filename=string,$filetype=string,$filepath=string) {

    $fileimg = $filepath.$filename;

    if ($fileimg) {
        $imgbinary = fread(fopen($fileimg, "r"), filesize($fileimg));
        return 'data:image/' . $filetype . ';base64,' . base64_encode($imgbinary);
    }

  }

  function base64_encode_image_size ($filename=string) {

    $fileimg = $filename;

    $size_info1 = getimagesize($fileimg);

    $data       = file_get_contents($fileimg);
    $size_info2 = getimagesizefromstring($data);

    return $size_info2;
  }

  function pregmatchall ($fileimg) {
    $html = '<img src="'.$fileimg.'" style="width:100%">';

    preg_match_all('/<img.*?src=[\'"](.*?)[\'"].*?>/i', $html, $matches);

    $elements = $matches[1];
    // var_dump($matches);
    return $elements;
  }

  function convertImg($string) {
    return preg_replace('/((https?):\/\/(\S*)\.(jpg|gif|png)(\?(\S*))?(?=\s|$|\pP))/i', '<img src="$1" />', $string);
  }

  function encrypt($string) {
    return strtr(base64_encode($string), '+/=', '-_,');
  }

  function decrypt($string) {
    return base64_decode(strtr($string, '-_,', '+/='));
  }

  function url_encode($string){
    return urlencode(utf8_encode($string));
  }

  function url_decode($string){
    return utf8_decode(urldecode($string));
  }

?>
