<?php
/*
by donshakespeare
TinymceWrapperMarkdown is an Output Modifier for MODX
[[*content:TinymceWrapperMarkdown=`markdown`]]
or `markdownE` or `parsedown`
default =`parsedownE`
parsedownE or markdownE is good for Markdown mixed with HTML, and Markdown enclosed in HTML markdown="1"*/
if($input){
    $content = $input;
    // Parse MODX tags first || parse BBCodes here too
    $content = $modx->newObject('modChunk')->process(null, $content);
    $options = explode(',',$options);
    if($options[0] == "markdown"){
        if (!class_exists('\Michelf\Markdown')) {
            require_once MODX_ASSETS_PATH . 'components/tinymcewrapper/markdown/Michelf/Markdown.inc.php';
        }
        $content = \Michelf\Markdown::defaultTransform($content);
    }
    elseif($options[0] == "markdownE"){
        if (!class_exists('\Michelf\MarkdownExtra')) {
            require_once MODX_ASSETS_PATH . 'components/tinymcewrapper/markdown/Michelf/MarkdownExtra.inc.php';
        }
        $content = \Michelf\MarkdownExtra::defaultTransform($content);
    }
    elseif($options[0] == "parsedown"){
        require_once MODX_ASSETS_PATH . 'components/tinymcewrapper/markdown/parsedown/Parsedown.php';
        $Parsedown = new Parsedown();
        $content = $Parsedown->text($content);
    }
    else{ //default state
        $options[0] = "parsedownExtra";
        require_once MODX_ASSETS_PATH . 'components/tinymcewrapper/markdown/parsedown/Parsedown.php';
        require_once MODX_ASSETS_PATH . 'components/tinymcewrapper/markdown/parsedown/ParsedownExtra.php';
        $ParsedownExtra = new ParsedownExtra();
        $content = $ParsedownExtra->text($content);
    }
    if(isset($options[1])){
        $squareBracketSeparator = substr($options[1], 0, 1);
        $content = str_replace('['.$squareBracketSeparator.'[', '&#91;&#91;', $content); // do some more find/replace
    }
    return $content);
}
