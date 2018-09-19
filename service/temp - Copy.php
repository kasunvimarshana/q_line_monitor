<?php
    $curl = curl_init();
    curl_setopt ($curl, CURLOPT_URL, "http://www.php.net");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec ($curl);
    curl_close ($curl);
    print $result;
?>
<?php
    $curl = curl_init();
    $fp = fopen("somefile.txt", "w");
    curl_setopt ($curl, CURLOPT_URL, "http://www.php.net");
    curl_setopt($curl, CURLOPT_FILE, $fp);
    curl_exec ($curl);
    curl_close ($curl);
?>
<?php
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL,"ftp://ftp.gnu.org");
    curl_setopt($curl, CURLOPT_FTPLISTONLY, 1);
    curl_setopt($curl, CURLOPT_USERPWD, "anonymous:your@email.com");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    $result = curl_exec ($curl);
    curl_close ($curl);
    print $result;
?>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://www.example.com/path/to/form");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, true);

$data = array(
    'foo' => 'foo foo foo',
    'bar' => 'bar bar bar',
    'baz' => 'baz baz baz'
);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
$output = curl_exec($ch);
$info = curl_getinfo($ch);
curl_close($ch);
?>
<?php
// Data in JSON format
$data = array(
    'username' => 'admin',
    'password' => 'admin'
);
$payload = json_encode($data);
// Prepare new cURL resource
$ch = curl_init('https://www.example.com/login/');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
// Set HTTP Header for POST request 
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
    'Content-Length: ' . strlen($payload))
);
// Submit the POST request
$result = curl_exec($ch);
// Close cURL session handle
curl_close($ch);
?>
<?php
// Sets our destination URL
$endpoint_url = 'https://somesite.com/path/to/endpoint';
// Creates our data array that we want to post to the endpoint
$data_to_post = [
	'field1' => 'foo',
	'field2' => 'bar',
	'field3' => 'spam',
	'field4' => 'eggs',
];
// Sets our options array so we can assign them all at once
$options = [
  	CURLOPT_URL        => $endpoint_url,
	CURLOPT_POST       => true,
	CURLOPT_POSTFIELDS => $data_to_post,
];
// Initiates the cURL object
$curl = curl_init();
// Assigns our options
curl_setopt_array($curl, $options);
// Executes the cURL POST
$results = curl_exec($curl);
// Be kind, tidy up!
curl_close($curl);
?>
<?php
//Initialize the $query_string variable for later use
$query_string = "";
//If there are POST variables
if ($_POST) {
//Initialize the $kv array for later use
$kv = array();
//For each POST variable as $name_of_input_field => $value_of_input_field
foreach ($_POST as $key => $value) {
//Set array element for each POST variable (ie. first_name=user name)
$kv[] = stripslashes($key)."=".stripslashes($value);
}
//Create a query string with join function separted by &
$query_string = join("&", $kv);
}
//Check to see if cURL is installed ...
if (!function_exists('curl_init')){
die('Sorry cURL is not installed!');
}
//The original form action URL from Step 2 :)
$url = 'https://www.example.com/servlet/servlet.WebToLead?encoding=UTF-8';
//Open cURL connection
$ch = curl_init();
//Set the url, number of POST vars, POST data
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, count($kv));
curl_setopt($ch, CURLOPT_POSTFIELDS, $query_string);
//Set some settings that make it all work :)
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, FALSE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
//Execute SalesForce web to lead PHP cURL
$result = curl_exec($ch);
//close cURL connection
curl_close($ch);
if($result=='ok')
{
//echo '&lt;script&gt;alert("Posted -- ")&lt;/script&gt;';
}
// Here you can write mysql query to insert data in table.
$insert_tbl_index_page= "insert into tbl_form_data(first_name,last_name,street,city,zip,phone,email)values('$first_name','$last_name','$street','$city','$zip','$phone','$email')";
?>
<?php
//create array of data to be posted
$post_data['firstName'] = 'Name';
$post_data['action'] = 'Register';
//traverse array and prepare data for posting (key1=value1)
foreach ( $post_data as $key => $value) {
$post_items[] = $key . '=' . $value;
}
//create the final string to be posted using implode()
$post_string = implode ('&', $post_items);
//we also need to add a question mark at the beginning of the string
$post_string = '?' . $post_string;
//we are going to need the length of the data string
$data_length = strlen($post_string);
//let's open the connection
$connection = fsockopen('www.domainname.com', 80);
//sending the data
fputs($connection, "POST /target_url.php HTTP/1.1rn");
fputs($connection, "Host: www.domainname.com rn");
fputs($connection, "Content-Type: application/x-www-form-urlencodedrn");
fputs($connection, "Content-Length: $data_lengthrn");
fputs($connection, "Connection: closernrn");
fputs($connection, $post_string);
//closing the connection
fclose($fp);
?>