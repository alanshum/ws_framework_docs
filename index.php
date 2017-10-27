<?php
/**
 * Auto Converter and Prettifier for Markdown to HTML
 */
// ------ Do not edit ------
$usage_note = "Usage Note: <br>
copy and rename this file with the same file name as the markdown file. <br>
E.g. if the html file is 'example.html', then copy and rename this file as 'example.php'. <br>
Then open this php file in browser. <br>
And you can also edit to string replaces so that you can hide some stuff in the md file which is only useful in web version; <br>
and/or fix some strange behaviour which is resulted from the md converter library.<br>
";
define("DS", DIRECTORY_SEPARATOR);

// ------ Do not edit above ------

// this is the page title , will be shown at the top <h1> and <head><title>
$title = 'WS Framework Docs';

/**
 * Specify any search / replace pairs here. You can make up your special markup
 *
 * The first level associative array item name is just naming for reference, that has not related to any programmed stuff
 *
 * Template below for copy & paste
 *
 * ''    => array(
 * 'search'    => '',
 * 'replace'    => '',
 * ),
 */
$pairs = array(
    // suggest to use this open/close replacement tags for div, as using html tag directly seems to have strange behaviour in the converter library.
    'divopen'  => array(
        'search'  => '{div}',
        'replace' => '<div>',
    ),
    'divclose' => array(
        'search'  => '{/div}',
        'replace' => '</div>',
    ),

    // so that we don't have to update this
    'cur_year' => array(
        'search'  => '{cur_year}',
        'replace' => date('Y'),
    ),

    // add new item above this line
);

/**
 * ****************************************
 * Do not edit beyond this line if you are not sure
 * ****************************************
 */
