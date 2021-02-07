<?php
/** User: Sabo */

namespace app\core\form;
use app\core\Model;

/** 
 * Class Field
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\core\field
*/

class Field{

    public const TYPE_TEXT = "text";
    public const TYPE_PASSWORD = "password";
    public const TYPE_EMAIL = "email";
    public const TYPE_NUMBER = "number";
    
    public string $type;
    public Model $model;
    public string $attribute;
    public string $label;
    public string $placeholder;

    /**
     * Field constructor
     * 
     * @param \app\core\Model $model
     * @param string $attribute
     * @param string $label
     */
    public function __construct(Model $model, string $attribute, string $placeholder){
        $this->type = self::TYPE_TEXT;
        $this->model = $model;
        $this->attribute = $attribute;
        $this->placeholder = $placeholder;
    }

    public function __toString(){
        return sprintf('
            <div class="mb-3">
                <label class="form-label">%s</label>
                <input type="%s" name="%s" value="%s" class="form-control%s" placeholder="%s..">
                <div class="invalid-feedback">
                    %s
                </div>
            </div>
        ', 
            $this->model->getLabel($this->attribute),
            $this->type,
            $this->attribute,
            $this->model->{$this->attribute},
            $this->model->hasError($this->attribute) ? ' is-invalid' : '',
            $this->placeholder,
            $this->model->getFirstError($this->attribute),
        );
    }

    public function passwordField(){
        $this->type = self::TYPE_PASSWORD;
        return $this;
    }
    
    public function emailField(){
        $this->type = self::TYPE_EMAIL;
        return $this;
    }

}