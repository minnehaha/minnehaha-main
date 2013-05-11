<?php
function minnehaha_preprocess_html(&$vars, $hook) {
    global $conf;
    // Return nid of nodes of type "interface_configuraitons".
    $nid_config = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->fields('n', array('type'))
        ->condition('n.type', 'interface_configurations')
        ->execute()
        ->fetchCol();
    //load the configurations
    $configurationNode = node_load($nid_config);
    $interfaceConfig = array();

    if(!empty($configurationNode->field_driver_url['und'][0]['value'])){
        //if set by user
        $interfaceConfig['driver_url'] = $configurationNode->field_driver_url['und'][0]['value'];
    }else{
        //hard coded in default/settings.php
        $interfaceConfig['driver_url'] = $conf['global_driver_url'];
    }
    if(!empty($configurationNode->field_driver_port['und'][0]['value'])){
        //if set by user
        $interfaceConfig['driver_port'] = $configurationNode->field_driver_port['und'][0]['value'];
    }else{
        //hard coded in default/settings.php
        $interfaceConfig['driver_port'] = $conf['global_driver_port'];
    }

        $vars['interfaceConfig'] = $interfaceConfig;
}

function minnehaha_preprocess_page(&$vars, $hook) {
    // Return all nids of nodes of type "property".
    $nids = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->fields('n', array('type'))
        ->condition('n.type', 'property')
        ->execute()
        ->fetchCol(); // returns an indexed array

    //return the property node objects.
    $properties = node_load_multiple($nids);
    $propertyMap = array();
    $i = 0;
    foreach ($properties as $key => $value)
    {
        $propertyMap[ $i ]['title'] = $value->title;
        $propertyMap[ $i ]['url'] = drupal_get_path_alias("node/$key");
        $featuredPhoto = $value->field_featured_photo;
        $propertyMap[ $i ]['featuredPhotoUrl'] = url('sites/default/files/'.file_uri_target($featuredPhoto['und'][0]['uri']), array('absolute'=>true));
        $propertyMap[ $i ]['featuredPhotoAlt'] = $value->field_featured_photo['und'][0]['alt'];
        $featuredTestimonialPhoto = $value->field_featured_review_photo;
        $propertyMap[ $i ]['featuredTestimonialPhotoUrl'] = url('sites/default/files/'.file_uri_target($featuredTestimonialPhoto['und'][0]['uri']), array('absolute'=>true));
        $propertyMap[ $i ]['featuredTestimonialPhotoAlt'] = $value->field_featured_review_photo['und'][0]['alt'];
        $fieldParagraphAboutProperty = $value->field_paragraph_about_property;
        $propertyMap[ $i ]['summary'] = $fieldParagraphAboutProperty['und'][0]['value'];
        $propertyMap[ $i ]['universalId'] = $value->field_rental_unit_id['und'][0]['value'];
        $i++;
    }
    $vars['propertyMap'] = $propertyMap;

    //about hosts for front page
    $aboutHosts = node_load(17);//@ToDo find way to dynamically get id for basic page - About Host
    $hostsCollection = array();
    $hostsCollection['summary'] = $aboutHosts->field_paragraph_of_content['und'][0]['value'];
    $hostsCollection['url'] = drupal_get_path_alias("node/17");
    $hostsCollection['imgUrl'] = url('sites/default/files/'.file_uri_target($aboutHosts->field_basic_page_featured_photo['und'][0]['uri']), array('absolute'=>true));
    $hostsCollection['imgAlt'] = $aboutHosts->field_basic_page_featured_photo['und'][0]['alt'];
    $vars['aboutHost'] = $hostsCollection;

    //Testimonial page
    $testimonialId = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->fields('n', array('type'))
        ->condition('n.type', 'testimonials')
        ->execute()
        ->fetchCol();
    $testimonialUrl = drupal_get_path_alias("node/$testimonialId[0]");
    $vars['testimonialUrl'] = $testimonialUrl;

    //default header background image
    $basicPageId = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->fields('n', array('type'))
        ->condition('n.type', 'page')
        ->execute()
        ->fetchCol();
    $basicPageNode = node_load($basicPageId);
    $fieldHeaderBkIma = field_get_items('node', $basicPageNode, 'field_header_background_image');
    if ($fieldHeaderBkIma){
        $vars['image_url'] = url('sites/default/files/'.file_uri_target($fieldHeaderBkIma[0]['uri']), array('absolute'=>true));
    }


    if (isset($vars['node'])) {
        $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
        switch($vars['node']->type){
            case "property":
                minnehaha_preprocess_property($vars, $hook, $propertyMap);
                break;
            case "faq_page":
                minnehaha_preprocess_faq_page($vars, $hook);
                break;
            case "testimonials":
                minnehaha_preprocess_testimonials($vars, $hook);
                break;
            case "article":
                minnehaha_preprocess_article($vars, $hook);
                break;
            case "user":
                minnehaha_preprocess_user($vars, $hook);
                break;
            default:
                minnehaha_preprocess_basic_page($vars, $hook);
                break;
        }
    }
}

