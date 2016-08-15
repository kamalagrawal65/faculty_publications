<?php
// using ldap bind
$username=$_POST["username"];
$password=$_POST["password"];
$filter="(uid=$username)";
$ldaprdn  = "uid=$username,ou=students_ug,dc=iitmandi,dc=ac,dc=in";     // ldap rdn or dn
$ldaprdn1  = "uid=$username,ou=students_pg,dc=iitmandi,dc=ac,dc=in";
$ldaprdn2  = "uid=$username,ou=faculty,dc=iitmandi,dc=ac,dc=in";
$ldaprdn3  = "uid=$username,ou=staff,dc=iitmandi,dc=ac,dc=in";
$ldaprdn4  = "uid=$username,ou=scholars,dc=iitmandi,dc=ac,dc=in";
$ldaprdn5 = "uid=$username,ou=projects,dc=iitmandi,dc=ac,dc=in";

// connect to ldap server
$ldapconn = @ldap_connect("users.iitmandi.ac.in")
    or die("Could not connect to LDAP server.");
ldap_set_option($ldapconn, LDAP_OPT_PROTOCOL_VERSION, 3);
if ($ldapconn)
{

// binding to ldap server
                $ldapbind = ldap_bind($ldapconn, $ldaprdn, $password);
                if(empty($ldapbind)) {
                                $ldapbind = ldap_bind($ldapconn, $ldaprdn1, $password);
                                $ldaprdn = $ldaprdn1;
                }
                
		if(empty($ldapbind)) {
                                $ldapbind = ldap_bind($ldapconn, $ldaprdn2, $password);
                                $ldaprdn = $ldaprdn2;
                }
		if(empty($ldapbind)) {
                                $ldapbind = ldap_bind($ldapconn, $ldaprdn3, $password);
                                $ldaprdn = $ldaprdn3;
                }
		if(empty($ldapbind)) {
                                $ldapbind = ldap_bind($ldapconn, $ldaprdn4, $password);
                                $ldaprdn = $ldaprdn4;
                }
		if(empty($ldapbind)) {
                                $ldapbind = ldap_bind($ldapconn, $ldaprdn5, $password);
                                $ldaprdn = $ldaprdn5;
                }


                // verify binding
                if ($ldapbind)
                {
					$attributes = array("employeeNumber", "sn", "givenName", "mail");
					$data = ldap_search($ldapconn, $ldaprdn, $filter );
					$entry = ldap_get_entries($ldapconn, $data);
					session_start();
					$_SESSION['username']= $username;
					$_SESSION['user_type']= 2;
					$_SESSION['fname'] = $entry[0]["givenname"][0];
					$_SESSION['lname'] = $entry[0]["sn"][0];
					$_SESSION['email'] = $entry[0]["mail"][0];
					$_SESSION['id'] = $entry[0]["employeenumber"][0];
					header("location:publication-form.php");
				}
                else
                {
			echo "Oops, you either do not have an LDAP account or you have entered wrong credentials. Please contact lalit@iitmandi.ac.in<br><br>";
        		 echo " <a href='login.php'><button>Try Again</b></button></a>";
               
	        }
}
?>

