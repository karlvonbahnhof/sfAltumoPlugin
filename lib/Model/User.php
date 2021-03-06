<?php

/**
 * Skeleton subclass for representing a row from the 'user' table.
 *
 * 
 *
 * You should add additional methods to this class to meet the
 * application requirements.  This class will only be generated as
 * long as it does not already exist in the output directory.
 *
 * @package    propel.generator.lib.model
 */

namespace sfAltumoPlugin\Model;

class User extends \BaseUser {
    
    /**
    * Gets the user's full name
    * 
    * @param string $format
    *   // sprintf style format with two strings. (first name, last name)
    * 
    * @return string
    *   // Full name in the format specified
    */
    public function getFullName( $format = "%s %s" ){
        
        $first_name = $this->getContact()->getFirstName();
        $last_name = $this->getContact()->getLastName();
        
        return sprintf( $format, $first_name, $last_name );
    }
    
    
    /**
    * Gets the user's first name and first character of their last name.
    * eg.
    *   John R.
    * 
    * @return string
    */
    public function getFirstNameLastInitial(){
        
        $first_name = $this->getContact()->getFirstName();
        $last_name = $this->getContact()->getLastName();
        
        if( empty($last_name) ){
            return $first_name;
        }else{
            return $first_name . ' ' . substr( $last_name, 0, 1 ) . '.';
        }

    }
    
    
    /**
    * Whether this User is active.
    * 
    * @see sfGuardUser::getIsActive
    * 
    * @return bool
    */
    public function getIsActive(){
        
        // Implementation currently based on sfGuardUser's "is_active" flag
            $sf_guard_user = $this->getsfGuardUser();
        
            return $sf_guard_user->getIsActive();
        
    }

} 
