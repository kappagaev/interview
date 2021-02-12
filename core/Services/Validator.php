<?php


namespace Core\Services;


class Validator
{

    /**
     * @var Db
     */
    private Db $db;

    public $data;

    private $rules;

    private array $messages = [
        'email' => ':attribute: must be an email',
        'confirmed' => ':attribute: does not match with :attribute: confirm',
        'required' => ':attribute: is required',
        'lengthFrom2to32' => 'length of :attribute: must be from 2 to 32 chars',
        'charsOrNumbers' => ':attribute: must contain only chars or numbers',
        'uniqueInUsers' => ':attribute: already exits'
    ];

    public $errors;

    public function __construct(Db $db)
    {
        $this->db = $db;
    }

    public function make(array $data, $rules = [])
    {
        $validator = clone $this;

        $validator->data = $data;
        $validator->rules = $rules;

        return $validator;
    }


    /**
     * @param array $data
     * @param array $rules
     * @return Validator of errors
     */
    public function validate()
    {
        foreach ($this->rules as $key => $rule) {
            $ruleOptions = explode('|', $rule);
            $this->validateKey($key, $ruleOptions);
        }

        return $this;
    }

    private function validateKey($key, array $ruleOptions)
    {
        if (!(in_array('nullable', $ruleOptions) && $this->data[$key] == null)) {
            foreach ($ruleOptions as $option) {
                // calls Validator rule methods
                $validation = $this->{$option}($key);
                if (!$validation) {

                    $this->errors[$key] = str_replace(':attribute:', $key, $this->messages[$option]);
                }
            }
        }
        return $this;
    }

    public function hasErrors(): bool
    {
        return !empty($this->errors);
    }

    public function getErrors()
    {
        return $this->errors;
    }

    private function email($key)
    {
        return filter_var($this->data[$key], FILTER_VALIDATE_EMAIL);
    }

    private function required($key)
    {
        return isset($this->data[$key]);
    }

    private function confirmed($key)
    {
        return $this->data[$key] == $this->data[$key . '_confirmed'];
    }

    private function lengthFrom2to32($key)
    {
        return strlen($this->data[$key]) > 1 && strlen($this->data[$key]) < 33;
    }

    private function charsOrNumbers($key)
    {
        return !preg_match('/[^a-zA-Z\d]/', $this->data[$key]);
    }

    private function nullable($key)
    {
        return true;
    }

    private function image($key)
    {
        return in_array(pathinfo($this->data[$key]['name'], PATHINFO_EXTENSION), ['png', 'jpg', 'jpeg']);
    }

    private function uniqueInUsers($key)
    {
        return !($this->db->query("SELECT `{$key}` FROM users WHERE {$key} = '{$this->data[$key]}'")->num_rows);
    }
}