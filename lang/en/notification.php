<?php

return [
    'bb' => [
        'store' => [
            'success' => 'The ad was successfully created',
            'failed' => 'An error occurred while creating the ad',
        ],
        'update' => [
            'success' => 'The ad has been successfully updated',
            'failed' => 'An error occurred while updating the ad (ID: :id)',
        ],

        'destroy' => [
            'success' => 'Ad (ID: :id) successfully deleted',
            'failed' => 'An error occurred when deleting an ad (ID: :id)',
        ],

        'restored' => [
            'success' => 'Ad (ID: :id) successfully restored',
            'failed' => 'An error occurred while restoring the ad (ID: :id)',
        ],
    ],
];
