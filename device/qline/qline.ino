// include library
#include <Ethernet.h>
#include <SPI.h>
// device id
const String DEVICE_ID = "DEVICE01";
// Enter a MAC address for your controller below.
byte mac[] = {
  0x00, 0xAA, 0xBB, 0xCC, 0xDE, 0x02
};
// array fix size
const int ARRAY_SIZE = 10;
// possible order
const int POSSIBLE_ORDER = 11;
// output obj
struct MyOutputs{
    int order[ARRAY_SIZE];
    int value;
    String code;
    boolean isActive;
};
// input
#define input1 22
#define input2 24
#define input3 26
#define input4 28
#define input5 30
#define input6 32
#define input7 34
#define input8 36
#define input9 38
#define input10 40
// output
#define output1 2
#define output2 3
#define output3 4
#define output4 5
#define output5 42
#define output6 44
const int output_indicator[2] = {output5, output6};//0=connected, 1=connecting
int inputVals[ARRAY_SIZE];
int inputVals_previous[ARRAY_SIZE];
int myOutputs_value;
MyOutputs output_case[POSSIBLE_ORDER];
/*
int case_a[ARRAY_SIZE] = {1, 1, 1, 1, 1, 1, 1, 1, 1, 1};
int case_b[ARRAY_SIZE] = {0, 1, 1, 1, 1, 1, 1, 1, 1, 1};
int case_c[ARRAY_SIZE] = {0, 0, 1, 1, 1, 1, 1, 1, 1, 1};
int case_d[ARRAY_SIZE] = {0, 0, 0, 1, 1, 1, 1, 1, 1, 1};
int case_e[ARRAY_SIZE] = {0, 0, 0, 0, 1, 1, 1, 1, 1, 1};
int case_f[ARRAY_SIZE] = {0, 0, 0, 0, 0, 1, 1, 1, 1, 1};
int case_g[ARRAY_SIZE] = {0, 0, 0, 0, 0, 0, 1, 1, 1, 1};
int case_h[ARRAY_SIZE] = {0, 0, 0, 0, 0, 0, 0, 1, 1, 1};
int case_i[ARRAY_SIZE] = {0, 0, 0, 0, 0, 0, 0, 0, 1, 1};
int case_j[ARRAY_SIZE] = {0, 0, 0, 0, 0, 0, 0, 0, 0, 1};
int case_k[ARRAY_SIZE] = {0, 0, 0, 0, 0, 0, 0, 0, 0, 0};
*/
boolean isArrayMatch( int a1[], int a2[], int ARRAY_SIZE );
void clearData();
void printIPAddress();
boolean send_data( MyOutputs tmp );
boolean send_ip();
boolean toggle1;
int frequency;
int frequency1;
// Initialize the Ethernet client library
// with the IP address and port of the server
// that you want to connect to (port 80 is default for HTTP):
EthernetClient client;
// port
const int port = 80;
// use the numeric IP instead of the name for the server:
String var_host = "192.168.1.100";  // numeric IP for Server (no DNS)
IPAddress server(192,168,1,100);  // numeric IP for Server (no DNS)
//char server[] = "www.google.com";    // name address for Server (using DNS)
void setup() {
  // put your setup code here, to run once:
  // Open serial communications and wait for port to open:
  Serial.begin(9600);
  // this check is only needed on the Leonardo:
  while (!Serial) {
    ; // wait for serial port to connect. Needed for native USB port only
  }
  // start the Ethernet connection:
  /* with dhcp start */
  /*while (Ethernet.begin(mac) == 0) {
    Serial.println("Failed to configure Ethernet using DHCP");
  }*/
  /* with dhcp end */
  /* with static ip start */
  IPAddress ip(192, 168, 1, 5);
  IPAddress gateway(192,168,1, 1);
  IPAddress subnet(255, 255, 0, 0);
  Ethernet.begin(mac, ip, gateway, subnet);
  /* with static ip end */
  // print your local IP address:
  printIPAddress();
  while( !send_ip() ){}
  pinMode(input1, INPUT); 
  pinMode(input2, INPUT); 
  pinMode(input3, INPUT); 
  pinMode(input4, INPUT); 
  pinMode(input5, INPUT); 
  pinMode(input6, INPUT); 
  pinMode(input7, INPUT); 
  pinMode(input8, INPUT); 
  pinMode(input9, INPUT); 
  pinMode(input10, INPUT);
  pinMode(output1, OUTPUT); 
  pinMode(output2, OUTPUT); 
  pinMode(output3, OUTPUT); 
  pinMode(output4, OUTPUT);
  pinMode(output5, OUTPUT); 
  pinMode(output6, OUTPUT);  
  digitalWrite(output1, LOW);
  digitalWrite(output2, LOW);
  digitalWrite(output3, LOW);
  digitalWrite(output4, LOW);
  digitalWrite(output5, LOW);
  digitalWrite(output6, LOW);
  myOutputs_value = 0;
  output_case[0] = { {1, 1, 1, 1, 1, 1, 1, 1, 1, 1}, 0, "", false };
  output_case[1] = { {0, 1, 1, 1, 1, 1, 1, 1, 1, 1}, 1, "1", false };
  output_case[2] = { {0, 0, 1, 1, 1, 1, 1, 1, 1, 1}, 2, "2", false };
  output_case[3] = { {0, 0, 0, 1, 1, 1, 1, 1, 1, 1}, 3, "3", false };
  output_case[4] = { {0, 0, 0, 0, 1, 1, 1, 1, 1, 1}, 4, "4", false };
  output_case[5] = { {0, 0, 0, 0, 0, 1, 1, 1, 1, 1}, 5, "5", false };
  output_case[6] = { {0, 0, 0, 0, 0, 0, 1, 1, 1, 1}, 6, "6", false };
  output_case[7] = { {0, 0, 0, 0, 0, 0, 0, 1, 1, 1}, 7, "7", false };
  output_case[8] = { {0, 0, 0, 0, 0, 0, 0, 0, 1, 1}, 8, "8", false };
  output_case[9] = { {0, 0, 0, 0, 0, 0, 0, 0, 0, 1}, 9, "9", false };
  output_case[10] = { {0, 0, 0, 0, 0, 0, 0, 0, 0, 0}, 10, "10", false };
  clearData();
  frequency = 50;
  frequency1 = 100;
  digitalWrite(output_indicator[0], HIGH);
}

