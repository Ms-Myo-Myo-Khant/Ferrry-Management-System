<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
class Car 
{
	public $manufacturer;

	public $model;

	public $color;

	private $_extraData= array();

	public function __get($propertyName) 
	{
		
	if ( array_key_exists( $propertyName, $this->_extraData) )

	{
	 	return $this->_extraData[$propertyName];

	} 

	else 
		
	{
		return null;

	}
}

	public function __set( $propertyName, $propertyValue)
	{
		$this->_extraData[$propertyName] = $propertyValue;
	}}$myCar= new Car();
	$myCar->manufacturer = "Volkswagen";
	$myCar->model = "Beetle";
	$myCar->color = "red";
		$myCar->engineSize= 1.8;
		$myCar->otherColors= array( "green", "blue", "purple" );
		echo " <h2> Some properties: </h2> ";
		echo " <p> My car‘s manufacturer is " . $myCar->manufacturer . ". </p> ";
		echo " <p> My car‘s engine size is " . $myCar->engineSize. ". </p> ";
		echo " <p> My car‘s fuel type is " . $myCar->fuelType. ". </p> ";
		echo " <h2> The \$myCarObject: </h2> <pre> ";
		print_r( $myCar);
		echo " </pre> ";
		
?>

</body>
</html>