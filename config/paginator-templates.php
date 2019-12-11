<?php
$disabled = '<a class="btn btn-primary disabled" href="{{url}}">{{text}}</a>';
$enabled = '<a class="btn btn-primary" href="{{url}}">{{text}}</a>';
return [
    'number' => $enabled,
    'prevDisabled'=> $disabled,
    'nextDisabled' => $disabled,
    'nextActive' => $enabled,
]; 