function minnehaha_preprocess_basic_page(&$vars, $hooks){
    $node = $vars['node'];
    $fieldHeaderBkIma = field_get_items('node', $node, 'field_header_background_image');
    if ($fieldHeaderBkIma){
        $vars['image_url'] = url('sites/default/files/'.file_uri_target($fieldHeaderBkIma[0]['uri']), array('absolute'=>true));
    }

    $fieldPageSlogan = field_get_items('node', $node, 'field_page_slogan');
    if ($fieldPageSlogan){
        $vars['page_slogan'] = $fieldPageSlogan[0]['value'];
    }

    $fieldParagraphOfContent = field_get_items('node', $node, 'field_paragraph_of_content');
    $sizeOfParagraphs = count($fieldParagraphOfContent);
    $basicParagraphs = array();
    for ($i = 0; $sizeOfParagraphs > $i; $i++)
    {
         $basicParagraphs[$i] = $fieldParagraphOfContent[$i]['value'];
    }
    $vars['basicPagePars'] = $basicParagraphs;

    $fieldContentPhotos = field_get_items('node', $node, 'field_content_photos');
    $basicPagePhotos = array();
    for($i = 0; $i < count($fieldContentPhotos); $i++){
        $contentPhoto = node_load($fieldContentPhotos[$i]['target_id']);
        $basicPagePhotos[$i]['contentPhotoTitle'] = $contentPhoto->field_photo_title['und'][0]['value'];
        $basicPagePhotos[$i]['contentPhotoDescription'] = $contentPhoto->field_photo_description['und'][0]['value'];
        $contentPhotoImage = $contentPhoto->field_image_file;
        $basicPagePhotos[$i]['contentPhotoImgUrl'] = url('sites/default/files/'.file_uri_target($contentPhotoImage['und'][0]['uri']), array('absolute'=>true));
        $basicPagePhotos[$i]['contentPhotoImgAlt'] = $contentPhotoImage['und'][0]['alt'];
    }
    if(!empty($basicPagePhotos)){$vars['basicPagePhotos'] = $basicPagePhotos;}else{$vars['basicPagePhotos'] = 'empty';}

    $fieldListOfContentText = field_get_items('node', $node, 'field_list_of_content_text');
    $listOfText = array();
    $entityOfList = node_load($fieldListOfContentText[0]['target_id']);
    $listOfText['description'] = $entityOfList->field_description_of_list['und'][0]['value'];
    $listOfText['item'] = array();
    $numOfItems = count($entityOfList->field_list_item['und']);
    for($i = 0 ; $i < $numOfItems; $i++){
        $listOfText['item'][$i] = $entityOfList->field_list_item['und'][$i]['value'];
    }
    $vars['listOfText'] = $listOfText;
}

function minnehaha_preprocess_faq_page(&$vars, $hook){
    $node = $vars['node'];

    $fieldFAQSlogan = $node->field_faq_page_slogan;
    if ($fieldFAQSlogan){
        $vars['page_slogan'] = $fieldFAQSlogan['und'][0]['value'];
    }
    $fieldFAQHeaderBkIma = field_get_items('node', $vars['node'], 'field_faq_header_background_img');
    if ($fieldFAQHeaderBkIma){
        $vars['image_url'] = url('sites/default/files/'.file_uri_target($fieldFAQHeaderBkIma[0]['uri']), array('absolute'=>true));
    }

    $fieldFAQs =  $node->field_faq_questions_answers;
    $fieldFAQList = array();
    for ($i = 0; count($fieldFAQs['und']) > $i; $i++)
    {
        $qa = node_load($fieldFAQs['und'][$i]['target_id']);
        $fieldFAQList[$i]['question'] = $qa->field_faq_question['und'][0]['value'];
        $fieldFAQList[$i]['answer'] = $qa->field_faq_answer['und'][0]['value'];
    }
    $vars['listOfFAQ'] = $fieldFAQList;

    $fieldParagraphBeforeFAQs = $node->field_paragraph_before_faq;
    if ($fieldParagraphBeforeFAQs){
        $vars['paragraphBeforeFAQs'] = $fieldParagraphBeforeFAQs['und'][0]['value'];
    }
    $fieldParagraphAfterFAQs = $node->field_paragraph_after_faq;
    if ($fieldParagraphAfterFAQs){
        $vars['paragraphAfterFAQs'] = $fieldParagraphAfterFAQs['und'][0]['value'];
    }

}

