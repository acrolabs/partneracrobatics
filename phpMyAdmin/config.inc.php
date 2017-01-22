<!-- [START all] -->
<?php
// [START_EXCLUDE silent]
/**
 * Copyright 2016 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
// [END_EXCLUDE]
/*
 * This is needed for cookie based authentication to encrypt password in
 * cookie
 * http://www.question-defense.com/tools/phpmyadmin-blowfish-secret-generator
 */
$cfg['blowfish_secret'] = '%W@27W_QKh4XiJSNTV%box^k{9=2-%51EUPCg'; /* YOU MUST FILL IN THIS FOR COOKIE AUTH! */

/*
 * Servers configuration
 */
$i = 0;

// Change this to use the project and instance that you've created.
$host = '/cloudsql/partner-acrobatics:pa-sql';
$type = 'socket';

/*
 * First server
 */
$i++;
/* Authentication type */
$cfg['Servers'][$i]['auth_type'] = 'cookie';
/* Server parameters */
$cfg['Servers'][$i]['socket'] = $host;
$cfg['Servers'][$i]['connect_type'] = $type;
$cfg['Servers'][$i]['compress'] = false;
/* Select mysql if your server does not have mysqli */
$cfg['Servers'][$i]['extension'] = 'mysqli';
$cfg['Servers'][$i]['AllowNoPassword'] = true;
$cfg['Servers'][$i]['SignonSession'] = 'SignonSession';
$cfg['Servers'][$i]['SignonURL']     = 'mkvauth.php';
/*
 * End of servers configuration
 */

/*
 * Directories for saving/loading files from server
 */
$cfg['UploadDir'] = '';
$cfg['SaveDir'] = '';

/*
 * Other settings
 */
$cfg['PmaNoRelation_DisableWarning'] = true;
$cfg['ExecTimeLimit'] = 60;
$cfg['CheckConfigurationPermissions'] = false;
// [END all]
