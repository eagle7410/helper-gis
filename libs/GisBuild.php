<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 29.12.16
 * Time: 21:22
 */

namespace eagle\helperGis\libs;

/**
 * Build db expression with postgis functions
 * Class GisBuild
 * @package frontend\modules\map\libraries
 */
class GisBuild
{
    const ROUND_AREA_SAVE = 0.0000001;
    const ESPG_MAP        = 4326;
    protected $text_ = '';
    
    public function __construct($text = '')
    {
        $this->text_ = $text;
        
        return $this;
    }
    
    protected function checkText_($text)
    {
        if ($text !== false)
            $this->text_ = $text;
    }
    /**
     * @see Return as GeoJson
     * @param bool $text
     * @return $this
     */
    public function asJson($text = false)
    {
        $this->checkText_($text);
         
        $this->text_ = self::json($this->text_);
        
        return $this;
    }
    
    /**
     * @see Use ST_Buffer Function
     * @param bool|string        $text
     * @param bool|number|string $radius
     * @param bool|string        $type
     * @param bool                $add
     * @return $this
     */
    public function buffer($text = false, $radius = false, $type = false, $add = false)
    {
        
        $res = 'ST_Buffer(' . ($text === false ? $this->text_ : $text) ;
        
        if ($radius !== false)
            $res .= ',' . (string)$radius;
    
        if ($type !== false)
            $res .= ',\'' . (string)$type . '\'';
        
        $res .= ')';
        
        $this->merge_($res, $text, $add);
        
        return $this;
    }
    
    /**
     * @see Return as GeoJson
     * @param $text
     * @return string
     */
    public static function json($text)
    {
        return 'ST_AsGeoJSON('. $text .')';
    }
    
    public static function formJson($text, $espg = self::ESPG_MAP)
    {
        return "ST_SetSRID(ST_GeomFromGeoJSON('" . $text ."'), $espg)";
    }
    /**
     * @see Get result expression
     * @param bool $brackets
     * @return string
     */
    public function text($brackets = false)
    {
        return $brackets ? '('. $this->text_ . ')' : $this->text_;
    }
    
    /**
     * Add or change text
     * @param $res
     * @param $text
     * @param $add
     */
    protected function merge_($res, $text, $add)
    {
        if ($add && $text !== false)
            $this->text_ .= ',' . $res;
        else
            $this->text_ = $res;
    }
    
    /**
     * @see  Use ST_Intersection Function
     *
     * @param bool|string $text
     * @return $this
     */
    public function share($text = false, $add = false)
    {
        $this->checkText_($text);
        $this->merge_('ST_Intersection(' . $this->text_ .')', $text, $add);
        return $this;
    }
    
    /**
     * @see Use ST_Intersects function
     *
     * @param bool|string $text
     * @param bool $add
     * @return $this
     */
    public function isShare($text = false, $add = false)
    {
        $this->checkText_($text);
        $this->merge_('ST_Intersects(' . $this->text_ .')', $text, $add);
        return $this;
    }
    
    /**
     * Clear text
     * @param bool $newText
     * @return $this
     */
    public function clear($newText = false)
    {
        $this->text_ = $newText === false ? '' : $newText;
        return $this;
    }
    
    /**
     * Return expression for calculation square in ga
     * @param string $text
     * @param int $round
     * @return string
     */
    public static function squareGa($text, $round = 2)
    {
        return 'ROUND(( (ST_Area( (' . $text . ')::geography )) / 10000)::numeric, '. $round .' )';
        
    }
    
    /**
     * use ST_Union function
     * @param bool $text
     * @param bool $add
     * @return $this
     */
    public function union($text = false, $add = false)
    {
        $this->checkText_($text);
        $this->merge_('ST_Union(' . $this->text_ .')', $text, $add);
        return $this;
    }
    
    /**
     * use ST_Centroid function
     * @param bool $text
     * @param bool $add
     * @return $this
     */
    public function centroid($text = false, $add = false)
    {
        $this->checkText_($text);
        $this->merge_('ST_Centroid(' . $this->text_ .')', $text, $add);
        return $this;
    }
    
    public static function inst($text = '')
    {
        return new GisBuild($text);
    }
    
    /**
     * use ST_Difference function
     * @param bool $text
     * @param bool $add
     * @return $this
     */
    public function diff($text = false, $add = false)
    {
        $this->checkText_($text);
        $this->merge_('ST_Difference(' . $this->text_ .')', $text, $add);
        return $this;
    }
    
    /**
     * use ST_Difference function
     * @param bool $text
     * @param bool $add
     * @return $this
     */
    public function multi($text = false, $add = false)
    {
        $this->checkText_($text);
        $this->merge_('ST_Multi(' . $this->text_ .')', $text, $add);
        return $this;
    }
    
    /**
     * Add to text, before or after.
     * @param $text
     * @param bool $brackets
     * @param bool $before
     * @return $this
     */
    public function add($text, $brackets = false, $before =false)
    {
        if ($brackets == true)
            $text = '(' . $text . ')';
        
        if (!$before)
            $this->text_ .= ',' . $text;
        else
            $this->text_ =  $text . ',' . $this->text_;
        
        return $this;
    }
    
    /**
     * Use ST_SimplifyPreserveTopology function
     * @param bool $text
     * @param bool $tolerance
     * @param bool $add
     * @return $this
     */
    public function simplifyPre($text = false, $tolerance = false, $add = false )
    {
        $this->checkText_($text);
        
        if ($tolerance !== false)
            $this->text_ .= ',' . $tolerance;
    
        $this->merge_('ST_SimplifyPreserveTopology(' . $this->text_ .')', $text, $add);
        
        return $this;
    }
    
    /**
     * Use ST_LineToCurve function
     * @param bool $text
     * @param bool $add
     * @return $this
     */
    public function lineCurve($text = false, $add = false)
    {
        $this->checkText_($text);
        $this->merge_('ST_LineToCurve(' . $this->text_ .')', $text, $add);
        return $this;
    }
    
    /**
     * Split polygons by simple polygon
     * @param bool $text
     * @param bool $add
     * @return $this
     */
    public function split($text = false, $add = false)
    {
        $this->checkText_($text);
          
        $this->merge_('ST_GeometryN(' . $this->text_ .',generate_series(1, ST_NumGeometries('. $this->text_ .')))', $text, $add);
        return $this;
    }
    
    /**
     * Return query as geo text
     * @param bool $text
     * @param bool $add
     * @return $this
     */
    public function asText($text = false, $add = false)
    {
        $this->checkText_($text);
        $this->merge_('ST_asText(' . $this->text_ .')', $text, $add);
        return $this;
    }
}