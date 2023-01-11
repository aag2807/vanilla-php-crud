<?php

use lib\Arguments;
use lib\ObjectUtil;

class ContactDTO 
{
    public int $contact_id;
    public string $first_name;
    public string $last_name;
    public string $email;
    public string $phone;

    function __construct( $data )
    {
        Arguments::NotNull($data, "cannot be null");
        ObjectUtil::Assign($this, $data);
    }
}