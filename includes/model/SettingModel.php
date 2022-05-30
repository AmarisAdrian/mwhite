<?php

class SettingModel extends Model
{
    // Getters & setters
    public function getTableName()
    {
        return 'mwhite_credit_settings';
    }

    public function getColumns()
    {
        return array('url', 'company_name', 'syatem_title', 'login_page_title', 'copy_rights', 'system_currency', 'time_zone', 'favicon_image', 'login_page_logo', 'logo', 'mobile_logo', 'stripe_sk', 'stripe_pk', 'paypal_email', 'checkout_id', 'checkout_pk', 'system_email', 'forget_email', 'create_account_email', 'project_assign_email', 'assign_staff_email', 'project_update_email', 'system_language', 'version', 'purchase_code');
    }

    public function toJson()
    {
        $data = $this->getData();

        // Hide the password field

        unset($data['forget_email']);
        unset($data['create_account_email']);
        unset($data['project_assign_email']);
        unset($data['assign_staff_email']);
        unset($data['project_update_email']);
        

        return json_encode($data);
    }

    public static function repo()
    {
        return new SettingModel;
    }
    public function GetAll()
    {
        return $this->findAll();
    }
}
