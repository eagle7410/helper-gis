eagle\helperGis\libs\GisBuild
===============

Build db expression with postgis functions
Class GisBuild




* Class name: GisBuild
* Namespace: eagle\helperGis\libs



Constants
----------


### ROUND_AREA_SAVE

    const ROUND_AREA_SAVE = 1.0E-7





### ESPG_MAP

    const ESPG_MAP = 4326





Properties
----------


### $text_

    protected mixed $text_ = ''





* Visibility: **protected**


Methods
-------


### __construct

    mixed eagle\helperGis\libs\GisBuild::__construct($text)





* Visibility: **public**


#### Arguments
* $text **mixed**



### checkText_

    mixed eagle\helperGis\libs\GisBuild::checkText_($text)





* Visibility: **protected**


#### Arguments
* $text **mixed**



### asJson

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::asJson(boolean $text)





* Visibility: **public**


#### Arguments
* $text **boolean**



### buffer

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::buffer(boolean|string $text, boolean|\eagle\helperGis\libs\number|string $radius, boolean|string $type, boolean $add)





* Visibility: **public**


#### Arguments
* $text **boolean|string**
* $radius **boolean|eagle\helperGis\libs\number|string**
* $type **boolean|string**
* $add **boolean**



### json

    string eagle\helperGis\libs\GisBuild::json($text)





* Visibility: **public**
* This method is **static**.


#### Arguments
* $text **mixed**



### formJson

    mixed eagle\helperGis\libs\GisBuild::formJson($text, $espg)





* Visibility: **public**
* This method is **static**.


#### Arguments
* $text **mixed**
* $espg **mixed**



### text

    string eagle\helperGis\libs\GisBuild::text(boolean $brackets)





* Visibility: **public**


#### Arguments
* $brackets **boolean**



### merge_

    mixed eagle\helperGis\libs\GisBuild::merge_($res, $text, $add)

Add or change text



* Visibility: **protected**


#### Arguments
* $res **mixed**
* $text **mixed**
* $add **mixed**



### share

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::share(boolean|string $text, $add)





* Visibility: **public**


#### Arguments
* $text **boolean|string**
* $add **mixed**



### isShare

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::isShare(boolean|string $text, boolean $add)





* Visibility: **public**


#### Arguments
* $text **boolean|string**
* $add **boolean**



### clear

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::clear(boolean $newText)

Clear text



* Visibility: **public**


#### Arguments
* $newText **boolean**



### squareGa

    string eagle\helperGis\libs\GisBuild::squareGa(string $text, integer $round)

Return expression for calculation square in ga



* Visibility: **public**
* This method is **static**.


#### Arguments
* $text **string**
* $round **integer**



### union

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::union(boolean $text, boolean $add)

use ST_Union function



* Visibility: **public**


#### Arguments
* $text **boolean**
* $add **boolean**



### centroid

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::centroid(boolean $text, boolean $add)

use ST_Centroid function



* Visibility: **public**


#### Arguments
* $text **boolean**
* $add **boolean**



### inst

    mixed eagle\helperGis\libs\GisBuild::inst($text)





* Visibility: **public**
* This method is **static**.


#### Arguments
* $text **mixed**



### diff

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::diff(boolean $text, boolean $add)

use ST_Difference function



* Visibility: **public**


#### Arguments
* $text **boolean**
* $add **boolean**



### multi

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::multi(boolean $text, boolean $add)

use ST_Difference function



* Visibility: **public**


#### Arguments
* $text **boolean**
* $add **boolean**



### add

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::add($text, boolean $brackets, boolean $before)

Add to text, before or after.



* Visibility: **public**


#### Arguments
* $text **mixed**
* $brackets **boolean**
* $before **boolean**



### simplifyPre

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::simplifyPre(boolean $text, boolean $tolerance, boolean $add)

Use ST_SimplifyPreserveTopology function



* Visibility: **public**


#### Arguments
* $text **boolean**
* $tolerance **boolean**
* $add **boolean**



### lineCurve

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::lineCurve(boolean $text, boolean $add)

Use ST_LineToCurve function



* Visibility: **public**


#### Arguments
* $text **boolean**
* $add **boolean**



### split

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::split(boolean $text, boolean $add)

Split polygons by simple polygon



* Visibility: **public**


#### Arguments
* $text **boolean**
* $add **boolean**



### asText

    \eagle\helperGis\libs\GisBuild eagle\helperGis\libs\GisBuild::asText(boolean $text, boolean $add)

Return query as geo text



* Visibility: **public**


#### Arguments
* $text **boolean**
* $add **boolean**


