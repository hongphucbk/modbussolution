<?php

// Mở composer.json
// Thêm vào trong "autoload" chuỗi sau
// "files": [
//         "app/function/function.php"
// ]

// Chạy cmd : composer  dumpautoload

function rand_string( $length ) {
	$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	$size = strlen( $chars );
	$str = "";
	for( $i = 0; $i < $length; $i++ ) {
		$str .= $chars[ rand( 0, $size - 1 ) ];
	}
	return $str;
}

function get_Admin_All_User()
{
	return count( App\User::all() );
}

function get_Admin_All_User_CountAdmin()
{
    return count( App\User::all() );
}

function get_Admin_All_UserGroup()
{
	return count( App\UserGroup::all() );

}

function get_Admin_All_Role()
{
	return count( App\Role::all() );
}

function get_Admin_All_UserRole()
{
	return count( App\UserRole::all() );
}

function get_Admin_Helpdesk_All_Category()
{
	return count( App\HelpdeskCategory::all() );
}

function get_Status_Helpdesk($status)
{
	if($status == 10 )
        return '<span class="label label-info">Open</span>';
    else if($status == 20)
        return '<span class="label label-success">Active</span>';
    // elseif($status == 30)
    //     return '<span class="label label-success">Chờ thanh toán</span>';
    elseif($status == 40)
        return '<span class="label label-success">Progress</span>';
    // elseif($status == 50)
    //     return '<span class="label label-success"></span>';
    elseif($status == 60)
        return '<span class="label label-success">Pending</span>';
    elseif($status == 80)
        return '<span class="label label-success">Complete</span>';
    elseif($status == 90)
        return '<span class="label label-success">Reject</span>';
    else{
        return '<span class="label label-danger">NO DEFINE</span>';
    }
    
}
function get_Admin_Helpdesk_Ticket_Open()
{
    return count( App\HelpdeskActivity::where('status',10)->get() );
}

function get_Admin_Helpdesk_Ticket_Complete()
{
    return count( App\HelpdeskActivity::where('status',80)->get() );
}

function get_Admin_Helpdesk_Ticket_Pending()
{
    return count( App\HelpdeskActivity::where('status','>=',20)->where('status','<=',60)->get() );
}

function get_Member_Helpdesk_Ticket_Open($id)
{
	return count( App\HelpdeskActivity::where('raised_id',$id)->where('status',10)->get() );
}

function get_Member_Helpdesk_Ticket_Complete($id)
{
	return count( App\HelpdeskActivity::where('raised_id',$id)->where('status',80)->get() );
}

function get_Member_Helpdesk_Ticket_Pending($id)
{
	return count( App\HelpdeskActivity::where('raised_id',$id)->where('status','>=',20)->where('status','<=',60)->get() );
}

    function get_Count_All_Device()
    {
        return count( App\InsModbustcpDevice::all() );
    }

    function get_Count_All_Parameter()
    {
        return count( App\InsModbustcpParameter::all() );
    }

    function get_Count_All_Control()
    {
        return count( App\InsModbustcpControl::all() );
    }

    function get_Count_All_Record()
    {
        return count( App\InsModbustcpValue::all() );
    }

?>