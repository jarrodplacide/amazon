<?php

echo "<pre>";

include 'settings/settings.php';

require 'lib/AmazonECS.class.php';

try {
    $ecs = new AmazonECS(AWS_API_KEY, AWS_API_SECRET_KEY, 'com', AWS_ASSOCIATE_TAG);
    
    $ecs->responseGroup('BrowseNodeInfo,TopSellers');
    
    $response = $ecs->browseNodeLookup(229534);
    
    echo print_r($response->BrowseNodes->BrowseNode->TopSellers->TopSeller[0]);
    
    $response = $ecs->responseGroup('Similarities')->lookup($response->BrowseNodes->BrowseNode->TopSellers->TopSeller[0]->ASIN);
    
    echo print_r($response);
}
catch(Exception $e) {
    echo $e->getMessage();
}

echo "</pre>";