$usage_note = "Usage Note: <br>
copy and rename this file with the same file name as the markdown file. <br>
E.g. if the html file is 'example.md', then copy and rename this file as 'example.php'. <br>
Then open this php file in browser. <br>
<br> (The markdown file must be in \".md\" extension)<br>
And you can also edit to string replaces so that you can hide some stuff in the md file which is only useful in web version; <br>
and/or fix some strange behaviour which is resulted from the md converter library. (Edit \$pairs)";

// get html file name
$self     = explode('/', $_SERVER['PHP_SELF']);
$file     = explode('.', end($self));
$filename = $file[0];
$file     = $filename . '.md';

// get basepath
array_pop($self);
$basepath = $_SERVER['DOCUMENT_ROOT'] . DS . implode(DS, array_filter($self)) . DS;

// get markdown content
$file_content = @file_get_contents($file) or die($usage_note);

$toc  = toc2array($file_content);
$text = incl_files($toc, $basepath . 'parts/');
$text = array_to_1d($text);

$text = implode("\n", $text) . "\n";

// Add back the only H1
$text = '# ' . $title . "\n" . $text;

// save to a readable markdown
clearstatcache();

if (($handle = @fopen($filename . '_full.md', 'a')) !== false)
{
    $fout = fwrite($handle, $text . "\n");
    fclose($handle);
}

// convert to html
require_once 'Michelf/MarkdownExtra.inc.php';

// for php5 - choose one to use
use \Michelf\MarkdownExtra;
$html = MarkdownExtra::defaultTransform($text);

// for php4 - choose one to use
// include_once "incl/markdown.php";
// $html = Markdown($text);

// get full h1 tag
preg_match_all('/<h1*[^>]*>.*?<\/h1>/', $html, $h1);
$h1   = $h1[0][0];
$html = str_replace($h1, '', $html); // remove original h1 in content area; and then later add to sidebar area

$title = substr($h1, 4, strlen($h1) - 9);



// prepare index
preg_match_all('/<h5*[^>]*>.*?<\/h5>/', $html, $h5);
$h5 = $h5[0];
sort($h5);
$h5group = array();     // init
foreach( $h5 as $i => $row )
{
    if( ! stristr( $row, '()' ) )
    {
        unset( $h5[$i] );
        continue;
    }
    $name = strip_tags($row);
    // $url = str_replace('()','',$name);
    // $h5[$i] = '<a href="#' . $url . '" title="Jump to ' . $name . '">' . $name . '</a>';
    $groupname = substr( $name , 0 , 1 );
    $h5group[$groupname][] = $name;
}

$h5 = array() ;      // reset

foreach( $h5group as $letter => $items)
{
    $h5[] = '<div class="apigroup"><h6>' . $letter . "</h6>\n\t<ul>";
    foreach( $items  as $item )
    {
        $url = str_replace('()','',$item);
        $h5[] = '<li><a href="#' . $url . '" title="Jump to ' . $item . '">' . $item . '</a></li>';
    }
    $h5[] = "\t</ul>\n</div>";
}

// styling
$h5 = implode( "\n" , $h5 );
$h5 = '<div class="apiindex">' . $h5 . '</div>';
$pairs[] = array(
    'search'  => '{index}',
    'replace' => $h5,
);



// add proper header/footer stuff
$html = '
<!DOCTYPE html>
<head>
<title>' . $title . '</title>
<meta charset=utf-8" />
<link rel="stylesheet" href="incl/bootstrap.min.css">
<link rel="stylesheet" href="incl/bootstrap-theme.min.css">
<link rel="stylesheet" href="incl/md.css">
<link rel="stylesheet" href="incl/anchorific.css">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/default.min.css">
<script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
</head>

<body id="top"><a href="#top" class="top" title="Back to Top">^</a>
<div class="container">
    <div class="row">
        <div class="col-md-4" id="left-menu">
            <div id="sidebar">' . $h1 . '
                <p></p>
                <nav class="anchorific"></nav>
            </div>
        </div>
        <div class="col-md-8" id="main-content">
' . $html . '
</div><!-- / container -->
</div><!-- / row-->
<script src="incl/jquery-1.11.3.min.js"></script>
<script src="incl/bootstrap-3.3.5.min.js"></script>
<script src="incl/plugins.js"></script>
<script>' . "
// sticky

// init
if ($(window).width() >= 992) {
    $('#sidebar').sticky({topSpacing: 0});
}

// if sized..
$(window).resize( function() {
    if ($(window).width() >= 992) {
        $('#sidebar').sticky({topSpacing: 0}).sticky('update');
    }
    else
    {
        $('#sidebar').unstick();
    }
});</script>
<script>$('.container').anchorific();</script>
<script>
    // Initialize all .smoothScroll links
    //jQuery(function($){ $.localScroll({filter:'.smoothScroll, .anchorific a'}); });
</script>
<script> // print buttons
    $('#btn_guest_wifi').click( function(){ $('#math-wifi ~ div').print(); });
    $('#btn_alias').click( function(){ $('#email_aliases').print(); });
</script>
</body>
</html>
";

foreach ($pairs as $name => $pair)
{
    $searchs[]  = $pair['search'];
    $replaces[] = $pair['replace'];
}

$html = str_replace($searchs, $replaces, $html);
echo $html;

/* **********************
 *   Functions
 * **********************
 */

/**
 * Print_r() for unlimited number of items with proper styles
 * @param mixed ...$var arguments to print. 'die' to die();
 */
function printr()
{
    foreach (func_get_args() as $var)
    {
        if ($var === 'die')
        {
            die();
        }

        echo '<pre><xmp>';
        print_r($var);
        echo '</xmp></pre>' . "\n";
    }

}

function vardump()
{
    /**
     * Var_dump for unlimited number of items.
     * Note: No styling as opposed to printr() - view source
     * @param mixed ...$var arguments to print. 'die' to die();
     */
    foreach (func_get_args() as $var)
    {
        if ($var === 'die')
        {
            die();
        }

        var_dump($var);
        echo "\n";
    }

}

/**
 * tsv data to 2d array
 * Note: can use // to comment out a row in tsv data
 * @param  string       $data          tsv
 * @param  bool         $has_header    =TRUE ; if first row of tsv is column names
 * @param  string|bool  $row_key       =TRUE ; set column name to be used as first level array key names instead of numbers; if TRUE: will search for 'id' column
 * @param  string       $delimiter     ="\t" ; column separator
 * @param  bool         $convert_space =TRUE; convert 4 consecutive spaces to tabs
 * @return multitype:
 */
function tsv2array($data, $has_header = true, $row_key = true, $delimiter = "\t", $convert_spaces = true)
{
    // already an array we won't do anything
    if (is_array($data))
    {
        return $data;
    }

    if ($convert_spaces)
    {
        $data = str_replace('    ', "\t", $data);
    }

    $data = preg_split('/\n|\r\n?/', $data);

    $data = array_filter($data);

    foreach ($data as $i => $row)
    {
        if (substr($row, 0, 2) == '//')
        {
            // so that you can comment within $data
            unset($data[$i]);
            continue;
        }

        $data[$i] = explode($delimiter, rtrim($row));
    }

//-- Column header
    if ($has_header)
    {
        $new = array_header_to_keys($data);
    }
    else
    {
        $new = $data;
    }

//-- 1st level array key (i.e. key of each row)

// error prone mechanism: 'id' would be most common and unique column
    if ($row_key === true)
    {
        $row_key = 'id';
    }

    $cur = current($new);

    if ($row_key !== false && isset($cur[$row_key]))
    {
        foreach ($new as $i => $row)
        {
            if ( ! isset($new2[$row[$row_key]]))
            {
                $new2[$row[$row_key]] = $row;
            }
            else
            {
                // ugly but error prone mechanism for non-unique values
                $new2[$row[$row_key] . $i] = $row;
            }

        }

    }
    else
    {
        $new2 = $new;
    }

    return $new2;
}

/**
 * Making first row of array to array keys
 * @param  array   $array
 * @return array
 */
function array_header_to_keys($array)
{
    $header = array_shift($array);
    $new    = array();
// init
    foreach ($array as $i => $row)
    {
        $row = array_pad($row, count($header), '');
        foreach ($row as $j => $value)
        {
            $header[$j]           = strtolower($header[$j]);
            $new[$i][$header[$j]] = $value;
        }

    }

    return $new;
}

/**
 * Trim all array items
 * @param  array   $options input array
 * @return array
 */
function array_trim($array)
{
    foreach ($array as $i => $child)
    {
        if (is_array($child))
        {
            $array[$i] = array_trim($child);
        }
        else
        {
            $array[$i] = trim($child);
        }

    }

    return $array;
}

/**
 * flattens array to one dimension and keep the values only.
 * @param  array   $arr input array
 * @return array
 */
function array_to_1d(array $arr)
{
    $new = array();
    foreach ($arr as $i => $row)
    {
        if (is_array($row))
        {
            $temp = array_to_1d($row);
            $new  = array_merge($new, $temp);
        }
        else
        {
            $new[] = $row;
        }

    }

    return $new;
}

/**
 * Create character repeatedly
 * @param string $char the character to be created
 * @param int    $num  =1; number of times to be repeated
 */
function char($char, $num = 1)
{
    $r = '';
    for ($i = 1; $i <= $num; $i++)
    {
        $r .= $char;
    }

    return $r;
}

/**
 * Create newline character ("\n")
 * Usage2: nl( $html ) - will wrap \n before and after
 * @param $num =1; number of newline characters to be created
 */
function nl($num = 1)
{
    if ( ! is_int($num))
    {
        return "\n" . $num . "\n";
    }

    return char("\n", $num);
}

/**
 * @param $num
 */
function hr($num = 1)
{
    $ret = array();
    for ($i = 1; $i <= $num; $i++)
    {
        $ret[] = nl(2) . char('-', 8) . nl(2);
    }

    return implode(nl(), $ret);
}

/**
 * ToC type content convert to array.
 * Note: this is customized to this doc app
 * @param  string $list             input text
 * @param  string $indentation      ="\t"; the indentation used. e.g. tab, 4 spaces, etc.
 * @return array  multi-dimentional array with added attributes.
 */
function toc2array($list, $indentation = "\t")
{
    $result = array();
    $path   = array();

    foreach (preg_split('/\R/', $list) as $line)
    {
        // get depth and label
        $depth = 0;

        if (trim($line) == '' or substr($line, 0, 2) == '//')
        {
            // skip blank lines and we can comment using //
            continue;
        }

        while (substr($line, 0, strlen($indentation)) === $indentation)
        {
            $depth += 1;
            $line = substr($line, strlen($indentation));
        }

// truncate path if needed
        while ($depth < sizeof($path))
        {
            array_pop($path);
        }

        // keep label (at depth)
        $path[$depth] = $line;

        // traverse path and add label to result
        $parent = &$result;

        foreach ($path as $depth => $key)
        {
            if ( ! isset($parent[$key]))
            {
                $parent[$line] = array('attributes' => array('depth' => $depth, 'path' => implode('/', $path)));
                break;
            }

            $parent = &$parent[$key];
        }

    }

    return $result;
}

/**
 * Prep "function" docs
 * @param  string $fx_name   name of the function
 * @param  string $content   md file content
 * @param  string $delimiter what delimits the separation of differnt sections
 * @return string complete text in md
 */
function prep_fx($fx_name, $content, $delimiter = "\n")
{
    $content = array_trim(explode($delimiter, $content));

    // init for display order
    $sections = array(
        'Syntax'        => '',
        'Description'   => '',
        'Parameters'    => '',
        'Properties'    => '',
        'Return Values' => '',
        'Examples'      => '',
        'Changlog'      => '',
    );

    foreach ($content as $row)
    {
        $row          = explode("\r\n", $row);
        $section_name = trim(array_shift($row), "*");
        foreach ($row as $i => $r)
        {
            if (substr($r, 0, -2) != '  ')
            {
                $row[$i] .= '  ';
            }

        }

        $sections[$section_name] = implode("\n", $row);
    }

    foreach ($sections as $section_name => $row)
    {
        if ($section_name == 'Parameters' or $section_name == 'Properties')
        {
            $row = tsv2array($row);

            // $s = syntax section (1st line)
            // $p = parameters section
            // var ends with numbers ($s1, $p1) are temp vars
            $p = array();
            $s = '`' . $fx_name . '( ';

            foreach ($row as $i => $param)
            {
                if ($param['name'] != '...')
                {
                    $param_name = '$' . $param['name'];
                    if( isset($param['by_ref']) && $param['by_ref'] )
                    {
                        $param_name = '&' . $param_name;
                    }
                }
                else
                {
                    $param_name = '...';
                }

                $is_optional = false;

                if ($param['def_value'] != '')
                {
                    $is_optional = true;
                }

                $s1 = $param_name;
                $p1 = "{$param['type']} **{$param_name}**";
                $p1 .= empty($param['def_value']) ? '' : ' = ' . $param['def_value'];

                if ($is_optional)
                {
                    $s1 = '[' . $s1 . ']';
                    $p1 = '[' . $p1 . ']';
                }

                $s .= $s1;
                $p[] = '- ' . $p1;
                // note: if we want to separate more points in the desc, add <br> tag
                $p[] = empty($param['desc']) ? '' : '  - ' . str_replace('<br>', "\n  - ", $param['desc']);

                if ($param !== end($row))
                {
                    $s .= ', ';
                }

            }

            $s .= ' )`' . "\n";

            if ($section_name == 'Parameters')
            {
                $sections['Syntax'] = $s;
            }

            $sections[$section_name] = implode("\n", $p);
        }

        if ($section_name == 'Return Values')
        {
            $row = tsv2array($row);

            $r = array();

            foreach ($row as $i => $rval)
            {
                $type = ucwords($rval['type']);

                $rval['desc'] = str_replace('of ', '', $rval['desc']); // I'm just lazy re-editing

                $val = empty($rval['desc']) ? '' : ': ' . $rval['desc'];

                $r[] = "- **{$type}**{$val}";
            }

            $sections['Return Values'] = implode("\n", $r);
        }

        // Delete the section if no content
        if ($section_name != 'Syntax' && empty(trim($sections[$section_name])))
        {
            if ($section_name == 'Parameters')
            {
                $sections['Parameters'] = '- *nil*';
            }
            else
            {
                unset($sections[$section_name]);
            }

        }

        // add section name
        if (isset($sections[$section_name]))
        {
            if ( ! in_array($section_name, array('Syntax', 'Description')))
            {
                $sections[$section_name] = "**{$section_name}**\n\n" . $sections[$section_name];
            }

            $sections[$section_name] .= "\n";
        }

    }

    return $sections;
}

/**
 * include the actual md files
 * @param  array  $arr            input array (toc list)
 * @param  [type] $basepath       [description]
 * @return [type] [description]
 */
function incl_files($arr, $basepath)
{
    $ret = array();
// init

    foreach ($arr as $i => $row)
    {
        if ($i == 'attributes')
        {
            // include the part as this is the file to include
            $content = @file_get_contents($basepath . $row['path'] . '.md');

            // prep content for functions api doc
            if ($row['depth'] == '3' && strpos($row['path'], '()'))
            {
                $fx_name = explode('/', $row['path']);
                $fx_name = array_pop($fx_name);
                $fx_name = substr($fx_name, 0, strlen($fx_name) - 2);

                $content = prep_fx($fx_name, $content, '--------');
                $content = implode("\n", $content);
            }

            if ( ! empty($content))
            {
                // $text = explode( "\n" , $content );
                // foreach( $text as $i => $r )
                // {
                //     if( substr( $r , 0 , -2 ) != '  ' )
                //     {
                //         $text[$i] .= '  ';
                //     }
                // }
                // $ret[] = nl( implode( "\n", $text ) );
                $ret[] = nl($content);
                $ret[] = hr();
            }

        }
        else
        {
            // there are other children and so put up the heading first and include the parts.
            $ret[] = char('#', $row['attributes']['depth'] + 2) . ' ' . $i;
            $ret[] = incl_files($row, $basepath);

            // add more hr for h3, but no need more if no h4 ( but add if last h3 with no h4 )
            if ($row['attributes']['depth'] == 1)
            {
                if (count($row) > 1 or $row == end($arr))
                {
                    $ret[] = hr();
                }

            }

            // add more hr for h2
            if ($row['attributes']['depth'] == 0)
            {
                $ret[] = hr();
            }

        }

    }

    return $ret;
}
