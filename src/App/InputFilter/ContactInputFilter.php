<?php
/**
 * Created by PhpStorm.
 * User: Bram
 * Date: 29-5-2016
 * Time: 09:10
 */

namespace App\InputFilter;


use Zend\InputFilter\InputFilter;

class ContactInputFilter extends InputFilter
{
    public function init()
    {
        $this->add(
            [
                'name' => 'name',
                'required' => true
            ]
        );

        $this->add(
            [
                'name' => 'email',
                'required' => true
            ]
        );

        $this->add(
            [
                'name' => 'message',
                'required' => true
            ]
        );
    }
}