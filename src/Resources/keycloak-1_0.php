<?php

require_once('Definitions/keycloak-1_0.php');

return array(
    'name'        => 'Keycloak',
    'baseUri' => $config['baseUri'],
    'apiVersion'  => '1.0',
    'operations'  => array(

        //Users

        'createUser' => array(
            'uri' => 'auth/admin/realms/{realm}/users',
            'description' => 'Create a new user Username must be unique.',
            'httpMethod' => 'POST',
            'parameters' => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
            ) + $UserRepresentation
        ),

        'getUsers' => array(
            'uri'         => 'auth/admin/realms/{realm}/users',
            'description' => 'Get users Returns a list of users, filtered according to query parameters',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'briefRepresentation' => array(
                    'location'    => 'query',
                    'type'        => 'boolean',
                    'required'    => false,
                ),
                'email' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'first' => array(
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'firstName' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'lastName' => array(
                    'location'    => 'query',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'max' => array(
                    'location'    => 'query',
                    'description' => 'Maximum results size (defaults to 100)',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'search' => array(
                    'location'    => 'query',
                    'description' => 'A String contained in username, first or last name, or email',
                    'type'        => 'integer',
                    'required'    => false,
                ),
                'username' => array(
                    'location'    => 'query',
                    'type'        => 'integer',
                    'required'    => false,
                )
            ),
        ),

        'getUser' => array(
            'uri'         => 'auth/admin/realms/{realm}/users/{id}',
            'description' => 'Get representation of the user',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location' => 'uri',
                    'description' => 'User id',
                    'type' => 'string',
                    'required' => true
                )
            )
        ),

        //Clients

        'getClients' => array(
            'uri'         => 'auth/admin/realms/{realm}/clients',
            'description' => 'Get clients belonging to the realm Returns a list of clients belonging to the realm',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'The Realm name',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'clientId' => array(
                    'location'    => 'query',
                    'description' => 'filter by clientId',
                    'type'        => 'string',
                    'required'    => false,
                ),
                'viewableOnly' => array(
                    'location'    => 'query',
                    'description' => 'filter clients that cannot be viewed in full by admin',
                    'type'        => 'boolean',
                    'required'    => false,
                )
            ),
        ),

        //Roles

        'getClientRoleUsers' => array(
            'uri'         => 'auth/admin/realms/{realm}/clients/{id}/roles/{role-name}/users',
            'description' => 'Return List of Users that have the specified role name (Client Specific)',
            'httpMethod'  => 'GET',
            'parameters'  => array(
                'realm' => array(
                    'location'    => 'uri',
                    'description' => 'realm name (not id!)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'id' => array(
                    'location'    => 'uri',
                    'description' => 'id of client (not client-id)',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'role-name' => array(
                    'location'    => 'uri',
                    'type'        => 'string',
                    'required'    => true,
                ),
                'first' => array(
                    'location' => 'query',
                    'type' => 'integer',
                    'required' => false
                ),
                'max' => array(
                    'location' => 'query',
                    'type' => 'integer',
                    'required' => false
                ),
            ),
        ),
    )
);