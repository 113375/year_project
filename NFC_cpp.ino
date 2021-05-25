#include <SPI.h>
#include <Wire.h>
#include <Ethernet2.h>
#include <Adafruit_PN532.h>
#include <Servo.h> 

Servo myservo;

#define PN532_IRQ   9
Adafruit_PN532 nfc(PN532_IRQ, 100);

 
byte mac[] = { 0xDE, 0xAD, 0xBE, 0xEF, 0xFE, 0xED };
char server[] = "localhost";
EthernetClient client;
 
void setup()
{
  Serial.begin(9600);
  
  nfc.begin();
  nfc.SAMConfig();

  pinMode(13, OUTPUT);
  
  void get(nfc) {
    while (!Serial) {
    }
  
    if (Ethernet.begin(mac) == 0) {
      Ethernet.begin(mac, ip);
    }
   
    if (client.connect(server, 80)) {
      client.println("GET / HTTP/1.1");
      client.println("Host: localhost");
      client.println(nfc);
      client.println("Connection: close");
      client.println();
    }
  }
}
 
void loop()
{
   uint8_t success;
   uint8_t uid[8];
   uint8_t uidLength;

   success = nfc.readPassiveTargetID(PN532_MIFARE_ISO14443A, uid, &uidLength);

   if (success) {
    get(sucess[uid]);
   }

  if (client.available()) {
    char c = client.read();
  }
 
  if (!client.connected()) {;
    client.stop();
    while (1) {
    }
  }

  if (c == true) {
    myservo.write(180);
    delay(5000);
    myservo.write(90);
  }

  if (c == false) {
    digitalWrite(4, HIGH);
    delay(3000);
    digitalWrite(4, LOW);
  }
}
