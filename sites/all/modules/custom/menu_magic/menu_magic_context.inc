<?php

/**
 * Use a helper function to turn text into numbers.
 * @param type $nid
 * @return type drupal_not_found()
 */
//function menu_magic_node_context($nid) {
//    if (is_numeric($nid) && $node = node_load($nid)) {
//        $text = _menu_magicify($node->body['und'][0]['value']);
//        $output = array(
//            '#type' => 'markup', 
//            '#markup' => $text,            
//        );
//        return $output;
//    }
//    else {
//        return drupal_not_found();
//    }
//}

/**
 * Use a helper function to turn text into numbers.
 * @param type $node
 * @return type string.
 */
function menu_magic_node_context($node) {
        $text = _menu_magicify($node->body['und'][0]['value']);
        $output = array(
            '#type' => 'markup', 
            '#markup' => $text,            
        );
        return $output;
}

/**
 * Is working correctly.
 *  A helper function.
 */
function _menu_magicify($text) {
    $substitutions = array(
        'T' => '1',
        'h' => '2',
        'i' => '3',
        's' => '4',
    );
    $text = implode($substitutions);
    return $text;
    
}