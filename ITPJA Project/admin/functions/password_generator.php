<?php
    declare (strict_types=1);

class passwordGenerator {
  
  // Alphabetic letters, lowercase
  const LETTERS = 'abcdefghijklmnopqrstuvwxyz';
  
  // Digits
  const DIGITS = '0123456789';
  
  // Special characters
  const SPECIAL_CHARS = '!@#$%^&*()_+-={}[]|:;"<>,.?/';
  
  // The maximum similarity percentage
  const MAX_SIMILARITY_PERC = 20;

    // The minimum length of the password
    private $minLength;

    // The maximum length of the password
    private $maxLength;

    // The character groups that will be used to generate the password
    private $charGroups;

    public function __construct(int $minLength = 6, int $maxLength = 32, array $charGroups = []) {
        $this->minLength = $minLength;
        $this->maxLength = $maxLength;
        $this->charGroups = $charGroups;
      }

      public function generate(): string {
        // List of usable characters
        $chars = self::LETTERS . mb_strtoupper(self::LETTERS) . self::DIGITS . self::SPECIAL_CHARS;
        
        // Set to true when a valid password is generated
        $passwordReady = false;
        
        while (!$passwordReady) {
          // The password
          $password = '';
          
          // Password requirements
          $hasLowercase = false;
          $hasUppercase = false;
          $hasDigit = false;
          $hasSpecialChar = false;
          
          // A random password length
          $length = random_int($this->minLength, $this->maxLength);
          
          while ($length > 0) {
            $length--;
            
            // Choose a random character and add it to the password
            $index = random_int(0, mb_strlen($chars) - 1);
            $char = $chars[$index];
            $password .= $char;
            
            // Verify the requirements
            
            $hasLowercase = $hasLowercase || (mb_strpos(self::LETTERS, $char) !== false);
            $hasUppercase = $hasUppercase || (mb_strpos(mb_strtoupper(self::LETTERS), $char) !== false);
            $hasDigit = $hasDigit || (mb_strpos(self::DIGITS, $char) !== false);
            $hasSpecialChar = $hasSpecialChar || (mb_strpos(self::SPECIAL_CHARS, $char) !== false);
          }
          
          $passwordReady = ($hasLowercase && $hasUppercase && $hasDigit && $hasSpecialChar);
          
          // If the new password is valid, check for similarity
          if ($passwordReady) {
            foreach ($this->charGroups as $string) {
              similar_text($password, $string, $similarityPerc);
              $passwordReady = $passwordReady && ($similarityPerc < self::MAX_SIMILARITY_PERC);
            }
          }
        }
        
        return $password;
      }
}


