<?php
function minnehaha_preprocess_page(&$vars, $hook) {


    // Return all nids of nodes of type "property".
    $nids = db_select('node', 'n')
        ->fields('n', array('nid'))
        ->fields('n', array('type'))
        ->condition('n.type', 'property')
        ->execute()
        ->fetchCol(); // returns an indexed array

    // Now return the node objects.
    $properties = node_load_multiple($nids);
    $propertyMenu = array();
    $i = 0;
    foreach ($properties as $key => $value)
    {
        var_dump($value);
        $propertyMenu[ $i ]['title'] = $value->title;
        $propertyMenu[ $i ]['url'] = drupal_get_path_alias("node/$key");
        $featuredPhoto = $value->field_featured_photo;
        $propertyMenu[ $i ]['featuredPhotoUrl'] = url('sites/default/files/'.file_uri_target($featuredPhoto[0]['uri']), array('absolute'=>true));
//        $fieldParagraphAboutProperty = $value->field_paragraph_about_property;
        $fieldParagraphAboutProperty = field_get_items('node', $value, 'field_paragraph_about_property');
        $propertyMenu[ $i ]['summary'] = $fieldParagraphAboutProperty[0]['value'];
        $i++;
    }
//    var_dump($propertyMenu);
    $vars['propertyMenu'] = $propertyMenu;

    if (isset($vars['node'])) {
        $vars['theme_hook_suggestions'][] = 'page__'. $vars['node']->type;
        if($vars['node']->type == 'property'){
            minnehaha_preprocess_property($vars,$hook, $propertyMenu);
        }else{
            $fieldHeaderBkIma = field_get_items('node', $vars['node'], 'field_header_background_image');
            if ($fieldHeaderBkIma){
                $vars['image_url'] = url('sites/default/files/'.file_uri_target($fieldHeaderBkIma[0]['uri']), array('absolute'=>true));
            }

            $fieldPageSlogan = field_get_items('node', $vars['node'], 'field_page_slogan');
            if ($fieldPageSlogan){
                $vars['page_slogan'] = $fieldPageSlogan[0]['value'];
            }

        }
    }
}

function minnehaha_preprocess_property(&$vars, $hook, $propertyMenu) {
    //@ToDo: this is not called by Drupal, so manually calling from 'minnehaha_preprocess_page'
    $node = $vars['node'];

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
        $propertyPhotos[$i]['alt'] = $fieldPropertyPhoto[0]['alt'];
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
    foreach($propertyMenu as $key => $rental_unit){
        if($rental_unit['title'] != $node->title){
            $otherProperty[$j] = $rental_unit;
                $j++;
        }
    }
    $vars['propertyMenuWithoutThis'] = $otherProperty;
}