void loop() {
  // put your main code here, to run repeatedly:
  // reda input values
  inputVals[0] = digitalRead(input1);
  inputVals[1] = digitalRead(input2);
  inputVals[2] = digitalRead(input3);
  inputVals[3] = digitalRead(input4);
  inputVals[4] = digitalRead(input5);
  inputVals[5] = digitalRead(input6);
  inputVals[6] = digitalRead(input7);
  inputVals[7] = digitalRead(input8);
  inputVals[8] = digitalRead(input9);
  inputVals[9] = digitalRead(input10);

  /*
  for( int i = 0; i < POSSIBLE_ORDER; i++){
      if( (isArrayMatch( inputVals ,output_case[i].order ,ARRAY_SIZE )) ){
          if( !(isArrayMatch( inputVals ,inputVals_previous ,ARRAY_SIZE )) ){
            send_data( output_case[i] );
            memcpy( inputVals_previous, inputVals, (ARRAY_SIZE * sizeof(int)) );
            return;
          }
      }
  }
  */
  /**/
  for( int i = 0; i < POSSIBLE_ORDER; i++){
      if( (isArrayMatch( inputVals ,output_case[i].order ,ARRAY_SIZE )) ){
          int temp_myOutputs_value = output_case[i].value;
          if( (temp_myOutputs_value != 0) && (temp_myOutputs_value != myOutputs_value) && (temp_myOutputs_value > myOutputs_value) ){
            myOutputs_value = temp_myOutputs_value;
            send_data( output_case[i] );
            break;
          }else{
            myOutputs_value = temp_myOutputs_value;
          }
      }
  }
  /**/

  if( isArrayMatch( inputVals ,output_case[0].order ,ARRAY_SIZE ) ){//case a
        digitalWrite(output1, HIGH);
        digitalWrite(output2, LOW);
        digitalWrite(output3, LOW);
        digitalWrite(output4, LOW);
        output_case[0].isActive = true;
        clearData();
        //Serial.println("F1");
    }else if( isArrayMatch( inputVals ,output_case[1].order ,ARRAY_SIZE ) ){//case b
        digitalWrite(output1, HIGH);
        digitalWrite(output2, LOW);
        digitalWrite(output3, LOW);
        digitalWrite(output4, LOW);
        output_case[1].isActive = true;
        clearData();
        //Serial.println("F2");
    }else if( isArrayMatch( inputVals ,output_case[2].order ,ARRAY_SIZE ) ){//case c
        digitalWrite(output1, HIGH);
        digitalWrite(output2, LOW);
        digitalWrite(output3, LOW);
        digitalWrite(output4, LOW);
        output_case[2].isActive = true;
        clearData();
        //Serial.println("F3");
    }else if( isArrayMatch( inputVals ,output_case[3].order ,ARRAY_SIZE ) && !output_case[3].isActive ){//case d
        digitalWrite(output1, LOW);
        digitalWrite(output2, HIGH);
        digitalWrite(output3, LOW);
        digitalWrite(output4, LOW);
        output_case[3].isActive = true;
        //Serial.println("F4");
    }else if( isArrayMatch( inputVals ,output_case[4].order ,ARRAY_SIZE ) && !output_case[4].isActive ){//case e
        digitalWrite(output1, LOW);
        digitalWrite(output2, HIGH);
        digitalWrite(output3, LOW);
        digitalWrite(output4, LOW);
        output_case[4].isActive = true;
        //Serial.println("F5");
    }else if( isArrayMatch( inputVals ,output_case[5].order ,ARRAY_SIZE ) && !output_case[5].isActive ){//case f
        digitalWrite(output1, LOW);
        digitalWrite(output2, HIGH);
        digitalWrite(output3, LOW);
        digitalWrite(output4, LOW);
        output_case[5].isActive = true;
        //Serial.println("F6");
    }else if( isArrayMatch( inputVals ,output_case[6].order ,ARRAY_SIZE ) && !output_case[6].isActive ){//case g
        digitalWrite(output1, LOW);
        digitalWrite(output2, HIGH);
        digitalWrite(output3, LOW);
        digitalWrite(output4, LOW);
        output_case[6].isActive = true;
        //Serial.println("F7");
    }else if( isArrayMatch( inputVals ,output_case[7].order ,ARRAY_SIZE ) && !output_case[7].isActive ){//case h
        digitalWrite(output1, LOW);
        digitalWrite(output2, LOW);
        digitalWrite(output3, HIGH);
        digitalWrite(output4, LOW);
        output_case[7].isActive = true;
        //Serial.println("F8");
    }else if( isArrayMatch( inputVals ,output_case[8].order ,ARRAY_SIZE ) && !output_case[8].isActive ){//case i
        digitalWrite(output1, LOW);
        digitalWrite(output2, LOW);
        digitalWrite(output3, HIGH);
        digitalWrite(output4, LOW);
        output_case[8].isActive = true;
        //Serial.println("F9");
    }else if( isArrayMatch( inputVals ,output_case[9].order ,ARRAY_SIZE ) && !output_case[9].isActive ){//case j
        digitalWrite(output1, LOW);
        digitalWrite(output2, LOW);
        digitalWrite(output3, HIGH);
        toggle1 = true;
        output_case[9].isActive = true;
        //Serial.println("F10");
    }else if( isArrayMatch( inputVals ,output_case[10].order ,ARRAY_SIZE ) && !output_case[10].isActive ){//case k
        digitalWrite(output1, LOW);
        digitalWrite(output2, LOW);
        digitalWrite(output3, HIGH);
        toggle1 = true;
        output_case[10].isActive = true;
        //Serial.println("F11");
    }
    /* temp */
    if( isArrayMatch( inputVals ,output_case[0].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[1].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[2].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[3].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[4].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[5].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[6].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[7].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[8].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[9].order ,ARRAY_SIZE ) ||
        isArrayMatch( inputVals ,output_case[10].order ,ARRAY_SIZE )
        ){
        //Serial.println("temp");
      }else{
        digitalWrite(output4, HIGH);
        delay(frequency1);
        digitalWrite(output4, LOW);
        delay(frequency1);
      }
    /* temp */
    if( toggle1 ){
        digitalWrite(output4, HIGH);
        delay(frequency);
        digitalWrite(output4, LOW);
        delay(frequency);
      }
    delay(100);    
}