function minnehaha_preprocess_property(&$vars, $hook, $propertyMap) {
    //@ToDo: this is not called by Drupal,but, perhaps, it should. Temp solution manually calling from 'minnehaha_preprocess_page'
    $node = $vars['node'];

    $propertyUniversalId =  $node->field_rental_unit_id;
    if ($propertyUniversalId){
        $vars['rentalUnitId'] = $propertyUniversalId['und'][0]['value'];
    }

    $fieldPropertyCharacter =  $node->field_property_character;
    if ($fieldPropertyCharacter){
        $vars['property_character'] = $fieldPropertyCharacter['und'][0]['value'];
    }

    $fieldPropertySlogan = $node->field_property_slogan;
    if ($fieldPropertySlogan){
        $vars['property_slogan'] = $fieldPropertySlogan['und'][0]['value'];
    }

    $vars['fieldPropertyType'] = field_get_items('node', $node, 'field_property_type')[0]['value'];
    $vars['fieldPropertyOtherInfo'] = field_get_items('node', $node, 'field_property_other_info')[0]['value'];
    $vars['fieldPropertyAddress'] = field_get_items('node', $node, 'field_property_address')[0]['value'];

    $fieldParagraphAboutProperty = field_get_items('node', $node, 'field_paragraph_about_property');
    $sizeOfParagraphs = count($fieldParagraphAboutProperty);
    $propertyParagraphs = array();
    for ($i = 0; $sizeOfParagraphs > $i; $i++)
    {
        $propertyParagraphs[$i] = $fieldParagraphAboutProperty[$i]['value'];
    }
    $vars['propertyParagraphs'] = $propertyParagraphs;

    $fieldFeaturesAndAmenities = field_get_items('node', $node, 'field_features_and_amenities');
    $sizeOfAmenities = count($fieldFeaturesAndAmenities);
    $propertyFeatures = array();
    for ($i = 0; $sizeOfAmenities > $i; $i++)
    {
        $propertyFeatures[$i] = $fieldFeaturesAndAmenities[$i]['value'];
    }
    $vars['propertyFeatures'] = $propertyFeatures;

    $fieldPropertyPhoto = field_get_items('node', $node, 'field_property_photo');
    $propertyPhotos = array();
    for($i = 0; $i < count($fieldPropertyPhoto); $i++){
        $propertyPhotos[$i]['url'] = url('sites/default/files/'.file_uri_target($fieldPropertyPhoto[$i]['uri'], array('absolute'=>true)));
        $propertyPhotos[$i]['alt'] = $fieldPropertyPhoto[$i]['alt'];
    }
    $vars['propertyPhotos'] = $propertyPhotos;

    $priceEntity = node_load($node->field_rental_pricing['und'][0]['target_id']);
    $vars['fieldHighSeasonDates'] = $priceEntity->field_high_season_dates['und'][0]['value'];
    $vars['fieldLowSeasonDates'] = $priceEntity->field_low_season_dates['und'][0]['value'];
    $vars['fieldHighSeasonDailyRate'] = $priceEntity->field_high_season_daily_rate['und'][0]['value'];
    $vars['fieldHighSeasonWeeklyRate'] = $priceEntity->field_high_season_weekly_rate['und'][0]['value'];
    $vars['fieldHighSeasonMonthlyRate'] = $priceEntity->field_high_season_monthly_rate['und'][0]['value'];
    $vars['fieldLowSeasonDailyRate'] = $priceEntity->field_low_season_daily_rate['und'][0]['value'];
    $vars['fieldLowSeasonWeeklyRate'] = $priceEntity->field_low_season_weekly_rate['und'][0]['value'];
    $vars['fieldLowSeasonMonthlyRate'] = $priceEntity->field_low_season_monthly_rate['und'][0]['value'];
    $vars['fieldCleaningFee'] = $priceEntity->field_cleaning_fee['und'][0]['value'];

    $contentPhoto1 = node_load($node->field_property_content_photo['und'][0]['target_id']);
    $vars['contentPhotoTitle1'] = $contentPhoto1->field_photo_title['und'][0]['value'];
    $vars['contentPhotoDescription1'] = $contentPhoto1->field_photo_description['und'][0]['value'];
    $contentPhotoImage1 = $contentPhoto1->field_image_file;
    $vars['contentPhotoImage1'] = $contentPhotoImage1;
    $vars['contentPhotoImageUrl1'] = url('sites/default/files/'.file_uri_target($contentPhotoImage1['und'][0]['uri']), array('absolute'=>true));
    $vars['contentPhotoImageAlt1'] = $contentPhotoImage1['und'][0]['alt'];

    $contentPhoto2 = node_load($node->field_property_content_photo['und'][1]['target_id']);
    $vars['contentPhotoTitle2'] = $contentPhoto2->field_photo_title['und'][0]['value'];
    $vars['contentPhotoDescription2'] = $contentPhoto2->field_photo_description['und'][0]['value'];
    $contentPhotoImage2 = $contentPhoto2->field_image_file;
    $vars['contentPhotoImage2'] = $contentPhotoImage2;
    $vars['contentPhotoImageUrl2'] = url('sites/default/files/'.file_uri_target($contentPhotoImage2['und'][0]['uri']), array('absolute'=>true));
    $vars['contentPhotoImageAlt2'] = $contentPhotoImage2['und'][0]['alt'];

    $otherProperty = array();
    $j=0;
    foreach($propertyMap as $key => $rental_unit){
        if($rental_unit['title'] != $node->title){
            $otherProperty[$j] = $rental_unit;
                $j++;
        }
    }
    $vars['propertyMapWithoutOne'] = $otherProperty;
}

