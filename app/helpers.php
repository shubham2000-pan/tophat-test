<?php

use Carbon\Carbon;

if (! function_exists('testHelper')) {
    function testHelper() {
        return 'Working....';
    }
}

if (! function_exists('getsyllabus')) {
    function getsyllabus($id) {
    	$data = DB::table('syllabus')->where('id',$id)->first();
    	if(!empty($data)){
    		$res = $data->name;
    	}else{
    		$res = '';
    	}
        return $res;
    }
}

if ( ! function_exists( 'getRouteInfo' ) ) {
	/**
	 * Get routing information
	 * @return array
	 */
	function getRouteInfo() {

		if ( ! App::runningInConsole() ) {

			

			$routeArray       = app( 'request' )->route()->getAction();

			$controllerAction = class_basename( $routeArray['controller'] );

			
			list( $controller, $action ) = explode( '@', $controllerAction );

			return [ 'controller' => $controller, 'action' => $action ];
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'getActiveClass' ) ) {
	/**
	 * Get Active Class information/ Active menus
	 * @return array
	 */
	function getActiveClass( $controllerArray = array(), $actionArray = array() ) {
		$routeArray = getRouteInfo();
		
		if ( ! empty( $routeArray ) && in_array( $routeArray['controller'], $controllerArray ) && in_array( $routeArray['action'], $actionArray ) ) {
			echo 'active';
		} else {
			echo '';
		}

	}
}

?>