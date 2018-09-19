<?php
/*page constants*/
!defined('ADD_NEW') ? define('ADD_NEW', 'addNew') : null;
!defined('VAR_SIGN_OUT') ? define('VAR_SIGN_OUT', 'signOut') : null;
/* action 1 */
/*configuration*/
/* sys user */
!defined('ACTION_1_1') ? define('ACTION_1_1', "System User Manager") : null;
!defined('ACTION_1_2') ? define('ACTION_1_2', "System User Add") : null;
!defined('ACTION_1_3') ? define('ACTION_1_3', "System User Edit") : null;
!defined('ACTION_1_4') ? define('ACTION_1_4', "System User List") : null;
!defined('ACTION_1_5') ? define('ACTION_1_5', "System User View") : null;
/* device */
!defined('ACTION_1_6') ? define('ACTION_1_6', "device manager") : null;
!defined('ACTION_1_7') ? define('ACTION_1_7', "device Add") : null;
!defined('ACTION_1_8') ? define('ACTION_1_8', "device Edit") : null;
!defined('ACTION_1_9') ? define('ACTION_1_9', "device List") : null;
!defined('ACTION_1_10') ? define('ACTION_1_10', "device View") : null;

$VAR_CON_ACTION_1 = [
ACTION_1_1, 
ACTION_1_2, 
ACTION_1_3, 
ACTION_1_4, 
ACTION_1_5, 
ACTION_1_6, 
ACTION_1_7, 
ACTION_1_8, 
ACTION_1_9, 
ACTION_1_10
];
!defined('VAR_CON_ACTION_1') ? define('VAR_CON_ACTION_1', $VAR_CON_ACTION_1) : null;

/* action 2 */
/* device data */
!defined('ACTION_2_1') ? define('ACTION_2_1', "device data manager") : null;
!defined('ACTION_2_2') ? define('ACTION_2_2', "device data List") : null;

$VAR_CON_ACTION_2 = [
ACTION_2_1,
ACTION_2_2
];
!defined('VAR_CON_ACTION_2') ? define('VAR_CON_ACTION_2', $VAR_CON_ACTION_2) : null;

/* action 3 */
/* report */
!defined('ACTION_3_1') ? define('ACTION_3_1', "report 1 view") : null;
!defined('ACTION_3_2') ? define('ACTION_3_2', "report 2 view") : null;

$VAR_CON_ACTION_3 = [
ACTION_3_1,
ACTION_3_2
];
!defined('VAR_CON_ACTION_3') ? define('VAR_CON_ACTION_3', $VAR_CON_ACTION_3) : null;

?>