function minnehaha_preprocess_testimonials(&$vars, $hook){
    $node = $vars['node'];

    $fieldTestimonialSlogan = $node->field_page_slogan_testimonial;
    if ($fieldTestimonialSlogan){
        $vars['page_slogan'] = $fieldTestimonialSlogan['und'][0]['value'];
    }
    $fieldTestimonialHeaderBgImg = field_get_items('node', $vars['node'], 'field_header_bg_image_testimonia');
    if ($fieldTestimonialHeaderBgImg){
        $vars['image_url'] = url('sites/default/files/'.file_uri_target($fieldTestimonialHeaderBgImg[0]['uri']), array('absolute'=>true));
    }

}

function minnehaha_preprocess_article(&$vars, $hook){
    $node = $vars['node'];

    $articleHeaderBgImg = field_get_items('node', $vars['node'], 'field_article_header_bg_img');
    if ($articleHeaderBgImg){
        $vars['image_url'] = url('sites/default/files/'.file_uri_target($articleHeaderBgImg[0]['uri']), array('absolute'=>true));
    }

    $fieldParagraphOfContent = field_get_items('node', $node, 'field_paragraph_of_article');
    $sizeOfParagraphs = count($fieldParagraphOfContent);
    $basicParagraphs = array();
    for ($i = 0; $sizeOfParagraphs > $i; $i++)
    {
        $basicParagraphs[$i] = $fieldParagraphOfContent[$i]['value'];
    }
    $vars['basicPagePars'] = $basicParagraphs;

    $fieldContentPhotos = field_get_items('node', $node, 'field_article_content_photo');
    $basicPagePhotos = array();
    for($i = 0; $i < count($fieldContentPhotos); $i++){
        $contentPhoto = node_load($fieldContentPhotos[$i]['target_id']);
        $basicPagePhotos[$i]['contentPhotoTitle'] = $contentPhoto->field_photo_title['und'][0]['value'];
        $basicPagePhotos[$i]['contentPhotoDescription'] = $contentPhoto->field_photo_description['und'][0]['value'];
        $contentPhotoImage = $contentPhoto->field_image_file;
        $basicPagePhotos[$i]['contentPhotoImgUrl'] = url('sites/default/files/'.file_uri_target($contentPhotoImage['und'][0]['uri']), array('absolute'=>true));
        $basicPagePhotos[$i]['contentPhotoImgAlt'] = $contentPhotoImage['und'][0]['alt'];
    }
    if(!empty($basicPagePhotos)){$vars['basicPagePhotos'] = $basicPagePhotos;}else{$vars['basicPagePhotos'] = 'empty';}

}

function minnehaha_preprocess_user(&$vars, $hook){
    $node = $vars['node'];
    $fieldHeaderBkIma = field_get_items('node', $node, 'field_header_background_image');
    if ($fieldHeaderBkIma){
        $vars['image_url'] = url('sites/default/files/'.file_uri_target($fieldHeaderBkIma[0]['uri']), array('absolute'=>true));
    }

}