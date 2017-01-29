<?php
/**
 * Created by PhpStorm.
 * User: igor
 * Date: 27.12.16
 * Time: 16:13
 */

namespace eagle\helperGis\libs;


class GeoText
{
    /**
     * Return coordinates string
     * @param ['lng' => float, 'lat'=>float ]$arCoordinates
     * @param string $delimiter
     * @return string
     */
    public static function getPointString($arCoordinates, $delimiter = ' ')
    {
        return $arCoordinates['lng'] . $delimiter . $arCoordinates['lat'];
    }
    
    /**
     * Check point one is equally point two.
     * @param ['lng' => float, 'lat'=>float ] $point1
     * @param ['lng' => float, 'lat'=>float ] $point2
     * @return bool
     */
    public static function isEquallyPoint($point1,$point2)
    {
        return $point1['lng'] == $point2['lng'] && $point1['lat'] == $point2['lat'];
    }
    
    /**
     * Return polygon string
     * @param [['lng' => float, 'lat'=>float ],..]$arPoints
     * @param int $EPSGCode
     * @return bool|string
     */
    public static function getPolygonString($arPoints, $EPSGCode = 4326)
    {
        $len = count($arPoints);
        
        if (empty($arPoints) || $len < 2)
            return false;
        
        if( !self::isEquallyPoint($arPoints[0], $arPoints[$len -1]) )
            $arPoints[] = $arPoints[0];
        
        $lineString = '';
        
        foreach ($arPoints as $point)
            $lineString .= self::getPointString($point) . ',';
    
        $lineString = substr($lineString, 0, strlen($lineString) -1 );
                
        return $EPSGCode == 4326
            ? "ST_SetSRID(ST_MakePolygon(ST_GeomFromText('LINESTRING($lineString)')),4326)"
            : "ST_MakePolygon(ST_Transform( ST_GeomFromText('LINESTRING($lineString)', $EPSGCode ), 4326))";
    }
}