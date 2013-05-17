<!DOCTYPE html>
<html lang="<?php print $language->language; ?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--    --><?php //print '<link href="'.base_path() . path_to_theme() .'css/telex.woff" rel="stylesheet" type="text/css">'; ?>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
   <?php print '<script>';
   print 'var MIN_CONFIG = (function () {';
      print 'var viewDriverHost = "'.$interfaceConfig['driver_url'].'";';
      print 'var viewDriverPort = "'.$interfaceConfig['driver_port'].'";';
//implement the public part
      print 'return {';
          print 'getDriverUrl: function () {';
             print "return 'http://' + viewDriverHost + ':' + viewDriverPort;";
          print '}';
      print '};';
    print '}());';
   print '</script>';?>
  <?php print '<script src="http://'.$interfaceConfig['driver_url'].':'.$interfaceConfig['driver_port'].'/socket.io/socket.io.js"></script>';?>
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!-- HTML5 element support for IE6-8 -->
  <!--[if lt IE 9]>
    <script src="//html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>
<body class="<?php print $classes; ?>" <?php print $attributes;?>>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>
</html>
