<?php
/** User: Sabo */

namespace app\models;
use sabosuke\bit_mvc_core\Controller;
use sabosuke\bit_mvc_core\Request;
use sabosuke\bit_mvc_core\theme\ThemeModel;
use sabosuke\bit_mvc_core\form\Form;
use sabosuke\bit_mvc_core\form\SelectField;
use sabosuke\bit_mvc_core\theme\generator\ThemeGenerator;
use sabosuke\bit_mvc_core\query_builder\QueryBuilder;

/** 
 * Class Theme
 * 
 * @author Essam Abed <abedissam95@gmail.com>
 * @package app\models
*/

class Theme extends ThemeModel{

    public const STATUS_INACTIVE = 0;
    public const STATUS_ACTIVE = 1;
    public const STATUS_DELETED = 2;

    public string $name = '';
    public string $path = '';
    public int $status = self::STATUS_INACTIVE;

    public ThemeGenerator $themeGenerator;
    public QueryBuilder $qb;

    /**
     * Theme constructor
     */
    public function __construct(){
        $this->themeGenerator = new ThemeGenerator();
        $this->qb = new QueryBuilder();
    }

    public function deActivateTheme(){
        $query = $this->qb->update("themes", ['status'], [0])->where("status = 1")->getResult("\PDO::FETCH_ASSOC");
    }

    public function setActiveTheme($name){
        $this->deActivateTheme();
        $query = $this->qb->initQuery()->update("themes", ['status'], [1])->where("name = '$name'")->getResult("\PDO::FETCH_ASSOC");
        return $query;
    }

    public function tableName(): string{
        return 'themes';
    }

    public function primaryKey(): string{
        return 'id';
    }

    public function fetchThemes(){
        return $this->findAll();
    }
    
    public function getCurrentTheme(){
        return $this->findOne_obj(['status' => 1]);
    }
    
    //overriding save method
    public function save(){
        $this->status = self::STATUS_INACTIVE;
        return parent::save(); //parent method
    }

    /**
     * returns the name of the theme file
     *
     * @param string $name
     * @return string
     */
    public static function getThemeFileName(string $name): string{
        return $name . '.css';
    }

    /**
     * generates a selection field for the themes using bootstrap
     *
     * @return string
     */
    public function generateThemeSelection(): string{
        $options = [];
        foreach($this->getCurrentTheme() as $val){
            $options[$val->id] = $val->name;
            $this->name = $val->name;
        }
        foreach($this->fetchThemes() as $val){
            $options[$val->id] = $val->name;
        }
        
        return ThemeGenerator::generateThemeSelection('Select Theme', $options);
    }

    /**
     * rules for the theme fields 
     *
     * @return array
     */
    public function rules():array{
        return [
        "name" => [self::RULE_REQUIRED],
        "path" => [self::RULE_REQUIRED],
        "file_path" => [self::RULE_REQUIRED],
        ];
    }

    /**
     * attributes for theme fields
     *
     * @return array
     */
    public function attributes(): array{
        return ['name', 'path', 'file_path'];
    }

    /**
     * labels for theme fields
     *
     * @return array
     */
    public function labels(): array{
        return [
        'name' => 'Theme Name',
        'path' => 'Theme File Name',
        'file_path' => 'Upload File',
        ];
    }

    /**
     * displaying Theme name
     *
     * @return string
     */
    public function displayName(): string{
        return $this->name;
    }

}