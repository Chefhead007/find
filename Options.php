Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Map Settings', 'homey' ),
    'id'     => 'homey-yandex-map-settings',
    'desc'   => '',
    'icon'   => 'el-icon-globe el-icon-small',
    'fields' => array(
        array(
            'id'       => 'homey_map_system',
            'type'     => 'button_set',
            'title'    => esc_html__('Map System', 'homey'),
            'subtitle' => esc_html__('Select the map system that you want to use', 'homey'),
            'desc'     => '',
            'options' => array(
                'open_street_map' => 'Open Street Map',
                'mapbox' => 'Map Box',
                'yandex' => 'Yandex',
             ), 
            'default' => 'open_street_map'
        ),
        array(
            'id'       => 'yandex_api_key',
            'type'     => 'text',
            'title'    => esc_html__( 'Yandex Map API KEY', 'homey' ),
            'desc'     => wp_kses(__( 'Enter your Yandex map api key. You can get it from <a target="_blank" href="https://tech.yandex.com/maps/doc/jsapi/2.1/quick-start/index-docpage/">here</a>.', 'homey' ), $allowed_html_array),
            'subtitle' => '',
            'required'  => array('homey_map_system', '=', 'yandex'),
            'default'  => ''
        ),
        array(
            'id'       => 'mapbox_api_key',
            'type'     => 'text',
            'title'    => esc_html__( 'Mapbox API KEY', 'homey' ),
            'desc'     => wp_kses(__( 'Please enter the Mapbox API key, you can get from <a target="_blank" href="https://account.mapbox.com/">here</a>.', 'homey' ), $allowed_html_array),
            'required'  => array('homey_map_system', '=', 'mapbox')
        ),
        array(
            'id'       => 'yandex_search_type',
            'type'     => 'select',
            'title'    => esc_html__( 'Yandex Search Type', 'homey' ),
            'desc' => esc_html__( 'Select the yandex search type', 'homey' ),
            'options'  => array(
                'biz'   => esc_html__( 'Business Search', 'homey' ),
                'geo'   => esc_html__( 'Geo Search', 'homey' )
            ),
            'required'  => array('homey_map_system', '=', 'yandex'),
            'default'  => 'biz'
        ),
        array(
            'id'       => 'yandexmap_ssl',
            'type'     => 'select',
            'title'    => esc_html__( 'Yandex Maps SSL', 'homey' ),
            'desc' => esc_html__( 'Use Yandex Maps with SSL', 'homey' ),
            'options'  => array(
                'no'   => esc_html__( 'No', 'homey' ),
                'yes'   => esc_html__( 'Yes', 'homey' )
            ),
            'required'  => array('homey_map_system', '=', 'yandex'),
            'default'  => 'no'
        ),

        array(
            'id'       => 'geo_country_limit',
            'type'     => 'switch',
            'title'    => esc_html__( 'Limit to Country', 'homey' ),
            'desc'     => '',
            'subtitle' => esc_html__( 'Geo autocomplete limit to specific country', 'homey' ),
            'default'  => 0,
            'required'  => array('homey_map_system', '=', 'yandex'),
            'on'       => 'Enabled',
            'off'      => 'Disabled',
        ),
        array(
            'id'        => 'geocomplete_country',
            'type'      => 'select',
            'required'  => array('geo_country_limit', '=', '1'),
            'title'     => esc_html__( 'Geo Auto Complete Country', 'homey' ),
            'subtitle'  => esc_html__( 'Limit Geo auto complete to specific country', 'homey' ),
            'options'   => $Countries,
            'default' => ''
        ),

        array(
            'id'       => 'markerPricePins',
            'type'     => 'select',
            'title'    => esc_html__( 'Marker Type', 'homey' ),
            'desc' => esc_html__( 'Select the marker type for Yandex Map', 'homey' ),
            'options'  => array

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Cluster', 'homey' ),
    'id'     => 'map-cluster',
    'desc'   => '',
    'icon'   => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'id'       => 'pin_cluster_enable',
            'type'     => 'select',
            'title'    => esc_html__( 'Pin Cluster', 'homey' ),
            'desc' => esc_html__( 'Use a pin cluster on Yandex Map', 'homey' ),
            'options'  => array(
                'yes'   => esc_html__( 'Yes', 'homey' ),
                'no'   => esc_html__( 'No', 'homey' )
            ),
            'default'  => 'yes'
        ),
        array(
            'id'        => 'pin_cluster',
            'url'       => true,
            'type'      => 'media',
            'title'     => esc_html__( 'Cluster Icon', 'homey' ),
            'readonly' => false,
            'default'   => array( 'url' => get_template_directory_uri() . '/images/cluster-icon.png' ),
            'desc'  => esc_html__( 'Upload the map cluster icon.', 'homey' ),
            'required'  => array('pin_cluster_enable', '=', 'yes'),
        ),
        array(
            'id'       => 'pin_cluster_zoom',
            'type'     => 'text',
            'title'    => esc_html__( 'Cluster Zoom Level', 'homey' ),
            'desc'     => '',
            'desc' => esc_html__( 'Enter the maximum zoom level for cluster to appear. Default 12', 'homey' ),
            'default'  => '12',
            'validate' => 'numeric',
            'required'  => array('pin_cluster_enable', '=', 'yes'),
        )
    )
));

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Single Listing Map', 'homey' ),
    'id'     => 'map-single-listing',
    'desc'   => '',
    'icon'   => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'id'       => 'detail_map_pin_type',
            'type'     => 'select',
            'title'    => esc_html__('Pin or Circle', 'homey'),
            'desc' => esc_html__('Select what to show on map, Marker or Circle pin', 'homey'),
            'options'  => array(
                'placemark'   => esc_html__( 'Marker Pin', 'homey' ),
                'circle'   => esc_html__( 'Circle', 'homey' ),
            ),
            'default'  => 'placemark',
        ),
        array(
            'id'       => 'singlemap_zoom_level',
            'type'     => 'text',
            'title'    => esc_html__( 'Single Listing Map Zoom', 'homey' ),
            'desc'     => '',
            'desc' => esc_html__( 'Enter a number from 1 to 20', 'homey' ),
            'default'  => '14',
            'validate' => 'numeric'
        )
    )
));

Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Map Style', 'homey' ),
    'id'     => 'map-style',
    'desc'   => esc_html__('Only work with Google Map', 'homey'),
    'icon'   => '',
    'subsection' => true,
    'fields'    => array(
        array(
            'id'       => 'yandexmap_stype',
            'type'     => 'ace_editor',
            'title'    => esc_html__( 'Style for Yandex Map', 'homey' ),
            'subtitle' => esc_html__( 'Use https://yandex.ru/dev/maps/jsapi/doc/2.1/ref/reference/map.XmlProvider.html to create styles', 'homey' ),
            'desc'     => '',
            'default'  => '',
            'mode'     => 'plain'
        )
    )
));
