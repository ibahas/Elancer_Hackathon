<?php

function title($var)
{
    
    if (\LaravelLocalization::getCurrentLocale() == 'en') {
        return $var->titleAr;
    } elseif (\LaravelLocalization::getCurrentLocale() == 'ar') {
        return $var->title;
    }else{
      return '';  
    }
}
