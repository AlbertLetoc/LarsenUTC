<?php 
/**
 * trims text to a space then adds ellipses if desired
 * @param string $input text to trim
 * @param int $length in characters to trim to
 * @param bool $ellipses if ellipses (...) are to be added
 * @param bool $strip_html if html tags are to be stripped
 * @return string 
 */
function trim_text($input, $length, $ellipses = true, $strip_html = true) {
    if ($strip_html) {
        $input = strip_tags($input);
    }
  
    if (strlen($input) <= $length) {
        return $input;
    }
  
    $last_space = strrpos(substr($input, 0, $length), ' ');
    $trimmed_text = substr($input, 0, $last_space);

    if ($ellipses) {
        $trimmed_text .= '...';
    }
  
    return $trimmed_text;
}

function formatName($name) {
    return ucfirst(strtolower($name));
}