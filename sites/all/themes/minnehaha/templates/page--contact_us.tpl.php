
<?php
//retrieving values @ToDo move into preprocessor
if (!empty($node)){

    $fieldHeaderBkIma = field_get_items('node', $node, 'field_contact_header_background');
    if ($fieldHeaderBkIma){
        $image_url = url('sites/default/files/'.file_uri_target($fieldHeaderBkIma[0]['uri']), array('absolute'=>true));
    }

    $fieldPageSlogan = field_get_items('node', $node, 'field_contuct_us_page_slogan');
    if ($fieldPageSlogan){
        $page_slogan = $fieldPageSlogan[0]['value'];
    }

    $fieldPhoneNumber = field_get_items('node', $node, 'field_phone_number');
    if ($fieldPhoneNumber){
        $phone_number = $fieldPhoneNumber[0]['value'];
    }

    $fieldStreetAddress = field_get_items('node', $node, 'field_street_address');
    if ($fieldStreetAddress){
        $street_address = $fieldStreetAddress[0]['value'];
    }

    $fieldCity = field_get_items('node', $node, 'field_city');
    if ($fieldCity){
        $city = $fieldCity[0]['value'];
    }

    $fieldState = field_get_items('node', $node, 'field_state');
    if ($fieldState){
        $state = $fieldState[0]['value'];
    }

    $fieldZipCode = field_get_items('node', $node, 'field_zip_code');
    if ($fieldZipCode){
        $zip_code = $fieldZipCode[0]['value'];
    }

    $fieldZipCode = field_get_items('node', $node, 'field_zip_code');
    if ($fieldZipCode){
        $zip_code = $fieldZipCode[0]['value'];
    }

}
?>
<?php //print render($page['sticky_property_menu']); ?>
<div class="isi">
    <div class="container">

        <div class="row">

            <?php print render($page['header_logo']); ?>
            <div class="span5 pull-right">
                <?php print theme('links__system_main_menu', array('links' => $main_menu, 'attributes' => array('class' => array('nav nav-pills')))); ?>

            </div>
        </div>

        <div class="row">
            <div class="span12 batas"></div>
            <div class="clearfix"></div>
                <g:render template="top_messaging"/>
            <div class="span12">
                <ul class="breadcrumb">
                    <li>
                        <a href="${createLink(action: 'home')}">Home</a> <span class="divider">/</span>
                    </li>
                    <li class="active">About</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class='span3'>
                <div class="pagge">
                    <?php print render($title_prefix); ?>
                    <?php if ($title): ?>
                        <h2><?php print $title; ?></h2>
                    <?php endif; ?>
                    <?php print render($title_suffix); ?>
                    <p><?php if(!empty($page_slogan)){print $page_slogan;} ?></p>
                </div>
            </div>
            <div class='span9'>
                <div class="bga" style="background:url('<?php if(!empty($image_url)){print $image_url;} ?>') no-repeat;">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="span12 batasdot"></div>
            <div class="clearfix"></div>
        </div>

        <div class="row">
            <div class="span4">
                    <ul class="nav nav-list">
                        <li class="nav-header">Where You Can Find us</li>
                        <li><i class="icon-home"></i><?php if(!empty($city) && !empty($state)){print $city.', '.$state;} ?></li>
                        <li><i class="icon-road"></i><?php if(!empty($street_address)){print $street_address;} ?></li>
                        <li><?php if(!empty($zip_code)){print $zip_code;} ?></li>
                        <li><iframe width="280" height="280" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="http://maps.google.com/maps?hl=en&amp;q=3324+23rd+Ave+South+Minneapolis,+mn+55407&amp;ie=UTF8&amp;hq=&amp;hnear=3324+23rd+Ave+S,+Minneapolis,+Minnesota+55407&amp;gl=us&amp;t=m&amp;ll=44.941959,-93.239422&amp;spn=0.021264,0.030041&amp;z=14&amp;output=embed"></iframe></li>
                        <li class="nav-header">Our Telephone Number</li>
                        <li><?php if(!empty($phone_number)){print $phone_number;} ?></li>
                    </ul>
            </div>
            <div class="span8">
                <?php if ($tabs): ?><?php print render($tabs); ?><?php endif; ?>
                <?php if ($action_links): ?>
                    <ul class="action-links"><?php print render($action_links); ?></ul>
                <?php endif; ?>
                <?php
                    hide($content['field_title_description']);
                    print render($page['content']);
                ?>
                <?php print $feed_icons; ?>
            </div>
        </div>
        <div class="clearfix"></div>
    </div><!-- end container -->
    <div class="footers">
        <?php print render($page['footer']); ?>
    </div>
</div><!-- end isi -->
    <script type="application/javascript">
        $('.carousel').carousel();
    </script>