// custom functions
boolean isArrayMatch( int a1[], int a2[], int ARRAY_SIZE ){
  for( int i = 0; i < ARRAY_SIZE; i++){
      if( a1[i] != a2[i] ){
          return false;
        }
    }
  return true;
}

void clearData(){
  for( int i = 0; i < POSSIBLE_ORDER; i++){
    output_case[i].isActive = false;
  }
  toggle1 = false;
}

void printIPAddress(){
  Serial.print("My IP address: ");
  for (byte thisByte = 0; thisByte < 4; thisByte++) {
    // print the value of each byte of the IP address:
    Serial.print(Ethernet.localIP()[thisByte], DEC);
    Serial.print(".");
  }
  Serial.println();
}

boolean send_data( MyOutputs tmp ){
  // if you get a connection, report back via serial:
  if(client.connect(server, port)){
    // Make a HTTP request:
    //client.println("GET /search?q=arduino HTTP/1.1");
    String queryString = "action=device_data_add&device_id="+DEVICE_ID+"&var_value="+tmp.code;
    client.println("POST /site/controller/device_data_handle_controller.php HTTP/1.1");
    client.println("Host: " + var_host);
    client.println("Content-Type: application/x-www-form-urlencoded"); 
    client.print("Content-Length: "); 
    client.println(queryString.length()); 
    client.println(); 
    client.print(queryString);
    client.println();
    client.println("Connection: close");
    client.println();
    Serial.println("connection success | send_data");
    // if there are incoming bytes available from the server, read them
    String feedback_result = "";
    if((client.connected())){
      while( (!client.available()) ){
        /*
        char c = client.read();
        feedback_result += c;
        */
        //break;
      }
      client.stop();
    }
    //print output
    //Serial.println(feedback_result.length());
    // disconect from the server
    if((!client.connected())){ 
      client.stop();
    }
    return true;
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection error | send_data");
    return false;
  }
}

boolean send_ip(){
  // if you get a connection, report back via serial:
  if(client.connect(server, port)){
    // Make a HTTP request:
    //client.println("GET /search?q=arduino HTTP/1.1");
    String queryString = "action=device_ip_update&device_id="+DEVICE_ID;
    client.println("POST /site/controller/device_handle_controller.php HTTP/1.1");
    client.println("Host: " + var_host);
    client.println("Content-Type: application/x-www-form-urlencoded"); 
    client.print("Content-Length: "); 
    client.println(queryString.length()); 
    client.println(); 
    client.print(queryString);
    client.println();
    client.println("Connection: close");
    client.println();
    Serial.println("connection success | send_ip");
    // if there are incoming bytes available from the server, read them
    String feedback_result = "";
    if((client.connected())){
      while( (!client.available()) ){
        /*
        char c = client.read();
        feedback_result += c;
        */
        //break;
      }
      client.stop();
    }
    //print output
    //Serial.println(feedback_result.length());
    // disconect from the server
    if((!client.connected())){ 
      client.stop();
    }
    return true;
  } else {
    // if you didn't get a connection to the server:
    Serial.println("connection error | send_ip");
    return false;
  }
}
