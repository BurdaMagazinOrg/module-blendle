INTRODUCTION
------------

The Blendle module allows webmasters to enable the Blendle Pay Button so users
can view the full content of a node after paying for it with their Blendle
account.

REQUIREMENTS
------------

This module requires the following modules:

 * Libraries (https://www.drupal.org/project/libraries)

This module requires the Blendle SDK:

 * Documentation (http://pay-docs.blendle.io/)
 * PHP SDK: (https://s3-eu-west-1.amazonaws.com/assets-blendle/blendle-button/sdk/php/blendle-button-sdk.zip)


INSTALLATION
------------

 * Install as you would normally install a contributed Drupal module. See:
   https://drupal.org/documentation/install/modules-themes/modules-8
   for further information.

 * Download the Blendle PHP SDK and place its contents in the libraries
   folder. The folder structure should be looking like this:

   - sites/all/libraries
     - pay-with-blendle
       - src
       - vendor

 * Setup your API secret in settings.php
   Use the following code:

   - $settings['blendle_api_secret'] = 'YOUR API KEY';


CONFIGURATION
-------------

 * Configure user permissions in Administration » People » Permissions:

   - Administer Blendle

     Users in roles with the "Administer Blendle" permission will be able to
     setup the SDK credentials.

   - Set Blendle Status on nodes

     Users in roles with the "Set Blendle Status on nodes" permission will be
     able to enable and disble the Blendle Pay button on node types where the
     Blendle Pay Button is enabled.

   - Read articles without using Blendle

     Users in roles with the "Read articles without using Blendle" permission
     won't see the Blendle button. These users can read all content where the
     Blendle button is enabled.

   - Administer content types (Node module)

     To be able to enable the Blendle Pay Button on content types, this
     permission is required.

 * Configure admin settings in Administration » Configuration » System » Blendle

   - Provider UID

     Used to identify your website. Provided by Blendle.

   - Public key

     Provided by Blendle. This key starts with:
       -----BEGIN PUBLIC KEY-----
     and ends with:
       -----END PUBLIC KEY-----
     All lines in between should be exactly 64 characters long (except for the
     last one, which is 32).

   - API secret

     Provided by Blendle. This variable must be setup in settings.php

   - Production

     Boolean to determine whether to call the staging or the production
     environment.

 * Configure content types in Administration » Structure » Content Types

   Edit the Content Types where you wish to enable the Blendle Pay Button.

   - Enable the Blendle Pay Button by checking the checkbox in the vertical tab
     called "Blendle".

   - Set a default value for new nodes.
