<?php
header( "content-type:text/html;charset=utf8" );
header( "Access-Control-Allow-Origin: *" );

$action = isset( $_GET['action'] ) ? $_GET['action'] : 'vessels';

switch ( $action )
{
    /* 所有船只 */
    case 'vessels':
        $url = "http://180.166.164.234:9080/gemship/service/OnlineVesselService?wsdl";
        $params = array();
        $soap = new SoapClient( $url );
        $result = $soap->QuerySpFindVessels();
        $result = json_decode( $result->out, true );
        sort( $result['voyageInfo'] );
        exit( json_encode( $result ) );
    break;
}