<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Version file is defined here.
 *
 * @package     local_resend_password_profile
 * @copyright   2024 François Garnier <francoisjgarnier@icloud.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$plugin->component = 'local_resend_password_profile';
$plugin->version = 2024101119; // Plugin version.
$plugin->requires = 2021051700; // Minimum required Moodle version.
$plugin->maturity = MATURITY_STABLE;
$plugin->release = 'v1.3';

$plugin->credits = [
    'author' => 'François Garnier',
    'email' => 'francoisjgarnier@icloud.com',
];
