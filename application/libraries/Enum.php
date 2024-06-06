<?php
class Enum
{
	function __construct ()
	{}
}

class User_role
{
	const SUPER_ADMIN   = 1;
	const MANAGER 		= 2;
	const FRANCHISE  	= 3;
	const SUPPLIER  	= 4;
	const CUSTOMER  	= 5;
	const FRANCHISE_STAFF = 6;
	const FORM_FILLER = 7;
	const REFERENCES = 8;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('User_role');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

/*class Coupon_List
{
	const USER_FREE_COUPON   = 1;
	const HAND_CASH 		= 2;
	

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Coupon_List');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}
*/

class Service_type
{
	const FLIGHT   = 1;
	const HOTEL    = 2;
	const VISA     = 3;
	const SOFTWERE_CHARGES     = 4;
	const INCOMMING     = 5;
	const FREE_COUPON     = 6;
	const HAND_CASH     = 7;
	

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Service_type');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}



class Payment_type
{
	const CREDIT   = 1;
	const DEBIT    = 0;
	
	

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Payment_type');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class User_pool_status{

	const PROCESS   = 1;
	const FINALIZE  = 2;
	const DROP   	= 3;

}


class Enquiry_pool_status
{
	const NO_STATUS   = 0;
	const PROCESS   = 1;
	const FINALIZE  = 2;
	const DROP   	= 3;
	const ERROR   	= 4;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Enquiry_pool_status');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
	
}

class User_status
{
	const INACTIVE    = 0;
	const ACTIVE      = 1;
	const DEACTIVATED = 2;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('User_status');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class Deleted_status
{
	const NOT_DELETED = 0;
	const DELETED 	  = 1;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Deleted_status');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class Status
{
	const INACTIVE = 0;
	const ACTIVE   = 1;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Status');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class Yes_no
{
	const No  = 1;
	const Yes = 2;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Yes_no');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class Verification_code_type
{
	const EMAIL    = 1;
	const MOBILE   = 2;
	const PASSWORD = 3;
}

class Verification_code_status
{
	const ACTIVE 	  = 1;
	const VERIFIED 	  = 2;
	const DEACTIVATED = 3;
}

class Verified
{
	const NOT_VERIFIED = 0;
	const VERIFIED     = 1;
}

class Module
{
	const MEDIA        		= 		1;
	const USER         		= 		2;
	const ITEM         		= 		3;
	const COMPANY      		= 		4;
	const SUPPLIER     		= 		5;
	const RAW_MATERIAL 		= 		6;
	const SCRAP        		= 		7;
	const METAL        		= 		8;
	
	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Module');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class Action
{
	const ADD      = 1;
	const EDIT     = 2;
	const VIEW     = 3;
	const DELETE   = 4;
	const SIGN_UP  = 5;
	const SIGN_IN  = 6;
	const SIGN_OUT = 7;
	
	
	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Action');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class Main_menu
{
	const SCRAP  = 	1;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Main_menu');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class Sub_menu
{
	const USER   = 	1;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Sub_menu');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL)
		{
			return $constants[$value];
		}
		return $constants;
	}
}

class Meta
{
	const HOTEL          	 = 1;
	const ROOM_CATEGORY  	 = 2;
	const TOURIST_ATTRACTION = 3;
	const CUSTOMER_CATEGORY  = 4;
	const ENQUIRY_CATEGORY   = 5;
	const ENQUIRY_STATUS   	 = 6;
	const ENQUIRY_DESCRIPTION_ENQUIRY   	 = 7;
	const TEMPLATE_TAG   	 = 8;

	public static function getValue($value = NULL)
	{
		$class = new ReflectionClass('Meta');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL) {
			return $constants[$value];
		}
		return $constants;
	}
	public static function getKey($value = NULL) {
		$class = new ReflectionClass('Meta');
		$constants = $class->getConstants();
		if($value !== NULL) {
			return $constants[$value];
		}
		return $constants;
	}
}

class Star
{
	const ONE   = 1;
	const TWO   = 2;
	const THREE = 3;
	const FOUR  = 4;
	const FIVE  = 5;

	public static function getValue($value = NULL) {
		$class = new ReflectionClass('Star');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL) {
			return $constants[$value];
		}
		return $constants;
	}
}

class Hotel_category
{
	const SINGLE       = 1;
	const DOUBLE       = 2;
	const TRIPLE       = 3;
	const QUAD         = 4;
	const QUEEN        = 5;
	const KING         = 6;
	const TWIN         = 7;
	const STUDIO       = 8;
	const MASTER_SUITE = 9;
	const MINI_SUITE   = 10;
	const CONNECTING   = 11;
	const ADJOINING    = 12;
	const ADJACENT     = 13;

	public static function getValue($value = NULL) {
		$class = new ReflectionClass('Hotel_category');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL) {
			return $constants[$value];
		}
		return $constants;
	}
}

class Media_type {
	const HOTEL       			= 1;
	const TOURIST_ATTRACTION    = 2;

	public static function getValue($value = NULL) {
		$class = new ReflectionClass('Media_type');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL) {
			return $constants[$value];
		}
		return $constants;
	}
}
class Itenerary_local_global_module {

	const IS_FRANCHISE   = 0;
	const IS_ADMIN   = 1;

	public static function getValue($value = NULL) {
		$class = new ReflectionClass('Itenerary_local_global_module');
		$constants = $class->getConstants();
		$constants = toProperCase(array_flip($constants),'_');
		if($value !== NULL) {
			return $constants[$value];
		}
		return $constants;
	}
}
/* end of enum */