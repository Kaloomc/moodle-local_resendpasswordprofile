<?php
// This file is part of Moodle - https://moodle.org/
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.

/**
 * Privacy API for the local_resend_password_profile plugin.
 *
 * @package     local_resend_password_profile
 * @category    privacy
 * @copyright   2024 François Garnier <francoisjgarnier@icloud.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace local_resend_password_profile\privacy;

defined('MOODLE_INTERNAL') || die();

/**
 * Privacy provider for the local_resend_password_profile plugin.
 *
 * @package     local_resend_password_profile
 * @category    privacy
 */
class provider implements \core_privacy\local\metadata\provider_interface {

    /**
     * Return metadata for the plugin's data.
     *
     * @return \core_privacy\local\metadata\collection
     */
    public static function get_metadata() : \core_privacy\local\metadata\collection {
        $collection = new \core_privacy\local\metadata\collection();
        
        // Define the personal data handled by the plugin
        $collection->add_database_table(
            'local_resend_password_profile_log', 
            [
                'userid' => 'The user ID that the password reset email is associated with.'
            ],
            'Privacy: Local Resend Password Profile - User data'
        );
        
        return $collection;
    }

    /**
     * Export personal data related to the user.
     *
     * @param int $userid The ID of the user whose data is being exported.
     * @return \core_privacy\local\request\user_data
     */
    public static function export_user_data(int $userid) : \core_privacy\local\request\user_data {
        $user_data = new \core_privacy\local\request\user_data();

        // Example: Export user data related to password reset logs.
        // You should replace this with any actual data your plugin handles.
        global $DB;
        
        $records = $DB->get_records('local_resend_password_profile_log', ['userid' => $userid]);
        foreach ($records as $record) {
            $user_data->add('password_reset_logs', $record->timecreated, 'Privacy: Local Resend Password Profile - Reset Log');
        }
        
        return $user_data;
    }

    /**
     * Delete personal data for a user.
     *
     * @param int $userid The ID of the user whose data needs to be deleted.
     * @return void
     */
    public static function delete_data_for_user(int $userid) {
        global $DB;
        
        // Example: Delete user data related to password reset logs.
        // You should replace this with any actual data your plugin handles.
        $DB->delete_records('local_resend_password_profile_log', ['userid' => $userid]);
    }
}
