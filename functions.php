<?php

function or_other($document, $field, $other_field, $other_value = 'other') {
    return $document[$field] == $other_value ? $document[$other_field] : $document[$field];    
}
