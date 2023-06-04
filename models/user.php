<?php

/**
 * User model
 */
class User extends BaseModel{
	
	// Define neccessary constansts so we know from which table to load data
	const tableName = 'users';
	// ClassName constant is important for find and findOne static functions to work
	const className = 'User';
	
	// Create getter functions
	
	public function getName() {
		return $this->getField('name');
	}
	
	public function getEmail() {
		return $this->getField('email');
	}
	
	public function getCity() {
		return $this->getField('city');
	}

	public function getPhone() {
		return $this->getField('phone') ?? '';
	}
	
	/**
	 * Check if provided email address is already in database
	 * @param string $email email address to look for
	 * @return bool Value exists
	 */
	public function emailExists(string $email) : bool
	{
		return boolval($this->findFirst($this->db, ['email'], ['email' => $email]));
	}
}