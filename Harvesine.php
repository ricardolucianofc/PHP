function distancia($lat1, $lon1, $lat2, $lon2) {

$lat1 = deg2rad($lat1);
$lat2 = deg2rad($lat2);
$lon1 = deg2rad($lon1);
$lon2 = deg2rad($lon2);

$dist = (6371 * acos( cos( $lat1 ) * cos( $lat2 ) * cos( $lon2 - $lon1 ) + sin( $lat1 ) * sin($lat2) ) );
$dist = number_format($dist, 2, '.', '');return $dist;}

echo distancia(-12.9813346,-38.4653612, -12.9741491,-38.4696483) . " Km<br />";
